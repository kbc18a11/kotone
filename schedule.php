<?php
session_start();

if (!empty($_POST['save1'])) {
    $userid = $_SESSION['id'];
    $date = $_POST['date'];//2021-02-10
    $day = mb_substr($date, 8, 2, 'utf8');//09
    $month = mb_substr($date, 5, 2, 'utf8');//03
    $year = mb_substr($date, 0, 4, 'utf8');//2021
    $title = $_POST['title'];//こんにちは
    $sTime = $_POST['sTime'];//15:57
    $eTime = $_POST['eTime'];//00:00
}
$dsn = 'mysql:host=localhost;dbname=kotone;charset=utf8';
$user = 'root';
$password = '';

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $flg = "0";
        $stmt = $db->prepare("
        INSERT INTO schedule (userid,date,year,month,day,starttime,endtime,contents,flg)
        VALUES(:userid,:date,:year,:month,:day,:starttime,:endtime,:contents,:flg)");
        $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':year', $year, PDO::PARAM_STR);
        $stmt->bindParam(':month', $month, PDO::PARAM_STR);
        $stmt->bindParam(':day', $day, PDO::PARAM_STR);
        $stmt->bindParam(':starttime', $sTime, PDO::PARAM_STR);
        $stmt->bindParam(':endtime', $eTime, PDO::PARAM_STR);
        $stmt->bindParam(':contents', $title, PDO::PARAM_STR);
        $stmt->bindParam(':flg', $flg, PDO::PARAM_STR);
        $stmt->execute();
        var_dump("通ってるよ");
        header('Location: topBbs.php');
        exit();
} catch (PDOException $e) {
    die('エラー' . $e->getMessage());
}
?>