<?php

class Shop extends Controller 
{
    public function __construct()
    {
        $this->access('login_required');
    }

    public function index()
    {
        $shopModel = $this->model("Shop_model");
        $data['point'] = $shopModel->buy($_SESSION['user_login']['user_id']);
        $data['title'] = 'shop';
        
        $data['semua_koin'] = $shopModel->readKoin();
        $data['semua_cash'] = $shopModel->readCash();

        $this->view('templates/header', $data);
        $this->view('shop/index', $data);
        $this->view('templates/footer');
    }   

    //POST ACTION
    public function store_cash_payment(int $cash_id)
    {
        $this->acceptedMethods('POST');        
        $shopModel = $this->model("Shop_model");
        
        $nyawa = $shopModel->cash_payment($_SESSION['user_login']['user_id'], $cash_id);
        $_SESSION['user_login']['jumlah_nyawa'] = $nyawa;
        return redirect("/shop", ['success' => "berhasil membeli nyawa!"]);
        
    }

    public function store_coin_payment(int $coin_id)
    {
        $this->acceptedMethods("POST");
        $shopModel = $this->model("Shop_model");

        $nyawa = $shopModel->coin_payment($_SESSION['user_login']['user_id'], $coin_id);

        if($nyawa){
            $_SESSION['user_login']['jumlah_nyawa'] = $nyawa;
            return redirect("/shop",['success' => 'berhasil membeli nyawa!']);
        }
        
        else return redirect("/shop",['fail' => "koin anda tidak cukup!"]);
    }

}