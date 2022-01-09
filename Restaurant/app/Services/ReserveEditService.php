<?php
namespace App\Services;

use App\Models\Reservation;
use App\Http\Requests\ReserveRequest;

class ReserveEditService
{
    public function update(ReserveRequest $request,Reservation $reservation)
    {


        $reservation->name = $request->name;
    $reservation->kana = $request->kana;
    $reservation->nmpeople = $request->nmpeople;
    $reservation->phonenumber = $request->phonenumber;
    $day = $request->day;
    $time = $request->time;
    $reservation->reservetime = $day.' '.$time;
    $reservation->course = $request->course;
    $reservation->date = $request->day;
        $reservation->save();

    }
}
