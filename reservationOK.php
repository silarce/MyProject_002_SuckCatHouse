<?php
$link = mysqli_connect('localhost', 'root', '', 'suckcathouse', 3306);
$result = mysqli_query($link, 'set names utf8');


$sql = <<<command
SELECT revID, r.catID, service, ps, memberID, name, catName
FROM reservation r JOIN cats c
on r.catID = c.catID
order by revID desc limit 1
command;
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>預約完成</title>

    <link rel="stylesheet" href="./frames/bootstrap/css/bootstrap.min.css">
    <script src="./frames/jQuery/jquery.min.js"></script>
    <script src="./frames/popper.min.js"></script>
    <script src="./frames/bootstrap/js/bootstrap.min.js"></script>
    <script src="./img/svg/font_awson.js" crossorigin="anonymous"></script>
    <!-- SAcss and SAjs -->
    <link rel="stylesheet" href="./SAcss/global_css.css">
    <link rel="stylesheet" href="./SAcss/reservationOK_css.css">
</head>

<body class="bg_brb_lg">
    <main class="bg_gm_w_03">
        <nav>
            <iframe id="navBar" src="navbar.html" frameborder="0"></iframe>
            <h1>您的預約已完成</h1>

            <div class="bg_gm_w_03" id="container">
                <p class="title">您的姓名 :</p>
                <p class="content"><?=$row['name']?></p>
                <p class="title">預約號碼 :</p>
                <p class="content"><?=$row['revID']?></p>
                <p class="title">服務項目 :</p>
                <p class="content"><?=$row['service']?></p>
                <p class="title">貓咪芳名 :</p>
                <p class="content"><?=$row['catName']?></p>
            </div>
            <h3>
                服務人員會在稍後與您聯絡確認時間 <br>
                請您耐心等候，謝謝
            </h3>


        </nav>





    </main>

</body>

</html>