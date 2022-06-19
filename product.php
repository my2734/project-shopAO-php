<div class="row">
    <?php
    if (isset($_GET['id'])) {
        $cat_id = $_GET["id"];
        $sql_select_pro = "select * from tbl_product where cat_id = '$cat_id'";
        $result_select_pro = mysqli_query($conn, $sql_select_pro);
        if (mysqli_num_rows($result_select_cat) > 0) {
            while ($rowPro = mysqli_fetch_assoc($result_select_pro)) {
    ?>
                <div class="col-md-3 col-sm-6 col-12 mb-4 display-block">
                    <div class="card card-product">
                        <a href="./index.php?page=detailtPro&id=<?php echo $rowPro["pro_id"] ?>" class="relative item__sale">
                            <img class="display__not-none" src="<?php echo $rowPro["image"] ?>" class="" alt="...">
                            <img class="display_none" src="<?php echo $rowPro["image"] ?>" alt="">
                        </a>
                        <div class="card-body">
                            <a href="./index.php?page=detailtPro&id=<?php echo $rowPro["pro_id"] ?>" class="card-name">
                                <h5 class="card-title text-uppercase"><?php echo $rowPro["pro_name"] ?></h5>
                            </a>
                            <p style="color: red"><?php echo $rowPro["pro_price"] ?><u>đ</u> <strike style="color: rgb(160, 154, 154)">350.000 <u>đ</u></strike> </p>
                            <a href="./index.php?page=detailtPro&id=<?php echo $rowPro["pro_id"] ?>" class="btn btn-primary">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
    <?php }
        }
    } ?>
</div>