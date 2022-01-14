<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>予約情報編集画面</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url('css/admin/style.css')}}">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
    <script>
        $(function(){ // 遅延処理

         $('#button').click(

         function() { // 遅延処理
         var day = document.getElementById( "formday" ).value;
         var time = document.getElementById( "time" ).value;
         var people = document.getElementById( "people" ).value;

        $.ajax({
        type: 'GET',
        url: '../reserveck', // url: は読み込むURLを表す
        data: { "day" : day,
        "time" : time,
        "people" : people},

         }) //通信が成功したとき
         .then((res) => {
            console.log(res);
            document.getElementById("res-text").innerHTML=res;
         })
         //通信が失敗したとき
         .fail((error) => {
         console.log(error.statusText);
         });

         }
         );
         });
    </script>
</head>

<body>

    <div class="login">
        <h1>予約情報編集画面</h1>

        <p class="back"><a href="{{ route('manage.reserve') }}">[戻る]</a></p>
        <form action="{{route('reserve.destroy', $reservation)}}" id="delete_post">
            @method('DELETE')
            @csrf

            <button class="delete-btn">[削除する]</button>

        </form>

        <form action="{{ route('reserve.update', $reservation) }}" method="post">
            @method('PATCH')
            @csrf

            <div class="form-group"> <label>
                    氏名：
                    <input type="text" name="name" value="{{ old('name', $reservation->name) }}">
                </label>
                @error('name')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group"> <label>
                    カナ：
                    <input type="text" name="kana" value="{{ old('kana', $reservation->kana) }}">
                </label>
                @error('kana')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group"> <label>
                    予約人数：
                    <div class="reserve_people">
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
                    電話番号：
                    <input type="text" name="phonenumber" value="{{ old('nmpeople', $reservation->phonenumber) }}">
                </label>
                @error('phonenumber')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group"> <label>
                    コース：
                    <div class="reserve_people">
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
            <div class="form-group"> <label>
                    <!-- 予約時間と予約日を入力した時点で、ajax機能で
            予約した日時から2時間後までにレストランに何人いるかチェック。
            既に予約されている人数と予約する人の人数が、レストランの席数より超えていなければOK-->
                    予約日：
                    <input type="text" name="day" class="datepicker" autocomplete="off" readonly>

                </label>
                @error('day')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group"> <label>
                    来店時間：
                    <div class="reserve_people">
                        <select name="time" id="time">
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
                </label>
                <p><input type="button" id="button" value="予約チェック" /></p>
                <input type="hidden" id="formday">
                <div id="res-text"></div>

                <div class="form-button">
                    <input type="submit" id="target" value="編集を反映する">
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
            target = document.getElementById('target');
            target.classList.add('click_able');
            }

        }
        });


        });




    </script>
</body>

</html>
