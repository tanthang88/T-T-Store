<?php

use Core\{Session, Response};
//Session::check();
?>
<div class="container">
<?php
if(!empty($listCart)){

    echo '<div class="row">
<div class="col-lg-9">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-white align-middle">
                    <tr class="border-1 rounded-pill">
                        <th>Tất cả (<span>';
                                if (Session::data('cart') !== null){
                                    echo count(Session::data('cart')).' sản phẩm';
                                } else {
                                    echo 'Không có sản phẩm nào';
                                }
                        echo '</span>)</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody class="border-top align-middle">';
                foreach ($listCart as $item=>$val):
                echo '<tr>
                        <td width="50%">
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <img src="'.ROOT_URL.'/public/products/'.$val['image'].'" alt="'.$val['name'].'" width="25%">
                                <p>'.$val['name'].'</p>
                            </div>
                        </td>
                        <td><span class="fs-6 fw-bolder text-danger">'.number_format($val['price']).'₫</span></td>
                        <td width="10%"><input type="number" value="'.$val['quantity'].'" min="1" class="form-control"></td>
                        <td><span class="fs-6 fw-bolder text-danger">'.number_format($val['price'] * $val['quantity']).'₫</span></td>
                    </tr>';
                endforeach;
                echo '</tbody>
            </table>
            <button type="submit" class="btn btn-warning float-end">Cập nhật</button>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="input-group">
            <input type="text" name="discount_code" id="" class="form-control" placeholder="Mã giảm giá/ quà tặng">
            <span class="input-group-text bg-primary">
            <a href="#" class="text-white text-decoration-none">Áp dụng</a>
            </span>
        </div>
        <div class="mt-2">
            <ul class="list-group list-group-flush cart-payment rounded rounded-3">
              <li class="list-group-item flex-row justify-content-between align-items-center">
                  <span>Tạm tính</span>
                  <span>'.number_format($totalCartPrice).'₫</span>
              </li>
              <li class="list-group-item flex-row justify-content-between align-items-center">
                 <span>Giảm giá</span>
                 <span>'.number_format($discount).'₫</span>
               </li>
              <li class="list-group-item flex-row justify-content-between align-items-center">
                  <span>Thành tiền</span>
                  <span class="text-danger fw-bolder">'.number_format($totalCartPayment).'₫</span>
               </li>
               <li class="list-group-item flex-row justify-content-end align-items-center">
                    <span class="fst-italic">(Đã bao gồm VAT nếu có)</span>
               </li>
               
               <button type="button" class="btn btn-primary justify-content-center mt-2">
                    <a href="'.ROOT_URL.'/payment" class="text-white text-decoration-none">Tiến hành đặt hàng</a>
               </button>
            </ul>
        </div>
    </div>
</div>';

} else {
    echo '<div class="col-12 text-center">
        <img src="'.ROOT_URL.'/public/image/tk-shopping-img.png" alt="image cart null">
        <p class="mt-2">Không có sản phẩm nào trong giỏ hàng của bạn</p
        <span><a href="'.ROOT_URL.'/" class="text-decoration-none tet-white btn btn-warning">Tiếp tục mua sắm</a></span>
    </div>';
}
?>
</div>