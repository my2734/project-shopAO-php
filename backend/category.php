<div class="col-md-5 ">
    <div class="x_panel">
        <?php
        //them data moi vao danh muc
        if (isset($_POST['addNew'])) {
            $cat_name = $_POST["cat_name"];
            $status = isset($_POST['status']) ? 1 : 0;
            $date_create = date("Y-m-d H:i:s");
            if (isset($_GET["id"])) { //cap nhat danh muc
                $cat_id = $_GET["id"];
                $sql_update_cat = "UPDATE tbl_category SET cat_name = '$cat_name', status ='$status'  WHERE cat_id='$cat_id'";
                mysqli_query($conn, $sql_update_cat) or die("Loi cau lenh update");
            } else { //them moi danh muc
                $sql_insert_cat = "insert into tbl_category values('','$cat_name','$status','$date_create')";
                mysqli_query($conn, $sql_insert_cat) or die("Loi cau lenh");
            }
            header('localtion: index.php');
        }

        if (isset($_GET['id']) && isset($_GET["del"])) {
            $cat_id = $_GET["id"];
            $sql_delete_cat = "delete from tbl_category where cat_id = '$cat_id'";
            $result = mysqli_query($conn, $sql_delete_cat) or die("loi lenh xoa danh muc");
            header('localtion: index.php');
        }

        //kiem tra id có trên url 
        $cat_name = "";
        if (isset($_GET["id"]) && isset($_GET["ins"])) {
            $cat_id = $_GET["id"];
            $sqlEdit = "select * from tbl_category where cat_id = '$cat_id'";
            $resultEdit = mysqli_query($conn, $sqlEdit) or die("Loi cau lenh edit");
            $rowEdit = mysqli_fetch_assoc($resultEdit);
            $cat_name = $rowEdit["cat_name"];
            $status = ($rowEdit['status']) ? true : false;
        }

        ?>


        <div class="x_content">
            <div class="x_title">
                <h2>Tạo danh mục mới</h2>

                <div class="clearfix"></div>
            </div>
            <form class="form-label-left input_mask" method="POST">

                <div class="col-md-12 col-sm-12  form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left" value="<?php echo $cat_name ?>" id="inputSuccess2" name="cat_name" id="cat_name" required placeholder="Tên danh mục">
                </div>
                <div class="col-md-12 col-sm-12  form-group has-feedback">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="status" id="status"> Ẩn/Hiện danh mục
                        </label>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group row">
                    <div class="col-md-9 col-sm-9  offset-md-3">
                        <button type="submit" class="btn btn-success" name="addNew">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>



</div>


<div class="col-md-7 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh các danh mục</h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table class="table">
                <thead>
                    <tr>

                        <th>ID</th>
                        <th>Tên Danh mục</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Cập nhật </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_select_cat = "SELECT * FROM tbl_category";
                    $result = mysqli_query($conn, $sql_select_cat) or die("Loi cau lenh");
                    $i = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                    ?>
                            <tr>

                                <td><?php echo $i; ?></td>
                                <td> <?php echo $row["cat_name"]; ?></td>
                                <td><?php
                                    if ($row["status"] == 1) {
                                        echo "Hiển thị";
                                    } else echo "Ẩn";
                                    ?></td>
                                <td><?php echo date("d-m-Y H:i:s", strtotime($row["date_create"])); ?>
                                <td>
                                    <a href="index.php?page=category&id=<?php echo $row["cat_id"]; ?>&ins=1">
                                        <i class="fa fa-pencil-square-o"></i>Sửa
                                    </a>
                                    <a href="index.php?page=category&id=<?php echo $row["cat_id"]; ?>&del=1" onclick="return confirm('Bạn chắc chắn xóa danh mục này?')">
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