<?php
class Rules extends Controller{
    public function index()
    {
        $this->view('templates/header');
        $this->view('rules/aturan');
        $this->view('templates/footer');
    }
} 
