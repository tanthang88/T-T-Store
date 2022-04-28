<?php

namespace App\Model;
use \Core\Model;
class SiteOrder extends Model
{
    private string $__table = '`order`';
    public function __construct()
    {
        parent::__construct();
    }

    public function addOrder($data): bool
    {
        return $this->DB->INSERT($this->__table, $data);
    }
    public function listOrder(): bool|array
    {
        return $this->DB->QUERY("SELECT * FROM $this->__table ORDER BY id_order DESC")->fetchAll(\PDO::FETCH_OBJ);
    }
    public function orderDetail($ID): bool|array
    {
        return $this->DB->QUERY("SELECT * FROM $this->__table WHERE id_order = ${ID}")->fetchAll(\PDO::FETCH_OBJ);
    }
    public function deleteAllOrderOfUser($id_user): bool
    {
        return $this->DB->DELETE($this->__table, "user_id = $id_user");
    }
}