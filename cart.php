<?php

// 如果沒有會員餅乾就會被轉到首頁
if (!isset($_COOKIE['houseMember'])) {
    header('location: ./login.php');
}
// -------------------------
// 連線伺服器
$link = mysqli_connect('localhost', 'root', '', 'suckcathouse', 3306);
$result = mysqli_query($link, 'set names utf8');
// --------------------------------------

// 如果餅乾cart存在，則先解碼餅乾的json
if (@$_COOKIE['cart']) {
    $arrjso = $_COOKIE['cart'];
    $arr = json_decode($arrjso, true);
}
foreach($arr as $key => $val){
    echo "商品 $key 的JSON$val ";
}
// var_dump($arr);



// ------------------------
// 提取會員資料
$sql = <<< aaa
SELECT * FROM `members`
where name = '{$_COOKIE['houseMember']}'
aaa;
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);


// 用foreach將陣列的key與值取出
// 以key為變數名稱，將值decode賦值進該變數，也就是
// $key = json_decode(值)
// 這樣就能得到原本的物件

// 再用
// $result = mysqli_query($link, $sql);
// $row = mysqli_fetch_assoc($result);
// 提取圖片路徑

// 然後再將物件的值與路徑代入
// echo <<<aaa
// HTML的碼
// aaa;
// 同時在每一次迭代時將小計合計為總金額，賦值進一個變數
// 以上都在foreach內完成

// 最後下訂單時要將原本的json與計算總金額的變數隨著訂單放進資料表


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購物車</title>

    <link rel="stylesheet" href="./frames/bootstrap/css/bootstrap.min.css">
    <script src="./frames/jQuery/jquery.min.js"></script>
    <script src="./frames/popper.min.js"></script>
    <script src="./frames/bootstrap/js/bootstrap.min.js"></script>
    <script src="./img/svg/font_awson.js" crossorigin="anonymous"></script>
    <!-- SAcss and SAjs -->
    <link rel="stylesheet" href="./SAcss/global_css.css">
    <link rel="stylesheet" href="./SAcss/cart_css.css">
</head>

<body class="bg_brb_lg">
    <main class="bg_gm_w_03">
        <h1>購物車</h1>
        <div id="cartTitle" class="bg_gm_w_03">
            <div>商品圖片</div>
            <div>商品名稱</div>
            <div>單價</div>
            <div>數量</div>
            <div>小計</div>
        </div>
        <div class="cartList bg_gm_w_01">
            <img src="./img/SoftNyanko/cover/NYAN-004.jpg" alt="">
            <div>
                <p>ザ・スクープ！！緊急特番ヤガイ映像120分スペシャル</p>
            </div>
            <div>1000</div>
            <div>5</div>
            <div>5000</div>
        </div>
        <!-- ------------------------- -->
        <h2>總金額&nbsp&nbsp&nbspNT&nbsp10000</h2>
        <!-- ------------寄送資料------------- -->
        <div class="bg_gm_w_03">
            收件人資料
        </div>
        <form method="post" action="">
            <label for="name">姓名 :</label>
            <input type="text" name="name" id="userName" value="<?= $row['name'] ?>">
            <br>
            <label for="tel">電話 :</label>
            <input type="text" name="tel" id="tel" value="<?= $row['tel'] ?>">
            <br>
            <label for="address">地址 :</label>
            <input type="text" name="address" id="address" value="<?= $row['address'] ?>">
            <h4>寄送方式 : 貨到付款 (本會館只支援貨到付款,絕對不是因為工程師時間不夠)</h4>
            <input class="bg_gm_w_01" type="submit" value="確認訂購">
        </form>

        <a id="cancel" class="bg_gm_w_03" href="./index.php">取消</a>


    </main>


</body>

</html>