<?php
// 方案A
// 產生一個關聯式陣列備用
// 每個商品頁面點擊加入購物車都會產生一個json
// json記錄了產品的ID、售價、數量、小計
// 然後將json放進陣列中
// 陣列再存進COOKIE備用
// 到下一個商品頁面產生json後
// 提取COOKIE中的陣列，並把這一次的json存進陣列
// 再把陣列存進去COOKIE
// 結帳時再將陣列中的json一個一個取出還原並提取商品資料



// 中文轉成json會變成亂碼
// 雖然GOOGLE說可以用urlencode()處理，但怎樣都弄不好
// 先擱著
// urlencode()

// $req = new newReq();

// $req-> productID = 1;
// $req-> pName = urlencode("喵喵天國");
// $req-> price = 1500;
// $req-> quantity = 5;
// $req-> subtotal = 7500;

// $jso = json_encode($req);
// echo $jso;
// echo "<br>";
// $dejso = json_decode($jso, true);
// $dejso['pName'] = urlencode($dejso['pName']);
// echo $dejso['pName'];


// class newReq{
// public  $productID;
// public  $pName;
// public  $price;
// public  $quantity;
// public  $subtotal;
// }

$id = '1';

$req = new newReq();

$req-> productID = 1;
$req-> price = 1500;
$req-> quantity = 5;
$req-> subtotal = 7500;

$jso = json_encode($req);
echo $jso;

$arr = array($id => $jso);

$arrjso = json_encode($arr);
echo $arrjso;

// $jso = json_decode($jso);
// echo $jso->price;

setcookie('order',$arrjso);




class newReq{
public  $productID;
public  $price;
public  $quantity;
public  $subtotal;
}
