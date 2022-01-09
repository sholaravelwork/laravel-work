<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>メニュー追加画面</title>
    <link rel="stylesheet" href="{{ url('css/admin/style.css')}}">
</head>

<body>

    <div class="login">
        <h1>メニュー追加画面</h1>

        <p><a href="/manage-menu">[戻る]</a></p>
        <form action="{{ route('menus.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group"> <label>
                    メニュー名
                    <input type="text" name="name" value="{{ old('name') }}">
                </label>
                @error('name')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group"> <label>
                    金額
                    <input type="text" name="price" value="{{ old('price') }}">
                </label>
                @error('price')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group"> <label>
                    画像ファイル選択
                    <input type="file" name="img" value="{{ old('img') }}">
                </label>
                @error('img')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group"> <label>
                    メニュー説明
                    <textarea name="expla" value="{{ old('expla') }}">メニューの説明</textarea>
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
                <input type="submit" value="メニューを追加する">
            </div>



        </form>

    </div>

    <footer id="footer">
        <p>(C) 2021 SampleRestaurant 管理画面</p>
    </footer>
    <script src="{{ url('js/main.js')}}"></script>
</body>

</html>
