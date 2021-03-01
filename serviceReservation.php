<?php
if (!isset($_COOKIE['houseMember'])) {
    header('location: login.php');
}

if(isset($_POST['sendOut'])){
    $link = mysqli_connect('localhost', 'root', '', 'suckcathouse', 3306);
    $result = mysqli_query($link, 'set names utf8');

    $sql = <<< aaa
    SELECT * FROM `members`
    where name = '{$_COOKIE['houseMember']}'
    aaa;
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $sql = <<< aaa
    INSERT into reservation
    (catID, service, ps, memberID, name)
    VALUE
    ('{$_POST['catID']}','{$_POST['service']}',
    '{$_POST['ps']}','{$row['memberID']}', '{$row['name']}')
    aaa;
    $result = mysqli_query($link, $sql);

    header('location: http://localhost/suckCatHouse/reservationOK.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>服務預約</title>
    <link rel="stylesheet" href="./frames/bootstrap/css/bootstrap.min.css">
    <script src="./frames/jQuery/jquery.min.js"></script>
    <script src="./frames/popper.min.js"></script>
    <script src="./frames/bootstrap/js/bootstrap.min.js"></script>

    <!-- SAcss and SAjs -->
    <link rel="stylesheet" href="./SAcss/global_css.css">
    <link rel="stylesheet" href="./SAcss/serviceReservation_css.css">
</head>
<body class="bg_brb_lg">
    <main class="bg_gm_w_03">
        <nav>
            <iframe id="navBar" src="navbar.html" frameborder="0"></iframe>
        </nav>
        <form id="SRForm" method="POST" action="">
            <h1>服務預約</h1>
            <br>
            <div id="labelList" class="inForm">
                <label for="service">選擇服務 :</label>
                <br>
                <label for="catID">選擇貓 :</label>
            </div>

            <div id="selectList" class="inForm ">
                <select name="service" id="service" class="bg_gm_w_03">
                    <option value="吸貓">吸貓</option>
                    <option value="肉球踏踏">肉球踏踏</option>
                </select>
                <br>
                <select name="catID" id="catID" class="bg_gm_w_03">
                    <option value="1">Aurora</option>
                    <option value="2">Grumpy</option>
                    <option value="3">Nala</option>
                    <option value="4">Hosico</option>
                    <option value="5">Messy</option>
                    <option value="6">Venus</option>
                </select>
            </div>
            <br>
            <label id="psLabel" for="ps">備註</label>
            <br>
            <textarea name="ps" id="ps" cols="60" rows="5">請告訴我們您有多愛吸貓</textarea>
            <br>
            <input id="sendOut" name="sendOut" class="bg_gm_w_03" type="submit" value="送出">
        </form>

    </main>


</body>
</html>