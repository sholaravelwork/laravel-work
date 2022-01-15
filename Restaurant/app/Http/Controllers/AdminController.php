<?php

namespace App\Http\Controllers;
use App\Services\AdministratorStoreService;
use App\Services\AdministratorEditService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminiRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Administrator;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // 管理者追加画面に遷移
public function administratoradd()
{
    return view('administrator/administratoradd');
}

// 管理者追加処理
public function administratorstore(AdminiRequest $request)
{

    // $administrator = new Administrator();
    // $service = new AdministratorStoreService();
    // $service->store($request);
    $administrator =  new Administrator();

    $administrator->name = $request->name;
    $administrator->email = $request->email;
    $administrator->password = Hash::make($request->password);
    $administrator->save();


    return redirect()->route('manage.administrator')
    ->with(['administrators' => $administrator]);
   }

   // 管理者詳細画面に遷移
   public function administrator_show(Administrator $administrator)
   {
       return view('administrator/administratorshow')
           ->with(['administrator' => $administrator]);
   }

   // 管理者編集画面に遷移
   public function administrator_edit(Administrator $administrator)
   {
       return view('administrator/administratoredit')
           ->with(['administrator' => $administrator]);
   }

   // 管理者情報編集後、管理者一覧画面に遷移
   public function administrator_update(LoginRequest $request, Administrator $administrator)
   {

    $service = new AdministratorEditService();
    $service->update($request,$administrator);

    $administrator->save();

    return redirect()->route('manage.administrator');
}

// 管理者情報削除後、管理者一覧画面に遷移
public function administrator_destroy(Administrator $administrator)
{
    $administrator->delete();
    return redirect()->route('manage.administrator');
}
}
