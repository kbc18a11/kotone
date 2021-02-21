<?php
session_start();

$name = $_POST['name'];
$mail = $_POST['mail'];
$pwd = $_POST['pwd'];
$pwd2 = $_POST['pwd2'];
$reset = $_POST['reset'];
$text = $_POST['text'];

if (isset($_SESSION['userid'])) { //セッションにユーザーIDがある
    //var_dump($_SESSION['userid']);
    header('Location:topBbs.php'); //トップページに遷移する

}

if ($mail == '' || $pwd == '' || $pwd2 == '' || $reset == '' || $text == '') {
    header('Location: registerBbs.php');
}

if($pwd != $pwd2){
    header('Location: registerBbs.php');
}

if (!preg_match("/^[0-9]{4}$/", $pwd)) {
    header('Location: registerBbs.php');
}

$dsn = 'mysql:host=db;dbname=kotone;charset=utf8';
$user = 'hoge';
$password = 'yarou114514';

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //プリペアドステートメントを作成
    $stmt = $db->prepare("SELECT * FROM user WHERE mail = :mail limit 1");
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch();
    $stmt = $db->prepare("SELECT * FROM user WHERE name = :name limit 1");
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    $result2 = $stmt->fetch();
    if ($result > 0 || $result2 > 0 || $pwd != $pwd2) { //ユーザ名、メールアドレス重複あり
        header('Location: registerBbs.php');
    } else { //重複なし
        $pwd = sha1($pwd);
        $stmt = $db->prepare("
        INSERT INTO user (name,mail,password,reset,text)
        VALUES(:name,:mail,:password,:reset,:text)");
        // トランザクション開始
        $db->beginTransaction();
        try {
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
            $stmt->bindParam(':password', $pwd, PDO::PARAM_INT);
            $stmt->bindParam(':reset', $reset, PDO::PARAM_STR);
            $stmt->bindParam(':text', $text, PDO::PARAM_STR);
            $stmt->execute();

            $id = $db->lastInsertId();
            $_SESSION['userid'] = $id;
            // トランザクション完了
            $db->commit();
            //var_dump($_SESSION['userid']);
            header('Location: login.php');
            exit();
        } catch (Exception $e) {
            die('エラー' . $e->getMessage());
        }
    }
} catch (PDOException $e) {
    die('エラー' . $e->getMessage());
}
