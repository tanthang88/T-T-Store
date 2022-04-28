<div class="container mt-4">
    <div class="row justify-content-lg-center">
        <div class="col-12 col-lg-6">
            <form action="<?= ROOT_URL?>/admin/edit-category/message" method="post">
                <?php foreach ($list as $list): ?>
                    <div class="mb-3">
                        <label for="" class="form-label">ID Danh Mục</label>
                        <input type="text" name="id" readonly class="form-control" value="<?=$list->id_category?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tên Danh Mục</label>
                        <input type="text" name="name" id="" class="form-control" value="<?=$list->name_category?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Mã Danh Mục</label>
                        <input type="text" name="code" id="" class="form-control" value="<?=$list->code_category?>">
                    </div>
                <?php endforeach; ?>
                <div>
                    <button type="submit" class="btn btn-outline-success">
                        Gửi
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>