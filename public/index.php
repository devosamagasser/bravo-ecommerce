<?php

    use Bravo\Store\core\App;
    use Bravo\Store\core\session;
    use Bravo\Store\core\registry;
    use Bravo\Store\core\database\PdoDp;
    use Bravo\Store\core\validation;
    include "../vendor/autoload.php";
    
    registry::set('dbconnect',new PdoDp('store'));
    registry::set('validation',new validation());
    registry::set('session',new session());
    registry::get('session')->start();
    
    new App();