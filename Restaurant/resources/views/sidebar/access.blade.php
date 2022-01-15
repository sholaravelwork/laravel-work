<x-layout>


    <div style="width: 100%;">



        <section>

            <div class="heading_cooking">
                <p>
                    アクセス
                </p>
            </div>

            <div class="map">

                <div class="info-table">
                    <table cellspacing="15">
                        <tr>
                            <td class="td-important">住所</td>
                            <td class="td-explation">北海道札幌市中央区南３条西1丁目５番地 サンプルビル地下1F</td>
                        </tr>
                        <tr>
                            <td class="td-important">アクセス</td>
                            <td class="td-explation">地下鉄南北線すすきの駅徒歩３分
                            </td>

                        </tr>
                        <tr>
                            <td class="td-important">電話番号</td>
                            <td class="td-explation">011-567-7890
                            </td>

                        </tr>
                        <tr>
                            <td class="td-important">営業時間</td>
                            <td class="td-explation">昼の部：11:30～15:00 （料理L.O. 14:00 ドリンクL.O. 14:00）<br>
                                夜の部：18:00～翌0:00
                                （料理L.O. 23:00 ドリンクL.O. 23:00）</td>

                        </tr>
                        <tr>
                            <td class="td-important">総席数</td>
                            <td class="td-explation">25席</td>

                        </tr>
                    </table>
                    <p>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2915.2477957470255!2d141.3549253654784!3d43.057255679146216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f0b2983ba2b55bd%3A0x3d45da6d09bde572!2z44CSMDYwLTAwNjMg5YyX5rW36YGT5pyt5bmM5biC5Lit5aSu5Yy65Y2X77yT5p2h6KW_77yR5LiB55uu!5e0!3m2!1sja!2sjp!4v1641693256881!5m2!1sja!2sjp"
                            width="600" height="450" style="border:0;" class="access-img" allowfullscreen=""
                            loading="lazy"></iframe>
                    </p>
                </div>


        </section>

    </div>
</x-layout>

<script>
    const open = document.getElementById('open');
const overlay = document.querySelector('.overlay');

open.addEventListener('click', () => {
    overlay.classList.add('show');
    open.classList.add('hide');
});

const close = document.getElementById('close');
close.addEventListener('click', () => {
    overlay.classList.remove('show');
    open.classList.remove('hide');
});
</script>
