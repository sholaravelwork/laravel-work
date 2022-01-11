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

class UserController extends Controller
{
    public function userview_reserve()
 {
    return view('userview/reserve');
}

// 予約確認処理
public function userview_reserve_confirm(ReserveRequest $request)
{

    $post_data = new Reservation();

    $request->validate([
        'name' => 'required|min:2',
        'kana' => 'required',
        'phonenumber' => 'required',
        'day' => 'required',
    ]);



    $post_data->name =  $request->name;
    $post_data->kana =  $request->kana;
    $post_data->phonenumber =  $request->phonenumber;
    $post_data->day =  $request->day;
    $post_data->nmpeople =  $request->nmpeople;
    $post_data->time =  $request->time;
    $post_data->course =  $request->course;

    return view('userview/reserve_confirm',compact('post_data'));
}

// 予約処理
// 一般ユーザーは管理画面にログインして予約できない為、表側から予約できるメソッドを以下に用意
public function user_store(Reserverequest $request)
{


    $reservation =  new Reservation();
    $service = new ReserveStoreService();
    $service->store($request);


    return view('userview/reserve_complete');
   }
}
