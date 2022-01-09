'use strict';

{
    const next = document.getElementById('next');
    const prev = document.getElementById('prev');
    const ul = document.querySelector('ul');
    const slides = ul.children;
    const dots = [];
    const explanations = ['道産食材を使用した本格イタリアン！落ち着いた店内は記念日・デート利用にオススメ',
        '完全個室や半個室も完備♪記念日に十勝牛サーロイン5000円コース', '種類豊富なワインの数々。グラスワイン2杯＋おつまみ付1500円'];
    let currentIndex = 0;
    const div1 = document.getElementById("div1");

    // ボタンを表示させる処理
    function updateButtons() {
        prev.classList.remove('hidden');
        next.classList.remove('hidden');

        if (currentIndex === 0) {
            prev.classList.add('hidden');
        }
        if (currentIndex === slides.length - 1) {
            next.classList.add('hidden');
        }
    }

    // 文言を表示させる処理
    function updateText() {
        if (div1.hasChildNodes()) {
            div1.removeChild(div1.firstChild);
        }
        // 要素の追加
        if (!div1.hasChildNodes()) {
            const p1 = document.createElement("p");
            const text1 = document.createTextNode(explanations[currentIndex]);
            p1.appendChild(text1);
            div1.appendChild(p1);
        }
    }

    // 画像をスライドさせる処理
    function moveSlides() {
        const slideWidth = slides[0].getBoundingClientRect().width;
        ul.style.transform = `translateX(${-1 * slideWidth * currentIndex}px)`;
    }

    // 画像の数だけボタンを表示させる処理
    function setupDots() {
        for (let i = 0; i < slides.length; i++) {
            const button = document.createElement('button');
            button.addEventListener('click', () => {
                currentIndex = i;
                updateDots();    // currentクラスを追加・削除対応する
                updateButtons(); //ボタンを表示させる処理を呼び出す
                moveSlides();    //画像をスライドさせる処理を呼び出す
                updateText();    //文字を表示させる処理を呼び出す
            });
            dots.push(button);  //ボタン要素を配列に格納する
            document.querySelector('nav').appendChild(button);

        }

        dots[0].classList.add('current');
    }

    // currentクラスを追加・削除対応する
    function updateDots() {
        dots.forEach(dot => {
            dot.classList.remove('current');
        });
        dots[currentIndex].classList.add('current');
    }

    updateText();
    updateButtons();
    setupDots();

    // ボタンをクリックした時の動作
    next.addEventListener('click', () => {
        currentIndex++;
        updateText();
        updateButtons();
        moveSlides();
        updateDots();
    });

    prev.addEventListener('click', () => {
        currentIndex--;
        updateText();
        updateButtons();
        moveSlides();
        updateDots();
    });

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


}
