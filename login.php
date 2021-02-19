<?php
session_start();//セッション開始

if (isset($_SESSION['userid'])) { //セッションにユーザーIDがある
    //var_dump($_SESSION['userid']);
    header('Location:topBbs.php'); //トップページに遷移する

}else if(isset($_POST['mail']) && isset($_POST['pwd'])){
    //ログインしてないがメールアドレスとパスワードが送信されたとき

    //データベースに接続
    $dsn = 'mysql:host=localhost;dbname=kotone;charset=utf8';
    $user = 'hoge';
    $password = 'yarou114514';

    try{
        $db = new PDO($dsn,$user,$password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        //プリペアドステートメントを作成
        $stmt = $db->prepare("
            SELECT * FROM user WHERE mail=:mail AND password=:pass
        ");
        //パラメータを割り当て
        $pwd = sha1($_POST['pwd']);
        $stmt->bindParam(':mail',$_POST['mail'],PDO::PARAM_STR);
        $stmt->bindParam(':pass',$pwd,PDO::PARAM_STR);//sha1(数字の１)
        $stmt->execute();
        file_put_contents('abc.txt',$_row['id']);
        if($row = $stmt->fetch()){
            file_put_contents('id.txt',$_row['id']);
        //ユーザーが存在していたので、セッションにユーザIDをセット
            $_SESSION['id'] = $row['id'];
            header('Location:topBbs.php');
            exit();
        }else{
            header('Location: login.php');
            exit();
        }
    }catch(PDOException $e){
        die('エラー:'.$e->getMessage());
    }

}else{
    //ログインしていない場合はログインフォームを表示する
?>


<!DOCTYPE html>
<html>
<script src="jquery-3.5.1.min.js"></script>

<head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
    <h1>kotone</h1>
</head>

<body>
    <center>
        <table width="100%">
            <tr>
                <td align="center" bgcolor="#2b1872">
                    <font color=#ffffff><b>LOGIN</b></font>
                </td>
            </tr>
        </table>
        <form action="login.php" method="POST">
            <table id="formset">
                <tr>
                    <td>Eメールアドレス</td>
                    <td>
                        <input type="text" name="mail" size="40" maxlength="32" autocomplete="OFF" /><!-- mail -->
                    </td>
                </tr>
                <tr>
                    <td>パスワード(数字4桁）</td>
                    <td>
                        <input type="password" name="pwd" size="40" maxlength="32" autocomplete="OFF" />
                        <!-- パスワード -->
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" value="ログイン" />
            <input type="button" onclick="location.href='./registerBbs.php'" value="登録">
            <input type="button" onclick="location.href='./resetBbs.php'" value="パスワードリセット">
        </form>
    </center>
</body>

</html>

<?php
}
?>