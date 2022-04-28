<div class="container-fluid mt-4">
    <div class="row justify-content-lg-center">
        <div class="table-responsive">
            <table class="table table-striped table-borderless table-hover text-center">
                <thead class="table-dark">
                <tr class="align-middle">
                    <th>Khách hàng</th>
                    <th width="60%">Thông tin đơn hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái đơn hàng</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($listOrder as $item => $orderVal):
                    /*Convert data order*/
                    $order_info = json_decode($orderVal->order_info);
                    $order = json_decode($orderVal->order);
                    $account = json_decode($orderVal->account);
                    ?>
                    <tr class="align-middle">
                        <td>
                            <div class="d-flex flex-column align-items-center pt-3 gap-2">
                                <?php foreach ($account as $acc):?>
                                <img src="<?=ROOT_URL?>/public/avatar/<?=$acc->image?>" alt="" width="50px" class="rounded-pill">
                                    <p><?=$acc->name?></p>
                                <?php endforeach;?>
                            </div>
                        </td>
                        <td>
                            <div>
                                <p class="max-length">
                                    <?php
                                    foreach ($order as $odValue){
                                        echo $odValue->name.'<br>';
                                    }
                                    ?>
                                </p>
                            </div>
                        </td>
                        <td>
                            <p class="fw-bold">
                            <?php
                                $dateCreate = date_create($orderVal->create_at);
                                echo date_format($dateCreate, "H:i:s d-m-Y");
                                ?>
                            </p>
                        </td>
                        <td>
                            <span class="fw-bolder text-danger">
                                <?=$orderVal->status?>
                            </span>
                        </td>
                        <td>
                            <a href="<?=ROOT_URL?>/admin/order/<?=$orderVal->id_order?>">
                                <button class="btn btn-outline-info">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

