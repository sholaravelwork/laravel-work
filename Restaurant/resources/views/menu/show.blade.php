<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/admin/style.css')}}">
    <title>メニュー詳細画面</title>
</head>

<body>
    <h1>メニュー詳細画面</h1>


    <form action="{{ route('menus.edit', $menu) }}" method="get">
        <table cellspacing="55" class="show_menu">
            <th>メニュー名</th>
            <th>メニュー画像</th>
            <th>価格</th>
            <th>説明</th>
            <th>編集</th>
            <tr>
                <td>
                    {{ $menu->name }}
                </td>
                <td><img src="{{ $menu->img }}" class="menu_img"></td>
                <td class="td_price"> {{ $menu->price }}円</td>
                <td>{!! nl2br(e($menu->expla)) !!}</td>
                <td><input type="submit" value="編集する"></td>
            </tr>
        </table>
    </form>
    <form action="{{ route('manage.menu') }}" method="get" class="back-admin">
        @csrf


        <button>戻る</button>


    </form>




    <footer id="footer">
        <p>(C) 2021 SampleRestaurant 管理画面</p>
    </footer>
</body>

</html>
