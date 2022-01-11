<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/admin/style.css')}}">
    <title>管理者管理画面</title>
</head>

<body>
    <h1>管理者一覧画面</h1>
    <form action="{{ route('admin') }}" method="get" class="back-admin">
        @csrf


        <button>戻る</button>


    </form>

    <div class="menu-list">

        <table cellspacing="55">
            <th>名前</th>
            <th>メールアドレス</th>
            <th>パスワード</th>
            <th>詳細</th>
            @forelse($administrators as $administrator)

            <tr>
                <td class="admini-td">
                    {{ $administrator->name }}
                    <p>ID：{{ $administrator->id }}</p>
                </td>
                <td class="admini-td">
                    {{ $administrator->email }}
                </td>
                <td class="admini-td">
                    {{ $administrator->password }}
                </td>
                <td class="admini-td-button">
                    <a href="{{ route('administrator.show', $administrator) }}">
                        <input type="submit" value="詳細を見る">
                    </a>
                </td>
            </tr>

            @empty

            @endforelse
        </table>
        <div class="menu-list">

            <div class="add_button">
                <button><a href="{{ route('administrator.add') }}">管理者を追加する</a></button>
            </div>
        </div>


    </div>
    <footer id="footer">
        <p>(C) 2021 SampleRestaurant 管理画面</p>
    </footer>
</body>

</html>
