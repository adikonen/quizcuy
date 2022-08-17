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
        $noTelpon = $_POST['no_telpon'];
        $confirmPassword = $_POST['konfirmasi-password'];

        $userModel = $this->model("User_model");
    
   
        if($password === $confirmPassword){
            $userModel->register($nama, $email, $password, $noTelpon);
            return redirect("user/login");
        }

        else 
        {
            return redirect("user/register", ['fail' => 'Password Dan Konfirmasi Password Harus Sama!']);
        }

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