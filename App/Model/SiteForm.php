<?php

namespace App\Model;
use \Core\Model;
class SiteForm extends Model
{
    private string $__table = 'user';
    public function __construct()
    {
        parent::__construct();
    }

    public function addUser($data): bool
    {
        return $this->DB->INSERT($this->__table, $data);
    }
    public function checkAccount($username, $password): bool|array
    {
        return $this->DB->QUERY("SELECT * FROM user WHERE username = '$username' AND password = md5($password)")->fetchAll(\PDO::FETCH_OBJ);
    }
}