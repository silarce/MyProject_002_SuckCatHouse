<?php

$arrjso = $_COOKIE['order'];
$arr = json_decode($arrjso, true);

$id = "2";

$req = new newReq();

$req->productID = 2;
$req->price = 2000;
$req->quantity = 8;
$req->subtotal = 16000;

$jso = json_encode($req);
// echo $jso;

if ($arr) {
$arr[$id] = $jso;
} else {
    $arr = array($id => $jso);
}

$arrjso = json_encode($arr);
echo $arrjso;

// $jso = json_decode($jso);
// echo $jso->price;

setcookie('order',$arrjso);

// echo $arr['1'];



class newReq
{
    public  $productID;
    public  $price;
    public  $quantity;
    public  $subtotal;
}
