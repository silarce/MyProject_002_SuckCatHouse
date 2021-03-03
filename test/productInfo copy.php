<?php
$link = mysqli_connect('localhost', 'root', '', 'suckcathouse',3306);
$result = mysqli_query($link, 'set names utf8');
$id = $_GET['id'];

$sql = <<<command
SELECT * FROM `products`
where productID = $id
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
    <title>商品明細</title>

    <link rel="stylesheet" href="./frames/bootstrap/css/bootstrap.min.css">
    <script src="./frames/jQuery/jquery.min.js"></script>
    <script src="./frames/popper.min.js"></script>
    <script src="./frames/bootstrap/js/bootstrap.min.js"></script>
    <script src="./img/svg/font_awson.js" crossorigin="anonymous"></script>
    <!-- SAcss and SAjs -->
    <link rel="stylesheet" href="./SAcss/global_css.css">
    <link rel="stylesheet" href="./SAcss/productInfo_css.css">


</head>

<body class="bg_brb_lg">
    <main class="bg_gm_w_03">
        <nav>
            <iframe id="navBar" src="navbar.html" frameborder="0"></iframe>
        </nav>

        <section id="mainGrid">
            <div id="productType">
                <h2>商品項目</h2>
                <ul>
                    <li>貓咪紀錄片</li>
                    <li>貓咪毛包</li>
                </ul>
            </div>
            <div id="productImg" class="bg_gm_w_01">
                <h5><?=$row['pNum']?></h5>
                <h1><?=$row['pName']?></h1>
                <img src="<?=$row['imgPath']?>" alt="">
                <pre><?=$row['pDesc']?></pre>
            </div>
            <div>
                <div id="productInfo">
                    <p>產品名稱 :</p>
                    <p><?=$row['pName']?></p>

                    <p>產品編號 :</p>
                    <p><?=$row['pNum']?></p>

                    <p>發行公司 :</p>
                    <p><?=$row['sup']?></p>

                    <p>主要演員 :</p>
                    <p><?=$row['actor']?></p>


                </div>

                <div id="price">
                    <p>售價 : <?=$row['price']?>元</p>
                    <span>訂購 :</span>
                    <form action="">
                        <div>
                            <div id="order">
                                <div class="bg_gm_w_03"><i class="fas fa-minus"></i></div>
                                <input class="bg_gm_w_03" id="orderNum" type="text" value="1">
                                <div class="bg_gm_w_03"><i class="fas fa-plus"></i></div>
                            </div>
                        </div>
                        <input id="toCart" name="toCart" class="bg_gm_w_03" type="submit" value="放進購物車">
                        <input id="toBuy" name="toBuy" class="bg_gm_w_03" type="submit" value="立即購買">
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script>
        // 功能:增減商品數量
        const oNum = document.querySelector('#orderNum');
        const oMinu = document.querySelector('#order div:nth-of-type(1)');
        const oAdd = document.querySelector('#order div:nth-of-type(2)');

        // let a = parseInt(oNum.value);

        oAdd.addEventListener('click', function () {
            let a = parseInt(oNum.value)
            a += 1
            oNum.value = a;
        });
        oMinu.addEventListener('click', function () {
            let a = parseInt(oNum.value)
            if (a > 1) {
                a -= 1
                oNum.value = a;
            }
        });

    </script>

</body>

</html>