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
    <h1>メニュー一覧画面</h1>
    <form action="{{ route('admin') }}" method="get" class="back-admin">
        @csrf


        <button>戻る</button>


    </form>

    <div class="menu-list">
        @forelse($menus as $menu)
        <form action="{{ route('menus.show', $menu) }}" method="get">
            <table cellspacing="55">
                <tr>
                    <td>
                        {{ $menu->name }}
                        <p>ID：{{ $menu->id }}</p>
                    </td>
                    <td><img src="{{ $menu->img }}" class="menu_img"></td>
                    <td class="td_price"> {{ $menu->price }}円</td>
                    <td> <input type="submit" value="詳細を見る"></td>
                </tr>
            </table>
        </form>
        @empty

        @endforelse
        <div class="add_button">
            <button><a href="/menuadd">メニューを追加する</a></button>
        </div>
    </div>

    <footer id="footer">
        <p>(C) 2021 SampleRestaurant 管理画面</p>
    </footer>
</body>

</html>
