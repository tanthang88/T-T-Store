<div class="header-info py-2 container-fluid g-0 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-inline-flex flex-wrap justify-content-center gap-4">
                    <div class="fw-bolder">
                        <i class="fa-solid fa-headphones-simple"></i>
                        <span>Tư vấn mua hàng:</span>
                        <a href="tel:18006867" class="text-danger text-decoration-none">1800 6867</a>
                    </div>
                    <div class="fw-bolder">
                        <i class="fa-solid fa-headphones-simple"></i>
                        <span>CSKH:</span>
                        <a href="tel:18006865" class="text-danger text-decoration-none">1800 6865</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand text-uppercase d-inline-flex justify-content-center align-items-center fw-bold" href="/">
            <img class="d-inline-block align-text-top" src="<?=ROOT_URL?>/public/image/logo.png" alt="" width="90" height="90">
<!--            <span>T&T Store</span>-->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-4 d-flex flex-row justify-content-start">
                <li class="nav-item">
                    <a class="nav-link active d-inline-flex flex-column align-items-center" aria-current="page"
                       href="<?=ROOT_URL?>">
                        <span class="fs-4"><i class="fa-solid fa-house"></i></span>
                        <span>Trang Chủ</span>
                    </a>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link btn position-relative">
                        <a href="<?=ROOT_URL?>/view-cart" class="d-inline-flex flex-column align-items-center text-decoration-none">
                        <span class="fs-4"><i class="fa-solid fa-cart-shopping"></i></span>
                        <span>Giỏ Hàng</span>
                        <span class="position-absolute top-0 start-100 translate-middle badge bg-danger">
                            <?php
                                use Core\Session;
                                if (Session::data('cart') !== null){
                                    echo count(Session::data('cart'));
                                } else {
                                    echo '0';
                                }
                            ?>
                            sản phẩm
                        </span>
                        </a>
                    </button>
                </li>
                <?php

                    if (Session::data('account') !== null){
                        $name = Session::data('account')[0]->name;
                        $avt = Session::data('account')[0]->image;
                        echo '
                <li class="nav-item dropdown">
                        <button class="btn dropdown-toggle d-inline-flex flex-column align-items-center" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class=""><img src="'.ROOT_URL.'/public/avatar/'.$avt.'" alt="" width="20%"></i></span>
                            <span class="my-1">Xin chào <span class="fw-bolder">'.$name.'</span></span>
                        </button>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
                        if (Session::data('account')[0]->role === 1) echo '<li><a class="dropdown-item" href="admin/dashboard">Vào trang quản lý</a></li>';
                        echo '<li><a class="dropdown-item" href="account">Tài Khoản</a></li>
                            <li><a class="dropdown-item" href="order">Đơn Hàng Của Tôi</a></li>
                          <li><a class="dropdown-item" href="logout">Đăng Xuất</a></li>
                        </ul>
                </li>';
                    } else {
                        echo '
                <li class="nav-item">
                    <button type="button" class="nav-link btn position-relative">
                        <a href="login" class="d-inline-flex flex-column align-items-center text-decoration-none">
                            <span class="fs-4"><i class="fa-solid fa-circle-user"></i></span>
                            <span>Đăng Nhập</span>
                        </a>
                    </button>
                </li>
                        ';
                    }
                ?>

            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
    </div>
</nav>
