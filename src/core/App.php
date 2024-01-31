<?php 
namespace Bravo\Store\core;
    use ReflectionMethod;

    class App
    {
        private $controller;
        private $method;
        private $params;
        private $controllerNameSpace = "Bravo\Store\controllers\\";

        function __construct($controller  = 'Home' ,$method = 'index',$params = [])
        {
            $this -> controller = $controller ;
            $this -> method = $method ;
            $this -> params = $params ;
            $this -> url();
            $this -> render();
        }

        function url()
        {

            $url = explode('/',$_SERVER['QUERY_STRING'],2);
            if($url[0] == 'admin'){
                $url = explode('/',$url[1],3);
                $this -> controllerNameSpace .= 'admin\\' ;
                $this -> controller = 'Users';
            }else{
                $url = explode('/',$_SERVER['QUERY_STRING'],3);
            }

            $this -> controller = (empty($url[0])) ?  $this -> controller : $url[0];
            // method
            $this -> method     = (empty($url[1])) ?  $this -> method : $url[1];
            //  parameters
            $this -> params     = (empty($url[2])) ?  $this -> params : explode("/",$url[2]);
        }

        function render()
        {
            $controller = $this -> controllerNameSpace.$this -> controller; 
            $method = $this->method;
            if(class_exists($controller))
            {
                $controller = new $controller;
                
                if(method_exists($controller,$method))
                {
                    $reflection = new ReflectionMethod($controller, $method);
                    if ($reflection->isPublic()) {
                        $methodparam = $reflection->getNumberOfParameters();
                        $paramslen = count($this -> params);
                        if($methodparam == $paramslen){
                            call_user_func_array([$controller,$method],$this -> params);
                        }else{
                            echo "404 not found";
                        }
                    }else{
                        echo "404 not found";
                    }
                }else{
                    echo "404 not found";
                }
            }else{
                echo "404 not found";
            }
        }
    }