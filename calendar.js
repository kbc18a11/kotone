const weeks2 = ['日', '月', '火', '水', '木', '金', '土'];
const date2 = new Date();
let year2 = date2.getFullYear();
let year3 = date2.getFullYear();
let month2 = date2.getMonth() + 1;
let month3 = date2.getMonth() + 1;
let day2 = date2.getDate();
const config = {
    show: 1,
}

function showCalendar(year2, month2) {//表示するカレンダーの数を調整
    for (i = 0; i < config.show; i++) {
        const calendarHtml = createCalendar(year2, month2);
        const sec = document.createElement('section');
        sec.innerHTML = calendarHtml;
        document.querySelector('#calendar').appendChild(sec);

        month2++;
        if (month2 > 12) {
            year2++;
            month2 = 1;
        }
    }
}

function createCalendar(year2, month2) {
    const startDate = new Date(year2, month2 - 1, 1); // 月の最初の日を取得
    const endDate = new Date(year2, month2, 0); // 月の最後の日を取得
    const endDayCount = endDate.getDate(); // 月の末日
    const lastMonthEndDate = new Date(year2, month2 - 1, 0); // 前月の最後の日の情報
    const lastMonthendDayCount = lastMonthEndDate.getDate(); // 前月の末日
    const startDay = startDate.getDay(); // 月の最初の日の曜日を取得
    let dayCount = 1; // 日にちのカウント
    let calendarHtml = ''; // HTMLを組み立てる変数

    calendarHtml += '<h1>' + year2 + '年/' + month2 + '月</h1>';
    calendarHtml += '<table>';

    // 曜日の行を作成
    for (let i = 0; i < weeks2.length; i++) {
        calendarHtml += '<td>' + weeks2[i] + '</td>';
    }

    for (let w = 0; w < 6; w++) {
        calendarHtml += '<tr>';

        for (let d = 0; d < 7; d++) {
            if (w == 0 && d < startDay) {
                // 1行目で1日の曜日の前
                let num = lastMonthendDayCount - startDay + d + 1;
                calendarHtml += '<td class="is-disabled">' + num + '</td>';
            } else if (dayCount > endDayCount) {
                // 末尾の日数を超えた
                let num = dayCount - endDayCount;
                calendarHtml += '<td class="is-disabled">' + num + '</td>';
                dayCount++;
            } else {
                if (year2 == year3 && month2 == month3 && dayCount == day2) {
                    calendarHtml += `<td bgcolor="#cc0000" class="calendar_td" data-date="${year2}/${month2}/${dayCount}"><font color="#FFFFFF">${dayCount}</font></td>`;
                    dayCount++;
                } else {
                    calendarHtml += `<td class="calendar_td" data-date="${year2}/${month2}/${dayCount}">${dayCount}</td>`;
                    dayCount++;
                }
            }
        }
        calendarHtml += '</tr>';
    }
    calendarHtml += '</table>';

    return calendarHtml;
}

function moveCalendar(e) {
    document.querySelector('#calendar').innerHTML = '';

    if (e.target.id === 'prev') {
        month2--;

        if (month2 < 1) {
            year2--;
            month2 = 12;
        }
    }

    if (e.target.id === 'next') {
        month2++;

        if (month2 > 12) {
            year2++;
            month2 = 1;
        }
    }

    showCalendar(year2, month2);
}

document.querySelector('#prev').addEventListener('click', moveCalendar);
document.querySelector('#next').addEventListener('click', moveCalendar);

document.addEventListener("click", function (e) {
    if (e.target.classList.contains("calendar_td")) {
        alert('クリックした日付は' + e.target.dataset.date + 'です');
    }
})

showCalendar(year2, month2);