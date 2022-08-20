<?php

class Quiz extends Controller 
{
    public function index()
    {
    
    }

    public function level()
    {
        $this->view('templates/header');
        $this->view('home/level');
        $this->view('templates/footer');
    }

    
}