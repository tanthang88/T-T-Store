<?php

namespace App\Model;

use Core\Model;
use PDO;

class AdminCategory extends Model
{
    protected string $_table = 'category';

    public function __construct()
    {
        parent::__construct();
    }

    public function addCategory($data): bool
    {
        return $this->DB->INSERT($this->_table, $data);
    }

    public function getListCategory(): bool|array
    {
        return $this->DB->QUERY("SELECT * FROM category")->fetchAll(PDO::FETCH_OBJ);
    }
    public function getOneCategory($ID): bool|array
    {
        return $this->DB->QUERY("SELECT * FROM category WHERE id_category = $ID")->fetchAll(PDO::FETCH_OBJ);
    }
    public function editCategory($data, $condition): bool
    {
        return $this->DB->UPDATE($this->_table, $data, $condition);
    }
    public function deleteCategory($condition): bool
    {
        return $this->DB->DELETE($this->_table,$condition);
    }

}