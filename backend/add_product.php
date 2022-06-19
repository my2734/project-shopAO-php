<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Tạo sản phẩm mới</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php
            if (isset($_POST["addPro"])) {
                $pro_name = $_POST["pro_name"];
                $pro_price = $_POST["pro_price"];
                $size_id = $_POST["size_id"];
                $quantity = $_POST["quantity"];
                // $image = $_POST["image"];
                $cat_id = $_POST["cat_id"];
                $pro_status = isset($_POST['pro_status']) ? 1 : 0;
                $description = $_POST["description"];
                $pro_date_create = date("Y-m-d H:i:s");

                $path = "uploads/";
                $fileName = "";
                if (isset($_FILES["image"])) {
                    if (isset($_FILES["image"]["name"])) {
                        if ($_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/png") {
                            if ($_FILES["image"]["size"] < 24000000) {
                                if ($_FILES['image']["error"] == 0) {
                                    if (move_uploaded_file($_FILES["image"]["tmp_name"], "../" . $path . $_FILES["image"]["name"])) {
                                        $fileName = $path . $_FILES["image"]["name"];
                                    } else echo "upload that bai";
                                } else echo "file co loi";
                            } else echo "Loi kich thuoc lon";
                        } else echo "Loi dinh dang";
                    }
                }
                $image = $fileName;
                // INSERT INTO `tbl_product` (`pro_id`, `pro_name`, `pro_price`, `size_id`, `quantity`, `image`, `cat_id`, `description`, `pro_status`, `pro_date_create`) 
                // VALUES (NULL, 'tee12', '12', '4', '12', '1212', '11', 'gdfgfg', '1', '2022-05-12 19:36:13.000000');
                $sql_insert_pro = "insert into tbl_product values('','$pro_name','$pro_price','$size_id','$quantity','$image','$cat_id','$description','$pro_status','$pro_date_create')";
                mysqli_query($conn, $sql_insert_pro) or die("Loi lenh update");
                header('localtion: ./index.php?page=product');
            }
            ?>
            <br>
            <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3" style="font-size: 16px;">Nhập tên sản phẩm</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" class="form-control" placeholder="" name="pro_name" id="pro_name">
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3" style="font-size: 16px;">Nhập giá</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="number" class="form-control" placeholder="" name="pro_price" id="pro_price">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 " style="font-size: 16px;">Size</label>
                    <div class="col-md-9 col-sm-9 ">
                        <select class="form-control" name="size_id" id="size_id">
                            <option>-- Chọn kích cỡ --</option>
                            <?php
                            $sql_select_size = "select * from tbl_size";
                            $i = 0;
                            $result_select_size = mysqli_query($conn, $sql_select_size);
                            if (mysqli_num_rows($result_select_size) > 0) {
                                while ($row = mysqli_fetch_assoc($result_select_size)) {
                                    $i++ ?>
                                    <option value="<?php echo $row["size_id"] ?>"><?php echo $row["size_name"] ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3" style="font-size: 16px;">Nhập số lượng</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="number" class="form-control" placeholder="" name="quantity" id="quantity">
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3" style="font-size: 16px;">Ảnh</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="file" class="" name="image" id="image" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 " style="font-size: 16px;">Danh mục</label>
                    <div class="col-md-9 col-sm-9 ">
                        <select class="form-control" name="cat_id" id="cat_id">
                            <option>-- Chọn danh mục --</option>

                            <?php
                            $sql_select_cat = "select * from tbl_category";
                            $i = 0;
                            $result_select_pro = mysqli_query($conn, $sql_select_cat);
                            if (mysqli_num_rows($result_select_pro) > 0) {
                                while ($row = mysqli_fetch_assoc($result_select_pro)) {
                                    $i++ ?>

                                    <option value="<?php echo $row["cat_id"] ?>"><?php echo $row["cat_name"] ?></option>

                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9 form-group has-feedback">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="1" name="pro_status" id="status"> Ẩn/Hiện danh mục
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3" style="font-size: 16px;">Mô tả sản phẩm</label>
                    <div class="col-md-9">
                        <textarea id="message" required="required" class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <button type="button" class="btn btn-primary">Cancel</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button type="submit" class="btn btn-success" name="addPro" onclick="return alert('Thêm mới sản phẩm thành công!!!')">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>