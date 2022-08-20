<?php

class Shop extends Controller {
    public function index(){
        $shopModel = $this->model("Shop_model");
        $data['point'] = $shopModel->buy(1);
        $data['title'] = 'shop';
        
        $data['semua_koin'] = $shopModel->readKoin();
        $data['semua_cash'] = $shopModel->readCash();

        $this->view('templates/header', $data);
        $this->view('shop/index', $data);
        $this->view('templates/footer');
    }
}