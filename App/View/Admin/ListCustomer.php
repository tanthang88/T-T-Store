<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead class="align-middle">
            <tr>
                <th scope="col">#</th>
                <th scope="col" class="text-capitalize">Họ và tên</th>
                <th scope="col" class="text-capitalize">tên đăng nhập</th>
                <th scope="col" class="text-capitalize">ảnh đại diện</th>
                <th scope="col" class="text-capitalize">giới tính</th>
                <th scope="col" class="text-capitalize">vai trò</th>
                <th scope="col" class="text-capitalize">hành động</th>
            </tr>
            </thead>
            <tbody class="align-middle">
            <?php foreach ($listCustomer as $item=>$customer):;?>
            <tr>
                <th scope="row"><?=$customer->id_user?></th>
                <td><?=$customer->name?></td>
                <td><?=$customer->username?></td>
                <td>
                    <img src="<?=ROOT_URL?>/public/avatar/<?=$customer->image?>" alt="<?=$customer->username?>" width="80px">
                </td>
                <td><?=$customer->gender?></td>
                <td><?php
                    if ($customer->role == 0){
                        echo "Khách Hàng";
                    } else {
                        echo "Quản Trị";
                    }
                    ?>
                </td>
                <td>
                    <a href="<?=ROOT_URL?>/admin/edit-customer/<?=$customer->id_user?>">
                        <button class="btn btn-outline-info"><i class="fa-solid fa-pen-to-square"></i></button>
                    </a>
                    <a href="<?=ROOT_URL?>/admin/delete-customer/<?=$customer->id_user?>">
                        <button class="btn btn-outline-danger"><i class="fa-solid fa-circle-minus"></i></button>
                    </a>
                </td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>