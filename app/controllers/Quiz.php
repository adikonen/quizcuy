<?php

class Quiz extends Controller 
{
    private Quiz_model $quizModel;

    public function __construct()
    {
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


        // $jawabanModel->create([
        //     "fk_quiz_id" => $quizId,
        //     "fk_user_id" => $_SESSION['user_login']['user_id'],
        //     "pilihan" => $_POST['pilihan']
        // ]);

        if($this->quizModel->isCorrect($quizId, 'a')){
            return redirectBack(["success" => "Jawban Anda Benar!"]);
        }
        return redirectBack(['fail' => "SALAH"]);

    }
    
}