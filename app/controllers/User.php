<?php

class User extends Controller {

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
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = $this->model("User_model");
        $loginCheck = $userModel->login($email, $password);

        if(count($loginCheck) == 0){
            return redirect('user/login', ["fail" => "salah tod"]);
        }


        else {
            $_SESSION['user_login'] = $loginCheck;
            return redirect('dashboard');
        }
    }

    public function store_forgot_password()
    {
    
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        return redirect('user/login');
    }
    
}