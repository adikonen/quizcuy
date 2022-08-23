<?php

class Quiz extends Controller 
{
    private Quiz_model $quizModel;

    public function __construct()
    {
        parent::__construct();
        $this->quizModel = $this->model("Quiz_model");
        
    }

    public function index()
    {
        echo 'tai';
    }

    public function kategori(string $category)
    {
        $data['title'] = "Pilih Level";
        $data['level'] = $this->quizModel->category($category); 
        $this->view('templates/header', $data);
        $this->view('home/level', $data);
        $this->view('templates/footer');
    }

    public function level(string $category, int $level_diberikan)
    { 
        $levelModel = $this->model("Level_model");
        $level = $levelModel->get_level($level_diberikan);
        $data['quiz'] = $this->quizModel->randomPickByLevel($level, $category);
   
        $data['title'] = "Quiz Level {$data['quiz']['nama_level']}";

        $this->view('templates/header',$data);
        $this->view('quiz/Halaman_soal',$data);
        $this->view('templates/footer');   
    } 

    public function store_user_answer(int $quizId)
    {
        $this->acceptedMethods("POST");
        $jawabanModel = $this->model("JawabanPilihanUser_model");
        $quiz = $this->quizModel->get($quizId);
        // $jawabanModel->create([
        //     "fk_quiz_id" => $quizId,
        //     "fk_user_id" => $_SESSION['user_login']['user_id'],
        //     "pilihan" => $_POST['pilihan']
        // ]);
        $userModel = $this->model("User_model");
        
        if($this->quizModel->isCorrect($quizId, $_POST['opsi_jawaban'])){
            $userModel->update($_SESSION['user_login']['user_id'], ['jumlah_koin' => $_SESSION['user_login']['jumlah_koin'] + $quiz['jumlah_koin_didapatkan']]);
            $_SESSION['user_login']['jumlah_koin'] =  $_SESSION['user_login']['jumlah_koin'] + $quiz['jumlah_koin_didapatkan'];
            return redirect("quiz/kategori/{$quiz['nama_kategori']}", ["success" => "Selamat jawaban Anda benar, silahkan selesaikan level berikutnya!"]);
        }

        $_SESSION['user_login']['jumlah_nyawa'] -= 1;

        $userModel->update($_SESSION['user_login']['user_id'], [
           "jumlah_nyawa" => $_SESSION['user_login']['jumlah_nyawa']
        ]);
        return redirectBack(['fail' => "SALAH"]);

    }
    
}