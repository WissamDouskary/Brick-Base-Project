<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Services\ReservationService;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    protected $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start-date',
            'content' => 'required|min:10|max:40'
        ]);

        $start = Carbon::parse($fields['start_date']);
        $end = Carbon::parse($fields['end_date']);

        $days = $start->diffInDays($end);

        $startDB = $start->format('Y-m-d H:i:s');
        $endDB = $end->format('Y-m-d H:i:s');

        $total_price = $days * $request->input('total_price');

        $alreadyReserved = Reservation::where('worker_id', $request->worker_id)
            ->where(function ($query) use ($startDB, $endDB) {
                $query->where(function ($q) use ($startDB, $endDB) {
                    $q->where('start_date', '<=', $startDB)
                        ->where('end_date', '>', $startDB);
                })
                    ->orWhere(function ($q) use ($startDB, $endDB) {
                        $q->where('start_date', '<', $endDB)
                            ->where('end_date', '>=', $endDB);
                    })
                    ->orWhere(function ($q) use ($startDB, $endDB) {
                        $q->where('start_date', '>=', $startDB)
                            ->where('end_date', '<=', $endDB);
                    });
            })
            ->first();

        if ($alreadyReserved) {

            $avDate = Carbon::parse($alreadyReserved->end_date);

            return back()->with('error', 'this worker is reserved before please chose other date after ' . $avDate);
        }

        $this->reservationService->create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => $total_price,
            'worker_id' => $request->worker_id,
            'client_id' => Auth::id(),
            'status' => 'Pending',
            'content' => $request->content
        ]);

        return back()->with('success', 'reservation passed successfuly');
    }

    public function getWorkerOffers(Request $request)
    {
        $status = $request->query('status');
    
        if ($status && $status !== 'All') {
            $offers = $this->reservationService->filterOffers($status);
        } else {
            $offers = $this->reservationService->getWorkerOffers();
        }
    
        return view('Pages.offres-worker', compact('offers'));
    }

    public function manageOffers($id, $status)
    {
        $this->reservationService->manageOffers($id, $status);
        return back()->with('success', 'status updated!');
    }

    public function getClientOffers(Request $request){
        $status = $request->input('status');

        if($status && $status !== "All"){
            $offers = $this->reservationService->filterOffersClient($status);
        } else {
            $offers = $this->reservationService->getClientOffers();
        }
        return view('Pages.offer-client', compact('offers'));
    }
}
