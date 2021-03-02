<?php

$link = mysqli_connect('localhost', 'root', '', 'suckcathouse', 3306);
$result = mysqli_query($link, 'set names utf8');



$sql = <<<aaa
SELECT * FROM `members`
where name = '{$_COOKIE['houseMember']}'
aaa;

$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
// ----------------------------------------


if(isset($_POST['signUp'])){
    $hash = password_hash($_POST['pw'], PASSWORD_DEFAULT);

    $sql = <<< aaa
    UPDATE members
    set 
    email = '{$_POST['email']}',
    pw = '$hash',
    name = '{$_POST['name']}',
    tel = '{$_POST['tel']}',
    address = '{$_POST['address']}'
    where name = '{$_COOKIE['houseMember']}'
    aaa;

    $result = mysqli_query($link, $sql);
    header('location: ./index.php');

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改會員資料</title>

    <link rel="stylesheet" href="./frames/bootstrap/css/bootstrap.min.css">
    <script src="./frames/jQuery/jquery.min.js"></script>
    <script src="./frames/popper.min.js"></script>
    <script src="./frames/bootstrap/js/bootstrap.min.js"></script>


    <!-- SAcss and SAjs -->
    <link rel="stylesheet" href="./SAcss/global_css.css">
    <link rel="stylesheet" href="./SAcss/editMember_css.css">
</head>

<body class="bg_brb_lg">
    <main class="bg_gm_w_03">
        <h1>
            修改會員資料
        </h1>
        <form class="bg_gm_w_03" method="POST" action="">
            <label for="eMail">e-mail :</label>
            <input class="bg_gm_w_03" id="email" name="email" type="email" value="<?=$row['email']?>">
            <br>
            <label for="pw">新密碼 :</label>
            <input class="bg_gm_w_03" id="pw" name="pw" type="password" value="<?=""?>">
            <br>
            <label for="name">姓名 :</label>
            <input class="bg_gm_w_03" id="name" name="name" type="text" value="<?=$row['name']?>">
            <br>
            <label for="tel">電話 :</label>
            <input class="bg_gm_w_03" id="tel" name="tel" type="text" value="<?=$row['tel']?>">
            <br>
            <label for="address">地址 :</label>
            <input class="bg_gm_w_03" id="address" name="address" type="text" value="<?=$row['address']?>">
            <br>
            <input class="bg_gm_w_03" id="signUp" name="signUp" type="submit" value="確定修改">
            <a id="cancel" class="bg_gm_w_03" href="./index.php">取消回首頁</a>
        </form>

    </main>

</body>

</html>