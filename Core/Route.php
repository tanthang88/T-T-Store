<?php

namespace Core {

    class Route
    {
        private $__keyRoute = null;
        public function handleRoute($url): array|string|null
        {
            global $routes;
            unset($routes['default_controller']);
            $url = trim($url,'/');
            $handleURL = $url;
            if (!empty($routes)){
                foreach ($routes as $key => $value){
                    if (preg_match('~'.$key.'~is', $url)){
                        $handleURL = preg_replace('~'.$key.'~is', $value, $url);
                        $this->__keyRoute = $key;
                    };
                }
            }
            return $handleURL;
        }

        public function getKeyRoute()
        {
            return $this->__keyRoute;
        }
    }
}