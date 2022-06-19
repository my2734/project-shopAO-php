<div class="col-md-5 ">
    <div class="x_panel">
        <?php
        //them data moi vao danh muc
        if (isset($_POST['size_addNew'])) {
            $size_name = trim($_POST["size_name"]);
            $size_status = isset($_POST['size_status']) ? 1 : 0;
            $size_date_create = date("Y-m-d H:i:s");
            var_dump($size_status);
            if (isset($_GET["id"])) { //cap nhat danh muc
                $size_id = $_GET["id"];
                $sql_update_size = "UPDATE tbl_size SET size_name = '$size_name', size_status ='$size_status'  WHERE size_id='$size_id'";
                mysqli_query($conn, $sql_update_size) or die("Loi cau lenh update");
            } else { //them moi danh muc
                $sql_insert_cat = "insert into tbl_size values('','$size_name','$size_status','$size_date_create')";
                mysqli_query($conn, $sql_insert_cat) or die("Loi cau lenh");
            }
            header('localtion: index.php');
        }

        if (isset($_GET['id']) && isset($_GET["del"])) {
            $size_id = $_GET["id"];
            $sql_delete_size = "delete from tbl_size where size_id = '$size_id'";
            $result = mysqli_query($conn, $sql_delete_size) or die("loi lenh xoa danh muc");
            header('localtion: index.php');
        }

        //kiem tra id có trên url 
        $size_name = "";
        if (isset($_GET["id"]) && isset($_GET["ins"]) == 1) {
            $size_id = $_GET["id"];
            $sqlEdit = "select * from tbl_size where size_id = '$size_id'";
            $resultEdit = mysqli_query($conn, $sqlEdit) or die("Loi cau lenh edit ");
            $rowEdit = mysqli_fetch_assoc($resultEdit);
            $size_name = $rowEdit["size_name"];
        }

        ?>


        <div class="x_content">
            <div class="x_title">
                <h2>Tạo kích cỡ mới</h2>

                <div class="clearfix"></div>
            </div>
            <form class="form-label-left input_mask" method="POST">

                <div class="col-md-12 col-sm-12  form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left" value="<?php echo $size_name; ?>" name="size_name" id="size_name" required placeholder="Tên danh mục">
                </div>
                <div class="col-md-12 col-sm-12  form-group has-feedback">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="size_status" id="size_status"> Ẩn/Hiện kích cỡ
                        </label>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group row">
                    <div class="col-md-9 col-sm-9  offset-md-3">
                        <button type="submit" class="btn btn-success" name="size_addNew">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>



</div>


<div class="col-md-7 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh các kích cỡ</h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table class="table">
                <thead>
                    <tr>

                        <th>ID</th>
                        <th>Tên Kích cỡc</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Cập nhật </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_select_size = "SELECT * FROM tbl_size";
                    $result = mysqli_query($conn, $sql_select_size) or die("Loi cau lenh");
                    $i = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                    ?>
                            <tr>

                                <td><?php echo $i; ?></td>
                                <td> <?php echo $row["size_name"]; ?></td>
                                <td><?php
                                    if ($row["size_status"] == 1) {
                                        echo "Hiển thị";
                                    } else echo "Ẩn";
                                    ?></td>
                                <td><?php echo date("d-m-Y H:i:s", strtotime($row["size_date_create"])); ?>
                                <td>
                                    <a href="index.php?page=size&id=<?php echo $row["size_id"]; ?>&ins=1">
                                        <i class="fa fa-pencil-square-o"></i>Sửa
                                    </a>
                                    <a href="index.php?page=size&id=<?php echo $row["size_id"]; ?>&del=1">
                                        <i class=" fa fa-trash"></i>Xóa
                                    </a>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>