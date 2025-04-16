<?php

namespace App\Repositories;

use App\Models\Reservation;
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
}