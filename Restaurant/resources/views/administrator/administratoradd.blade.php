<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理者追加画面</title>
    <link rel="stylesheet" href="{{ url('css/admin/style.css')}}">
</head>

<body>

    <div class="login">
        <h1>管理者追加画面</h1>
        <div align="center">
            <p><a href="/manage-administrator">[戻る]</a></p>
            <form action="{{ route('administrator.store') }}" method="post">
                @csrf

                <div class="form-group"> <label>
                        <font>名前：</font>
                        <input type="text" name="name" value="{{ old('name') }}">
                    </label>
                    @error('name')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group"> <label>
                        <font>メールアドレス：</font>
                        <input type="text" name="email" value="{{ old('email') }}">
                    </label>
                    @error('email')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group"> <label>
                        <font>パスワード：</font>
                        <input type="password" name="password">
                    </label>
                    @error('password')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-button">
                    <input type="submit" value="管理者を追加する">
                </div>



            </form>
        </div>
    </div>

    <footer id="footer">
        <p>(C) 2021 SampleRestaurant 管理画面</p>
    </footer>
    <script src="{{ url('js/main.js')}}"></script>
</body>

</html>
