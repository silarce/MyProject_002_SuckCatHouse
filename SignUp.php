<?php
if (isset($_POST['signUp'])) {

    $link = mysqli_connect('localhost', 'root', '', 'suckcathouse', 3306);
    $result = mysqli_query($link, 'set names utf8');

    $hash = password_hash($_POST['pw'], PASSWORD_DEFAULT);

    $sql = <<< aaa
    insert into members
    (email, pw, name, tel, address)
    values
    ('{$_POST['email']}', '$hash', '{$_POST['name']}',
    '{$_POST['tel']}','{$_POST['address']}'
    )
    aaa;

    $result = mysqli_query($link, $sql);
    header('location: ./index.php');
    exit;
}
if(isset($_POST['cancel'])){
header('location: ./index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>

    <link rel="stylesheet" href="./frames/bootstrap/css/bootstrap.min.css">
    <script src="./frames/jQuery/jquery.min.js"></script>
    <script src="./frames/popper.min.js"></script>
    <script src="./frames/bootstrap/js/bootstrap.min.js"></script>
    <script src="./img/svg/font_awson.js" crossorigin="anonymous"></script>
    <!-- SAcss and SAjs -->
    <link rel="stylesheet" href="./SAcss/global_css.css">
    <link rel="stylesheet" href="./SAcss/SignUp_css.css">
</head>

<body class="bg_brb_lg">
    <main class="bg_gm_w_03">
        <h1>
            會員註冊
        </h1>
        <form class="bg_gm_w_03" method="POST" action="">
            <label for="eMail">e-mail :</label>
            <input class="bg_gm_w_03" id="email" name="email" type="email">
            <br>
            <label for="pw">密碼 :</label>
            <input class="bg_gm_w_03" id="pw" name="pw" type="password">
            <br>
            <label for="name">姓名 :</label>
            <input class="bg_gm_w_03" id="name" name="name" type="text">
            <br>
            <label for="tel">電話 :</label>
            <input class="bg_gm_w_03" id="tel" name="tel" type="text">
            <br>
            <label for="address">地址 :</label>
            <input class="bg_gm_w_03" id="address" name="address" type="text">
            <br>
            <input class="bg_gm_w_03" id="signUp" name="signUp" type="submit" value="確定註冊">
            <!-- <input class="bg_gm_w_03" id="cancel" name="cancel" type="submit" value="取消"> -->
            <a id="cancel" class="bg_gm_w_03" href="./index.php">回首頁</a>
        </form>
    </main>


</body>

</html>