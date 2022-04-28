<?php
foreach ($order as $item=>$order):;
$listOrder = json_decode($order->order);
$order_info = json_decode($order->order_info);
$acc = json_decode($order->account);
?>
<div class="container-fluid mt-4">
    <div class="row justify-content-lg-center">
        <div class="card col-12 g-0 my-2 mx-5">
            <h4 class="text-capitalize text-success card-header">thông tin đơn hàng</h4>
            <div class="card-body">
<!--                <h6>Khách hàng</h6>-->
                <ul class="list-group list-group-flush">
                    <?php foreach ($acc as $account):;?>
                    <li class="list-group-item">
                        <h6>Tên tài khoản:</h6>
                        <p><?=$account->name?></p>
                    </li>
                        <li class="list-group-item">
                            <h6>Trạng thái đơn hàng</h6>
                            <p><?=$order->status?></p>
                        </li>
                    <?php endforeach;?>
                        <li class="list-group-item">
                            <h6>Người nhận:</h6>
                            <p><?=$order_info->name?></p>
                        </li>
                    <li class="list-group-item">
                        <h6>Địa chỉ:</h6>
                        <p><?=$order_info->address.', '.$order_info->ward.', '.$order_info->district.', '.$order_info->province?></p>
                    </li>
                    <li class="list-group-item">
                        <h6>Số điện thoại</h6>
                        <p><?=$order_info->phone?></p>
                    </li>
                    <li class="list-group-item">
                        <h6>Email</h6>
                        <p><?=$order_info->email?></p>
                    </li>

                    <li class="list-group-item">
                        <h6>Ngày đặt hàng</h6>
                        <p>
                            <?php
                            $dateCreate = date_create($order->create_at);
                            echo date_format($dateCreate, "H:i:s d-m-Y");
                            ?>
                        </p>
                    </li>
                    <li class="list-group-item">
                        <h6>Phương thức vận chuyển</h6>
                        <p><?=$order_info->delivery?></p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-borderless table-hover text-center">
                <thead class="table-dark">
                <tr class="align-middle text-capitalize">
                    <th>sản phẩm</th>
                    <th width="60%">tên sản phẩm</th>
                    <th>số lượng</th>
                    <th>đơn giá</th>
                    <th>thành tiền</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($listOrder as $i=>$order):;
                    @$total += ($order->price)*($order->quantity);
                ?>
                <tr class="align-middle">
                    <td>
                        <a href="">
                            <img src="<?=ROOT_URL?>/public/products/<?=$order->image?>" alt="<?=$order->name?>" width="30%">
                        </a>
                    </td>
                    <td>
                        <p>
                            <?=$order->name?>
                        </p>
                    </td>
                    <td>
                        <p><?=$order->quantity?></p>
                    </td>
                    <td>
                        <p><?=number_format($order->price)?></p>
                    </td>
                    <td>
                        <p>
                            <?=number_format(($order->price)*($order->quantity))?>
                        </p>
                    </td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            <h5 class="float-end text-danger text-capitalize fw-bolder">tổng tiền: <span><?=number_format(@$total)?></span></h5>
        </div>
    </div>
</div>
<?php endforeach;?>

