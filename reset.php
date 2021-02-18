<?php
session_start();

$mail = $_POST['mail'];
$pwd = sha1($_POST['pwd']);
$pwd2 = sha1($_POST['pwd2']);
$reset = $_POST['reset'];
$text = $_POST['text'];

if (isset($_SESSION['userid'])) { //セッションにユーザーIDがある

    header('Location:topBbs.php'); //トップページに遷移する

}

if ($mail == '' || $pwd == '' || $pwd2 == '' || $reset == '' || $text == '') {
    header('Location: resetBbs.php');
    exit();
}

if($pwd != $pwd2){
    header('Location: resetBbs.php');
}

if (!preg_match("/^[0-9]{4}$/", $pwd)) {
    header('Location: resetBbs.php');
}

$dsn = 'mysql:host=localhost;dbname=kotone;charset=utf8';
$user = 'root';
$password = '';

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //プリペアドステートメントを作成
    $stmt = $db->prepare("
        UPDATE user SET password = :password
        WHERE mail = :mail AND text = :text AND reset = :reset
        ");
    $stmt->bindParam(':password', $pwd, PDO::PARAM_STR);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    $stmt->bindParam(':text', $text, PDO::PARAM_STR);
    $stmt->bindParam(':reset', $reset, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
        header('Location: login.php');
    } else {
        header('Location: resetBbs.php');
    }
    exit();
} catch (PDOException $e) {
    die('エラー' . $e->getMessage());
}
