<?php

namespace Core;

use JetBrains\PhpStorm\Pure;

class Request
{
   public function getMethod(): string
   {
       return strtolower($_SERVER['REQUEST_METHOD']);
   }
   #[Pure] public function isGET(): bool
   {
       if ($this->getMethod() === 'get'){
           return true;
       }
       return false;
   }

    #[Pure] public function isPOST(): bool
    {
        if ($this->getMethod() === 'post'){
            return true;
        }
        return false;
    }
    #[Pure] public function getFields(): array
    {
        $dataFields = [];
       //GET METHOD
        if ($this->isGET()){
            if (!empty($_GET)){
                foreach ($_GET as $key => $value){
                    if (is_array($value)){
                        $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else {
                        $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }

                }
            }
        }
        //POST MEDTHOD
        if ($this->isPOST()){
            if (!empty($_POST)){
                foreach ($_POST as $key => $value){
                    if (is_array($value)){
                        $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else {
                        $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        }
        return $dataFields;
    }
}