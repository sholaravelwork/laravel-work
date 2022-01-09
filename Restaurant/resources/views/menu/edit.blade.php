<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>メニュー編集画面</title>
    <link rel="stylesheet" href="{{ url('css/admin/style.css')}}">
</head>

<body>

    <div class="login">
        <h1>メニュー編集画面</h1>

        <p class="back"><a href="/manage-menu">[戻る]</a></p>
        <form action="{{route('menus.destroy', $menu)}}" id="delete_post">
            @method('DELETE')
            @csrf

            <button class="delete-btn">[削除する]</button>

        </form>


        <form action="{{ route('menus.update', $menu) }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            <div class="form-group"> <label>
                    メニュー名
                    <input type="text" name="name" value="{{ old('name', $menu->name) }}">
                </label>
                @error('name')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group"> <label>
                    金額
                    <input type="text" name="price" value="{{ old('price', $menu->price) }}">
                </label>
                @error('price')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group"> <label>
                    画像ファイル選択
                    <input type="file" name="img">
                </label>
                @error('img')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group"> <label>
                    メニュー説明
                    <textarea name="expla" value="">{{ old('expla', $menu->expla) }}</textarea>
                </label>
                @error('expla')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group"> <label>
                    メニュージャンル
                    <div class="menu_genre">
                        <select name="genre">
                            <option value="パスタ">パスタ</option>
                            <option value="ジュース">ジュース</option>
                            <option value="ランチ">ランチ</option>
                            <option value="ドリンク">ドリンク</option>
                            <option value="コース">コース</option>
                        </select>
                    </div>
                </label>
                @error('genre')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-button">
                <input type="submit" value="編集を反映する">
            </div>



        </form>

    </div>

    <footer id="footer">
        <p>(C) 2021 SampleRestaurant 管理画面</p>
    </footer>
    <script>
        'use strict';

{
    document.getElementById('delete_post').addEventListener('submit', e => {
        e.preventDefault();

        if (!confirm('本当に削除しますか？')) {
            return;
        }

        e.target.submit();
    });
}
    </script>
</body>

</html>
