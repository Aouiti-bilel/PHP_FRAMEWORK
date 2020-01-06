<?php 
/*
 * Base Controller
 * Loads Models && Views
 */
class Controller {
    // Load MOdel
    public function model($model){
        //require model file
        require_once '../app/models' . $model . '.php';
        // Init Model
        return new $model();
    }
    public function view($view, $data=[]){
        // check for view file
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' .$view .'.php';
        }else {
            die('View Does Not Exist');
        }
    }
}