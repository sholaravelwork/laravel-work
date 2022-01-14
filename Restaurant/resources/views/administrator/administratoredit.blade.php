<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理者情報編集画面</title>
    <link rel="stylesheet" href="{{ url('css/admin/style.css')}}">
</head>

<body>

    <div class="login">
        <h1>管理者情報編集画面</h1>

        <p class="back"><a href="/manage-administrator">[戻る]</a></p>
        <form action="{{route('administrator.destroy', $administrator)}}" id="delete_post">
            @method('DELETE')
            @csrf

            <button class="delete-btn">[削除する]</button>

        </form>


        <form action="{{ route('administrator.update', $administrator) }}" method="post">
            @method('PATCH')
            @csrf

            <div class="form-group"> <label>
                    <font>名前：</font>
                    <input type="text" name="name" value="{{ old('name',$administrator->name) }}">
                </label>
                @error('name')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group"> <label>
                    <font>メールアドレス：</font>
                    <input type="text" name="email" value="{{ old('email',$administrator->email) }}">
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
                <input type="submit" value="情報を編集する">
            </div>



        </form>

    </div>

    <footer id="footer">
        <p>(C) 2021 SampleRestaurant 管理画面</p>
    </footer>
    <script>
        'use strict';

{
    document.getElementById('delete_post').addEventListener('submit', e => {
        e.preventDefault();

        if (!confirm('本当に削除しますか？')) {
            return;
        }

        e.target.submit();
    });
}
    </script>
</body>

</html>
