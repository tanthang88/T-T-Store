<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <hr>
                <ul class="nav flex-column ms-5">
                    <!--Dashboard-->
                    <li class="nav-item">
                        <a class="active nav-link" aria-current="page" href="<?= ROOT_URL ?>/admin/dashboard"
                           style="text-decoration: none">
                            <i class="fa-solid fa-house-fire"></i>
                            Trang Chủ
                        </a>
                    </li>
                    <!--Category-->
                    <li class="nav-item">
                        <a role="button" class="nav-link" data-bs-toggle="collapse" data-bs-target="#categorySidebar"
                           aria-expanded="true">
                            <i class="fa-solid fa-bookmark"></i>
                            Danh Mục
                        </a>
                        <div class="collapse mx-3" id="categorySidebar">
                            <a class="nav-link" href="<?= ROOT_URL ?>/admin/add-category">
                                <i class="fa-solid fa-plus"></i>
                                Thêm Danh Mục
                            </a>
                            <a class="nav-link" href="<?= ROOT_URL ?>/admin/list-category">
                                <i class="fa-solid fa-bars-staggered"></i>
                                Danh Sách Danh Mục
                            </a>
                        </div>
                    </li>
                    <!--Product-->
                    <li class="nav-item">
                        <a role="button" class="nav-link" data-bs-toggle="collapse" data-bs-target="#productSidebar"
                           aria-expanded="true">
                            <i class="fa-brands fa-product-hunt"></i>
                           Sản Phẩm
                        </a>
                        <div class="collapse mx-3" id="productSidebar">
                            <a class="nav-link" href="<?= ROOT_URL ?>/admin/add-product">
                                <i class="fa-solid fa-plus"></i>
                                Thêm Sản Phẩm
                            </a>
                            <a class="nav-link" href="<?= ROOT_URL ?>/admin/list-product">
                                <i class="fa-solid fa-list-ol"></i>
                                Danh Sách Sản Phẩm
                            </a>
                        </div>
                    </li>
                    <!--Orders-->
                    <li class="nav-item">
                        <a role="button" class="nav-link" data-bs-toggle="collapse" data-bs-target="#ordersSidebar"
                           aria-expanded="true">
                            <i class="fa-brands fa-jedi-order"></i>
                            Đơn Hàng
                        </a>
                        <div class="collapse mx-3" id="ordersSidebar">
                            <a class="nav-link" href="<?= ROOT_URL ?>/admin/list-order">
                                <i class="fa-solid fa-list-check"></i>
                                Danh Sách Đơn Hàng
                            </a>
                        </div>
                    </li>
                    <!--Customer-->
                    <li class="nav-item">
                        <a role="button" class="nav-link" data-bs-toggle="collapse" data-bs-target="#customerSidebar"
                           aria-expanded="true">
                            <i class="fa-solid fa-users"></i>
                            Khách Hàng
                        </a>
                        <div class="collapse mx-3" id="customerSidebar">
                            <a class="nav-link" href="<?= ROOT_URL ?>/admin/list-customer">
                                <i class="fa-solid fa-list"></i>
                                Danh Sách Khách Hàng
                            </a>
                        </div>
                    </li>
                </ul>
                <hr>
            </div>
        </nav>