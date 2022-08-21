<?php

class Quiz extends Controller 
{
    public function index()
    {
        echo 'tai';
    }

    public function kategori($category)
    {
        $quizModel = $this->model("Quiz_model");
        $data['level'] = $quizModel->category($category); 
        $this->view('templates/header', $data);
        $this->view('home/level', $data);
        $this->view('templates/footer');
    }

    public function level()
    { 
        $this->view('templates/header');
        $this->view('quiz/Halaman_soal');
        $this->view('templates/footer');   
    } 
}