<?php

namespace App\Model;
use Core\Model;
use PDO;
class SiteHome extends Model
{
    private string $__table = '`products`';
    public function __construct()
    {
        parent::__construct();
    }
    public function  getListProductHome($idCate): bool|array
    {
        return $this->DB->QUERY("SELECT * FROM $this->__table WHERE category = ".$idCate)->fetchAll(PDO::FETCH_OBJ);
    }
}