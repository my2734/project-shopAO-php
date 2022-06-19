<section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Giỏ hàng</h1>

                                    </div>

                                    <hr class="my-4">
                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <h6>Ảnh</h6>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h6 class="text-black">Tên sản phẩm</h6>

                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <h6 class="text-black">Số lượng</h6>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h6 class="mb-0">Đơn giá</h6>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">

                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_SESSION['cart'])) {

                                        $sum_pro = 0;
                                        foreach ($_SESSION["cart"] as $key => $value) {
                                            $sum_pro = $sum_pro + $value["quatity"];


                                    ?>


                                            <hr class="my-4">
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="<?php echo $value["image"] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-black"><?php echo $value["pro_name"] ?></h6>

                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">

                                                    <input id="quantity_<?php echo $key ?>" min="0" name="quantity" onblur="update_cart(<?php echo $key ?>)" value="<?php echo $value["quatity"] ?>" type="text" class="form-control form-control-sm" />


                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0"><?php echo $value["pro_price"]   ?><u>đ</u></h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                                                </div>
                                            </div>
                                    <?php       }
                                    }
                                    ?>



                                    <hr class="my-4">

                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="./index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Trở về trang chủ</a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 bg-grey">
                                <div class="p-5">
                                    <a class="fw-bold mb-5 mt-2 pt-1" href="./index.php?page=history">Lịch sử mua hàng</a>
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Tổng tiền</h3>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase"><?php
                                                                    if (isset($_SESSION['cart'])) {
                                                                        echo $sum_pro;
                                                                    }
                                                                    ?> sản phẩm</h5>
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
                                            <div class="d-flex justify-content-between mb-5">
                                                <h6 class="" style="display: block; width: 120px;"><?php echo $value["pro_name"] ?></h6>
                                                <h6 style="display: block; width: 70px;"><?php echo $value["quatity"] ?></h6>
                                                <span style="margin-right: 20px;">x</span>
                                                <h6 style="display: block; width: 70px;"><?php echo $value["pro_price"] ?><u>đ</u></h6>
                                                <h6 style="display: block; width: 70px;"><?php echo $sum_detail ?><u>đ</u></h6>
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
                                    <a href="./index.php?page=dathang">
                                        <button type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Đặt hàng</button>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>