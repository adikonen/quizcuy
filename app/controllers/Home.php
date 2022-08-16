<?php 

class Home extends Controller {
    public function index()
    {
      //  var_dump($_SESSION);
        $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view("home/index");
        $this->view('templates/footer');
    }
}