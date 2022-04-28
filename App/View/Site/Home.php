<div class="container-fluid my-3">
    <div class="row mx-lg-5">
        <h1 class="text-capitalize text-center">Sản Phẩm</h1>
        <?php
        foreach ($dataProduct as $k => $v) {
            echo '<h4>'.$k.'</h4>';
            echo '<div class="owl-carousel owl-theme">';
            foreach ($v as $item => $product) {
                echo '<div class="item">
                        <form action="cart/addCart" method="post" class="product-item px-lg-1">
                         
                                    <div class="">
                                           <img src="public/products/'.$product->image.'" alt="'.$product->image.'">
                                    </div>
                                <div>
                                    <a href="'.ROOT_URL.'/product-detail/'.$product->id_product.'" class="text-decoration-none text-center">
                                                <p class="max-length text-uppercase text-black fs-6">'.$product->name.'</p>
                                    </a>
                                </div>
                                <div class="d-flex flex-row justify-content-between px-2">
                                    <div>
                                        <span class="fw-bolder">'.number_format($product->price).'</span>
                                        <span class="lh-1">₫</span>
                                    </div>
                                   <!-- Info Product-->
                                    <div>
                                        <input type="hidden" name="id" id="" value="'.$product->id_product.'">
                                        <input type="hidden" name="name" id="" value="'.$product->name.'">
                                        <!--<input type="hidden" name="quantity" id="" value="1">-->
                                        <input type="hidden" name="price" id="" value="'.$product->price.'">
                                        <input type="hidden" name="image" id="" value="'.$product->image.'">
                                    </div>
                                    <!--End Info Product-->
                                    <div>
                                        <button type="submit" class="btn">
                                            <span role="button"><i class="fa-solid fa-cart-plus"></i></span>
                                        </button>
                                        </div>
                                </div>
                        </form>
                    </div>';
            }
            echo '</div>';
        }
        ?>
        <!--        <div class="col-lg-2 col-6 g-lg-2 g-3 item">
                    <div class="product-item">
                        <a href="" class="text-decoration-none">
                            <p class="">'.$product->name.'</p>
                        </a>
                        <img src="public/products/'.$product->image.'" class="card-img-top"
                             alt="">
                    </div>
                </div>-->
        <?php

        //        foreach ($dataProduct as $item => $val):
        ?>
        <!--        <div class="col-lg-2 col-6 g-lg-2 g-3 ">
                    <div class="card text-center border-0">
                        <div class="card-body py-lg-3 px-lg-3 text-dark text-capitalize">
                            <a href="" class="text-decoration-none">
                                <p class="max-length"></p>
                            </a>
                            <img src="public/products/" class="card-img-top"
                                 alt="">
                        </div>
                    </div>
                </div>-->
        <?php
        //        endforeach
        ; ?>
    </div>
</div>

<!--<div class="col-12">
    <div class="d-flex flex-row justify-content-between align-items-center py-2 px-2 ">
        <h5 class="text-uppercase">ABC</h5>
        <a href="" class="text-decoration-none text-secondary fw-normal">
            <span>Xem tất cả</span>
            <i class="fa-solid fa-angles-right"></i>
        </a>
    </div>
</div>-->