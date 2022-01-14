<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/admin/style.css')}}">
    <title>システム管理画面</title>
</head>

<body>
    <h1>システム管理画面</h1>

    <div class="menu">
        <li><a href="{{ route('manage.menu') }}">メニュー一覧</a></li>
        <li><a href="{{ route('manage.reserve') }}">予約情報管理</a></li>
        <li><a href="{{ route('manage.administrator') }}">管理者情報管理</a></li>
    </div>

    <form action="{{ route('logout') }}" method="get" class="back-admin">

        <button>ログアウト</button>


    </form>

    <footer id="footer">
        <p>(C) 2021 SampleRestaurant 管理画面</p>
    </footer>
</body>

</html>
