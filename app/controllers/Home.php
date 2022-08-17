<?php 

class Home extends Controller {
    public function index()
    {
      if(!isset($_SESSION['user_login'])){
          return redirect('user/login');
       }
      $data['judul'] = 'Home';
      $this->view('templates/header', $data);
      $this->view("home/index");
      $this->view('templates/footer');
    }
}