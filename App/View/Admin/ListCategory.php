<div class="container mt-4">
    <div class="row justify-content-lg-center">
        <div class="table-responsive col-12 col-lg-10">
            <table class="table table-striped table-borderless table-hover text-center">
                <thead class="table-dark">
                    <tr class="align-middle">
                        <th>ID</th>
                        <th>Tên Danh Mục</th>
                        <th>Mã Danh Mục</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($listCategory as $list): ?>
                <tr>
                    <td><?=$list->id_category?></td>
                    <td><?=$list->name_category?></td>
                    <td><?=$list->code_category?></td>
                    <td>
                        <button class="btn btn-warning">
                            <a href="<?=ROOT_URL?>/admin/edit-category/<?=$list->id_category?>" class="text-white">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </button>
                        <button class="btn btn-danger">
                            <a href="<?=ROOT_URL?>/admin/delete-category/<?=$list->id_category?>" class="text-white">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <h5 class="text-success text-center py-3 alert-success"><?=@$message?></h5>
        </div>
    </div>
</div>

