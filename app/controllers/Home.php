<?php 

class Home extends Controller 
{
    public function index()
    {
      $kategoriQuizModel = $this->model("KategoriQuiz_model");
      $data['semua_kategori'] = $kategoriQuizModel->all();

      $data['title'] = 'Home';
      $this->view('templates/header', $data);
      $this->view("home/index", $data);
      $this->view('templates/footer');
    }
}