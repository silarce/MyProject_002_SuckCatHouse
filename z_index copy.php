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
  <title>Index</title>

  <link rel="stylesheet" href="./frames/bootstrap/css/bootstrap.min.css">
  <script src="./frames/jQuery/jquery.min.js"></script>
  <script src="./frames/popper.min.js"></script>
  <script src="./frames/bootstrap/js/bootstrap.min.js"></script>


  <!-- SAcss and SAjs -->
  <link rel="stylesheet" href="./SAcss/global_css.css">
  <link rel="stylesheet" href="./SAcss/index_css.css">

</head>

<body class="bg_brb_lg">
  <main class="bg_gm_w_03">
    <nav>
      <!-- 要使iframe背景透明時加入這個屬性 -->
      <!--allowtransparency="true"-->
      <iframe id="navBar" src="navbar.html" frameborder="0"></iframe>
    </nav>

    <header id="hero" class="">
      <!-- 以下全是BS的東西 -->
      <div id="demo" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
          <div  class="heroImage carousel-item active">
            <img id="hero1" src="./img/theCats/Aurora/Aurora_005.jpg">
          </div>
          <div  class="heroImage carousel-item">
            <img id="hero2" src="./img/theCats/Venus/Venus_018.jpg">
          </div>
          <div  class="heroImage carousel-item">
            <img id="hero3" src="./img/theCats/Messi/Messi_009.jpg">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </header>
    <!-- 以上全是BS的東西 -->
    <section id="section1" class="grid_12">
      <div class="">
        <div>
          <h1>吸貓</h1>
          <h2>是一種解放</h2>
        </div>
        <p>
          吸吧吸吧吸吧吸吧吸吧吸吧吸吧 <br>
          吸吧吸吧吸吧吸吧吸吧 <br>
          吸吧吸吧吸吧
        </p>
      </div>
      <div class="">
        <img src="./img/img_index/0001.jpg" alt="">
      </div>
    </section>

    <section id="section2" class="grid_12">
      <h1>吸貓是什麼?</h1>
      <div>
        <div class="bg_gm_w_01">
          <h3>
            吸貓是一種
          </h3>
          <h1>美德</h1>
          <pre>
美德美德美德美德
美德美德
美德美德美德美德美德
美德美德美德美德美德
美德美德
          </pre>
        </div>
        <div class="bg_gm_w_01">
          <h3>
            吸貓是一種
          </h3>
          <h1>美德</h1>
          <pre>
美德美德美德美德
美德美德
美德美德美德美德美德
美德美德美德美德美德
美德美德
          </pre>
        </div>
        <div class="bg_gm_w_01">
          <h3>
            吸貓是一種
          </h3>
          <h1>美德</h1>
          <pre>
美德美德美德美德
美德美德
美德美德美德美德美德
美德美德美德美德美德
美德美德
          </pre>
        </div>
      </div>

    </section>

    <article id="imgGrid_ctn">
      <h1>人氣貓咪</h1>
      <iframe id="imgGrid" src="./imgGrid.html" frameborder="0"></iframe>
    </article>

    <article id="product_cards">
      <h1>貓咪紀錄片</h1>

      <div id="cards_ctn">
        <div class="cards bg_gm_w_01">
          <img src="./img/SoftNyanko/cover/NYAN-004.jpg" alt="">
          <h4>特選乱れ猫撫で狂い弐拾連発特選乱れ猫撫で狂い弐拾連発特選乱れ猫撫で狂い弐拾連発</h4>
        </div>
        <div class="cards bg_gm_w_01">
          <img src="./img/SoftNyanko/cover/NYAN-004.jpg" alt="">
          <h4>特選乱れ猫撫で狂い弐拾連発</h4>
        </div>
        <div class="cards bg_gm_w_01">
          <img src="./img/SoftNyanko/cover/NYAN-004.jpg" alt="">
          <h4>特選乱れ猫撫で狂い弐拾連発</h4>
        </div>
        <div class="cards bg_gm_w_01">
          <img src="./img/SoftNyanko/cover/NYAN-004.jpg" alt="">
          <h4>特選乱れ猫撫で狂い弐拾連発</h4>
        </div>
        <div class="cards bg_gm_w_01">
          <img src="./img/SoftNyanko/cover/NYAN-004.jpg" alt="">
          <h4>特選乱れ猫撫で狂い弐拾連発</h4>
        </div>
        <div class="cards bg_gm_w_01">
          <img src="./img/SoftNyanko/cover/NYAN-004.jpg" alt="">
          <h4>特選乱れ猫撫で狂い弐拾連発</h4>
        </div>
      </div>

    </article>






  </main>

</body>

</html>