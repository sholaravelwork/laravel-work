'use strict';

{
   const next = document.getElementById('next');
   const prev = document.getElementById('prev');
   const ul = document.querySelector('ul');
   const slides = ul.children;
   const dots = [];
   const explanations = ['道産食材を使用した本格イタリアン！落ち着いた店内は記念日・デート利用にオススメ',
   '完全個室や半個室も完備♪記念日に十勝牛サーロイン5000円コース','種類豊富なワインの数々。グラスワイン2杯＋おつまみ付1500円'];
   let currentIndex = 0;
   const div1 = document.getElementById("div1");

   // ボタンを表示させる処理
   function updateButtons() {
       prev.classList.remove('hidden');
       next.classList.remove('hidden');

       if(currentIndex === 0){
           prev.classList.add('hidden');
       }
       if(currentIndex === slides.length - 1){
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
      button.addEventListener('click', () =>{
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
   function updateDots(){
    dots.forEach( dot => {
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

   window.addEventListener('resize', () => {
    moveSlides();
  });


  // 日付カレンダー表示処理
  const today = new Date();
  let year = today.getFullYear();
  let month = today.getMonth();

  function getCalendarHead() {
    const dates = [];
    const d = new Date(year, month, 0).getDate();
    const n = new Date(year, month, 1).getDay();

    for (let i = 0; i < n; i++) {
      // 30
      // 29, 30
      // 28, 29, 30
      dates.unshift({
        date: d - i,
        isToday: false,
        isDisabled: true,
      });
    }

    return dates;
  }

  function getCalendarBody() {
    const dates = []; // date: 日付, day: 曜日
    const lastDate = new Date(year, month + 1, 0).getDate();

    for (let i = 1; i <= lastDate; i++) {
      dates.push({
        date: i,
        isToday: false,
        isDisabled: false,
      });
    }

    if (year === today.getFullYear() && month === today.getMonth()) {
      dates[today.getDate() - 1].isToday = true;
    }

    return dates;
  }

  function getCalendarTail() {
    const dates = [];
    const lastDay = new Date(year, month + 1, 0).getDay();

    for (let i = 1; i < 7 - lastDay; i++) {
      dates.push({
        date: i,
        isToday: false,
        isDisabled: true,
      });
    }

    return dates;
  }

  function clearCalendar() {
    const tbody = document.querySelector('tbody');

    while (tbody.firstChild) {
      tbody.removeChild(tbody.firstChild);
    }
  }

  function renderTitle() {
    const title = `${year}/${String(month + 1).padStart(2, '0')}`;
    document.getElementById('title').textContent = title;
  }

  function renderWeeks() {
    const dates = [
      ...getCalendarHead(),
      ...getCalendarBody(),
      ...getCalendarTail(),
    ];
    const weeks = [];
    const weeksCount = dates.length / 7;

    for (let i = 0; i < weeksCount; i++) {
      weeks.push(dates.splice(0, 7));
    }

    weeks.forEach(week => {
      const tr = document.createElement('tr');
      week.forEach(date => {
        const td = document.createElement('td');

        td.textContent = date.date;
        if (date.isToday) {
          td.classList.add('today');
        }
        if (date.isDisabled) {
          td.classList.add('disabled');
        }

        tr.appendChild(td);
      });
      document.querySelector('tbody').appendChild(tr);
    });
  }

  function createCalendar() {
    clearCalendar();
    renderTitle();
    renderWeeks();
  }

  document.getElementById('month_prev').addEventListener('click', () => {
    month--;
    if (month < 0) {
      year--;
      month = 11;
    }

    createCalendar();
  });

  document.getElementById('month_next').addEventListener('click', () => {
    month++;
    if (month > 11) {
      year++;
      month = 0;
    }

    createCalendar();
  });

  document.getElementById('today').addEventListener('click', () => {
    year = today.getFullYear();
    month = today.getMonth();

    createCalendar();
  });

  createCalendar();



      document.getElementById('delete_post').addEventListener('submit', e => {
          e.preventDefault();

          if (!confirm('Sure to delete?')) {
              return;
          }

          e.target.submit();
      });

}
