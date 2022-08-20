<?php

class User extends Controller 
{

    public function __construct()
    {
        //menghilangkan aksi construct yang diberikan oleh parent dengan tidak menuliskan apa apa
    }

    public function index()
    {
        echo '404';    
    }

    public function login()
    {
        $this->access('guest');
        return $this->view("login/index");
    }

    public function register()
    {
        $this->access('guest');
        return $this->view("login/register");
    }

    public function forgotPassword()
    {
        return $this->view('login/forgot-password');
    } 

    //POST METHOD
    public function store_register()
    {
        $this->access("guest");
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
        $this->access("guest");
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = $this->model("User_model");
        $loginCheck = $userModel->login($email, $password);

        if(count($loginCheck) == 0 || !$loginCheck){
            return redirect('user/login', ["fail" => "salah tod"]);
        }
        
        $_SESSION['user_login'] = $loginCheck;
        
        return $loginCheck['nama_posisi'] == "admin" 
            ? redirect('/dashboard')
            : redirect("/home");
        
    }

    public function store_forgot_password()
    {
    
    }

    public function logout()
    {
        $this->access("login_required");
        session_unset();
        session_destroy();
        return redirect('user/login');
    }
    
}