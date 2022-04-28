<?php

namespace Core {

    class Connection
    {
        private static ?\PDO $conn = null;
        private static ?\PDO $instance = null;

        private function __construct($config)
        {
            try {
                $DNS = 'mysql:dbname='.$config['db_name'].';host='.$config['host'];
                $options = [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                ];

                $con = new \PDO($DNS,$config['username'], $config['password'], $options);
                self::$conn = $con;
            }catch (\Exception $exception){
                $mess = $exception->getMessage();
                App::$app->loadPageErr('Database', ['message' => $mess]);
                die();
            }
        }
        public static function getInstance($config): ?\PDO
        {
            if (self::$instance == null){
                $connection = new Connection($config);
                self::$instance = self::$conn;
            }
           return self::$instance;
        }
    }
}