<?php

namespace Core {

    class App
    {

        private mixed $__controller;
        private string $__action;
        private array $__params;
        private Route $__route;
        static App $app;
        public function __construct()
        {
            global $routes, $config;
            self::$app = $this;
            $this->__route = new Route();
            if (!empty($routes['default_controller'])){
                $this->__controller = $routes['default_controller'];
            }
            $this->__action = 'index';
            $this->__params = [];
            $this->handleURL();
        }

        public function getURL()
        {
            empty($_SERVER['PATH_INFO']) ? $url = '/' : $url = $_SERVER['PATH_INFO'];
            return $url;
        }

        public function handleURL()
        {
            $url = $this->getURL();
            //Xử lí route
            $url = $this->__route->handleRoute($url);

            //Middleware
            $this->handleRouteMiddlewares($this->__route->getKeyRoute());


            $urlArr = array_filter(explode('/', $url));
            $urlArr = array_values($urlArr);
            $urlCheck = '';
            if (!empty($urlArr)){
                foreach ($urlArr as $key => $item){
                    $urlCheck.=$item.'/';
                    $fileCheck = rtrim($urlCheck,'/');
                    $fileArr = explode('/',$fileCheck);
                    $fileArr[count($fileArr)-1] = ucfirst($fileArr[count($fileArr)-1]);
                    $fileCheck = implode('/',$fileArr);

                    if (!empty($urlArr[$key-1])){
                        unset($urlArr[$key-1]);
                    }

                    if (file_exists('App/Controller/'.($fileCheck).'.php')){
                        $urlCheck = $fileCheck;
                        break;
                    }
                }
                $urlArr = array_values($urlArr);
            }

            //Xử lí phần Controller
            if (!empty($urlArr[0])) {
                $this->__controller = ucfirst($urlArr[0]);
            } else {
                $this->__controller = ucfirst($this->__controller);
            }

            //Check nếu url rỗng thì lấy routes mặc định
            if (empty($urlCheck)){
                $urlCheck = $this->__controller;
            }

            //Check file controller có tồn tại hay không?
            if (file_exists('App/Controller/'.($urlCheck).'.php')) {
                //Tải file controlller
                require_once sprintf("App/Controller/%s.php", $urlCheck);
                //Kiểm tra - Khởi tạo controller
                //Check class controller có tồn tại hay không?
                class_exists($this->__controller,true) ? $this->__controller = new $this->__controller() : $this->loadPageErr();
                $this->__controller = new $this->__controller();
                //Khởi tạo thành công controller -> xóa phần tử controller trong array url
                unset($urlArr[0]);
            } else {
                $this->loadPageErr();
            }
            //Xử lí phần action
            if (!empty($urlArr)) {
                $this->__action = $urlArr[1];
                unset($urlArr[1]);
            }
            //Xử lí phần params
            $this->__params = array_values($urlArr);
            if (method_exists($this->__controller, $this->__action)){
                call_user_func_array([$this->__controller, $this->__action], $this->__params);
            } else {
                $this->loadPageErr();
            }
        }

        public function loadPageErr($nameErr = '404',$dataErr = [])
        {
            extract($dataErr);
            include_once sprintf("App/Error/%s.php", $nameErr);
        }
        public function handleRouteMiddlewares($keyRoute){
            global $config;
//            $keyRoute = trim($keyRoute);
            /*Middleware App*/
            if ($config['middlewares']['routerMiddleware']){
                $routeMiddlewareArray = $config['middlewares']['routerMiddleware'];
                foreach ($routeMiddlewareArray as $key => $middlewareItem){
                    if ($keyRoute == $key) {
                        if (class_exists($middlewareItem)){
                            $middlewareObj = new $middlewareItem;
                            $middlewareObj->handle();
                        }
//                        else {
//                            echo 'Không tìm thấy class Middleware, vui lòng kiểm tra lại folder Config/Middlewares';
//                        }
                    }
                }
            };
        }

    }
}