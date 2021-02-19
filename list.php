<?php
session_start();

if (!empty($_POST['year'])) {
    $lcnt = 0; //登録された予定の数　（年・月の一致した）
    $userid = $_SESSION['id'];
    $year = $_POST['year']; //年
    $month = $_POST['month']; //月
    $day = $_POST['day']; //日
    $date = (string)$year . '年' . (string)$month . '月' . (string)$day;
    $dsn = 'mysql:host=localhost;dbname=kotone;charset=utf8';
    $user = 'hoge';
    $password = 'yarou114514';
    try {
        $flg = "0";
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $stmt = $db->prepare("SELECT COUNT(*) FROM houses WHERE userid = :userid AND choice = :date AND flg = :flg"); //ユーザIDとno
        $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':flg', $flg, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        $lcnt = $result; //2件の予定
        $_SESSION['lcnt'] = $lcnt;
    } catch (PDOException $e) {
        die('エラー' . $e->getMessage());
        var_dump("エラー");
    }
}
?>
<!DOCTYPE html>
<html>
<script src="jquery-3.5.1.min.js"></script>

<head>
    <meta charset="utf-8">
    <title>list</title>
    <link rel="stylesheet" href="list.css">
</head>

<body>
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
    <div style="width:100%;text-align:center;">
        <h1>
            家計簿表
        </h1>
    </div>
    <div style="width:100%;">
        <form method="post" action="list.php">
            <select name="year" style="float:left;width:25%;height:26px;">
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
            <select name="month" style="float:left;width:25%;height:26px;">
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
            <select name="day" style="float:left;width:25%;height:26px;">
                <option value="">日を選択</option>
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
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
            <input type="submit" name="show1" id="show" VALUE="表示" style="width:25%;">
        </form>
    </div>
    <div style="width:100%;">
        <?php
        if (!empty($_SESSION['lcnt']) && $_SESSION['lcnt'] != 0) {
            $max = $_SESSION['lcnt'];
            $flg = "0";
            $lyear = '';
            $lmonth = '';
            $lday = '';
            $dsn = 'mysql:host=localhost;dbname=kotone;charset=utf8';
            $user = 'hoge';
            $password = 'yarou114514';
            //deleteで消すレコードにフラグを立てる。
            //selectでflgが０のやつを取り出す。
            try {
                $i = 0;
                $db = new PDO($dsn, $user, $password);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $stmt = $db->prepare("SELECT * FROM houses WHERE userid = :userid AND choice = :date AND flg = :flg"); //ユーザIDとno
                $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
                $stmt->bindParam(':date', $date, PDO::PARAM_STR);
                $stmt->bindParam(':flg', $flg, PDO::PARAM_STR);
                $stmt->execute();
                while ($result = $stmt->fetch()) {
                    $i++;
                    $litem = 'litem' . (string)$i;
                    $lmoney = 'lmoney' . (string)$i;
                    $ljudge = 'ljudge' . (string)$i;
                    $SESSION[$litem] = $result['item'];
                    $SESSION[$lmoney] = $result['money'];
                    $SESSION[$ljudge] = $result['judge'];
                }
            } catch (PDOException $e) {
                die('エラー' . $e->getMessage());
                var_dump("エラー");
            }
        }
        ?>
        <table border="1" style="width:100%; margin-top:20px;">
            <?php
            if (!empty($_SESSION['lcnt']) && $_SESSION['lcnt'] != 0 && !empty($_POST['year'])) {
                echo "<tr style='background-color: rgb(255, 255, 153)'><td>項目</td><td>金額</td></tr>";
                $harau = 0;
                $uketoru = 0;
                for ($j = 1; $j <= $max; $j++) {
                    $litem2 = 'litem' . (string)$j;
                    if ($SESSION['ljudge' . (string)$j] == 1) {
                        $harau += $SESSION['lmoney' . (string)$j];
                        echo "<tr style='background-color:rgb(255, 239, 213)'><td>" . $SESSION[$litem2] . "</td><td style='text-align:right'>" . $SESSION['lmoney' . $j] . "円</td></tr>";
                    } else {
                        $uketoru += $SESSION['lmoney' . (string)$j];
                        echo "<tr style='background-color:rgb(224, 255, 255)'><td>" . $SESSION[$litem2] . "</td><td style='text-align:right'>" . $SESSION['lmoney' . $j] . "円</td></tr>";
                    }
                }
                $total = $uketoru - $harau;
                echo "<tr style='background-color:rgb(255, 239, 213)'><td>支出合計</td><td style='text-align:right'>" . $harau . "円</td></tr>";
                echo "<tr style='background-color:rgb(224, 255, 255)'><td>収入合計</td><td style='text-align:right'>" . $uketoru . "円</td></tr>";
                echo "<tr style='background-color: rgb(255, 255, 153)'><td>合計</td><td style='text-align:right'>" . $total . "円</td></tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>