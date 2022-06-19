<?php
if (!$_SESSION["user"]) {
    header("location: ./dangnhap.php");
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>

<section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Đặt hàng</h1>
                                    </div>
                                    <?php
                                    if (isset($_POST["addOrder"])) {
                                        $user_id = $_SESSION["user"]["user_id"];
                                        $user_name =  $_POST["user_name"];
                                        $user_adress = $_POST["user_adress"];
                                        $user_phone = $_POST["user_phone"];
                                        $order_status = 1;
                                        $order_date_create = date("Y-m-d");


                                        $sql_insert_order = "INSERT INTO tbl_order values('','$user_id','$user_name','$user_adress','$user_phone','$order_status','$order_date_create')";
                                        $result = mysqli_query($conn, $sql_insert_order) or die("Loi lenh insert");


                                        $order_id1 = mysqli_insert_id($conn);
                                        if (isset($_SESSION['cart'])) {
                                            foreach ($_SESSION["cart"] as $key => $value) {
                                                $order_id = $order_id1;
                                                $pro_id = $key;
                                                $pro_name = $value["pro_name"];
                                                $image = $value["image"];
                                                $pro_price = $value["pro_price"];
                                                $quantity = $value["quatity"];
                                                $detail_date_create = date("Y-m-d H:i:s");


                                                $sql_insert_detail = "INSERT INTO tbl_order_detail values('','$order_id','$pro_id','$pro_name','$image','$pro_price','$quantity','$detail_date_create')";
                                                $result_insert_detail = mysqli_query($conn, $sql_insert_detail) or die("Loi lenh insert detail");
                                            }
                                        }

                                        $sql_select_user = "select * from user where user_id = '$user_id'";
                                        $result_select_user = mysqli_query($conn, $sql_select_user);
                                        $row = mysqli_fetch_assoc($result_select_user);

                                        $_SESSION["cart"] = [];
                                        header("location: index.php?page=history");
                                    }
                                    ?>
                                    <form method="POST" class="form__dangnhap bg-black">
                                        <input class="input__common" type="text" id="user_name" value="<?php echo $_SESSION["user"]["user_name"] ?>" name="user_name" placeholder="Họ và tên"><br>
                                        <input class="input__common" type="text" id="user_phone" value="<?php echo $_SESSION["user"]["user_phone"] ?>" name="user_phone" placeholder="Số điện thoại"><br>
                                        <input class="input__common" type="text" id="user_adress" value="<?php echo $_SESSION["user"]["user_adress"] ?>" name="user_adress" placeholder="Địa chỉ"><br>

                                        <div class="button__cover">
                                            <button class="form__button" type="submit" name="addOrder">Đặt hàng</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Tổng tiền</h3>



                                    <div class="d-flex justify-content-between mb-5">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <h6>Ảnh</h6>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2">
                                            <h6>Số lượng</h6>
                                        </div>

                                        <div class="col-md-3 col-lg-2 col-xl-2">
                                            <h6>Đơn giá</h6>
                                        </div>
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <h6>Thành tiền</h6>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_SESSION['cart'])) {
                                        $total = 0;
                                        $sum_pro = 0;
                                        $sum_detail = 0;
                                        foreach ($_SESSION["cart"] as $key => $value) {
                                            $sum_pro = $sum_pro + $value["quatity"];
                                            $sum_detail = $value["quatity"] * $value["pro_price"];
                                            $total = $total + $sum_detail;


                                    ?>

                                            <hr class="my-4">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="<?php echo $value["image"] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <h6 style="display: block; width: 70px;"><?php echo $value["quatity"] ?></h6>
                                                </div>

                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <h6 style="display: block; width: 70px;"><?php echo $value["pro_price"] ?><u>đ</u></h6>
                                                </div>
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <h6 style="display: block; width: 70px;"><?php echo $sum_detail ?><u>đ</u></h6>
                                                </div>
                                            </div>
                                    <?php }
                                    } ?>

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Tổng tiền</h5>
                                        <h5><?php
                                            if (isset($_SESSION['cart'])) {
                                                echo $total;
                                            }
                                            ?><u>đ</u></h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>