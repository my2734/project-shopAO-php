<?php
include("./connection.php");
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "./header.php";
?>

<body>
  <!-- header_nabbar -->
  <?php include "./header_navbar.php"; ?>

  <div class="container mt-120">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-12">
        <div class="form__dangnhap pt40">
          <h2 class="form__name">Tạo tài khoản</h2>
          <?php
          if (isset($_POST["addUser"])) {
            $user_name = $_POST["user_name"];
            $user_email = trim($_POST["user_email"]);
            $user_password = trim($_POST["user_password"]);
            $user_phone = $_POST["user_phone"];
            $user_adress = $_POST["user_adress"];
            $user_status = 1;
            $user_create_date = date("Y-m-d H:i:s");

            var_dump($user_create_date);

            $sql = "insert into user values('','$user_name','$user_email','$user_password','$user_phone','$user_adress','$user_status','$user_create_date')";
            $result_insert_user = mysqli_query($conn, $sql) or die("Loi cau lenh");
            $row = mysqli_fetch_assoc($result_insert_user);

            header("location: ./dangnhap.php");
          }
          ?>
          <form method="POST" class="form__dangnhap">
            <input class="input__common" type="text" id="user_name" name="user_name" placeholder="Họ và tên"><br>
            <input class="input__common" type="email" id="user_email" name="user_email" placeholder="Email"><br>
            <input class="input__common" type="password" id="user_password" name="user_password" placeholder="Mật khẩu"><br>
            <input class="input__common" type="text" id="user_phone" name="user_phone" placeholder="Số điện thoại"><br>
            <input class="input__common" type="text" id="user_adress" name="user_adress" placeholder="Địa chỉ"><br>

            <div class="button__cover">
              <button class="form__button" type="submit" name="addUser">Đăng ký</button>
            </div>
          </form>
          <p class="link__dangky">hoặc <a href="./index.html">Quay lại trang chủ</a></p>
        </div>
      </div>
    </div>
  </div>

  <?php include "./footer.php"; ?>