<?php
ob_start();
session_start();
include("./connection.php");
if (isset($_POST["id"]) && isset($_POST["number"])) {
    $id = $_POST["id"];
    $num = $_POST["number"];
    $sql_select_detailt = "select p.*,size_name from tbl_size as s, tbl_product p where s.size_id=p.size_id and pro_id='$id'";
    $result_select_detailt = mysqli_query($conn, $sql_select_detailt) or die("Loi cau lenh select product");
    $row_select_detailt = mysqli_fetch_assoc($result_select_detailt);
    echo $id;
    if (!isset($_SESSION["cart"])) {
        $cart = array(
            $id => array(
                'pro_name' => $row_select_detailt["pro_name"],
                'pro_price' => $row_select_detailt["pro_price"],
                'image' => $row_select_detailt["image"],
                'size_name' => $row_select_detailt["size_name"],
                'quatity' => $num
            )
        );
    } else {
        $cart = $_SESSION['cart'];
        if (array_key_exists($id, $cart)) {
            $cart[$id] = array(
                'pro_name' => $row_select_detailt["pro_name"],
                'pro_price' => $row_select_detailt["pro_price"],
                'image' => $row_select_detailt["image"],
                'size_name' => $row_select_detailt["size_name"],
                'quatity' => $cart[$id]["quatity"] + $num
            );
        } else {
            $cart[$id] = array(
                'pro_name' => $row_select_detailt["pro_name"],
                'pro_price' => $row_select_detailt["pro_price"],
                'image' => $row_select_detailt["image"],
                'size_name' => $row_select_detailt["size_name"],
                'quatity' => $num
            );
        }
    }

    $_SESSION['cart'] = $cart;
    echo "<prE>";
    print_r($_SESSION['cart']);
}
