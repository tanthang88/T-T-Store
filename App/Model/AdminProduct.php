<?php

namespace App\Model;

use Core\Model;
use PDO;

class AdminProduct extends Model
{
    private string $_table = 'products';
    private string $_table_related = 'relative_image_product';

    public function __construct()
    {
        parent::__construct();
    }

    public function addProduct($dataProduct): bool
    {
        return $this->DB->INSERT($this->_table, $dataProduct);
    }

    public function deleteProduct($ID): bool
    {
        $this->DB->DELETE($this->_table_related, 'product_id ='.$ID);
        return $this->DB->DELETE($this->_table, 'id_product ='.$ID);
    }

    public function getListProducts(): bool|array
    {
        return $this->DB->QUERY("SELECT * FROM {$this->_table}")->fetchAll(PDO::FETCH_OBJ);
    }

    public function getOneProduct($ID): bool|array
    {
        return $this->DB->QUERY("SELECT * FROM $this->_table WHERE id_product = {$ID}")->fetchAll(PDO::FETCH_OBJ);
    }

    public function getIDLastIndex(): bool|string
    {
        return $this->DB->lastInsertID();
    }

    public function addImageRelated($data): bool
    {
        return $this->DB->INSERT($this->_table_related, $data);
    }

    public function getListRelatedImage($idProduct): bool|array
    {
        return $this->DB->QUERY("SELECT * FROM {$this->_table_related} WHERE product_id = {$idProduct}")->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteRelatedImage($ID): bool
    {
        return $this->DB->DELETE($this->_table_related, 'id_relative ='.$ID);
    }

    public function updateProduct($dataProduct, $ID_Product): bool
    {
        return $this->DB->UPDATE($this->_table, $dataProduct, 'id_product = '.$ID_Product);
    }
}