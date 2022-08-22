<?php 

class Controller {

    

    public function acceptedMethods(string ...$methods)
    {
        foreach($methods as $method)
        {
            if($method === $_SERVER["REQUEST_METHOD"]){
                return ;
            }
        }
        return redirect("/",['fail' => "BAD REQUEST!"]);
    }

    //SELURUH CONTROLLER MEMAKSA BUAT LOGIN

    public function __construct()
    {
        $this->access("login_required");

        $this->access('must_live');
    }

    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';   
    }

    public function render(string $viewpath,array $data = []){
        return new View($viewpath, $data);
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function access(string $access)
    {
        $access = strtolower($access);
        switch($access)
        {
            case "guest":
                //jika halaman ini khusus guest dan anda telah login maka akan di pindahkan ke halaman
                if(isset($_SESSION['user_login'])){
                    return redirect('/');
                }
                break;
        
            case "login_required":
                if(!isset($_SESSION['user_login'])){
                    return redirect('/user/login');
                }
                break;
            case "must_live":
                if(!isset($_SESSION['user_login']) || $_SESSION['user_login']['jumlah_nyawa'] < 1){
                    return redirect('/shop', ['fail' => "Whoops Nyawa Anda Tidak ada. Silahkan beli nyawa!"]);
                }
                break;                
            case "admin":
            case "admin_only":
                if(!isset($_SESSION['user_login']) || $_SESSION['user_login']['nama_posisi'] !== 'admin'){
                    return redirect("/");
                }
                break;
        }
    }
}