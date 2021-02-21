<?php
session_start();

if (!empty($_POST['delete1'])) {
    $userid = $_SESSION['id'];
    $date = $_POST['date'];//2021-02-10
    $day = mb_substr($date, 8, 2, 'utf8');//09
    $month = mb_substr($date, 5, 2, 'utf8');//03
    $year = mb_substr($date, 0, 4, 'utf8');//2021
    $sTime = $_POST['sTime'];//15:57
    $eTime = $_POST['eTime'];//00:00
}
$dsn = 'mysql:host=db;dbname=kotone;charset=utf8';
$user = 'hoge';
$password = 'yarou114514';

try {
    $flg = "1";
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $stmt = $db->prepare("
        UPDATE schedule SET flg = :flg
        WHERE userid=:userid AND date=:date AND starttime=:starttime AND endtime=:endtime
        ");
        $stmt->bindParam(':flg', $flg, PDO::PARAM_INT);
        $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':starttime', $sTime, PDO::PARAM_STR);
        $stmt->bindParam(':endtime', $eTime, PDO::PARAM_STR);
        $stmt->execute();
        //var_dump("通ってるよ");
        header('Location: ./topBbs.php');
        exit();
} catch (PDOException $e) {
    die('エラー' . $e->getMessage());
}
?>