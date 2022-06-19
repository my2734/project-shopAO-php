<div class="col-md-12 col-sm-12  " style="background-color: #fff !important;border-radius: 5px !important;padding-bottom: 100px !important;box-shadow: 0 10px 10px rgb(0 0 0 / 30%) !important;">
    <div class="x_panel">
        <div class="x_title">

            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET["order_id"])) {

                        $order_id = $_GET["order_id"];
                        $i = 0;
                        $sum = 0;
                        $sql_select_detail = "select * from tbl_order_detail where order_id = '$order_id' ";
                        $result_select_detail = mysqli_query($conn, $sql_select_detail);
                        while ($row  = mysqli_fetch_assoc($result_select_detail)) {
                            $sum = $sum + $row["pro_price"] * $row["quantity"];
                            $i = $i + 1; ?>
                            <tr>
                                <th scope="row"><?php echo $i ?></th>

                                <td style="width: 20px;"><img src="<?php echo $row["image"] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt"></td>
                                <td><?php echo $row["pro_name"] ?></td>
                                <td><?php echo $row["pro_price"] ?>đ</td>
                                <td><?php echo $row["quantity"] ?></td>
                            </tr>
                    <?php }
                    }
                    ?>
                    <tr>
                        <th></th>
                        <td></td>
                        <td></td>
                        <td colspan="2">
                            <h5>Thanh toán <?php echo $sum ?>đ </h5>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>
</div>