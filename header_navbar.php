<div class="container-fluid header-menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light menu-header">
        <div class="container">
            <a class="navbar-brand" href="./index.php">
                <div class="header__logo">
                    <img src="./assets/img/logo_icon-02_f309f104a56745dea7490b8dc234f8cb.webp" alt="">
                </div>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link--css active" aria-current="page" style="color: #000;" href="./index.php">Trang chủ</a>
                    </li>
                    <?php
                    $sql_select_cat = "select * from tbl_category where status =1 ";

                    $result_select_cat = mysqli_query($conn, $sql_select_cat);
                    if (mysqli_num_rows($result_select_cat) > 0) {
                        while ($rowCat = mysqli_fetch_assoc($result_select_cat)) {
                    ?>
                            <li class="nav-item">
                                <a class="nav-link nav-link--css" style="color: #000;" href="index.php?page=product&id=<?php echo $rowCat["cat_id"]; ?>"><?php echo $rowCat["cat_name"] ?></a>
                            </li>


                    <?php }
                    } ?>
                    <li class="nav-item">
                        <a class="nav-link nav-link--css" style="color: #000;" href="index.php?page=gioithieu">Giới thiệu</a>
                    </li>

                </ul>

                <ul class="navbar-nav  navbar-dangnhap">

                    <?php
                    if (isset($_SESSION["user"])) { ?>
                        <li class="nav-item ">
                            <a class="nav-link  text-bold" style="color: #000;" href="./index.php?page=logout">Đăng xuất</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item ">
                            <a class="nav-link  text-bold" style="color: #000;" href="./dangnhap.php">Đăng nhập</a>
                        </li>
                    <?php  }
                    ?>

                    <li class="nav-item">
                        <a class="nav-link text-bold" style="color: #000;" href="./index.php?page=cart_giohang">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </li>

                </ul>




            </div>
        </div>
    </nav>
</div>