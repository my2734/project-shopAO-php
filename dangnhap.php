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
          <h2 class="form__name">Đăng nhập</h2>
          <?php
          if (isset($_POST["dangNhap"])) {
            $user_email = trim($_POST['user_email']);
            $user_password = trim($_POST['user_password']);
            $sql = "select * from user where user_email = '$user_email' and user_password = '$user_password' ";
            $result_select_login = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result_select_login);
            if (isset($row['user_email'])) {
              $_SESSION['user'] = $row;
              header("location: ./index.php");
            }
          }
          ?>
          <form method="POST">
            <input class="input__common" type="user_email" id="user_email" name="user_email" <?php
                                                                                              if (isset($_SESSION['user'])) { ?> value="<?php echo $_SESSION['user']['user_email']; ?>" <?php
                                                                                                                                                                                      }
                                                                                                                                                                                        ?> placeholder="Email"><br>
            <input class="input__common" type="password" id="user_password" name="user_password" placeholder="Mật khẩu"><br>
            <div class="button__cover">
              <button class="form__button" type="submit" name="dangNhap">Đăng nhập</button>
            </div>
          </form>
          <p class="link__dangky">hoặc <a href="./dangky.php">Đăng ký</a></p>
        </div>
      </div>
    </div>
  </div>

  <?php include "./footer.php"; ?>