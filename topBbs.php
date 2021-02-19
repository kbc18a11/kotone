<?php
session_cache_limiter('private_no_expire');
session_start();
if (empty($_SESSION['flg'])) {
    //var_dump("１回目");
    $_SESSION['flg'] = 1;
    for ($i = 1; $i <= 15; $i++) {
        $cnt = 0;
        $cnt += 1;
        if ($i <= 5) {
            $type = 'day';
        } else if ($i <= 10) {
            $type = 'month';
        } else if ($i <= 15) {
            $type = 'year';
        }
        $no = 'goal' . (string)$i;
        $judgec = 'judge' . (string)$i;
        $hantei = 'hantei' . (string)$i;

        $userid = $_SESSION['id'];
        $dsn = 'mysql:host=localhost;dbname=kotone;charset=utf8';
        $user = 'hoge';
        $password = 'yarou114514';
        try {
            $db = new PDO($dsn, $user, $password);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $stmt = $db->prepare("SELECT goal,judge FROM mission WHERE no = :no AND userid = :userid limit 1"); //ユーザIDとno
            $stmt->bindParam(':no', $no, PDO::PARAM_STR);
            $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch();
            $_SESSION[$no] = $result['goal']; //goal1
            $_SESSION[$judgec] = $result['judge']; //0か1
            //var_dump($_SESSION[$judgec]);
            if ($_SESSION[$judgec] == '1') {
                $_SESSION[$hantei] = 'checked'; //checked
            } else {
                $_SESSION[$hantei] = '';
            }
            //var_dump($_SESSION[$hantei]);
        } catch (PDOException $e) {
            die('エラー' . $e->getMessage());
            var_dump("エラー");
        }
    }
} else {
    //var_dump("2回目");
    //カレンダースケジュール
    if (!empty($_POST['year'])) {
        $scnt = 0; //登録された予定の数　（年・月の一致した）
        $userid = $_SESSION['id'];
        $year = $_POST['year']; //年
        $month = $_POST['month']; //月
        $dsn = 'mysql:host=localhost;dbname=kotone;charset=utf8';
        $user = 'hoge';
        $password = 'yarou114514';
        try {
            $flg = "0";
            $db = new PDO($dsn, $user, $password);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $stmt = $db->prepare("SELECT COUNT(*) FROM schedule WHERE userid = :userid AND year = :year AND month = :month AND flg = :flg"); //ユーザIDとno
            $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
            $stmt->bindParam(':year', $year, PDO::PARAM_STR);
            $stmt->bindParam(':month', $month, PDO::PARAM_STR);
            $stmt->bindParam(':flg', $flg, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchColumn();
            $scnt = $result; //2件の予定
            $_SESSION['scnt'] = $scnt;
        } catch (PDOException $e) {
            die('エラー' . $e->getMessage());
            var_dump("エラー");
        }
    }
}
?>
<!DOCTYPE html>
<html>
<script src="jquery-3.5.1.min.js"></script>

<head>
    <meta charset="utf-8">
    <title>index</title>
    <link rel="stylesheet" href="top.css">
</head>

<body>
    <script>
        window.onload = function() {
            //  document.getElementById( "dban1" ).click();
        }
    </script>
    <div id="parent">
        <div id="leftBox">
            <header>
                <div class="menu">
                    <div class="menu-title">メニュー</div>
                    <div class="sub-menu">
                        <ul>
                            <li><a href="http://v118-27-20-249.tkzi.static.cnode.io/kotone/topBbs.php">トップページ</a></li>
                            <li><a href="http://v118-27-20-249.tkzi.static.cnode.io/kotone/kakeiboBbs.php">家計簿入力</a></li>
                            <li><a href="http://v118-27-20-249.tkzi.static.cnode.io/kotone/list.php">家計簿表</a></li>
                            <li><a href="http://v118-27-20-249.tkzi.static.cnode.io/kotone/logout.php">ログアウト</a></li>
                        </ul>
                    </div>
                </div>
            </header>
            <h1>
                DAILYMISSION
            </h1>
            <p id="tabcontrol">
                <a href="#tabpage1">日目標</a>
                <a href="#tabpage2">月目標</a>
                <a href="#tabpage3">年目標</a>
                <span id="today">
                    <script>
                        var today = new Date();
                        //年・月・日・曜日を取得
                        var year = today.getFullYear();
                        var month = today.getMonth() + 1;
                        var day = today.getDate();
                        document.write(year + "年" + month + "月" + day + "日 ");
                    </script>
                </span>
            </p>
            <div id="tabbody">
                <div id="tabpage1">
                    <form name="challenge" method="POST" autocomplete="off" action="top.php">
                        <input type="checkbox" name="clg1" value="1" <?php if (!empty($_SESSION['hantei1'])) {
                                                                            echo "checked";
                                                                        } else {
                                                                        } ?> onchange="dCheck1();">
                        <input type="text" id="dtarget1" name="dtxt1" value="<?php if (!empty($_SESSION['goal1'])) {
                                                                                    echo $_SESSION['goal1'];
                                                                                } else {
                                                                                } ?>">
                        <input type="submit" name="dno1" id="dban1" VALUE="更新">
                        <input type="checkbox" name="clg2" value="2" <?php if (!empty($_SESSION['hantei2'])) {
                                                                            echo "checked";
                                                                        } else {
                                                                        } ?> onchange="dCheck2();">
                        <input type="text" id="dtarget2" name="dtxt2" value="<?php if (!empty($_SESSION['goal2'])) {
                                                                                    echo $_SESSION['goal2'];
                                                                                } else {
                                                                                } ?>">
                        <input type="submit" name="dno2" id="dban2" VALUE="更新">
                        <input type="checkbox" name="clg3" value="3" <?php if (!empty($_SESSION['hantei3'])) {
                                                                            echo "checked";
                                                                        } else {
                                                                        } ?> onchange="dCheck3();">
                        <input type="text" id="dtarget3" name="dtxt3" value="<?php if (!empty($_SESSION['goal3'])) {
                                                                                    echo $_SESSION['goal3'];
                                                                                } else {
                                                                                } ?>">
                        <input type="submit" name="dno3" id="dban3" VALUE="更新">
                        <input type="checkbox" name="clg4" value="4" <?php if (!empty($_SESSION['hantei4'])) {
                                                                            echo "checked";
                                                                        } else {
                                                                        } ?> onchange="dCheck4();">
                        <input type="text" id="dtarget4" name="dtxt4" value="<?php if (!empty($_SESSION['goal4'])) {
                                                                                    echo $_SESSION['goal4'];
                                                                                } else {
                                                                                } ?>">
                        <input type="submit" name="dno4" id="dban4" VALUE="更新">
                        <input type="checkbox" name="clg5" value="5" <?php if (!empty($_SESSION['hantei5'])) {
                                                                            echo "checked";
                                                                        } else {
                                                                        } ?> onchange="dCheck5();">
                        <input type="text" id="dtarget5" name="dtxt5" value="<?php if (!empty($_SESSION['goal5'])) {
                                                                                    echo $_SESSION['goal5'];
                                                                                } else {
                                                                                } ?>">
                        <input type="submit" name="dno5" id="dban5" VALUE="更新">
                    </form>
                </div>
                <div id="tabpage2">
                    <form name="challenge2" method="POST" autocomplete="off" action="top.php">
                        <input type="checkbox" name="mlg1" value="1" <?php if (!empty($_SESSION['hantei6'])) {
                                                                            echo "checked";
                                                                        } else {
                                                                        } ?> onchange="mCheck1();">
                        <input type="text" id="mtarget1" name="mtxt1" value="<?php if (!empty($_SESSION['goal6'])) {
                                                                                    echo $_SESSION['goal6'];
                                                                                } else {
                                                                                } ?>">
                        <input type="submit" name="mno1" id="mban1" VALUE="更新">
                        <input type="checkbox" name="mlg2" value="2" <?php if (!empty($_SESSION['hantei7'])) {
                                                                            echo "checked";
                                                                        } else {
                                                                        } ?> onchange="mCheck2();">
                        <input type="text" id="mtarget2" name="mtxt2" value="<?php if (!empty($_SESSION['goal7'])) {
                                                                                    echo $_SESSION['goal7'];
                                                                                } else {
                                                                                } ?>">
                        <input type="submit" name="mno2" id="mban2" VALUE="更新">
                        <input type="checkbox" name="mlg3" value="3" <?php if (!empty($_SESSION['hantei8'])) {
                                                                            echo "checked";
                                                                        } else {
                                                                        } ?> onchange="mCheck3();">
                        <input type="text" id="mtarget3" name="mtxt3" value="<?php if (!empty($_SESSION['goal8'])) {
                                                                                    echo $_SESSION['goal8'];
                                                                                } else {
                                                                                } ?>">
                        <input type="submit" name="mno3" id="mban3" VALUE="更新">
                        <input type="checkbox" name="mlg4" value="4" <?php if (!empty($_SESSION['hantei9'])) {
                                                                            echo "checked";
                                                                        } else {
                                                                        } ?> onchange="mCheck4();">
                        <input type="text" id="mtarget4" name="mtxt4" value="<?php if (!empty($_SESSION['goal9'])) {
                                                                                    echo $_SESSION['goal9'];
                                                                                } else {
                                                                                } ?>">
                        <input type="submit" name="mno4" id="mban4" VALUE="更新">
                        <input type="checkbox" name="mlg5" value="5" <?php if (!empty($_SESSION['hantei10'])) {
                                                                            echo "checked";
                                                                        } else {
                                                                        } ?> onchange="mCheck5();">
                        <input type="text" id="mtarget5" name="mtxt5" value="<?php if (!empty($_SESSION['goal10'])) {
                                                                                    echo $_SESSION['goal10'];
                                                                                } else {
                                                                                } ?>">
                        <input type="submit" name="mno5" id="mban5" VALUE="更新">
                    </form>
                </div>
                <div id="tabpage3">
                    <form name="challenge3" method="POST" autocomplete="off" action="top.php">
                        <input type="checkbox" name="ylg1" value="1" <?php if (!empty($_SESSION['hantei11'])) {
                                                                            echo "checked";
                                                                        } else {
                                                                        } ?> onchange="yCheck1();">
                        <input type="text" id="ytarget1" name="ytxt1" value="<?php if (!empty($_SESSION['goal11'])) {
                                                                                    echo $_SESSION['goal11'];
                                                                                } else {
                                                                                } ?>">
                        <input type="submit" name="yno1" id="yban1" VALUE="更新">
                        <input type="checkbox" name="ylg2" value="2" <?php if (!empty($_SESSION['hantei12'])) {
                                                                            echo "checked";
                                                                        } else {
                                                                        } ?> onchange="yCheck2();">
                        <input type="text" id="ytarget2" name="ytxt2" value="<?php if (!empty($_SESSION['goal12'])) {
                                                                                    echo $_SESSION['goal12'];
                                                                                } else {
                                                                                } ?>">
                        <input type="submit" name="yno2" id="yban2" VALUE="更新">
                        <input type="checkbox" name="ylg3" value="3" <?php if (!empty($_SESSION['hantei13'])) {
                                                                            echo "checked";
                                                                        } else {
                                                                        } ?> onchange="yCheck3();">
                        <input type="text" id="ytarget3" name="ytxt3" value="<?php if (!empty($_SESSION['goal13'])) {
                                                                                    echo $_SESSION['goal13'];
                                                                                } else {
                                                                                } ?>">
                        <input type="submit" name="yno3" id="yban3" VALUE="更新">
                        <input type="checkbox" name="ylg4" value="4" <?php if (!empty($_SESSION['hantei14'])) {
                                                                            echo "checked";
                                                                        } else {
                                                                        } ?> onchange="yCheck4();">
                        <input type="text" id="ytarget4" name="ytxt4" value="<?php if (!empty($_SESSION['goal14'])) {
                                                                                    echo $_SESSION['goal14'];
                                                                                } else {
                                                                                } ?>">
                        <input type="submit" name="yno4" id="yban4" VALUE="更新">
                        <input type="checkbox" name="ylg5" value="5" <?php if (!empty($_SESSION['hantei15'])) {
                                                                            echo "checked";
                                                                        } else {
                                                                        } ?> onchange="yCheck5();">
                        <input type="text" id="ytarget5" name="ytxt5" value="<?php if (!empty($_SESSION['goal15'])) {
                                                                                    echo $_SESSION['goal15'];
                                                                                } else {
                                                                                } ?>">
                        <input type="submit" name="yno5" id="yban5" VALUE="更新">
                    </form>
                </div>
            </div>
        </div>
        <div id="rightBox">
            <div id="btn">
                <button id="prev" type="button">‹</button>
                <button id="next" type="button">›</button>
            </div>
            <div id="calendar"></div>
            <div style="width:100%;">
                <form name="challenge4" method="POST" autocomplete="off" action="scheduleBbs.php">
                    <div style="float:left;width:50%;">
                        <input type="submit" name="sche" id="scheban" VALUE="予定を入力する" style="width:100%;">
                    </div>
                </form>
                <form name="challenge5" method="POST" autocomplete="off" action="deleteBbs.php">
                    <div style="float:left;width:50%;">
                        <input type="submit" name="sche" id="scheban" VALUE="予定を削除する" style="width:100%;">
                    </div>
                </form>
            </div>
            <div style="width:100%;text-align:center;">
                予定を表示する
            </div>
            <div style="width:100%;">
                <form method="post" action="topBbs.php">
                    <select name="year" style="float:left;width:35%;height:26px;">
                        <option value="">年を選択</option>
                        <option value="1900">1900</option>
                        <option value="1901">1901</option>
                        <option value="1902">1902</option>
                        <option value="1903">1903</option>
                        <option value="1904">1904</option>
                        <option value="1905">1905</option>
                        <option value="1906">1906</option>
                        <option value="1907">1907</option>
                        <option value="1908">1908</option>
                        <option value="1909">1909</option>
                        <option value="1910">1910</option>
                        <option value="1911">1911</option>
                        <option value="1912">1912</option>
                        <option value="1913">1913</option>
                        <option value="1914">1914</option>
                        <option value="1915">1915</option>
                        <option value="1916">1916</option>
                        <option value="1917">1917</option>
                        <option value="1918">1918</option>
                        <option value="1919">1919</option>
                        <option value="1920">1920</option>
                        <option value="1921">1921</option>
                        <option value="1922">1922</option>
                        <option value="1923">1923</option>
                        <option value="1924">1924</option>
                        <option value="1925">1925</option>
                        <option value="1926">1926</option>
                        <option value="1927">1927</option>
                        <option value="1928">1928</option>
                        <option value="1929">1929</option>
                        <option value="1930">1930</option>
                        <option value="1931">1931</option>
                        <option value="1932">1932</option>
                        <option value="1933">1933</option>
                        <option value="1934">1934</option>
                        <option value="1935">1935</option>
                        <option value="1936">1936</option>
                        <option value="1937">1937</option>
                        <option value="1938">1938</option>
                        <option value="1939">1939</option>
                        <option value="1940">1940</option>
                        <option value="1941">1941</option>
                        <option value="1942">1942</option>
                        <option value="1943">1943</option>
                        <option value="1944">1944</option>
                        <option value="1945">1945</option>
                        <option value="1946">1946</option>
                        <option value="1947">1947</option>
                        <option value="1948">1948</option>
                        <option value="1949">1949</option>
                        <option value="1950">1950</option>
                        <option value="1951">1951</option>
                        <option value="1952">1952</option>
                        <option value="1953">1953</option>
                        <option value="1954">1954</option>
                        <option value="1955">1955</option>
                        <option value="1956">1956</option>
                        <option value="1957">1957</option>
                        <option value="1958">1958</option>
                        <option value="1959">1959</option>
                        <option value="1960">1960</option>
                        <option value="1961">1961</option>
                        <option value="1962">1962</option>
                        <option value="1963">1963</option>
                        <option value="1964">1964</option>
                        <option value="1965">1965</option>
                        <option value="1966">1966</option>
                        <option value="1967">1967</option>
                        <option value="1968">1968</option>
                        <option value="1969">1969</option>
                        <option value="1970">1970</option>
                        <option value="1971">1971</option>
                        <option value="1972">1972</option>
                        <option value="1973">1973</option>
                        <option value="1974">1974</option>
                        <option value="1975">1975</option>
                        <option value="1976">1976</option>
                        <option value="1977">1977</option>
                        <option value="1978">1978</option>
                        <option value="1979">1979</option>
                        <option value="1980">1980</option>
                        <option value="1981">1981</option>
                        <option value="1982">1982</option>
                        <option value="1983">1983</option>
                        <option value="1984">1984</option>
                        <option value="1985">1985</option>
                        <option value="1986">1986</option>
                        <option value="1987">1987</option>
                        <option value="1988">1988</option>
                        <option value="1989">1989</option>
                        <option value="1990">1990</option>
                        <option value="1991">1991</option>
                        <option value="1992">1992</option>
                        <option value="1993">1993</option>
                        <option value="1994">1994</option>
                        <option value="1995">1995</option>
                        <option value="1996">1996</option>
                        <option value="1997">1997</option>
                        <option value="1998">1998</option>
                        <option value="1999">1999</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                    </select>
                    <select name="month" style="float:left;width:35%;height:26px;">
                        <option value="">月を選択</option>
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <input type="submit" name="show1" id="show" VALUE="表示" style="width:30%;">
                </form>
            </div>
            <div>
                <?php
                if (!empty($_SESSION['scnt']) && $_SESSION['scnt'] != 0) {
                    $max = $_SESSION['scnt'];
                    $flg = "0";
                    $syear = '';
                    $smonth = '';
                    $sday = '';
                    $stime = '';
                    $etime = '';
                    $contents = '';
                    $dsn = 'mysql:host=localhost;dbname=kotone;charset=utf8';
                    $user = 'hoge';
                    $password = 'yarou114514';
                    //deleteで消すレコードにフラグを立てる。
                    //selectでflgが０のやつを取り出す。
                    try {
                        $i = 0;
                        $db = new PDO($dsn, $user, $password);
                        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                        $stmt = $db->prepare("SELECT * FROM schedule WHERE userid = :userid AND year = :year AND month = :month AND flg = :flg"); //ユーザIDとno
                        $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
                        $stmt->bindParam(':year', $year, PDO::PARAM_STR);
                        $stmt->bindParam(':month', $month, PDO::PARAM_STR);
                        $stmt->bindParam(':flg', $flg, PDO::PARAM_STR);
                        $stmt->execute();
                        while ($result = $stmt->fetch()) {
                            $i++;
                            $syear = 'syear' . (string)$i;
                            $smonth = 'smonth' . (string)$i;
                            $sday = 'sday' . (string)$i;
                            $stime = 'starttime' . (string)$i;
                            $etime = 'endtime' . (string)$i;
                            $contents = 'contents' . (string)$i;
                            $SESSION[$syear] = $result['year'];
                            $SESSION[$smonth] = $result['month'];
                            $SESSION[$sday] = $result['day'];
                            $SESSION[$stime] = $result['starttime'];
                            $SESSION[$etime] = $result['endtime'];
                            $SESSION[$contents] = $result['contents'];
                        }
                    } catch (PDOException $e) {
                        die('エラー' . $e->getMessage());
                        var_dump("エラー");
                    }
                }
                ?>
                <table border="1">
                    <?php
                    if (!empty($_SESSION['scnt']) && $_SESSION['scnt'] != 0 && !empty($_POST['year'])) {
                        echo "<tr><td>年</td><td>月</td><td>日</td><td>開始時刻</td><td>終了時刻</td><td>内容</td></tr>";
                        for ($j = 1; $j <= $max; $j++) {
                            $syear2 = 'syear' . (string)$j;
                            echo "<tr><td>" . $SESSION[$syear2] . "</td><td>" . $SESSION['smonth' . $j] . "</td><td>" . $SESSION['sday' . $j] . "</td><td>" . $SESSION["starttime" . $j] . "</td><td>" . $SESSION["endtime" . $j] . "</td><td>" . $SESSION["contents" . $j] . "</td></tr>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script src="./topTab.js"></script>
    <script src="./day.js"></script>
    <script src="./month.js"></script>
    <script src="./year.js"></script>
    <script src="./calendar.js"></script>
</body>

</html>