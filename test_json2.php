<?php

$info1 = new newInfo();

$info1->price = 1000;
$info1->qua = 5;

$id1 = new newID();
$id1->pID =1;
$id1->info = $info1;

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

// 以下方案B
// 在每個商品頁面點擊加入購物車都會產生一個json並存入COOKIE
// json記錄了產品的ID、售價、數量、小計
// 在下一個產品頁面點加入購物車時，同樣會生一個json
// 然後與提取COOKIE中的json並與之串聯
// 串聯時要加入分隔符號"---"
// 最後結帳時，利用explode()將一長串的json字串分割並存入陣列
// 再用陣列方法將json一個一個叫出來然後還原成php 物件
// 再提取其中關於商品的資料

$id1 = json_encode($id1);
echo $id1;

// $id1 = $id1."---".$id1."---"."last";
// $arr = explode("---", $id1);
// echo $arr[2];



// $jso =  JSON.parse($id1);


class newID{
    public $pID;
    public $info;
}

class newInfo{
public $price;
public $qua;
}


?>