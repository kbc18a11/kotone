<?php
session_start();
?>
<!DOCTYPE html>
<html>
<script src="jquery-3.5.1.min.js"></script>

<head>
    <meta charset="utf-8">
    <title>kotone</title>
    <link rel="stylesheet" href="kakeibo.css">
</head>

<body>
    <header>
        <div class="menu">
            <div class="menu-title">メニュー</div>
            <div class="sub-menu">
                <ul>
                    <li><a href="http://localhost/topBbs.php">トップページ</a></li>
                    <li><a href="http://localhost/kakeiboBbs.php">家計簿入力</a></li>
                    <li><a href="http://localhost/list.php">家計簿表</a></li>
                    <li><a href="http://localhost/logout.php">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div id="parent">
        <div id="leftBox">
            <h1>
                【家計簿】
            </h1>
            <div class="box1">
                <form>
                    <lavel>
                        <input type="date" id="date" min="1900-01-01" max="2100-12-31"> <!-- 日付 -->
                        </label>
                </form>
                <br>
            </div>

            <div class="box2">
                <p id="tabcontrol">
                    <a href="#tabpage1">支出</a>
                    <a href="#tabpage2">収入</a>
                    <!--<a href="#tabpage3">追加</a>-->
                </p>
                <div id="tabbody">
                    <div id="tabpage1" class="tab1">
                        <div id="tabpage1">
                            <span class="icon" id="food">
                                <span>食費</span><br>
                                <img src="食費.png"> <!-- imgタグで作る-->
                                <button id="food2" class="action"></button>
                            </span>
                            <span class="icon" id="daily">
                                <span>日用品費</span><br>
                                <img src="日用品費.png">
                                <button id="daily2" class="action"></button>
                            </span>
                            <span class="icon" id="medical">
                                <span>医療費</span><br>
                                <img src="医療費.png">
                                <button id="medical2" class="action"></button>
                            </span>
                            <span class="icon" id="education">
                                <span>教育費</span><br>
                                <img src="教育費.png">
                                <button id="education2" class="action"></button>
                            </span>
                        </div>
                        <div id="tabpage1">
                            <span class="icon" id="transportation">
                                <span>交通費</span><br>
                                <img src="交通費.png">
                                <button id="transportation2" class="action"></button>
                            </span>
                            <span class="icon" id="entertainment">
                                <span>交際費</span><br>
                                <img src="交際費.png">
                                <button id="entertainment2" class="action"></button>
                            </span>
                            <span class="icon" id="beauty">
                                <span>美容費</span><br>
                                <img src="美容費.png">
                                <button id="beauty2" class="action"></button>
                            </span>
                            <span class="icon" id="leisure">
                                <span>娯楽費</span><br>
                                <img src="娯楽費.png">
                                <button id="leisure2" class="action"></button>
                            </span>
                        </div>
                        <div id="tabpage1">
                            <span class="icon" id="residence">
                                <span>住居費</span><br>
                                <img src="住居費.png">
                                <button id="residence2" class="action"></button>
                            </span>
                            <span class="icon" id="electrical">
                                <span>電気代</span><br>
                                <img src="電気代.png">
                                <button id="electrical2" class="action"></button>
                            </span>
                            <span class="icon" id="water">
                                <span>水道代</span><br>
                                <img src="水道代.png">
                                <button id="water2" class="action"></button>
                            </span>
                            <span class="icon" id="gas">
                                <span>ガス代</span><br>
                                <img src="ガス代.png">
                                <button id="gas2" class="action"></button>
                            </span>
                        </div>
                        <div id="tabpage1">
                            <span class="icon" id="communication">
                                <span>通信費</span><br>
                                <img src="通信費.png">
                                <button id="communication2" class="action"></button>
                            </span>
                            <span class="icon" id="special">
                                <span>特別費</span><br>
                                <img src="特別費.png">
                                <button id="special2" class="action"></button>
                            </span>
                        </div>
                    </div>
                    <div id="tabpage2" class="tab2">
                        <div id="tabpage2">
                            <span class="icon" id="salary">
                                <span>給料</span><br>
                                <img src="給料.png">
                                <button id="salary2" class="action"></button>
                            </span>
                            <span class="icon" id="pocketMoney">
                                <span>おこづかい</span><br>
                                <img src="おこづかい.png">
                                <button id="pocketMoney2" class="action"></button>
                            </span>
                            <span class="icon" id="bonus">
                                <span>賞与</span><br>
                                <img src="賞与.png">
                                <button id="bonus2" class="action"></button>
                            </span>
                            <span class="icon" id="side">
                                <span>副業</span><br>
                                <img src="副業.png">
                                <button id="side2" class="action"></button>
                            </span>
                        </div>
                        <div id="tabpage2">
                            <span class="icon" id="investment">
                                <span>投資</span><br>
                                <img src="投資.png">
                                <button id="investment2" class="action"></button>
                            </span>
                            <span class="icon" id="extraordinary">
                                <span>臨時収入</span><br>
                                <img src="臨時収入.png">
                                <button id="extraordinary2" class="action"></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="rightBox">
            <?php
            $bangou = '';
            if (empty($_SESSION['flg2'])) {
                $_SESSION['flg2'] = 1;
                $_SESSION['cnt5'] = '249';//db housesにAIで追加されている最新のid値を設定(ログアウトするとセッション消える)
                $bangou = $_SESSION['cnt5'];
            }else{
                $bangou = $_SESSION['cnt5'];
            }
            ?>
            <script>
                var choice = "";
                $('#date').change(function() {
                    /* 選択された日付を取得 */
                    $("#day").remove();
                    choice = $("#date").val();
                    choice = choice.replace("-", "年");
                    choice = choice.replace("-", "月");
                    $("#rightBox").prepend('<h1 id = "day" align="center" style="background-color: #CCFF99;">' + choice + '日</h1>');
                });
                var cnt5 = "";
                cnt5 = <?php echo $bangou; ?>;
            </script>
        </div>
    </div>
    <script src="./tab.js"></script>
    <script src="./click.js"></script>
</body>

</html>