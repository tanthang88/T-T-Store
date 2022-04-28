<div class="container-fluid mt-4">
    <div class="row justify-content-lg-center">
        <div class="table-responsive col-12 col-lg-12">
            <table class="table table-striped table-borderless table-hover text-center">
                <thead class="table-dark">
                <tr class="align-middle">
                    <th>Tên Sản Phẩm</th>
                    <th>Ảnh Sản Phẩm</th>
                    <th width="20%">Hành Động</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($listProducts as $listProduct): ?>
                    <tr class="align-middle">
                        <td><?=$listProduct->name?></td>
                        <td>
                            <img src="<?=ROOT_URL?>/public/products/<?=$listProduct->image?>" alt="<?=$listProduct->image?>" width="80" height="80">
                        </td>
                        <td>
                            <button class="btn btn-secondary">
                                <a href="<?=ROOT_URL?>/admin/edit-product/<?=$listProduct->id_product?>" class="text-white">
                                    <i class="fa-solid fa-file-pen"></i>
                                </a>
                            </button>
                            <button class="btn btn-danger">
                                <a href="<?=ROOT_URL?>/admin/delete-product/<?=$listProduct->id_product.'/'.$listProduct->image?>" class="text-white">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
<!--            <h5 class="text-success text-center py-3 alert-success"></h5>-->
        </div>
    </div>
</div>

