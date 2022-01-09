<?php
namespace App\Services;

use App\Models\Menu;
use App\Http\Requests\PostRequest;

class MenuEditService
{
    public function update(PostRequest $request,Menu $menu)
    {
        $file = $request->file('img');

        // 画像保存処理
        if (!is_null($file)) {

            date_default_timezone_set('Asia/Tokyo');

            $originalName = $file->getClientOriginalName();
            $micro = explode(" ", microtime());
            $fileTail = date("Ymd_His", $micro[1]) . '_' . (explode('.', $micro[0])[1]);

            $fileName =  $fileTail. '.' . $originalName;
            $file->storeAs('images', $fileName, ['disk' => 'public']);
            $menu->img = $fileName;
        }

        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->expla = $request->expla;

        $menu->genre = $request->genre;
        $menu->save();

    }
}
