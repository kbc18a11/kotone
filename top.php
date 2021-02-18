<?php
session_start();

if (!empty($_POST['dno1'])) {
    $type = 'day'; //デイリー
    $goal = $_POST['dtxt1']; //目標
    $no = 'goal1';
    $hantei = 'hantei1';
    if (isset($_POST['clg1'])) { //checkが付いてるか判定
        $check = true;
        $_SESSION['check'] = 'checked';
    } else {
        $check = false;
        $_SESSION['check'] = '';
    }
    $userid = $_SESSION['id'];
} else if(!empty($_POST['dno2'])){
    $type = 'day'; //デイリー
    $goal = $_POST['dtxt2']; //目標
    $no = 'goal2';
    $hantei = 'hantei2';
    if (isset($_POST['clg2'])) { //checkが付いてるか判定
        $check = true;
        $_SESSION['check'] = 'checked';
    } else {
        $check = false;
        $_SESSION['check'] = '';
    }
    $userid = $_SESSION['id'];
} else if(!empty($_POST['dno3'])){
    $type = 'day'; //デイリー
    $goal = $_POST['dtxt3']; //目標
    $no = 'goal3';
    $hantei = 'hantei3';
    if (isset($_POST['clg3'])) { //checkが付いてるか判定
        $check = true;
        $_SESSION['check'] = 'checked';
    } else {
        $check = false;
        $_SESSION['check'] = '';
    }
    $userid = $_SESSION['id'];
} else if(!empty($_POST['dno4'])){
    $type = 'day'; //デイリー
    $goal = $_POST['dtxt4']; //目標
    $no = 'goal4';
    $hantei = 'hantei4';
    if (isset($_POST['clg4'])) { //checkが付いてるか判定
        $check = true;
        $_SESSION['check'] = 'checked';
    } else {
        $check = false;
        $_SESSION['check'] = '';
    }
    $userid = $_SESSION['id'];
} else if(!empty($_POST['dno5'])){
    $type = 'day'; //デイリー
    $goal = $_POST['dtxt5']; //目標
    $no = 'goal5';
    $hantei = 'hantei5';
    if (isset($_POST['clg5'])) { //checkが付いてるか判定
        $check = true;
        $_SESSION['check'] = 'checked';
    } else {
        $check = false;
        $_SESSION['check'] = '';
    }
    $userid = $_SESSION['id'];
} else if(!empty($_POST['mno1'])){
    $type = 'month'; //デイリー
    $goal = $_POST['mtxt1']; //目標
    $no = 'goal6';
    $hantei = 'hantei6';
    if (isset($_POST['mlg1'])) { //checkが付いてるか判定
        $check = true;
        $_SESSION['check'] = 'checked';
    } else {
        $check = false;
        $_SESSION['check'] = '';
    }
    $userid = $_SESSION['id'];
} else if(!empty($_POST['mno2'])){
    $type = 'month'; //デイリー
    $goal = $_POST['mtxt2']; //目標
    $no = 'goal7';
    $hantei = 'hantei7';
    if (isset($_POST['mlg2'])) { //checkが付いてるか判定
        $check = true;
        $_SESSION['check'] = 'checked';
    } else {
        $check = false;
        $_SESSION['check'] = '';
    }
    $userid = $_SESSION['id'];
} else if(!empty($_POST['mno3'])){
    $type = 'month'; //デイリー
    $goal = $_POST['mtxt3']; //目標
    $no = 'goal8';
    $hantei = 'hantei8';
    if (isset($_POST['mlg3'])) { //checkが付いてるか判定
        $check = true;
        $_SESSION['check'] = 'checked';
    } else {
        $check = false;
        $_SESSION['check'] = '';
    }
    $userid = $_SESSION['id'];
} else if(!empty($_POST['mno4'])){
    $type = 'month'; //デイリー
    $goal = $_POST['mtxt4']; //目標
    $no = 'goal9';
    $hantei = 'hantei9';
    if (isset($_POST['mlg4'])) { //checkが付いてるか判定
        $check = true;
        $_SESSION['check'] = 'checked';
    } else {
        $check = false;
        $_SESSION['check'] = '';
    }
    $userid = $_SESSION['id'];
} else if(!empty($_POST['mno5'])){
    $type = 'month'; //デイリー
    $goal = $_POST['mtxt5']; //目標
    $no = 'goal10';
    $hantei = 'hantei10';
    if (isset($_POST['mlg5'])) { //checkが付いてるか判定
        $check = true;
        $_SESSION['check'] = 'checked';
    } else {
        $check = false;
        $_SESSION['check'] = '';
    }
    $userid = $_SESSION['id'];
} else if(!empty($_POST['yno1'])){
    $type = 'year'; //デイリー
    $goal = $_POST['ytxt1']; //目標
    $no = 'goal11';
    $hantei = 'hantei11';
    if (isset($_POST['ylg1'])) { //checkが付いてるか判定
        $check = true;
        $_SESSION['check'] = 'checked';
    } else {
        $check = false;
        $_SESSION['check'] = '';
    }
    $userid = $_SESSION['id'];
} else if(!empty($_POST['yno2'])){
    $type = 'year'; //デイリー
    $goal = $_POST['ytxt2']; //目標
    $no = 'goal12';
    $hantei = 'hantei12';
    if (isset($_POST['ylg2'])) { //checkが付いてるか判定
        $check = true;
        $_SESSION['check'] = 'checked';
    } else {
        $check = false;
        $_SESSION['check'] = '';
    }
    $userid = $_SESSION['id'];
} else if(!empty($_POST['yno3'])){
    $type = 'year'; //デイリー
    $goal = $_POST['ytxt3']; //目標
    $no = 'goal13';
    $hantei = 'hantei13';
    if (isset($_POST['ylg3'])) { //checkが付いてるか判定
        $check = true;
        $_SESSION['check'] = 'checked';
    } else {
        $check = false;
        $_SESSION['check'] = '';
    }
    $userid = $_SESSION['id'];
} else if(!empty($_POST['yno4'])){
    $type = 'year'; //デイリー
    $goal = $_POST['ytxt4']; //目標
    $no = 'goal14';
    $hantei = 'hantei14';
    if (isset($_POST['ylg4'])) { //checkが付いてるか判定
        $check = true;
        $_SESSION['check'] = 'checked';
    } else {
        $check = false;
        $_SESSION['check'] = '';
    }
    $userid = $_SESSION['id'];
} else if(!empty($_POST['yno5'])){
    $type = 'year'; //デイリー
    $goal = $_POST['ytxt5']; //目標
    $no = 'goal15';
    $hantei = 'hantei15';
    if (isset($_POST['ylg5'])) { //checkが付いてるか判定
        $check = true;
        $_SESSION['check'] = 'checked';
    } else {
        $check = false;
        $_SESSION['check'] = '';
    }
    $userid = $_SESSION['id'];
}
$dsn = 'mysql:host=localhost;dbname=kotone;charset=utf8';
$user = 'root';
$password = '';

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $stmt = $db->prepare("SELECT goal FROM mission WHERE no = :no AND userid = :userid limit 1");
    $stmt->bindParam(':no', $no, PDO::PARAM_STR);
    $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch();
    if ($result > 0) { //noが被っている場合（更新）
        $stmt = $db->prepare("
        UPDATE mission SET goal = :goal,judge = :judge
        WHERE userid = :userid AND type = :type AND no = :no
        ");
        $stmt->bindParam(':goal', $goal, PDO::PARAM_STR);
        $stmt->bindParam(':judge', $check, PDO::PARAM_STR);
        $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        $stmt->bindParam(':no', $no, PDO::PARAM_STR);
        $stmt->execute();

        $stmt = $db->prepare("SELECT goal,judge FROM mission WHERE no = :no AND userid = :userid limit 1");
        $stmt->bindParam(':no', $no, PDO::PARAM_STR);
        $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch();
        $_SESSION[$no] = $result['goal']; //goal1
        $_SESSION[$hantei] = $result['judge']; //0か１
        //var_dump("被ってる");
        //var_dump($userid);
        //var_dump($_SESSION[$no]);
        header('Location: topBbs.php');
        //session_destroy();
        exit();
    } else { //noが被っていない場合（新規）
        $stmt = $db->prepare("
        INSERT INTO mission (userid,type,no,judge,goal)
        VALUES(:userid,:type,:no,:judge,:goal)");
        $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        $stmt->bindParam(':no', $no, PDO::PARAM_STR);
        $stmt->bindParam(':judge', $check, PDO::PARAM_BOOL);
        $stmt->bindParam(':goal', $goal, PDO::PARAM_STR);
        $stmt->execute();

        $stmt = $db->prepare("SELECT goal,judge FROM mission WHERE no = :no AND userid = :userid limit 1");
        $stmt->bindParam(':no', $no, PDO::PARAM_STR);
        $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch();
        $_SESSION[$no] = $result['goal']; //goal1
        $_SESSION[$hantei] = $result['judge']; //0か１
        //var_dump("被ってない");
        //var_dump($_SESSION['no']);
        header('Location: topBbs.php');
        exit();
    }
} catch (PDOException $e) {
    die('エラー' . $e->getMessage());
}
