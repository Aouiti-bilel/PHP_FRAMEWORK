<?php
  
    class Users extends Controller {
        public function __construct(){

        }
        public function register(){
            //check For Post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //process Form
            }else {
                // Init Data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
                // Load View
                $this->view('users/register', $data);
              
            }
        }
    }