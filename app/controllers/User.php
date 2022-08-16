<?php

class User extends Controller {

    public function index()
    {
        return redirect('/');
    }

    public function login()
    {
        return $this->view("login/index");
    }

    public function register()
    {
        return $this->view("login/register");
    }

    public function forgotPassword()
    {
        return $this->view('login/forgot-password');
    } 

    //POST METHOD
    public function store_register()
    {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $no_telpon = $_POST['no_telpon'];
        

        $userModel = $this->model("User_model");
        $userModel->register($nama, $email, $password, $no_telpon);
    } 

    public function store_login()
    {
    
    }

    public function store_forgot_password()
    {
    
    }
    
}