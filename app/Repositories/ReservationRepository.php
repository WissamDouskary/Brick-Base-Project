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
        ->paginate(6);
    }

    public function getClientOffers(){
        return DB::table('reservations')
        ->join('users', 'users.id', '=', 'reservations.worker_id')
        ->where('client_id', '=', Auth::id())
        ->select('users.*', 'reservations.*')
        ->paginate(6);
    }

    public function manageOffers($offer_id, $status){
        $offer = Reservation::find($offer_id);
        return $offer->update(['status' => $status]);
    }

    public function filterOffers($status){
        return DB::table('reservations')
        ->join('users', 'users.id', '=', 'reservations.client_id')
        ->where('worker_id', '=', Auth::id())
        ->where('status', $status)
        ->select('users.*', 'reservations.*')
        ->paginate(6);
    }

    public function filterOffersClient($status)
    {
        return DB::table('reservations')
        ->join('users', 'users.id', '=', 'reservations.worker_id')
        ->where('client_id', '=', Auth::id())
        ->where('status', $status)
        ->select('users.*', 'reservations.*')
        ->paginate(6);
    }
}