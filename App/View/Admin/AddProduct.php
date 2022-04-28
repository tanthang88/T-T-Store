<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <h1 class="text-capitalize text-danger">thêm sản phẩm</h1>
            <form action="<?=ROOT_URL?>/admin/add-product/message" method="post" enctype="multipart/form-data" class="row g-3">
                <div class="col-lg-6 col-md-12 col-12">
                    <label class="form-label text-capitalize">Tên Danh Mục</label>
                    <select name="category" id="" class="form-select">
                        <?php foreach ($listCategory as $item): ?>
                            <option value="<?= $item->id_category ?>"><?= $item->name_category ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <label class="form-label text-capitalize">tên sản phẩm</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <label class="form-label text-capitalize">mô tả</label>
                    <textarea name="detail" id="editor"></textarea>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <label class="form-label text-capitalize">giá</label>
                    <input type="number" name="price" id="" class="form-control">
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <label class="form-label text-capitalize">ảnh sản phẩm</label>
                    <input type="file" name="image" id="" class="form-control">
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <label class="form-label text-capitalize">ảnh chi tiết sản phẩm</label>
                    <input type="file" name="imageRelated[]" id="" class="form-control" multiple="multiple">
<!--                    <span class="form-text fs-6 mt-2 badge bg-info">Can upload multiple files &#10084;</span>-->
                </div>
                <div class="col-lg-12 col-md-12 col-12 text-lg-start">
                <button type="submit" class="btn btn-outline-success">Gửi</button>
                </div>
                <?php
//                    if(isset($success)){
                        echo '<span class="alert-success text-center fs-5 fw-bold mt-2">'.@$success.'</span>';
//                    } else if (isset($failed)) {
                        if (isset($failed)){
                            foreach ($failed as $mess){
                                echo '<span class=" alert-danger text-center fs-5 fw-bold mt-2">'.$mess.'</span>';
                            }
                        }
//                    }
                echo '<span class="alert-danger text-center fs-5 fw-bold mt-2">'.@$error.'</span>';
                ?>
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