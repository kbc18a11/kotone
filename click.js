var cnt = 0;//記録ボタンが押された回数
var cnt2 = 1;
var cnt3 = 0;
var cnt4 = 0;
var flg = 0;//項目名の判定
var judge = 0;//支出・収益の判定
var item = "";//項目名を格納
var check = 0;//アイコンの画像がクリックされたときの判定
var itemMemory = [];//項目名を記録する
var moneyMemory = [];//金額を記録する
var judgeMemory = [];//支出か収益か
var memory = 0;
var spending = 0;//支出額合計
var Revenue = 0;//収入額合計
var select = "";
var name = "";
var sentakuName = "";
var sentakuName2 = "";
var hantei = "";
var itemCount = "";
var element;
var element2;
var itemID = "";
var itemID2 = 0;
var money = "";
var sum = 0;
var newSpending = 0;
var newRevenue = 0;
var newSum = 0;
$("#food2").click(function () {    //食費
    flg = 1;
    judge = 1;
});

$("#daily2").click(function () {   //日用品費
    flg = 2;
    judge = 1;
});

$("#medical2").click(function () {  //医療費
    flg = 3;
    judge = 1;
});

$("#education2").click(function () { //教育費
    flg = 4;
    judge = 1;
});

$("#transportation2").click(function () { //交通費
    flg = 5;
    judge = 1;
});

$("#entertainment2").click(function () { //交際費
    flg = 6;
    judge = 1;
});

$("#beauty2").click(function () { //美容費
    flg = 7;
    judge = 1;
});

$("#leisure2").click(function () { //娯楽費
    flg = 8;
    judge = 1;
});

$("#residence2").click(function () { //住居費
    flg = 9;
    judge = 1;
});

$("#electrical2").click(function () { //電気代
    flg = 10;
    judge = 1;
});

$("#water2").click(function () { //水道代
    flg = 11;
    judge = 1;
});

$("#gas2").click(function () { //ガス代
    flg = 12;
    judge = 1;
});

$("#communication2").click(function () { //通信費
    flg = 13;
    judge = 1;
});

$("#special2").click(function () { //特別費
    flg = 14;
    judge = 1;
});

$("#salary2").click(function () { //給料
    flg = 15;
    judge = 2;
});

$("#pocketMoney2").click(function () { //おこづかい
    flg = 16;
    judge = 2;
});

$("#bonus2").click(function () { //賞与
    flg = 17;
    judge = 2;
});

$("#side2").click(function () { //副業
    flg = 18;
    judge = 2;
});

$("#investment2").click(function () { //投資
    flg = 19;
    judge = 2;
});

$("#extraordinary2").click(function () { //臨時収入
    flg = 20;
    judge = 2;
});

$(".action").click(function () {    //アイコンの画像がクリックされたとき

    if (check != 0) {
        $('.icon').css('border-color', 'black');
    }

    if (flg == 1) {
        $('#food').css('border-color', 'red');
    } else if (flg == 2) {
        $('#daily').css('border-color', 'red');
    } else if (flg == 3) {
        $('#medical').css('border-color', 'red');
    } else if (flg == 4) {
        $('#education').css('border-color', 'red');
    } else if (flg == 5) {
        $('#transportation').css('border-color', 'red');
    } else if (flg == 6) {
        $('#entertainment').css('border-color', 'red');
    } else if (flg == 7) {
        $('#beauty').css('border-color', 'red');
    } else if (flg == 8) {
        $('#leisure').css('border-color', 'red');
    } else if (flg == 9) {
        $('#residence').css('border-color', 'red');
    } else if (flg == 10) {
        $('#electrical').css('border-color', 'red');
    } else if (flg == 11) {
        $('#water').css('border-color', 'red');
    } else if (flg == 12) {
        $('#gas').css('border-color', 'red');
    } else if (flg == 13) {
        $('#communication').css('border-color', 'red');
    } else if (flg == 14) {
        $('#special').css('border-color', 'red');
    } else if (flg == 15) {
        $('#salary').css('border-color', 'red');
    } else if (flg == 16) {
        $('#pocketMoney').css('border-color', 'red');
    } else if (flg == 17) {
        $('#bonus').css('border-color', 'red');
    } else if (flg == 18) {
        $('#side').css('border-color', 'red');
    } else if (flg == 19) {
        $('#investment').css('border-color', 'red');
    } else if (flg == 20) {
        $('#extraordinary').css('border-color', 'red');
    }
    check += 1;
});

$('body').on('click', '.box3', function () {    //確定ボタンがクリックされたとき
    if (flg == 1) {
        item = "食費"
    } else if (flg == 2) {
        item = "日用品費"
    } else if (flg == 3) {
        item = "医療費"
    } else if (flg == 4) {
        item = "教育費"
    } else if (flg == 5) {
        item = "交通費"
    } else if (flg == 6) {
        item = "交際費"
    } else if (flg == 7) {
        item = "美容費"
    } else if (flg == 8) {
        item = "娯楽費"
    } else if (flg == 9) {
        item = "住居費"
    } else if (flg == 10) {
        item = "電気代"
    } else if (flg == 11) {
        item = "水道代"
    } else if (flg == 12) {
        item = "ガス代"
    } else if (flg == 13) {
        item = "通信費"
    } else if (flg == 14) {
        item = "特別費"
    } else if (flg == 15) {
        item = "給料"
    } else if (flg == 16) {
        item = "おこづかい"
    } else if (flg == 17) {
        item = "賞与"
    } else if (flg == 18) {
        item = "副業"
    } else if (flg == 19) {
        item = "投資"
    } else if (flg == 20) {
        item = "臨時収入"
    }
    money = document.getElementById("money").value;

    if (item.length == 0) {

    } else if (money.length == 0) {

    } else if (Number(money) <= 0) {

    } else if (choice.length == 0) {

    } else if (money.slice(0, 1) == 0) {

    } else {
        cnt += 1;
        cnt4 += 1;
        cnt5 += 1;//次の番号
        itemID = "item" + cnt5;
        $.ajax({
            type: 'POST',      /* typeパラメーター：POSTかGETか */
            url: './kakeibo.php',  /* urlパラメーター：飛ばす先のファイル名（今回は自分に戻ってくる） */
            data: {           /* dataパラメーター：データをphpに渡す data:{ foo:'引数', bar:'引数' }　でPHP側は $_POST['foo'] で'引数'の値を受け取る */
                'cnt5': cnt5     /* key:valueの関係、つまりidのというkeyとそれに入れる値valueはmyNumとなる */
            }
        }).done(function () {   /* ajaxの通信に成功した場合の処理 */
            console.log('成功');
        }).fail(function (XMLHttpRequest, textStatus, errorThrown) {  /* ajaxの通信に失敗した場合エラー表示 */
            console.log(XMLHttpRequest.status);
            console.log(textStatus);
            console.log(errorThrown);
        });
        
        if (cnt == 1) {
            $("#rightBox").append('<table border="1" id="item"><tr id="breakdown"><th>項目</th><th>金額</th><th>削除</th></tr></table>');
            //$("#rightBox").append('<table border="1" id="item"><tr id="breakdown"><th>項目</th><th>金額</th><th>編集</th><th>記録</th><th>削除</th></tr></table>');
            $("#item").append('<tr id="' + itemID + '"><td class="mitame" id="item' + itemID + '">' + item + '</td><td class="mitame2" id="money' + itemID + '">' + money + '円</td><td class="mitame3"><button class="fix" id="delete' + itemID + '"></button><img src="削除.png"></td></tr>');
            //$("#item").append('<tr id="' + itemID + '"><td class="mitame" id="item' + itemID + '">' + item + '</td><td class="mitame2" id="money' + itemID + '">' + money + '円</td><td class="mitame3"><button class="fix" id="edit' + itemID + '"></button><img src="編集.png"></td><td class="mitame3"><button class="fix" id="report' + itemID + '"></button><img src="記録.png"></td><td class="mitame3"><button class="fix" id="delete' + itemID + '"></button><img src="削除.png"></td></tr>');    
            if (judge == 1) {
                newSpending += parseInt(money);
                spending += parseInt(money);
            } else {
                newRevenue += parseInt(money);
                Revenue += parseInt(money);
            }
            sum = Revenue - spending;
            //$("#" + itemID).after('<tr id="spending"><td class="mitame" id="item' + itemID + '" colspan="3">' + "支出" + '</td><td class="mitame2" id="spendingMoney" colspan="2">' + spending + '円</td></tr>');
            //$("#spending").after('<tr id="Revenue"><td class="mitame" id="item' + itemID + '" colspan="3">' + "収入" + '</td><td class="mitame2" id="RevenueMoney" colspan="2">' + Revenue + '円</td></tr>');
            //$("#Revenue").after('<tr id="sumItem"><td class="mitame" id="item' + itemID + '" colspan="3">' + "合計" + '</td><td class="mitame2" id="sumMoney" colspan="2">' + sum + '円</td></tr>');
            //submitでphpに送る
            //$("#sumItem").after('<tr id="dbset"><td class="mitame4" id="item' + itemID + '" colspan="5"><input type="submit" name="kiroku1" id="kiroku" VALUE="家計簿表に記録する" style="width:100%;background-color:#e2b9f9;border:none;"></td></tr>');
            $('#breakdown').css('color', '#000000');
            $('#breakdown').css('background-color', '#FFFF99');
            $('#breakdown ' + 'th').css('padding', '10px');
            $('#' + itemID + ' .mitame3').css('padding', '3px 10px');
            $('#' + itemID + ' .mitame3').css('text-align', 'center');
            $('#' + itemID + ' .mitame').css('text-align', 'left');
            $('#' + itemID + ' .mitame2').css('text-align', 'right');

            $('#spending .mitame').css('text-align', 'left');
            $('#spending .mitame2').css('text-align', 'right');
            $('#Revenue .mitame').css('text-align', 'left');
            $('#Revenue .mitame2').css('text-align', 'right');
            $('#sumItem .mitame').css('text-align', 'left');
            $('#sumItem .mitame2').css('text-align', 'right');
            $('#dbset .mitame4').css('text-align', 'center');
            $('#spending').css('background-color', '#ffefd5');//支出
            $('#Revenue').css('background-color', '#e0ffff');//収入
            $('#sumItem').css('background-color', '#FFFF99');//合計
            $('#dbset').css('background-color', '#e2b9f9');//家計簿表に記録ボタン
            //編集処理（編集、記録、削除）
            $('#' + itemID + ' td').css('position', 'relative');
            $('#' + itemID + ' td').css('z-index', '2');
            $('#' + itemID + ' td button').css('position', 'absolute');
            $('#' + itemID + ' td button').css('top', '0');
            $('#' + itemID + ' td button').css('left', '0');
            $('#' + itemID + ' td button').css('width', '100%');
            $('#' + itemID + ' td button').css('height', '100%');
            $('#' + itemID + ' td button').css('text-indent', '-999px');
            $('#' + itemID + ' td button').css('z-index', '1');
            $('#' + itemID + ' td button').css('opacity', '0');
            //編集処理終わり
            if (judge == 1) {
                $('#' + itemID + ' td').css('background-color', '#ffefd5');//支出
            } else {
                $('#' + itemID + ' td').css('background-color', '#e0ffff');//収入
            }
            $('#' + itemID + ' td').css('color', '#000000');
            //セレクトボックス
            if (flg == 1) {
                name = "food" + itemID;
            } else if (flg == 2) {
                name = "daily" + itemID;
            } else if (flg == 3) {
                name = "medical" + itemID;
            } else if (flg == 4) {
                name = "education" + itemID;
            } else if (flg == 5) {
                name = "transportation" + itemID;
            } else if (flg == 6) {
                name = "entertainment" + itemID;
            } else if (flg == 7) {
                name = "beauty" + itemID;
            } else if (flg == 8) {
                name = "leisure" + itemID;
            } else if (flg == 9) {
                name = "residence" + itemID;
            } else if (flg == 10) {
                name = "electrical" + itemID;
            } else if (flg == 11) {
                name = "water" + itemID;
            } else if (flg == 12) {
                name = "gas" + itemID;
            } else if (flg == 13) {
                name = "communication" + itemID;
            } else if (flg == 14) {
                name = "special" + itemID;
            } else if (flg == 15) {
                name = "salary" + itemID;
            } else if (flg == 16) {
                name = "pocketMoney" + itemID;
            } else if (flg == 17) {
                name = "bonus" + itemID;
            } else if (flg == 18) {
                name = "side" + itemID;
            } else if (flg == 19) {
                name = "investment" + itemID;
            } else if (flg == 20) {
                name = "extraordinary" + itemID;
            }
            $("#sentaku").val(name);
        } else {//2回目
            cnt2 = cnt;
            itemID = "item" + (cnt5 - 1);
            itemID2 = "item" + cnt5;
            //alert(itemID);
            //alert(itemID2);
            $("#" + itemID).after('<tr id="' + itemID2 + '"><td class="mitame" id="item' + itemID2 + '">' + item + '</td><td class="mitame2" id="money' + itemID2 + '">' + money + '円</td><td class="mitame3"><button class="fix" id="delete' + itemID2 + '"></button><img src="削除.png"></td></tr>');
            //$("#" + itemID).after('<tr id="' + itemID2 + '"><td class="mitame" id="item' + itemID2 + '">' + item + '</td><td class="mitame2" id="money' + itemID2 + '">' + money + '円</td><td class="mitame3"><button class="fix" id="edit' + itemID2 + '"></button><img src="編集.png"></td><td class="mitame3"><button class="fix" id="report' + itemID2 + '"></button><img src="記録.png"></td><td class="mitame3"><button class="fix" id="delete' + itemID2 + '"></button><img src="削除.png"></td></tr>');
            $('#' + itemID2 + ' .mitame3').css('padding', '3px 10px');
            $('#' + itemID2 + ' .mitame3').css('text-align', 'center');
            $('#' + itemID2 + ' .mitame').css('text-align', 'left');
            $('#' + itemID2 + ' .mitame2').css('text-align', 'right');
            //編集処理（項目名、金額）
            $('#' + itemID2 + ' td').css('position', 'relative');
            $('#' + itemID2 + ' td').css('z-index', '2');
            $('#' + itemID2 + ' td button').css('position', 'absolute');
            $('#' + itemID2 + ' td button').css('top', '0');
            $('#' + itemID2 + ' td button').css('left', '0');
            $('#' + itemID2 + ' td button').css('width', '100%');
            $('#' + itemID2 + ' td button').css('height', '100%');
            $('#' + itemID2 + ' td button').css('text-indent', '-999px');
            $('#' + itemID2 + ' td button').css('z-index', '1');
            $('#' + itemID2 + ' td button').css('opacity', '0');
            //編集処理終わり
            if (judge == 1) {
                $('#' + itemID2 + ' td').css('background-color', '#ffefd5');//支出
                newSpending = spending;
                newSpending += parseInt(money);
                $("#spending #spendingMoney:contains(" + spending + "円)").html(newSpending + "円");//支出
                spending = newSpending;
                newSum = Revenue - newSpending;
            } else {
                $('#' + itemID2 + ' td').css('background-color', '#e0ffff');//収入
                newRevenue = Revenue;
                newRevenue += parseInt(money);
                $("#Revenue #RevenueMoney:contains(" + Revenue + "円)").html(newRevenue + "円");//収入
                Revenue = newRevenue;
                newSum = newRevenue - spending;
            }
            $('#' + itemID2 + ' td').css('color', '#000000');
            if (newSum > 0) {
                $("#sumItem #sumMoney:contains(" + sum + "円)").html("+" + newSum + "円");//合計
            } else {
                $("#sumItem #sumMoney:contains(" + sum + "円)").html(newSum + "円");//合計
            }
            sum = newSum;
            //セレクトボックス初期値
            if (flg == 1) {
                name = "food" + itemID2;
            } else if (flg == 2) {
                name = "daily" + itemID2;
            } else if (flg == 3) {
                name = "medical" + itemID2;
            } else if (flg == 4) {
                name = "education" + itemID2;
            } else if (flg == 5) {
                name = "transportation" + itemID2;
            } else if (flg == 6) {
                name = "entertainment" + itemID2;
            } else if (flg == 7) {
                name = "beauty" + itemID2;
            } else if (flg == 8) {
                name = "leisure" + itemID2;
            } else if (flg == 9) {
                name = "residence" + itemID2;
            } else if (flg == 10) {
                name = "electrical" + itemID2;
            } else if (flg == 11) {
                name = "water" + itemID2;
            } else if (flg == 12) {
                name = "gas" + itemID2;
            } else if (flg == 13) {
                name = "communication" + itemID2;
            } else if (flg == 14) {
                name = "special" + itemID2;
            } else if (flg == 15) {
                name = "salary" + itemID2;
            } else if (flg == 16) {
                name = "pocketMoney" + itemID2;
            } else if (flg == 17) {
                name = "bonus" + itemID2;
            } else if (flg == 18) {
                name = "side" + itemID2;
            } else if (flg == 19) {
                name = "investment" + itemID2;
            } else if (flg == 20) {
                name = "extraordinary" + itemID2;
            }
            sentakuName2 = "#sentaku" + itemID2;
            $(sentakuName2).val(name);
        }
        itemMemory[memory] = item;
        moneyMemory[memory] = money;
        judgeMemory[memory] = judge;
        memory += 1;

        $.ajax({
            type: 'POST',      /* typeパラメーター：POSTかGETか */
            url: './kakeibo.php',  /* urlパラメーター：飛ばす先のファイル名（今回は自分に戻ってくる） */
            data: {           /* dataパラメーター：データをphpに渡す data:{ foo:'引数', bar:'引数' }　でPHP側は $_POST['foo'] で'引数'の値を受け取る */
                'item': item,     /* key:valueの関係、つまりidのというkeyとそれに入れる値valueはmyNumとなる */
                'money': money,
                'judge': judge,//1.2
                'choice': choice,
                'flg':'0'
            }
        }).done(function () {   /* ajaxの通信に成功した場合の処理 */
            console.log('成功');
        }).fail(function (XMLHttpRequest, textStatus, errorThrown) {  /* ajaxの通信に失敗した場合エラー表示 */
            console.log(XMLHttpRequest.status);
            console.log(textStatus);
            console.log(errorThrown);
        });

    }
});

var iconName = "";//icon名
var sentaku = "";//支出か収入か
var namae = "";//画像名
var tabid = "";//id
var kaisuu = 0;//回数

$('body').on('click', '.fix', function () {////編集、記録、削除ボタンが押されたとき
    var id = $(this).attr("id");
    hantei = id.slice(0, 1);//editか deleteか reportか判定
    if (hantei == "e") { //編集ボタンを押したとき、disableの項目の部分解除
        itemNo = id.slice(8);
        element2 = $("#moneyitem" + itemNo).text();//金額
        element2 = element2.slice(0, -1);//円を消す
        document.getElementById("itemitem" + itemNo).innerHTML = "<select name='sentakuitem" + itemNo + "' id='sentakuitem" + itemNo + "'><option value='food" + itemID + "'>食費</option><option value='daily" + itemID + "'>日用品費</option><option value='medical" + itemID + "'>医療費</option><option value='education" + itemID + "'>教育費</option><option value='transportation" + itemID + "'>交通費</option><option value='entertainment" + itemID + "'>交際費</option><option value='beauty" + itemID + "'>美容費</option><option value='leisure" + itemID + "'>娯楽費</option><option value='residence" + itemID + "'>住居費</option><option value='electrical" + itemID + "'>電気代</option><option value='water" + itemID + "'>水道代</option><option value='gas" + itemID + "'>ガス代</option><option value='communication" + itemID + "'>通信費</option><option value='special" + itemID + "'>特別費</option><option value='salary" + itemID + "'>給料</option><option value='pocketMoney" + itemID + "'>おこづかい</option><option value='bonus" + itemID + "'>賞与</option><option value='side" + itemID + "'>副業</option><option value='investment" + itemID + "'>投資</option><option value='extraordinary" + itemID + "'>臨時収入</option></select>";
        document.getElementById("moneyitem" + itemNo).innerHTML = "<input type='text' style='text-align:right' name='money2" + itemNo + "' id='money2" + itemNo + "' value=" + element2 + ">円";
        $("#sentakuitem" + itemNo).css('width', '100%');
        $("#sentakuitem" + itemNo).css('height', '50px');
        $("#money2" + itemNo).css('width', '90%');
        $("#money2" + itemNo).css('height', '50px');
        $("#money2" + itemNo).css('box-sizing', 'border-box');
    } else if (hantei == "d") {//削除ボタンを押したとき１行削除
        itemNo = id.slice(10);
        cnt3 += 1;
        element = $("#moneyitem" + itemNo).text();//金額
        element = element.slice(0, -1);//円を消す
        if (judgeMemory[itemNo - 1] == 1) {//削除した項目が支出の場合
            newSpending -= element;
            newSum = Revenue - newSpending;
            $("#spending #spendingMoney:contains(" + spending + "円)").html(newSpending + "円");//支出
            if (newSum > 0) {
                $("#sumItem #sumMoney:contains(" + sum + "円)").html("+" + newSum + "円");//合計
            } else {
                $("#sumItem #sumMoney:contains(" + sum + "円)").html(newSum + "円");//合計
            }
            spending = newSpending;
            sum = newSum;
            //alert(judgeMemory[itemNo - 1]);
            //alert(choice);
            //alert(itemNo);
            $.ajax({
                type: 'POST',      /* typeパラメーター：POSTかGETか */
                url: './kakeibo.php',  /* urlパラメーター：飛ばす先のファイル名（今回は自分に戻ってくる） */
                data: {           /* dataパラメーター：データをphpに渡す data:{ foo:'引数', bar:'引数' }　でPHP側は $_POST['foo'] で'引数'の値を受け取る */
                    'no': itemNo,
                    'flg':'1'
                }
            }).done(function () {   /* ajaxの通信に成功した場合の処理 */
                console.log('成功');
            }).fail(function (XMLHttpRequest, textStatus, errorThrown) {  /* ajaxの通信に失敗した場合エラー表示 */
                console.log(XMLHttpRequest.status);
                console.log(textStatus);
                console.log(errorThrown);
            });

        } else {//削除した項目が収入の場合
            newRevenue -= element;
            newSum = newRevenue - spending;
            $("#Revenue #RevenueMoney:contains(" + Revenue + "円)").html(newRevenue + "円");//収入
            if (newSum > 0) {
                $("#sumItem #sumMoney:contains(" + sum + "円)").html("+" + newSum + "円");//合計
            } else {
                $("#sumItem #sumMoney:contains(" + sum + "円)").html(newSum + "円");//合計
            }
            Revenue = newRevenue;
            sum = newSum;
            //alert(judgeMemory[itemNo - 1]);
            //alert(choice);
            //alert(itemNo);
            $.ajax({
                type: 'POST',      /* typeパラメーター：POSTかGETか */
                url: './kakeibo.php',  /* urlパラメーター：飛ばす先のファイル名（今回は自分に戻ってくる） */
                data: {           /* dataパラメーター：データをphpに渡す data:{ foo:'引数', bar:'引数' }　でPHP側は $_POST['foo'] で'引数'の値を受け取る */
                    'no': itemNo,
                    'flg':'1'
                }
            }).done(function () {   /* ajaxの通信に成功した場合の処理 */
                console.log('成功');
            }).fail(function (XMLHttpRequest, textStatus, errorThrown) {  /* ajaxの通信に失敗した場合エラー表示 */
                console.log(XMLHttpRequest.status);
                console.log(textStatus);
                console.log(errorThrown);
            });

        }
        itemMemory[itemNo - 1] = "";
        moneyMemory[itemNo - 1] = "";
        judgeMemory[itemNo - 1] = "";
        $("#item" + itemNo).remove();
        if (itemNo == cnt5) {
            cnt -= 1;
            cnt5 -= 1;
            cnt2 -= 1;
        }

        if (cnt3 == cnt4) {
            window.location.reload();
        }
        
    } else if (hantei == "r") {//記録ボタンを押したとき
        itemNo = id.slice(10);
        element2 = document.getElementsByName("money2" + itemNo)[0].value;
        var txt = $('[name=sentakuitem' + itemNo + '] option:selected').text();//食費、日用品費・・・

        if (element2.length == 0) {

        } else if (txt.length == 0) {

        } else if (Number(element2) <= 0) {

        } else if (element2.slice(0, 1) == 0) {

        } else {
            itemCount = itemNo - 1;
            //追加したものが支出か収入か
            if (txt == "食費" || txt == "日用品費" || txt == "医療費" || txt == "教育費" || txt == "交通費" || txt == "交際費" || txt == "美容費" || txt == "娯楽費" || txt == "住居費" || txt == "電気代" || txt == "水道代" || txt == "ガス代" || txt == "通信費" || txt == "特別費") {
                if (judgeMemory[itemCount] == 2) {
                    newRevenue -= parseInt(moneyMemory[itemCount]);
                    newSpending += parseInt(element2);//支出に足す
                    judgeMemory[itemCount] = 1;
                    $('#item' + itemNo + ' td').css('background-color', '#ffefd5');//支出
                    newSum = newRevenue - newSpending;
                } else {
                    newSpending -= parseInt(moneyMemory[itemCount]);
                    newSpending += parseInt(element2);
                    newSum = Revenue - newSpending;
                }
            } else {
                if (judgeMemory[itemCount] == 1) {//支出を収入に変えた
                    newSpending -= parseInt(moneyMemory[itemCount]);//支出から引いて
                    newRevenue += parseInt(element2);//収益に足す
                    judgeMemory[itemCount] = 2;
                    $('#item' + itemNo + ' td').css('background-color', '#e0ffff');//収益
                    newSum = newRevenue - newSpending;
                } else {
                    newRevenue -= parseInt(moneyMemory[itemCount]);
                    newRevenue += parseInt(element2);
                    newSum = newRevenue - spending;
                }
            }
            $("#spending #spendingMoney:contains(" + spending + "円)").html(newSpending + "円");//支出
            $("#Revenue #RevenueMoney:contains(" + Revenue + "円)").html(newRevenue + "円");//収入
            if (newSum > 0) {
                $("#sumItem #sumMoney:contains(" + sum + "円)").html("+" + newSum + "円");//合計
            } else {
                $("#sumItem #sumMoney:contains(" + sum + "円)").html(newSum + "円");//合計
            }
            spending = newSpending;
            Revenue = newRevenue;
            sum = newSum;
            moneyMemory[itemCount] = element2;
            itemMemory[itemCount] = txt;
            element2 += "円";
            document.getElementById("moneyitem" + itemNo).innerHTML = element2;
            document.getElementById("itemitem" + itemNo).innerHTML = txt;
            money = moneyMemory[itemCount];
            //element.disabled = true;
        }

        for (var i = 0; i < itemMemory.length; i++) {//中身チェック
            //alert(itemMemory[i]);
            //alert(moneyMemory[i]);
        }
    }
});

$("#resetButton").click(function () {//リセットボタンがクリックされたとき
    document.formReset.reset();
    item = "";
    money = "";
    flg = 0;
    judge = 0;
    $('.icon').css('border-color', 'black');
});
