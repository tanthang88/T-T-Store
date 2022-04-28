<div class="container mt-4">
    <div class="row justify-content-lg-center">
        <div class="col-12 col-lg-12">
            <?php foreach ($listProduct

            as $list): ?>
            <form action="<?= ROOT_URL ?>/admin/update-product" method="post" class="row" enctype="multipart/form-data">
                <!--Category-->
                <div class="mb-3 col-lg-6">
                    <label for="" class="form-label text-capitalize">danh mục</label>
                    <select name="category" id="" class="form-select" readonly>
                        <?php
                        foreach ($listCategory as $item) {
                            if ($list->category === $item->id_category) {
                                echo '<option selected value="'.$item->id_category.'">'.$item->name_category.'</option>';
                            } else {
                                echo '<option value="'.$item->id_category.'">'.$item->name_category.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <!--Name Product-->
                <div class="mb-3 col-lg-6 col-12">
                    <label for="" class="form-label text-capitalize">tên sản phẩm</label>
                    <input type="text" name="name" id="" class="form-control" value="<?= $list->name ?>">
                </div>
                <!--Detail-->
                <div class="mb-3 col-lg-6 col-12">
                    <label for="" class="form-label     text-capitalize">mô tả</label>
                    <textarea name="detail" id="editor">
                            <?= $list->detail ?>
                        </textarea>
                </div>
                <!--Price-->
                <div class="mb-3 col-lg-6 col-12">
                    <label for="" class="form-label text-capitalize">giá</label>
                    <input type="text" name="price" id="" value="<?= number_format($list->price)?>" class="form-control">
                </div>
                <!--Main Image-->
                <div class="mb-3 col-lg-6 col-12">
                    <label for="" class="form-label text-capitalize">ảnh đại diện</label>
                    <input type="file" name="imageMain" id="" class="form-control">
                    <div class="mt-3">
                        <img class="rounded border border-info border-3" src="<?=ROOT_URL?>/public/products/<?= $list->image ?>" alt="<?= $list->name ?>" width="40%">
                    </div>
                </div>
                <!--Related Image-->
                <div class="mb-3 col-lg-6 col-12">
                    <label for="" class="form-label text-capitalize">ảnh chi tiết</label>
                    <input type="file" name="imageRelated[]" multiple id="" class="form-control">
                    <div class="row align-items-start border border-info border-3 px-2 my-2 mx-1 rounded-3">
                        <?php
                        foreach ($listRelatedImage as $key => $value):?>
                            <div class="col-lg-4 col-6 col-md-4 my-3 position-relative">
                                <img src="<?=ROOT_URL?>/public/products/related/<?= $value->image ?>" alt="<?= $value->image ?>"
                                     width="106%" class="rounded-3">
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        <a href="<?=ROOT_URL?>/admin/delete-related-image/<?= $value->image.'/'.$list->id_product.'/'.$value->id_relative ?>"
                                           class="text-white">
                                            <i class="fa-solid fa-xmark"></i>
                                        </a>
                                        <span class="visually-hidden">Delete Related Image</span>
                                    </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
<!--                    <span class="badge bg-success">--><?//= @$success ?><!--</span>-->
                </div>
                <input type="hidden" name="ID_Product" value="<?= $list->id_product ?>">
                <input type="hidden" name="imgMainDefault" value="<?= $list->image?>">
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
<!--CK EDITOR JS-->
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>