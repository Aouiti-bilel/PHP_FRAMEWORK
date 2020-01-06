<?php
/*
* App Core Class 
* Creates URL & loads controller
* URL FORMAAT
*/
class Core {
    protected $currentController = 'Pages';
    protected $CurrentMethode = 'index';
    protected $params = [];
    public function __construct(){
     //print_r($this->getUrl());
    $url = $this->getUrl();
    // Look in Contoller For Firs Value 
    if(file_exists('../app/controllers/' . ucwords($url[0]).'.php')){
          // if exists then set as Conntroller
          $this->currentController = ucwords($url[0]);
          // unset 0 index
          unset($url[0]);
      }
      //Require the Controller
      require '../app/controllers/'.$this->currentController .'.php';
    // IniT controller class
    $this->currentController = new $this->currentController;
    }
    public function getUrl() {
       if(isset($_GET['url'])){
           $url = rtrim($_GET['url'], '/');
           $url = filter_var($url, FILTER_SANITIZE_URL);
           $url = explode('/', $url);
           return $url;
       }
    }

}