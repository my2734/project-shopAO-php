<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Stripped table <small>Stripped table subtitle</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>

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

                                <td><?php echo $row["pro_name"] ?></td>
                                <td><?php echo $row["pro_price"] ?></td>
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
                            <h5>Thanh toán <?php echo $sum ?>Đ </h5>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>
</div>