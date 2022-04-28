<?php

namespace App\Model;
use Core\Model;
use App\Model\SiteOrder;
class AdminCustomer extends Model
{
    private string $__table = '`user`';
    public function __construct()
    {
        parent::__construct();
    }
    public function listCustomer(): bool|array
    {
        return $this->DB->QUERY("SELECT * FROM $this->__table WHERE role = 0")->fetchAll(\PDO::FETCH_OBJ);
    }
    public function deleteCustomer($id_user): bool
    {
        $ModelOrder = new SiteOrder();
        $rs = $ModelOrder->deleteAllOrderOfUser($id_user);
        if (rs == false){
            echo "có lỗi xảy ra, vui lòng kiểm tra lại id khách hàng,...";
        }
        return $this->DB->DELETE($this->__table, "id_user = $id_user");
    }
}