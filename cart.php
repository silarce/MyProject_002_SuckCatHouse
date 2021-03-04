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
// ------------------------
// 提取會員資料
$sql = <<< aaa
SELECT * FROM `members`
where name = '{$_COOKIE['houseMember']}'
aaa;
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

// ------------------------------
// 清空購物車
if (isset($_POST['emptyCart'])) {
    setcookie('cart', '', time() - 60 * 60 * 24);

    header('location: ./cart.php');
}



// 用foreach將陣列的key與值取出
// 以key為變數名稱，將值decode賦值進該變數，也就是
// $key = json_decode(值)
// 這樣就能得到原本的物件

// 再用
// $result = mysqli_query($link, $sql);
// $row = mysqli_fetch_assoc($result);
// 提取商品圖片路徑與商品名稱

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
        <!-- ----------------------------- -->
        <!-- PHP -->
        <?php

        // 如果餅乾cart存在，則先解碼餅乾的json
        if (@$_COOKIE['cart']) {
            $arrjso = $_COOKIE['cart'];
            $arr = json_decode($arrjso, true);


            foreach ($arr as $key => $val) {
                $key = json_decode($val);
                // echo $key->productID;
                // echo "<br>";
                // echo $key->price;
                // echo "<br>";
                // echo $key->quantity;
                // echo "<br>";
                // echo $key->subtotal;

                $sql = <<<aaa
    SELECT * FROM `products`
    where productID = $key->productID
    aaa;
                $result = mysqli_query($link, $sql);
                $row3 = mysqli_fetch_assoc($result);

                @$total = $total + $key->subtotal;

                // -------------------生成HTML
                echo <<< aaa
        <div class="cartList bg_gm_w_01">
            <img src="{$row3['imgPath']}" alt="">
            <div>
                <p>{$row3['pName']}</p>
            </div>
            <div>$key->price</div>
            <div>$key->quantity</div>
            <div>$key->subtotal</div>
        </div>
        <h2>總金額&nbsp&nbsp&nbspNT&nbsp<?= @$total ?></h2>
aaa;
            }
        } elseif ($_GET['id']) {
            $id = $_GET['id'];
            echo "<h3 id='orderDone'>訂單已完成，您的訂單號碼為$id</h3>";
        } else {
            echo "<h2 id = 'cartEmpted'>購物車是空的</h2>";
        }

        ?>

        <!-- PHP -->
        <!-- --------------------------------- -->



        <!-- ------------寄送資料------------- -->
        <div class="bg_gm_w_03">
            收件人資料
        </div>
        <form method="post" action="">
            <label for="recipient">收件者姓名 :</label>
            <input type="text" name="recipient" id="recipient" value="<?= $row['name'] ?>">
            <br>
            <label for="tel">收件者電話 :</label>
            <input type="text" name="reTel" id="reTel" value="<?= $row['tel'] ?>">
            <br>
            <label for="address">收件地址 :</label>
            <input type="text" name="reAddress" id="reAddress" value="<?= $row['address'] ?>">
            <h4>寄送方式 : 貨到付款 (本會館只支援貨到付款)</h4>
            <!-- 取消鍵 -->
            <a id="continueBuy" class="bg_gm_w_03" href="./shop.php">繼續購物</a>
            <!-- 取消鍵 -->
            <?php if (@$_COOKIE['cart']) { ?>
                <input class="bg_gm_w_01" id="toOrder" name="toOrder" type="submit" value="確認訂購">
            <?php } ?>

            <?php
            if (@$_COOKIE['cart']) {
                echo <<<aaa
            <input class="bg_gm_w_01" id="emptyCart" name="emptyCart" type="submit" value="清空購物車">
            aaa;
            } else {
                echo <<< aaa
            <a id="toIndex" class="bg_gm_w_03" href="./index.php">回首頁</a>
            aaa;
            }
            ?>


        </form>
        <?php
        // ------------------------------------
        // 下訂單的PHP

        if (isset($_POST['toOrder'])) {

            $sql = <<< aaa
    INSERT INTO orders
    (memberID, recipient, reTel, reAddress, orderInfo, payable, name)
    value
    ({$row['memberID']}, '{$_POST['recipient']}', '{$_POST['reTel']}', '{$_POST['reAddress']}', '{$arrjso}', '{$total}', '{$row['name']}')
aaa;
            mysqli_query($link, $sql);
// ------------------------------
            $sql = <<< aaa
    SELECT * FROM `orders`
    order by orderID DESC
    LIMIT 0, 1
aaa;
            $result = mysqli_query($link, $sql);
            $row4 = mysqli_fetch_assoc($result);

            setcookie('cart', '', time() - 60 * 60 * 24);
            header("location: ./cart.php?id={$row4['orderID']}");
        }
        ?>


    </main>


</body>

</html>