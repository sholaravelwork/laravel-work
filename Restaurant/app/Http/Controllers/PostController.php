<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Request as pPostRequest;
use Request as pReserveRequest;
use App\Models\Menu;
use App\Models\Reservation;
use App\Models\Administrator;
use App\Http\Requests\PostRequest;
use App\Http\Requests\AdminiRequest;
use App\Http\Requests\ReserveRequest;
use App\Http\Requests\LoginRequest;
use App\Services\ReserveStoreService;
use App\Services\AdministratorStoreService;
use App\Services\AdministratorEditService;
use App\Services\ReserveEditService;
use App\Services\MenuStoreService;
use App\Services\MenuEditService;

class PostController extends Controller
{
// ホーム画面に遷移
   public function index() {

    $menus =Menu::find([29,30,31]);

    return view('index')
    ->with(['menus' => $menus]);

   }

// メニュー情報画面に遷移
   public function sidebar_foods()
   {

    $menus = Menu::all();

    return view('sidebar/foods')
    ->with(['menus' => $menus]);
   }

// ドリンク情報画面に遷移
   public function sidebar_drinks()
   {

    $menus = Menu::all();

    return view('sidebar/drinks')
    ->with(['menus' => $menus]);
   }

// アクセス情報画面に遷移
   public function sidebar_access(){
    return view('sidebar/access');
   }

   // ログイン画面に遷移
   public function login(){
    return view('login/login');
   }

    // 管理者画面に遷移
    public function admin(){
        return view('admin');
    }

    // メニュー一覧画面に遷移
    public function manage_menu(){

        $menus = Menu::all();

        return view('manage/manage-menu')
        ->with(['menus' => $menus]);
    }

     // メニュー追加画面に遷移
    public function menu_add(){
        return view('menu/menuadd');
    }

     // メニュー追加後、メニュー一覧画面に遷移
    public function menu_store(PostRequest $request){

         $service = new MenuStoreService();
         $service->store($request);
         return redirect() -> route('manage.menu');

    }

     // メニュー詳細画面に遷移
     public function menus_show(Menu $menu)
     {
         return view('menu/show')
             ->with(['menu' => $menu]);
     }

     // メニュー編集画面に遷移
     public function menus_edit(Menu $menu)
     {
         return view('menu/edit')
             ->with(['menu' => $menu]);
     }

     // メニュー編集処理後、メニュー一覧画面に遷移
     public function update(PostRequest $request, Menu $menu){

        $service = new MenuEditService();
        $service->update($request,$menu);

        return redirect() -> route('manage.menu');
    }

    // メニュー削除処理後、メニュー一覧画面に遷移
    public function destroy(Menu $menu){
        $menu->delete();
        return redirect() -> route('manage.menu');
   }

   // 予約一覧画面に遷移
   public function manage_reserve(){

    $reservation =   Reservation::all();
    return view('manage/manage-reserve')
    ->with(['reservations' => $reservation]);
   }

   // 予約追加画面に遷移
   public function reserve_add(){
    return view('reserve/reserveadd');
   }

   // 予約処理
   public function reserve_store(Reserverequest $request){

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
     public function reserveupdate(ReserveRequest $request,Reservation $reservation){


        $service = new ReserveEditService();
        $service->update($request,$reservation);

        return redirect() -> route('manage.reserve');
    }

    // 予約情報削除後、管理者一覧画面に遷移
    public function reservedestroy(Reservation $reservation){
        $reservation->delete();
        return redirect() -> route('manage.reserve');
   }

// 予約日の人数オーバーチェック
public function reserveck(Request $request) {


// 日時
$from = "02:00:00";
$to = $request->time;

// 日時からタイムスタンプを作成
$fromSec = strtotime($from);
$toSec   = strtotime($to);

// 時間数の差分を求める
$differences = $toSec - $fromSec;

// フォーマットする
$result = gmdate("H:i:s", $differences) ;

    $response = [];
    $maxnumber = 25;
    $time_handle =  ( int )($request->time)-(int)('02:00:00');
    $datetime = $request->day.' '. $result;
    $users = Reservation::where('date', '=', $request->day)->where('reservetime', '>', $datetime)->get();
    $sum = 0;
    $maxover = 0;

    if($users->count() == 0){
        $response[0] = '選択した日時の予約が可能でございます';
        $response[1] = '0';
        return $response;
    }else{
        // 既に予約されている人の合計処理
    $plucked = $users->pluck('nmpeople');

    for($i =0; $i < $users->count(); $i++){
        $sum += $plucked[$i];
     }
// 現在予約している人数を返している。
// 計算はできているので、明日は条件分岐で予約可能か判定し、OKか返す。そしてdiv idで文言を適切な場所に表示。
if(($sum + $request->people) > $maxnumber){
    $maxover = ($sum + $request->people) - $maxnumber;
    $response[0] = '予約人数が'.$maxover.'人オーバーです';
    $response[1] = '0';
    return $response;
}else{
    $response[0] = '選択した日時の予約が可能です';
    $response[1] = '0';
    return $response;
}
    }

}

// 管理者一覧画面に遷移
public function manage_administrator()
{
    $administrator = Administrator::all();
    return view('manage/manage-administrator')
        ->with(['administrators' => $administrator]);
}

// 管理者追加画面に遷移
public function administratoradd(){
    return view('administrator/administratoradd');
}

// 管理者追加処理
public function administratorstore(AdminiRequest $request){

    $administrator = new Administrator();
    $service = new AdministratorStoreService();
    $service->store($request);


    return redirect() -> route('manage.administrator')
    ->with(['administrators' => $administrator]);
   }


 //サインイン処理
 public function signin(LoginRequest $request){

    $users = Administrator::where('email', '=', $request->email)->where('password', '=', $request->password)->get();
    if($users->count() == 0){
        $message = 'メールアドレスまたはパスワードが間違っております。';
        return view('login/loginmiss')->with('message',$message);
    }else{
        return redirect() -> route('admin');
   }
 }

 public function userview_reserve(){
    return view('userview/reserve');
}

// 予約確認処理
public function userview_reserve_confirm(ReserveRequest $request){

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
public function user_store(Reserverequest $request){


    $reservation =  new Reservation();
    $service = new ReserveStoreService();
    $service->store($request);


    return view('userview/reserve_complete');
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
   public function administrator_update(LoginRequest $request, Administrator $administrator){

    $service = new AdministratorEditService();
    $service->update($request,$administrator);

    $administrator->save();

    return redirect() -> route('manage.administrator');
}

// 管理者情報削除後、管理者一覧画面に遷移
public function administrator_destroy(Administrator $administrator){
    $administrator->delete();
    return redirect() -> route('manage.administrator');
}

}
