function mCheck1() {//チェックボックス
    let che1 = document.challenge2.mclg1;
    let target = document.getElementById("mtarget1");
    if (che1.checked) {
        $('#mtarget1').css('color', '#b8b8b8');
        target.disabled = true;
    } else {
        $('#mtarget1').css('color', 'black');
        target.disabled = false;
    }
}

function mCheck2() {
    let che2 = document.challenge2.mclg2;
    let target = document.getElementById("mtarget2");
    if (che2.checked) {
        $('#mtarget2').css('color', '#b8b8b8');
        target.disabled = true;
    } else {
        $('#mtarget2').css('color', 'black');
        target.disabled = false;
    }
}

function mCheck3() {
    let che3 = document.challenge2.mclg3;
    let target = document.getElementById("mtarget3");
    if (che3.checked) {
        $('#mtarget3').css('color', '#b8b8b8');
        target.disabled = true;
    } else {
        $('#mtarget3').css('color', 'black');
        target.disabled = false;
    }
}

function mCheck4() {
    let che4 = document.challenge2.mclg4;
    let target = document.getElementById("mtarget4");
    if (che4.checked) {
        $('#mtarget4').css('color', '#b8b8b8');
        target.disabled = true;
    } else {
        $('#mtarget4').css('color', 'black');
        target.disabled = false;
    }
}

function mCheck5() {
    let che5 = document.challenge2.mclg5;
    let target = document.getElementById("mtarget5");
    if (che5.checked) {
        $('#mtarget5').css('color', '#b8b8b8');
        target.disabled = true;
    } else {
        $('#mtarget5').css('color', 'black');
        target.disabled = false;
    }
}

function mCheckText1(value) {//テキスト
    let checkTxt1 = value;
}

function mCheckText2(value) {
    let checkTxt2 = value;
}

function mCheckText3(value) {
    let checkTxt3 = value;
}

function mCheckText4(value) {
    let checkTxt4 = value;
}

function mCheckText5(value) {
    let checkTxt5 = value;
}

function mReset1() {
    document.challenge2.mtxt1.value = "";
    let check = document.challenge2.mclg1;
    let target = document.getElementById("mtarget1");
    check.checked = false;
    $('#mtarget1').css('color', 'black');
        target.disabled = false;
}

function mReset2() {
    document.challenge2.mtxt2.value = "";
    let check = document.challenge2.mclg2;
    let target = document.getElementById("mtarget2");
    check.checked = false;
    $('#mtarget2').css('color', 'black');
        target.disabled = false;
}

function mReset3() {
    document.challenge2.mtxt3.value = "";
    let check = document.challenge2.mclg3;
    let target = document.getElementById("mtarget3");
    check.checked = false;
    $('#mtarget3').css('color', 'black');
        target.disabled = false;
}


function mReset4() {
    document.challenge2.mtxt4.value = "";
    let check = document.challenge2.mclg4;
    let target = document.getElementById("mtarget4");
    check.checked = false;
    $('#mtarget4').css('color', 'black');
        target.disabled = false;
}

function mReset5() {
    document.challenge2.mtxt5.value = "";
    let check = document.challenge2.mclg5;
    let target = document.getElementById("mtarget5");
    check.checked = false;
    $('#mtarget5').css('color', 'black');
        target.disabled = false;
}