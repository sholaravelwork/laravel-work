<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン</title>
    <link rel="stylesheet" href="{{ url('css/admin/style.css')}}">
</head>

<body>

    <div class="login">
        <h1>ログイン画面</h1>

        <form action="{{ route('signin') }}" method="post">
            @csrf
            <div align="center">
                <div class="form-group"> <label>
                        <font>メールアドレス：</font>
                        <input type="text" name="email">
                    </label>
                </div>
                <div class="form-group"> <label>
                        <font>パスワード：</font>
                        <input type="password" name="password">
                    </label>
                </div>
                <div class="error">{{ $message }}</div>
                <button>送信</button>
            </div>

        </form>

    </div>

    <footer id="footer">
        <p>(C) 2021 SampleRestaurant 管理画面</p>
    </footer>
    <script src="{{ url('js/main.js')}}"></script>
</body>

</html>
