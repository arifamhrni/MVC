<?php


class Boot {
    protected $controller = 'Index';
    protected $action = 'index';    
    protected $params = [];
    
    public function __construct() {
        //echo "booting sukses";

        $url = $_GET['r'];
        $url = $this->parseUrl($url);

        if(file_exists('apps/controllers/'.$url[0]. '.php')) {
            $this->controller = $url[0];
            unset($url[0]);

        }
        require('apps/controllers/'.$this->controller.'.php');
        $this->controller = new $this->controller;

        //var_dump($url);  
    }


    //routing aplikasi MVC ----> memilih controller model dan view yang diperlukan
    public function parseUrl($url) {
        if (isset($_GET['r'])) {
            $url = rtrim($_GET['r'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
        }
        return $url;
        
    }

}