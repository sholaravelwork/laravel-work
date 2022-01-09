<x-layout>
    <script>
        $(function(){ // 遅延処理

                $('#checkday').click(

                function() { // 遅延処理
                var target = document.getElementById('target');
                var day = document.getElementById( "formday" ).value;
                var time = document.getElementById( "time" ).value;
                var people = document.getElementById( "people" ).value;
        if(day == ""){
        alert('日付が未選択です。');

        target.classList.add('click_disable');
        target.classList.remove('click_able');
        }else{
        $.ajax({
        type: 'GET',
        url: '../reserveck', // url: は読み込むURLを表す
        data: { "day" : day,
        "time" : time,
        "people" : people},

        }) //通信が成功したとき
        .then((res) => {
        console.log(res);
        document.getElementById("res-text").innerHTML=res[0];
        if(res[1] != 0){
            //予約確認ボタンを押させない処理
        target.classList.add('click_disable');
        target.classList.remove('click_able');
        }else if(res[1] == 0){
             //予約確認ボタンを押せる処理
            target.classList.add('click_able');
            target.classList.remove('click_disable');
        }
        })
        //通信が失敗したとき
        .fail((error) => {
        console.log(error.statusText);
        });

        }
        }
        );
    // フォーム内で選択した日時での予約チェック処理
    $('#time-form').change(

    function() { // 遅延処理
    var target = document.getElementById('target');
    var day = document.getElementById( "formday" ).value;
    var time = document.getElementById( "time" ).value;
    var people = document.getElementById( "people" ).value;
    if(day == ""){
    alert('日付が未選択です。');
    target.classList.add('click_disable');
    }else{
    $.ajax({
    type: 'GET',
    url: '../reserveck', // url: は読み込むURLを表す
    data: { "day" : day,
    "time" : time,
    "people" : people},

    }) //通信が成功したとき
    .then((res) => {
    console.log(res);
    document.getElementById("res-text2").innerHTML=res[0];
    if(res[1] != 0){
    //予約確認ボタンを押させない処理
    target.classList.add('click_disable');
    target.classList.remove('click_able');
    }else if(res[1] == 0){
    //予約確認ボタンを押せる処理
    target.classList.add('click_able');
    target.classList.remove('click_disable');
    }
    })
    //通信が失敗したとき
    .fail((error) => {
    console.log(error.statusText);
    });

    }
    }
    );

        });
    </script>
    <div class="main">
        <section class="carousel">
            <div class="container">
                <div class="fv-content">
                    <ul>
                        <li><img src="{{ url('img/home/fv-1x.png')}}" alt=""></li>
                        <li><img src="{{ url('img/home/fv-2.png')}}" alt=""></li>
                        <li><img src="{{ url('img/home/fv-4.png')}}" alt=""></li>
                    </ul>
                </div>
                <button id="prev">&laquo;</button>
                <button id="next">&raquo;</button>
            </div>
            <nav>
                <div id="div1"></div>
            </nav>
        </section>
        <section>
            <div class="heading_menu">
                <p>ネット予約の状況</p>
            </div>
            <div align="center">
                <table class="reserve">
                    <tr>
                        <td>
                            <div id="datepicker" class="datepicker"></div>
                        </td>
                        <td>
                            <div class="reserve-td">
                                <form action="" method="get">
                                    <p>予約日：</p>
                                    <div style="margin-top: 2px;margin-bottom:20px;"> <input type="text" id="formday"
                                            value="" placeholder="カレンダーの日付選択" name="day" disabled="disabled">
                                    </div>
                                    <p>人数：</p>
                                    <div class="reserve_people">
                                        <select style="font-size:20px;" id="people">
                                            <option value="1">1名</option>
                                            <option value="2">2名</option>
                                            <option value="3">3名</option>
                                            <option value="4">4名</option>
                                            <option value="5">5名</option>
                                            <option value="6">6名</option>
                                            <option value="7">7名</option>
                                            <option value="8">8名</option>
                                            <option value="9">9名</option>
                                            <option value="10">10名</option>
                                        </select>
                                    </div>

                                    <p>来店時間：</p>
                                    <div class="reserve_people">
                                        <select style="font-size:20px;" name="time" id="time">
                                            <optgroup label="17時">
                                                <option value="17:00:00" name="minitues">17時00分</option>
                                                <option value="17:15:00" name="minitues">17時15分</option>
                                                <option value="17:30:00" name="minitues">17時30分</option>
                                                <option value="17:45:00" name="minitues">17時45分</option>
                                            </optgroup>
                                            <optgroup label="18時" name="hour">
                                                <option value="18:00:00" name="minitues">18時00分</option>
                                                <option value="18:15:00" name="minitues">18時15分</option>
                                                <option value="18:30:00" name="minitues">18時30分</option>
                                                <option value="18:45:00" name="minitues">18時45分</option>
                                            </optgroup>
                                            <optgroup label="19時" name="hour">
                                                <option value="19:00:00" name="minitues">19時00分</option>
                                                <option value="19:15:00" name="minitues">19時15分</option>
                                                <option value="19:30:00" name="minitues">19時30分</option>
                                                <option value="19:45:00" name="minitues">19時45分</option>
                                            </optgroup>
                                            <optgroup label="20時" name="hour">
                                                <option value="20:00:00" name="minitues">20時00分</option>
                                                <option value="20:15:00" name="minitues">20時15分</option>
                                                <option value="20:30:00" name="minitues">20時30分</option>
                                                <option value="20:45:00" name="minitues">20時45分</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <p></p>
                                    <input type="button" value="予約チェック" class="input_button" id="checkday" id="target">
                                    <input type="hidden" id="formday">
                                    <div id="res-text"></div>
                            </div>

                            </form>
            </div>
            </td>
            </tr>
            </table>
    </div>
    </section>


    <section>
        <div class="heading_menu">
            <p>予約情報入力</p>
        </div>
        <div align="center">
            <form action="{{ route('reserve.confirm') }}" method="post" enctype="multipart/form-data" id="form-area">
                @csrf
                <div class="reserve-user">
                    <div class="form-group"> <label>
                            <font>氏名：</font>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="山田 太郎">
                        </label>
                        @error('name')
                        <font>
                            <div class="error">{{ $message }}</div>
                        </font>
                        @enderror
                    </div>
                    <div class="form-group"> <label>
                            <font>カナ：</font>
                            <input type="text" name="kana" value="{{ old('kana') }}" placeholder="ヤマダ タロウ">
                        </label>
                        @error('kana')
                        <font>
                            <div class="error">{{ $message }}</div>
                        </font>
                        @enderror
                    </div>
                    <div class="form-group"> <label>
                            <font>予約人数：</font>
                            <div class="reserve_select">
                                <select name="nmpeople" id="people">
                                    <option value="1">1名</option>
                                    <option value="2">2名</option>
                                    <option value="3">3名</option>
                                    <option value="4">4名</option>
                                    <option value="5">5名</option>
                                    <option value="6">6名</option>
                                    <option value="7">7名</option>
                                    <option value="8">8名</option>
                                    <option value="9">9名</option>
                                    <option value="10">10名</option>
                                </select>
                            </div>

                        </label>
                    </div>
                    <div class="form-group"> <label>
                            <font>電話番号：</font>
                            <input type="text" name="phonenumber" value="{{ old('phonenumber') }}"
                                placeholder="0901234567">
                        </label>
                        @error('phonenumber')
                        <font>
                            <div class="error">{{ $message }}</div>
                        </font>
                        @enderror
                    </div>
                    <div class="form-group"> <label>
                            <!-- 予約時間と予約日を入力した時点で、ajax機能で
                    予約した日時から2時間後までにレストランに何人いるかチェック。
                    既に予約されている人数と予約する人の人数が、レストランの席数より超えていなければOK-->
                            <font>予約日：</font>

                            <input type="text" id="formday2" disabled="disabled">
                            <input type="hidden" name="day" id="formday3">
                        </label>
                        @error('day')
                        <font>
                            <div class="error">{{ $message }}</div>
                        </font>
                        @enderror
                    </div>
                    <div class="form-group"> <label>

                            <font>来店時間：</font>
                            <div class="reserve_select">
                                <select name="time" id="time-form">
                                    <optgroup label="17時">
                                        <option value="" name="minitues" selected>未選択</option>
                                        <option value="17:00:00" name="minitues">17時00分</option>
                                        <option value="17:15:00" name="minitues">17時15分</option>
                                        <option value="17:30:00" name="minitues">17時30分</option>
                                        <option value="17:45:00" name="minitues">17時45分</option>
                                    </optgroup>
                                    <optgroup label="18時" name="hour">
                                        <option value="18:00:00" name="minitues">18時00分</option>
                                        <option value="18:15:00" name="minitues">18時15分</option>
                                        <option value="18:30:00" name="minitues">18時30分</option>
                                        <option value="18:45:00" name="minitues">18時45分</option>
                                    </optgroup>
                                    <optgroup label="19時" name="hour">
                                        <option value="19:00:00" name="minitues">19時00分</option>
                                        <option value="19:15:00" name="minitues">19時15分</option>
                                        <option value="19:30:00" name="minitues">19時30分</option>
                                        <option value="19:45:00" name="minitues">19時45分</option>
                                    </optgroup>
                                    <optgroup label="20時" name="hour">
                                        <option value="20:00:00" name="minitues">20時00分</option>
                                        <option value="20:15:00" name="minitues">20時15分</option>
                                        <option value="20:30:00" name="minitues">20時30分</option>
                                        <option value="20:45:00" name="minitues">20時45分</option>
                                    </optgroup>
                                </select>
                            </div>
                        </label>
                        @error('time')
                        <font>
                            <div class="error">{{ $message }}</div>
                        </font>
                        @enderror
                    </div>
                    <!--Ajaxで予約日の人数チェックした回答を記載する -->
                    <div id="res-text2"></div>
                    <div class="form-group"> <label>
                            <font>コース：</font>
                            <div class="reserve_select">
                                <select name="course">
                                    <option value="選択なし">選択なし</option>
                                    <option value="コースA">コースA</option>
                                    <option value="コースB">コースB</option>
                                    <option value="コースC">コースC</option>
                                    <option value="コースD">コースD</option>
                                </select>
                            </div>
                        </label>
                    </div>
                    <div class="reserve-form-button">
                        <input type="submit" name="" id="target" value="予約確認する">
                    </div>
                </div>
            </form>

        </div>
    </section>

    </div>

    <script type="text/javascript">
        $(function() {

        $('.datepicker').datepicker(
        {
        onSelect: function(dateText, inst) {
        //今日の日付データを変数hidukeに格納
        var hiduke=new Date();

        //年・月・日・曜日を取得する
        var year =hiduke.getFullYear();
        var month = hiduke.getMonth()+1;
        var day = hiduke.getDate();

        //datetext の値を別の関数に入れて、日付が今日より過去か判定する
        //過去ならエラー文字を返す。
        if(month < 10 && day < 10){ var today=year+'/0'+month+'/0'+day; }else if(month < 10){ var today=year+'/0'+month+'/'+day;
    }else if(day< 10){ var today=year+'/'+month+'/0'+day; } if(today> dateText){
            alert('選択した日付は過去の日付です。日付を再選択してください。');
            target = document.getElementById('target');
            target.classList.add('click_disable');
            }else{
            $('#formday').val(dateText);
            $('#formday2').val(dateText);
            $('#formday3').val(dateText);
            target = document.getElementById('target');
            target.classList.add('click_able');
            }

            }
            });


            });



    </script>

</x-layout>
