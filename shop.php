<?php
$link = mysqli_connect('localhost', 'root', '', 'suckcathouse', 3306);
$result = mysqli_query($link, 'set names utf8');

$sql = <<< sql
SELECT * FROM `products`
sql;

$result = mysqli_query($link, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>實體商品</title>

    <link rel="stylesheet" href="./frames/bootstrap/css/bootstrap.min.css">
    <script src="./frames/jQuery/jquery.min.js"></script>
    <script src="./frames/popper.min.js"></script>
    <script src="./frames/bootstrap/js/bootstrap.min.js"></script>

    <!-- SAcss and SAjs -->
    <link rel="stylesheet" href="./SAcss/global_css.css">
    <link rel="stylesheet" href="./SAcss/shop_css.css">
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
            <div id="productGrid">
                <!-- --------一個卡片------------ -->
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>

                    <a class="pdCard bg_gm_w_01" href="http://localhost/suckCatHouse/productInfo.php?id=<?= $row['productID']?>">
                        <h4 class="bg_gm_w_03"><?= $row['pName'] ?></h4>
                        <img class="cardImg" src="<?= $row['imgSamplePath'] ?>" alt="圖片路徑錯誤">
                        <div class="cardDesc">
                            <pre>簡介: <br><?= $row['pDesc'] ?>
                        </pre>
                            <p class="bg_gm_w_03">
                                售價 : <?= $row['price'] ?> 元
                            </p>
                        </div>
                </a>

                <?php endwhile ?>
                <!-- --------一個卡片------------ -->


            </div>
        </section>


    </main>



</body>

</html>