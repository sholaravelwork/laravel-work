<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/admin/style.css')}}">
    <title>管理者詳細画面</title>
</head>

<body>
    <h1>管理者詳細画面</h1>


    <form action="{{ route('administrator.edit', $administrator) }}" method="get">
        <table cellspacing="55" class="show_menu">
            <th>管理者名</th>
            <th>メールアドレス</th>
            <th>パスワード</th>
            <tr>
                <td>
                    {{ $administrator->name }}
                </td>
                <td>
                    {{ $administrator->email }}
                </td>
                <td>
                    {{ $administrator->password }}
                </td>
                <td><input type="submit" value="編集する"></td>
            </tr>
        </table>
    </form>
    <form action="{{ route('manage.administrator') }}" method="get" class="back-admin">
        @csrf


        <button>戻る</button>


    </form>




    <footer id="footer">
        <p>(C) 2021 SampleRestaurant 管理画面</p>
    </footer>
</body>

</html>
