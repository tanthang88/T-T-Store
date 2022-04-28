<?php
foreach ($product as $item=>$product):;
?>
<div class="container">
    <h2><?=$product->name?></h2>
    <div class="row">
        <div class="col-lg-4">
            <!-- Swiper -->
            <div style="--swiper-navigation-color: black; --swiper-pagination-color: #fff" class="swiper ProductImage">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="<?=ROOT_URL?>/public/products/<?=$product->image?>"/>
                    </div>
                    <?php foreach ($listImageRelated as $related):;?>
                    <div class="swiper-slide">
                        <img src="<?=ROOT_URL?>/public/products/related/<?=$related->image?>"/>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <!--Related Image-->
            <div thumbsSlider="" class="swiper listImageRelated mt-2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="<?=ROOT_URL?>/public/products/<?=$product->image?>"/>
                    </div>
                    <?php foreach ($listImageRelated as $related):;?>
                        <div class="swiper-slide">
                            <img src="<?=ROOT_URL?>/public/products/related/<?=$related->image?>"/>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <h6 class="fw-bold">Thông số sản phẩm</h6>
           <div>
               <?=$product->detail?>
           </div>
            <div class="rounded border-1 border-dark border px-3 py-4">
                <h2 class="fw-bold text-danger"><?=number_format($product->price)?>₫</h2>
                <div class="pro-ribbon">
                    <span>Giá đã có VAT</span>
                    <span>Bảo hành 12 tháng chính hãng</span>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-header text-danger fw-bolder">
                    <i class="fa-solid fa-gift"></i>
                    Quà tặng và ưu đãi kèm theo
                </div>
                <div class="card-body">
                    <span class="text-danger fw-bold">+ MIỄN PHÍ GIAO HÀNG TOÀN QUỐC</span> (trừ ghế, bàn, màn chiếu). Chi tiết xem tại đây.
                </div>
            </div>
            <div>
                <form action="<?=ROOT_URL?>/cart/addCart" method="post">
                <div class="input-group">
                    <span class="input-group-text">Số lượng</span>
                    <input type="number" class="form-control col-2" name="quantity" min="1" value="1">
                    <!-- Info Product-->
                    <input type="hidden" name="id" id="" value="<?=$product->id_product?>">
                    <input type="hidden" name="name" id="" value="<?=$product->name?>">
                    <input type="hidden" name="price" id="" value="<?=$product->price?>">
                    <input type="hidden" name="image" id="" value="<?=$product->image?>">
                    <!--End Info Product-->
                </div>
                <a href="" class="w-100">
                    <button type="submit" class="btn btn-danger mt-3 py-2 px-5">
                        <span class="text-uppercase fw-bolder"> đặt mua ngay</span>
                        <br>
                        <span>Giao hàng tận nơi nhanh chóng</span>
                    </button>
                </a>

                </form>
            </div>
        </div>
        <div class="col-lg-3">
            <div>
                <ul class="list-group fs-6">
                    <li class="list-group-item text-uppercase bg-gray fw-bold">yên tâm mua hàng</li>
                    <li class="list-group-item">Uy tín 20 năm xây dựng và phát triển</li>
                    <li class="list-group-item">Sản phẩm chính hãng 100%</li>
                    <li class="list-group-item">Trả góp lãi suất 0% toàn bộ giỏ hàng</li>
                    <li class="list-group-item">Trả bảo hành tận nơi sử dụng</li>
                    <li class="list-group-item">Bảo hành tận nơi cho doanh nghiệp</li>
                    <li class="list-group-item">Ưu đãi riêng cho học sinh sinh viên</li>
                    <li class="list-group-item">Vệ sinh miễn phí trọn đời PC, Laptop</li>
                </ul>
                <ul class="list-group fs-6 my-4">
                    <li class="list-group-item text-uppercase bg-gray fw-bold">miễn phí giao hàng</li>
                    <li class="list-group-item">Giao hàng siêu tốc trong 2h</li>
                    <li class="list-group-item">Giao hàng miễn phí toàn quốc</li>
                    <li class="list-group-item">Nhận hàng và thanh toán tại nhà (ship COD)</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
endforeach;
?>