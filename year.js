function yCheck1() {//チェックボックス
    let che1 = document.challenge3.yclg1;
    let target = document.getElementById("ytarget1");
    if (che1.checked) {
        $('#ytarget1').css('color', '#b8b8b8');
        target.disabled = true;
    } else {
        $('#ytarget1').css('color', 'black');
        target.disabled = false;
    }
}

function yCheck2() {
    let che2 = document.challenge3.yclg2;
    let target = document.getElementById("ytarget2");
    if (che2.checked) {
        $('#ytarget2').css('color', '#b8b8b8');
        target.disabled = true;
    } else {
        $('#ytarget2').css('color', 'black');
        target.disabled = false;
    }
}

function yCheck3() {
    let che3 = document.challenge3.yclg3;
    let target = document.getElementById("ytarget3");
    if (che3.checked) {
        $('#ytarget3').css('color', '#b8b8b8');
        target.disabled = true;
    } else {
        $('#ytarget3').css('color', 'black');
        target.disabled = false;
    }
}

function yCheck4() {
    let che4 = document.challenge3.yclg4;
    let target = document.getElementById("ytarget4");
    if (che4.checked) {
        $('#ytarget4').css('color', '#b8b8b8');
        target.disabled = true;
    } else {
        $('#ytarget4').css('color', 'black');
        target.disabled = false;
    }
}

function yCheck5() {
    let che5 = document.challenge3.yclg5;
    let target = document.getElementById("ytarget5");
    if (che5.checked) {
        $('#ytarget5').css('color', '#b8b8b8');
        target.disabled = true;
    } else {
        $('#ytarget5').css('color', 'black');
        target.disabled = false;
    }
}

function yCheckText1(value) {//テキスト
    let checkTxt1 = value;
}

function yCheckText2(value) {
    let checkTxt2 = value;
}

function yCheckText3(value) {
    let checkTxt3 = value;
}

function yCheckText4(value) {
    let checkTxt4 = value;
}

function yCheckText5(value) {
    let checkTxt5 = value;
}

function yReset1() {
    document.challenge3.ytxt1.value = "";
    let check = document.challenge3.yclg1;
    let target = document.getElementById("ytarget1");
    check.checked = false;
    $('#ytarget1').css('color', 'black');
        target.disabled = false;
}

function yReset2() {
    document.challenge3.ytxt2.value = "";
    let check = document.challenge3.yclg2;
    let target = document.getElementById("ytarget2");
    check.checked = false;
    $('#ytarget2').css('color', 'black');
        target.disabled = false;
}

function yReset3() {
    document.challenge3.ytxt3.value = "";
    let check = document.challenge3.yclg3;
    let target = document.getElementById("ytarget3");
    check.checked = false;
    $('#ytarget3').css('color', 'black');
        target.disabled = false;
}


function yReset4() {
    document.challenge3.ytxt4.value = "";
    let check = document.challenge3.yclg4;
    let target = document.getElementById("ytarget4");
    check.checked = false;
    $('#ytarget4').css('color', 'black');
        target.disabled = false;
}

function yReset5() {
    document.challenge3.ytxt5.value = "";
    let check = document.challenge3.yclg5;
    let target = document.getElementById("ytarget5");
    check.checked = false;
    $('#ytarget5').css('color', 'black');
        target.disabled = false;
}