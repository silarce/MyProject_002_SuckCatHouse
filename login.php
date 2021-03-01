<?php

$guestName = 'guest';
if (isset($_COOKIE['houseMember'])) {
    $guestName = $_COOKIE['houseMember'];
}


// 登入
if (isset($_POST['login'])) {
    $link = mysqli_connect('localhost', 'root', '', 'suckcathouse', 3306);
    $result = mysqli_query($link, 'set names utf8');

    $sql = <<<aaa
    SELECT * FROM `members`
    where email = '{$_POST['email']}'
    aaa;
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);

    // 驗證密碼，正確即建立cookie
    if (@$row['pw'] && $_POST['pw'] == $row['pw']) {
        setcookie('houseMember', $row['name']);
        header('location: index.php');
        exit;
    }else{
        $wrong = 'wrong';
    }
}

// 登出
if(isset($_POST['logout'])){
setcookie('houseMember', '', time()- 60 * 60 *24);
header('location: index.php');
}

// 取消
if (isset($_POST['cancel'])) {
    header('location: index.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>

    <link rel="stylesheet" href="./frames/bootstrap/css/bootstrap.min.css">
    <script src="./frames/jQuery/jquery.min.js"></script>
    <script src="./frames/popper.min.js"></script>
    <script src="./frames/bootstrap/js/bootstrap.min.js"></script>
    <script src="./img/svg/font_awson.js" crossorigin="anonymous"></script>
    <!-- SAcss and SAjs -->
    <link rel="stylesheet" href="./SAcss/global_css.css">
    <link rel="stylesheet" href="./SAcss/login_css.css">
</head>

<body class="bg_brb_lg">
    <main class="bg_gm_w_03">
        <h1>登入</h1>
        <form class="bg_gm_w_03" method="POST" action="">
        <?php if(@$wrong || $guestName == 'guest' ) {?>
            <label for="email">e-mail :</label>
            <input class="bg_gm_w_03" id="email" name="email" type="text">
            <br>
            <label for="pw">密碼 :</label>
            <input class="bg_gm_w_03" id="pw" name="pw" type="password">
            <br>
            <?php } ?>
            <?php if ($guestName == 'guest') { ?>
                <input class="bg_gm_w_03" type="submit" name="login" id="login" value="登入">
            <?php } else { ?>
                <input class="bg_gm_w_03" type="submit" name="logout" id="logout" value="登出">
            <?php } ?>
            <input class="bg_gm_w_03" type="submit" name="cancel" id="cancel" value="回首頁">
            <br>
            <?php if(@$wrong) {?>
                <h3>帳號或密碼錯誤，請查明後再輸入，謝謝</h3>
            <?php } elseif ($guestName == 'guest') { ?>
                <h3>歡迎蒞臨吸貓會館，請登入或註冊</h3>
                <a id="signUp" class="bg_gm_w_03" href="http://localhost/suckCatHouse/SignUp.php">註冊</a>
            <?php } else { ?>
                <h3>歡迎蒞臨吸貓會館，<?= $guestName  ?></h3>
            <?php } ?>

          


        </form>
    </main>
</body>

</html>