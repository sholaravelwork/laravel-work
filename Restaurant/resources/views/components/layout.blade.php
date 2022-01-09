<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SampleRestaurant</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://rawgit.com/jquery/jquery-ui/master/ui/i18n/datepicker-ja.js"></script>
    <link rel="stylesheet" href="{{ url('css/style.css')}}">
</head>

<body>
    <!--以下スマホメニュー-->
    <header>
        <div class="logo">
            <a href="{{ route('manage.index') }}"><img src="{{ url('img/home/restaurant-logo.png')}}" alt="レストランのロゴ"
                    class="restaurant-logo"></a>
        </div>

        <div class="sp-menu">
            <span class="material-icons" id="open">menu</span>
        </div>
    </header>


    <div class="wrapper">

        {{ $slot }}


        <div class="sidebar">
            <div class="container">
                <p><a href="{{ route('manage.index') }}"><img src="{{ url('img/home/restaurant-logo.png')}}"
                            alt="レストランのロゴ" class="restaurant-logo"></a></p>
                <ul>
                    <li><a href="{{ route('manage.index') }}">ホーム</a></li>
                    <li><a href="{{ route('manage.foods') }}?data=パスタ">パスタ料理</a></li>
                    <li><a href="{{ route('manage.foods') }}?data=ランチ">ランチ</a></li>
                    <li><a href="{{ route('manage.foods') }}?data=コース">コース</a></li>
                    <li><a href="{{ route('manage.drinks') }}?data=ドリンク">ドリンク</a></li>
                    <li><a href="{{ route('access') }}">アクセス</a></li>
                    <li>
                        <a href="{{ route('/userview/reserve') }}"><button class="btn_reserve">予約する</button></a>
                    </li>
                    <li>
                        <div class="call-area">
                            <p class="text-reserve">ご予約・お問い合わせはこちら</p>
                            <p class="text-call">011-567-7890</p>
                            <p class="text-businesshours"><a href="{{ route('access') }}">営業時間について</a></p>
                        </div>
                    </li>
                    <div class="sns_icon-area">
                        <ul>
                            <li><a href="https://ja-jp.facebook.com"><img src="{{ url('img/home/flogo.png')}}"
                                        alt=""></a>
                            </li>
                            <li><a href="https://line.me/ja/"><img src="{{ url('img/home/lilogo.png')}}" alt=""></a>
                            </li>
                            <li><a href="https://www.pinterest.jp"><img src="{{ url('img/home/pilogo.png')}}"
                                        alt=""></a>
                            </li>

                        </ul>

                    </div>
                    <li>
                        <button class="btn_adminlogin"><a href="{{ route('login') }}">管理画面にログイン</a></button>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="overlay">
        <span class="material-icons" id="close">close</span>
        <ul>
            <ul>
                <div class="container">
                    <p><a href="{{ route('manage.index') }}"><img src="{{ url('img/home/restaurant-logo.png')}}"
                                alt="レストランのロゴ" class="restaurant-logo"></a></p>
                    <ul>
                        <li><a href="{{ route('manage.index') }}">ホーム</a></li>
                        <li><a href="{{ route('manage.foods') }}?data=パスタ">パスタ料理</a></li>
                        <li><a href="{{ route('manage.foods') }}?data=ランチ">ランチ</a></li>
                        <li><a href="{{ route('manage.foods') }}?data=コース">コース</a></li>
                        <li><a href="{{ route('manage.drinks') }}?data=ドリンク">ドリンク</a></li>
                        <li><a href="{{ route('access') }}">アクセス</a></li>
                        <li>
                            <a href="{{ route('/userview/reserve') }}"><button class="btn_reserve">予約する</button></a>
                        </li>
                        <li>
                            <div class="call-area">
                                <p class="text-reserve">ご予約・お問い合わせはこちら</p>
                                <p class="text-call">011-567-7890</p>
                                <p class="text-businesshours"><a href="{{ route('access') }}">営業時間について</a></p>
                            </div>
                        </li>
                        <div class="sns_icon-area">
                            <ul>
                                <li><a href="https://ja-jp.facebook.com"><img src="{{ url('img/home/flogo.png')}}"
                                            alt=""></a>
                                </li>
                                <li><a href="https://line.me/ja/"><img src="{{ url('img/home/lilogo.png')}}" alt=""></a>
                                </li>
                                <li><a href="https://www.pinterest.jp"><img src="{{ url('img/home/pilogo.png')}}"
                                            alt=""></a>
                                </li>

                            </ul>

                        </div>
                    </ul>
                </div>
            </ul>
        </ul>
    </div>
    <!--以上スマホメニュー-->

    <footer>
        <p><a href="{{ route('manage.index') }}">(C) 2021 SampleRestaurant</a></p>
    </footer>
    <script src="{{ url('js/main.js')}}"></script>
</body>

</html>
