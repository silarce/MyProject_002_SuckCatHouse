<?php
$link = mysqli_connect('localhost', 'root', '', 'suckcathouse',3306);
$result = mysqli_query($link, 'set names utf8');
$id = $_GET['id'];

$sql = <<<command
SELECT * FROM `cats`
where catID = $id
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
    <title>The Cats</title>

    <link rel="stylesheet" href="./frames/bootstrap/css/bootstrap.min.css">
    <script src="./frames/jQuery/jquery.min.js"></script>
    <script src="./frames/popper.min.js"></script>
    <script src="./frames/bootstrap/js/bootstrap.min.js"></script>

    <!-- SAcss and SAjs -->
    <link rel="stylesheet" href="./SAcss/global_css.css">
    <link rel="stylesheet" href="./SAcss/theCats_css.css">
</head>

<body class="bg_brb_lg">
    <main class="bg_gm_w_03">
        <nav>
            <iframe id="navBar" src="navbar.html" frameborder="0"></iframe>
        </nav>
        <section id="section1" class="grid_12">

            <h1 id="catName"><?= $row['catName'] ?></h1>

            <div id="catInfo">
                <!-- <h6>品種 :<br>性別 :<br>毛色 :<br>肉球色 :</h6> -->
                <ul>
                    <li>品種 :
                        <p><?= $row['breed'] ?></p>
                    </li>
                    <li>性別 :
                        <p><?= $row['sex'] ?></p>
                    </li>
                    <li>毛色 :
                        <p><?= $row['furColor'] ?></p>
                    </li>
                    <li>肉球色 :
                        <p><?= $row['pawColor'] ?></p>
                    </li>
                </ul>
          
                
            </div>
            <p id="catDesc">
            <?= $row['catDesc'] ?>
            </p>

            <div id="catImg" class="">
                <img src="<?= $row['coverImgPath']?>" alt="">
            </div>
        </section>
    </main>
</body>

</html>