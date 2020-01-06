<?php
/*
* App Core Class 
* Creates URL & loads controller
* URL FORMAT
*/
class Core {
    protected $currentController = 'Pages';
    protected $currentMethode = 'index';
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
      require_once '../app/controllers/'.$this->currentController .'.php';
    // IniT controller class
    $this->currentController = new $this->currentController;
    if(isset($url[1])){
        //check To See  If Method Exists In Controllers
        if(method_exists($this->currentController, $url[1])){
            $this->currentMethode = $url[1];
              // unset 0 index
          unset($url[1]);
        }
    }  
    // Get Params
    $this->params = $url ? array_values($url) : [];
    // Call a Callback With array Of params
    call_user_func_array([$this->currentController, $this->currentMethode], $this->params );
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