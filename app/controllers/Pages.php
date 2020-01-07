<?php
class Pages extends Controller {
    public function __construct(){
      $this->postModel = $this->model('Post');
        
    }
    public function index(){
        $posts = $this->postModel->getPosts();
        $this->view('pages/index', ['posts' => $posts]);
    }
    public function about(){
      $this->view('pages/about', ['title' => 'abouuuuuuut']);
    }
}