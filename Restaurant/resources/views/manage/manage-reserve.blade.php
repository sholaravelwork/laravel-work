<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/admin/style.css')}}">
    <title>予約管理画面</title>
</head>

<body>
    <h1>予約一覧画面</h1>
    <form action="{{ route('admin') }}" method="get" class="back-admin">
        @csrf


        <button>戻る</button>


    </form>

    <div class="menu-list">
        @forelse($reservations as $reservation)
        <form action="{{ route('reserve.show', $reservation) }}" method="get">
            <table cellspacing="55">
                <tr>
                    <td>
                        名前：{{ $reservation->name }}
                        <p>カナ：{{ $reservation->kana }}</p>
                        <p>ID：{{ $reservation->id }}</p>
                    </td>
                    <td>
                        予約人数：{{ $reservation->nmpeople }}人
                        <p>コース名：{{ $reservation->course }}</p>
                    </td>
                    <td>
                        {{ $reservation->reservetime }}
                    </td>
                    <td> <input type="submit" value="詳細を見る"></td>
                </tr>
            </table>
        </form>
        @empty

        @endforelse

        <div class="menu-list">

            <div class="add_button">
                <button><a href="/reserveadd">電話予約分を追加する</a></button>
            </div>
        </div>


    </div>
    <footer id="footer">
        <p>(C) 2021 SampleRestaurant 管理画面</p>
    </footer>
</body>

</html>
