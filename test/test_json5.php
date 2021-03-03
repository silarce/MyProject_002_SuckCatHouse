<?php

if (@$_COOKIE['order']) {

    $arrjso = $_COOKIE['order'];
    $arr = json_decode($arrjso, true);
}


$id = "5";

$req = new newReq();

$req->productID = $id;
$req->price = 400;
$req->quantity = 5;
$req->subtotal = 2000;

$jso = json_encode($req);
// echo $jso;

if (@$arr) {
    $arr[$id] = $jso;
} else {
    $arr = array($id => $jso);
}

$arrjso = json_encode($arr);
echo $arrjso;

// $jso = json_decode($jso);
// echo $jso->price;

setcookie('order', $arrjso);

// echo $arr['3'];



class newReq
{
    public  $productID;
    public  $price;
    public  $quantity;
    public  $subtotal;
}
