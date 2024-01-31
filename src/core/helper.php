
<?php

use Bravo\Store\core\registry;

    function redirect($path)
    {
        header("location: {$path}");
    }
    
    function assets($path)
    {
        return $_SERVER['REQUEST_SCHEME'] . '://'.$_SERVER['HTTP_HOST']."/".$path;
    }
    
    function alert()
    {
        echo (isset(registry::get('session')->suc)&&!empty(registry::get('session')->suc)) ?  "<p class='alert alert-success text-center col-sm-6 m-auto'>".registry::get('session')->suc."</p>" : '';
        echo (isset(registry::get('session')->err)&&!empty(registry::get('session')->err)) ? "<p class='alert alert-danger text-center col-sm-6 m-auto'>".registry::get('session')->err."</p>" : '';
    }

