<?php

namespace App\Repositories;

use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\ReservationRepositoryInterface;

class ReservationRepository implements ReservationRepositoryInterface {
    public function create(array $data)
    {
        Reservation::create($data);
    }

    public function modify(int $id, array $data)
    {
        $reservation = Reservation::find($id);
        $reservation->update($data);
    }

    public function cancel($id)
    {
        $reservation = Reservation::find($id);
        $reservation->update(['status' => 'Failed']);
    }

    public function getWorkerOffers(){
        return DB::table('reservations')
        ->join('users', 'users.id', '=', 'reservations.client_id')
        ->where('worker_id', '=', Auth::id())
        ->select('users.*', 'reservations.*')
        ->get();
    }

    public function getClientOffers(){

    }

}