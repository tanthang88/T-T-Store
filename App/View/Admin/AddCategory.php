<div class="container mt-4">
    <div class="row justify-content-lg-center">
        <div class="col-12 col-lg-6">
            <h1 class="text-uppercase text-danger text-capitalize">thêm danh mục</h1>
            <form action="<?= ROOT_URL?>/admin/add-category/message" method="post">
                <div class="mb-3">
                    <label class="form-label text-capitalize">tên danh mục</label>
                    <input type="text" class="form-control" name="name">
                    <!--            <div class="form-text">Please enter product category name!</div>-->
                </div>
                <div class="mb-3">
                    <label class="form-label text-capitalize">mã danh mục</label>
                    <input type="text" class="form-control" name="code">
                    <!--            <div class="form-text">Please enter product category code!</div>-->
                </div>
                <span class="text-danger"><?=@$error?></span>
                <hr>
                <button type="submit" class="btn btn-outline-primary">Thêm</button>
            </form>
        </div>
    </div>
</div>