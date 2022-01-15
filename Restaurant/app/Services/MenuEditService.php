<?php
namespace App\Services;

use App\Models\Menu;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenuEditService
{
    public function update(PostRequest $request,Menu $menu)
    {
        $file = $request->file('img');

        if ($request->file('img')->isValid([])) {
            //バリデーションを正常に通過した時の処理
            //S3へのファイルアップロード処理の時の情報を変数$upload_infoに格納する
            $upload_info = Storage::disk('s3')->putFile('/test', $request->file('img'), 'public');
            //S3へのファイルアップロード処理の時の情報が格納された変数$upload_infoを用いてアップロードされた画像へのリンクURLを変数$pathに格納する
            $path = Storage::disk('s3')->url($upload_info);
           // return redirect('/');
        }else{
            //バリデーションではじかれた時の処理
            return redirect('/upload/image');
        }

        $menu->img =  $path;
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->expla = $request->expla;

        $menu->genre = $request->genre;
        $menu->save();

    }
}
