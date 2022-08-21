<?php

class View 
{
    public string $viewPath;
    public array $data = [];
    public function __construct(string $viewPath, array $data = [])
    {
        $this->viewPath = $viewPath;
        $this->data = $data;
    }

    public function admin()
    {
        $this->display("admin/header", "admin/error", "admin/footer-without-chart");
    }

    public function adminDashboard()
    {
        $this->display("admin/header", "admin/error", "admin/footer");
    }

    private function display($header, $onError, $footer)
    {
        $this->data['title'] = http_response_code() < 400 
            ? $this->data['title'] 
            : http_response_code(); 
        
        $this->render("templates/$header", $this->data);
        
        if(http_response_code() < 400){
            $this->render($this->viewPath, $this->data);
        }

        else {
            $this->data['http_status'] = http_response_code();
            $this->data['title'] = http_response_code();
            $this->render("templates/$onError", $this->data);
        }

        $this->render("templates/$footer", $this->data);
    }

    private function render(string $viewPath, $data = [])
    {
        require_once "../app/views/{$viewPath}.php";
    }
}