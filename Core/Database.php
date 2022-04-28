<?php

namespace Core;
use PDO;
class Database
{
    private ?\PDO $__con;

    public function __construct()
    {
        global $DB_Config;
        $this->__con = Connection::getInstance($DB_Config);
    }

    public function INSERT($table, $data): bool
    {
        if (!empty($data)){
            $field = '';
            $values = '';
            foreach ($data as $key => $val){
                $field .=$key.',';
                $values .= "'".$val."',";
            }
            $field = rtrim($field,',');
            $values = rtrim($values,',');
            $sql = "INSERT INTO $table($field) VALUES ($values)";
            $status = $this->QUERY($sql);
            if ($status) return true;
        }
        return false;
    }

    public function UPDATE($table, $data, $condition = ''): bool
    {
        if (!empty($data)){
            $update = '';
            foreach ($data as $key => $value){
                $update .= "$key='$value',";
            }
            $update = rtrim($update,',');

            if (!empty($condition)){
                $sql = "UPDATE {$table} SET {$update} WHERE {$condition}";
            } else {
                $sql = "UPDATE {$table} SET {$update}";
            };
            $status = $this->QUERY($sql);
            if ($status) return true;
        }
        return false;
    }

    public function DELETE($table, $condition = ''): bool
    {
        if (!empty($condition)){
            $sql = "DELETE FROM {$table} WHERE {$condition}";
        } else {
            $sql = "DELETE FROM {$table}";
        }
        $status = $this->QUERY($sql);
        if ($status){
            return true;
        }
        return false;
    }
    public function QUERY($sql)
    {
        try {
            $statement = $this->__con->prepare($sql);
            $statement->execute();
            return $statement;
        }catch (\Exception $exception){
            $dataErr['message'] = $exception->getMessage();
            App::$app->loadPageErr('Database', $dataErr);
            die();
        }
    }
    public function lastInsertID(): bool|string
    {
        return $this->__con->lastInsertId();
    }
}