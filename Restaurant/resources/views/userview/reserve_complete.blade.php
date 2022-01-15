<x-layout>
    <script>
        $(function(){ // 遅延処理

            $('#checkday').click(

            function() { // 遅延処理
            var day = document.getElementById( "formday" ).value;
            var time = document.getElementById( "time" ).value;
            var people = document.getElementById( "people" ).value;
    if(day == ""){
    alert('日付が未選択です。');
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
    document.getElementById("res-text").innerHTML=res;
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
                <p>予約完了画面</p>
            </div>
            <div align="center" class="reserve-complete">
                <h2>予約が完了しました。<br>後ほどお電話で予約確認をさせて頂きます。</h2>
                <p><a href="{{ route('manage.index') }}">ホーム画面に戻る</a></p>
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
            alert('選択した日付は過去の日付です。');
            }else{
            $('#formday').val(dateText);
            }

            }
            });


            });



    </script>

</x-layout>
