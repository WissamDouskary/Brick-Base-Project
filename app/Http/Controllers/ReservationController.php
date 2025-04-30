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
            'end_date' => 'required|date|after:start_date',
            'content' => 'required|min:10|max:40'
        ]);

        $start = Carbon::parse($fields['start_date']);
        $end = Carbon::parse($fields['end_date']);

        $days = $start->diffInDays($end);

        $startDB = $start->format('Y-m-d H:i:s');
        $endDB = $end->format('Y-m-d H:i:s');

        $total_price = $days * $request->input('total_price');

        $this->reservationService->create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => floatval(str_replace(',', '', $total_price)),
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

    public function getClientOffers(Request $request)
    {
        $status = $request->input('status');

        if ($status && $status !== "All") {
            $offers = $this->reservationService->filterOffersClient($status);
        } else {
            $offers = $this->reservationService->getClientOffers();
        }
        return view('Pages.offer-client', compact('offers'));
    }

    public function getWorkerReservedDays($workerId)
    {
        $reservations = Reservation::where('worker_id', $workerId)
            ->where('status', ['Pending', 'Accepted'])
            ->get(['start_date', 'end_date']);

        $dates = [];

        foreach ($reservations as $reservation) {
            $start = \Carbon\Carbon::parse($reservation->start_date);
            $end = \Carbon\Carbon::parse($reservation->end_date);

            while ($start->lte($end)) {
                $dates[] = $start->format('Y-m-d');
                $start->addDay();
            }
        }

        return response()->json($dates);
    }
}
