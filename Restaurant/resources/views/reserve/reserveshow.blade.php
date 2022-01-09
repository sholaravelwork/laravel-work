<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/admin/style.css')}}">
    <title>予約詳細画面</title>
</head>

<body>
    <h1>予約詳細画面</h1>


    <form action="{{ route('reserve.edit', $reservation) }}" method="get">
        <table cellspacing="55" class="show_menu">
            <th>氏名</th>
            <th>人数</th>
            <th>予約時間</th>
            <th>コース名</th>
            <th>編集</th>
            <tr>
                <td>
                    {{ $reservation->name }}
                    <p>{{ $reservation->kana }}</p>
                </td>
                <td>
                    {{ $reservation->nmpeople }}
                </td>
                <td>
                    {{ $reservation->reservetime }}
                </td>
                <td>
                    {{ $reservation->course }}
                </td>

                <td><input type="submit" value="編集する"></td>
            </tr>
        </table>
    </form>
    <form action="{{ route('manage.reserve') }}" method="get" class="back-admin">
        @csrf


        <button>戻る</button>


    </form>




    <footer id="footer">
        <p>(C) 2021 SampleRestaurant 管理画面</p>
    </footer>
</body>

</html>
