<div class="container">
    <main>
        <form action="payment-check" method="post">
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Đơn hàng</span>
                    <span class="badge bg-info rounded-pill">Tổng <?=count($listCart)?> sản phẩm</span>
                </h4>
                <ul class="list-group mb-3">
                    <?php foreach ($listCart as $k=>$val):?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0 max-length-short"><?=$val['name']?></h6>
                                <small class="text-muted">Số lượng: <?=$val['quantity']?></small>
                            </div>
                        </li>
                    <?php endforeach;?>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Giảm giá</h6>
                            <small></small>
                        </div>
                        <span class="text-success"><?=number_format($discount)?> ₫</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                            <span>Thành tiền</span>
                            <strong class="text-danger"><?=number_format($totalCartPayment)?> ₫</strong>
                    </li>
                </ul>
                    <div>
                        <button type="submit" class="btn btn-danger text-uppercase">đặt hàng</button>
                    </div>
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Địa chỉ giao hàng</h4>
<!--                <form class="">-->
                    <div class="row g-3">
                        <div class="col-lg-6 col-12">
                            <label for="firstName" class="form-label">Họ tên</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Họ và tên" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <label for="username" class="form-label">Số điện thoại</label>
                            <div class="input-group">
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Nhập số điện thoại"
                                       required>
                                <div class="invalid-feedback">
                                    Your username is required.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="email" class="form-label">Địa chỉ</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Số nhà, số đường">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="email" class="form-label">Email <span
                                        class="text-muted">(Tùy chọn)</span></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Nhập email">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="address" class="form-label">Tỉnh/Thành phố</label>
<!--                            <input type="text" class="form-control" id="address" placeholder="Tỉnh/thành phố" required>-->
                            <select name="province" id="provinces" class="form-select" required>
                                <option value="0">Chọn tỉnh/thành phố</option>
                            </select>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="address2" class="form-label">Quận/huyện</label>
<!--                            <input type="text" class="form-control" id="address2" placeholder="Quận/huyện">-->
                            <select name="district" id="districts" class="form-select" required>
                                <option value="0">Chọn quận/huyện</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="country" class="form-label">Phường/xã</label>
                            <select name="ward" class="form-select" id="wards" required>
                                <option value="0">Chọn phường/xã</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="delivery-form my-3">
                            <h4>Hình thức giao hàng</h4>
                            <div class="d-inline-flex align-items-center gap-2">
                                <input type="radio" name="delivery" id="" checked value="Giao hàng tiêu chuẩn">
                                <label for="" class="form-check-label">Giao hàng tiêu chuẩn</label>
                            </div>
                            <div class="mt-3">
                                <?php foreach ($listCart as $k=>$val):?>
                                    <div class="row">
                                        <div class="col-2 text-center">
                                            <a href="<?=ROOT_URL.'/product/'.$val['id']?>">
                                                <img src="<?=ROOT_URL.'/public/products/'.$val['image']?>" alt="<?=$val['name']?>" width="50%">
                                            </a>
                                        </div>
                                        <div class="pro-info d-flex flex-column col-9">
                                            <span style="font-size: .9em">
                                                <?=$val['name']?>
                                            </span>
                                            <span>
                                                SL:x
                                                <?=$val['quantity']?>
                                            </span>
                                        </div>
                                        <div class="col-1 fw-bold"><?=number_format($val['price'])?>₫</div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </form>
    </main>
</div>