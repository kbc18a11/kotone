<?php
session_start();

if (!empty($_POST['item'])) {//確定ボタン押したとき
    //file_put_contents('log.txt',$_SESSION['id']);
    $dsn = 'mysql:host=localhost;dbname=kotone;charset=utf8';
    $user = 'hoge';
    $password = 'yarou114514';
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $stmt = $db->prepare("
    INSERT INTO houses (userid,item,money,judge,choice,flg)
    VALUES(:userid,:item,:money,:judge,:choice,:flg)");
        $stmt->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
        $stmt->bindParam(':item', $_POST['item'],  PDO::PARAM_STR);
        $stmt->bindParam(':money', $_POST['money'],   PDO::PARAM_STR);
        $stmt->bindParam(':judge', $_POST['judge'],   PDO::PARAM_STR);
        $stmt->bindParam(':choice', $_POST['choice'],   PDO::PARAM_STR); //日付
        $stmt->bindParam(':flg', $_POST['flg'],   PDO::PARAM_STR);
        $stmt->execute();
        //file_put_contents('log.txt',$_POST['money']);
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else{
    //file_put_contents('log7.txt',$_SESSION['id']);
}

if (!empty($_POST['no'])) {//削除ボタン押したとき
    file_put_contents('log.txt',$_POST['no']);
    $dsn = 'mysql:host=localhost;dbname=kotone;charset=utf8';
    $user = 'hoge';
    $password = 'yarou114514';
    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $stmt = $db->prepare("
        UPDATE houses SET flg = :flg
        WHERE id = :no AND userid = :userid
        ");
        $stmt->bindParam(':flg', $_POST['flg'], PDO::PARAM_STR);
        $stmt->bindParam(':no', $_POST['no'],  PDO::PARAM_STR);
        $stmt->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
        $stmt->execute();
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else{
    file_put_contents('log6.txt',$_SESSION['id']);
}

if (!empty($_POST['cnt5'])) {
    //file_put_contents('log4.txt',$_POST['cnt5']);
    $_SESSION['cnt5'] = $_POST['cnt5'];
}