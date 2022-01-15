<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Administrator;
use App\Models\Reservation;
use App\Http\Requests\PostRequest;
use App\Http\Requests\LoginRequest;
use App\Services\MenuStoreService;
use App\Services\MenuEditService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PostController extends Controller
{
// ホーム画面に遷移
   public function index() {

    $menus =Menu::find([20,21,22]);

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
   public function sidebar_access()
   {
    return view('sidebar/access');
   }

   // ログイン画面に遷移
   public function login()
   {
    return view('login/login');
   }

    // 管理者画面に遷移
    public function admin()
    {
        return view('admin');
    }

    // メニュー一覧画面に遷移
    public function manage_menu()
    {

        $menus = Menu::all();

        return view('manage/manage-menu')
        ->with(['menus' => $menus]);
    }

     // メニュー追加画面に遷移
    public function menu_add()
    {
        return view('menu/menuadd');
    }

     // メニュー追加後、メニュー一覧画面に遷移
    public function menu_store(PostRequest $request)
    {

         $service = new MenuStoreService();
         $service->store($request);
         return redirect()->route('manage.menu');

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
     public function update(PostRequest $request, Menu $menu)
     {

        $service = new MenuEditService();
        $service->update($request,$menu);

        return redirect()->route('manage.menu');
    }

    // メニュー削除処理後、メニュー一覧画面に遷移
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('manage.menu');
   }

   // 予約一覧画面に遷移
   public function manage_reserve()
   {

    $reservation =   Reservation::all();
    return view('manage/manage-reserve')
    ->with(['reservations' => $reservation]);
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

    if($users->count() == 0)
    {
        $response[0] = '選択した日時の予約が可能でございます';
        $response[1] = '0';
        return $response;
    }else{
        // 既に予約されている人の合計処理
    $plucked = $users->pluck('nmpeople');

    for($i =0; $i < $users->count(); $i++)
    {
        $sum += $plucked[$i];
     }
// 現在予約している人数を返している。
// 計算はできているので、明日は条件分岐で予約可能か判定し、OKか返す。そしてdiv idで文言を適切な場所に表示。
if(($sum + $request->people) > $maxnumber)
{
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




 //サインイン処理
 public function signin(LoginRequest $request)
 {


    $user = Administrator::where('email', '=', $request->email)->get();
    if (count($user) === 0)
    {
        return view('login', ['login_error' => '1']);
    }

     // 一致
     if (Hash::check($request->password, $user[0]->password)) {

        // セッション
        session(['name'  => $user[0]->name]);
        session(['email'  => $user[0]->email]);

        // フラッシュ
        session()->flash('flash_flg', 1);
        session()->flash('flash_msg', 'ログインしました。');

        return view('admin');
    // 不一致
    }else{
        $message = 'メールアドレスまたはパスワードが間違っております。';
        return view('login/loginmiss')->with('message',$message);
    }
 }

 // ログアウト処理
 public function logout(Request $request)
 {
     session()->forget('name');
     session()->forget('email');
     return redirect(url('/'));
 }


}
