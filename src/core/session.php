<?php
namespace Bravo\Store\core;

    define('SESSION_SAVE_PATH',dirname(__DIR__)."\..\SessionFiles");

    class Session  extends \SessionHandler {
        private $sessionName= "MyAppSess";
        private $sessionMaxLifeTime= 0;
        private $sessionSSL= false;
        private $sessionHttpOnly= true;
        private $sessionPath= '/'; 
        private $sessionDomain='bravo.local';
        private $sessionSavePath = SESSION_SAVE_PATH;
        private string $sessionCipherAlgo = 'aes-256-cbc';
        private string $sessionCipherIvb = '1234567812345678';
        private string $sessionCipherKey = 'r(@F_R=ee#B$a%B!a^j)';
    //   private $ivlen;
    //   private $iv;
        private $ttl= 1;


        public function __construct ()
        {
                ini_set('session.use_cookies',1);
                ini_set('session.use_only_cookies',1);
                ini_set('session.use_trans_sid',0);
                ini_set('session.save_handler','files');

                session_name($this->sessionName);
                session_save_path($this->sessionSavePath);
                session_set_cookie_params(
                    $this->sessionMaxLifeTime,
                    $this->sessionPath,
                    $this->sessionDomain,
                    $this->sessionSSL,
                    $this->sessionHttpOnly
                );
                // $this->ivlen = openssl_cipher_iv_length($this->sessionCipherAlgo);
                // $this->iv= openssl_random_pseudo_bytes($this->ivlen);
                session_set_save_handler($this,true); 

        }

        public function __get($key)
        {
            return ($_SESSION[$key] !== false) ? $_SESSION[$key]  : false  ;
        }

        public function __set($key, $value)
        {
            $_SESSION[$key]=$value;
        }

        public function __isset($key)
        {
            return isset($_SESSION[$key]) ? true : false ;
        }

        public function read($id): string|false
        {
            return parent::read($id) ;

            // if(!$data){
            //     return '';
            // }else{
            //     return openssl_decrypt($data, $this->sessionCipherAlgo, $this->sessionCipherKey,true, $this->sessionCipherIvb);
            // }
        }


        public function write($id,$data):bool
        {
            // return parent::write($id, openssl_encrypt($data, $this->sessionCipherAlgo, $this->sessionCipherKey,true, $this->sessionCipherIvb));
            return parent::write($id,$data);
        }

        public function start()
        {
            if(session_id() === '' ) {
                if(session_start()) {  
                    $this->setSessionStartTime();
                    $this->checkSessionValidity();
                }
            }
        }


        public function setSessionStartTime()
        {
            if(!isset($this->sessionStartTime)){
                $this->sessionStartTime = time();
            } 
            return true;
        }

        private function checkSessionValidity()
        {
            if ((time() - $this->sessionStartTime) > ($this->ttl * 60)){
                $last_id = "sess_".session_id();
                $files = glob($this->sessionSavePath.'/*');
                $this->renewSession();
                $this->generateFingerPrint();
                foreach ($files as $file) {
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
            }
            return true;
        }

        private function renewSession ()
        {
            $this->sessionStartTime = time();
            return session_regenerate_id(true);
        }
        
        public function kill() // end session 
        {
            session_unset();
            setcookie(
                $this->sessionName,
                '', 
                time()-1000 ,
                $this->sessionPath,
                $this->sessionDomain, 
                $this->sessionSSL,
                $this->sessionHttpOnly
            );
            session_destroy();
        }

        private function generateFingerPrint()
        {
            $userAgentId= $_SERVER['HTTP_USER_AGENT'];
            $this->sessionCipherKey = bin2hex(openssl_random_pseudo_bytes(16));
            $sessionId = session_id();
            $this->fingerPrint = sha1($userAgentId .$this->sessionCipherKey.$sessionId);
        }

        public function isValidFingerPrint()
        {
            if(!isset($this->fingerPrint)){
                $this->generateFingerPrint();
            }

            $fingerPrint = sha1($_SERVER['HTTP_USER_AGENT'].$this->sessionCipherKey . session_id()) ;

            if($fingerPrint === $this->fingerPrint){
                return true;
            }

            return false;
        }
    }


