<?php
namespace App\Services;

use App\Models\Menu;
use App\Http\Controllers;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class MenuStoreService
{
    public function store(PostRequest $request)
    {
        $menu =  new Menu();
        $file = $request->file('img');

        if ($request->file('img')->isValid([])) {
            //バリデーションを正常に通過した時の処理
            //S3へのファイルアップロード処理の時の情報を変数$upload_infoに格納する
            $upload_info = Storage::disk('s3')->putFile('/test', $request->file('img'), 'public');
            //S3へのファイルアップロード処理の時の情報が格納された変数$upload_infoを用いてアップロードされた画像へのリンクURLを変数$pathに格納する
            $path = Storage::disk('s3')->url($upload_info);
            //現在ログイン中のユーザIDを変数$user_idに格納する
            $user_id = 1;;
            //モデルファイルのクラスからインスタンスを作成し、オブジェクト変数$new_image_dataに格納する
            $new_image_data = new Image();
            //プロパティ(静的メソッド)user_idに変数$user_idに格納されている内容を格納する
            $new_image_data->user_id = $user_id;
            //プロパティ(静的メソッド)に変数$pathに格納されている内容を格納する
            $new_image_data->path = $path;
            //インスタンスの内容をDBのテーブルに格納する
            $new_image_data->save();

           // return redirect('/');
        }else{
            //バリデーションではじかれた時の処理
            return redirect('/upload/image');
        }

        date_default_timezone_set('Asia/Tokyo');

            // $originalName = $file->getClientOriginalName();
            // $micro = explode(" ", microtime());
            // $fileTail = date("Ymd_His", $micro[1]) . '_' . (explode('.', $micro[0])[1]);

            // $fileName =  $fileTail. '.' . $originalName;
            //$file->storeAs('images', $fileName, ['disk' => 'public']);
            $menu->img =  $path;


        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->expla = $request->expla;

        $menu->genre = $request->genre;
        $menu->save();

    }
}
