<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Services\ReserveStoreService;
use App\Services\ReserveEditService;
use App\Http\Requests\ReserveRequest;
use Request as pReserveRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReserveController extends Controller
{
   // 予約追加画面に遷移
   public function reserve_add()
   {
    return view('reserve/reserveadd');
   }

   // 予約処理
   public function reserve_store(Reserverequest $request)
   {

    $reservation =  new Reservation();
    $service = new ReserveStoreService();
    $service->store($request);

    return redirect() -> route('manage.reserve')
    ->with(['reserve/reservations' => $reservation]);
   }

 // 予約情報詳細画面に遷移
   public function reserve_show(Reservation $reservation)
     {
         return view('reserve/reserveshow')
             ->with(['reservation' => $reservation]);
     }

      // 予約情報変更画面に遷移
   public function reserve_edit(Reservation $reservation)
     {
         return view('reserve/reserveedit')
             ->with(['reservation' => $reservation]);
     }

    // 予約情報変更後、管理者一覧画面に遷移
    public function reserveupdate(ReserveRequest $request,Reservation $reservation)
    {


        $service = new ReserveEditService();
        $service->update($request,$reservation);

        return redirect()->route('manage.reserve');
    }

    // 予約情報削除後、管理者一覧画面に遷移
    public function reservedestroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('manage.reserve');
    }
}
