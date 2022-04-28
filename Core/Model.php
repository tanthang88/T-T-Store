<?php
namespace Core {

    class Model extends Database
    {
        protected Database $DB;
        public function __construct()
        {
           $this->DB = new Database();
        }
    }
}