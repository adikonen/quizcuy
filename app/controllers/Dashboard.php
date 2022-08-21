<?php
class Dashboard extends Controller
{
    private User_model $userModel;
    private Quiz_model $quizModel;

    public function __construct()
    {
        $this->userModel = $this->model("User_model");
        $this->quizModel = $this->model("Quiz_model");

        $this->access('admin_only');
    }

    public function index()
    {
        $data['title'] = "Admin - Dashboard";
        
        $chart = $this->userModel->topUpStats();
    
        //membuat bentuk array lebih simple dan mudah diolah
        $chart = array_map(function($item){
            return $item['total']; 
        },$chart);
        
        $data['chart'] = implode(',',$chart);
        $data['month-earning'] = $this->userModel->currentMonthEarn();
        $data['year-earning'] = $this->userModel->currentYearEarn();
       
        $this->render("dashboard/index",$data)->adminDashboard();
    }

    public function user_quiz_table(?string $searchedUserByName = null)
    {
        $data['title'] = "Admin - Advance - UserInformation";

        $data['user_quiz_information'] = $this->userModel->userQuizLevel($searchedUserByName);

        $this->render("dashboard/user/advance",$data)->admin();
    }
    public function user_table(?string $searchedUserByName = null)
    {
        $data['title'] = "Admin - UserInformation";
        
        $searchedUserByName == null 
            ?$data['users'] = $this->userModel->all()
            :$data['users'] = $this->userModel->searchByUserName($searchedUserByName);

        $this->render('dashboard/user/index', $data)->admin();
    }

    public function edit_user(int $id)
    {
        
        $data['user'] = $this->userModel->get($id);
        $data['sum_koin'] = $this->userModel->getSumCoin($id)['sum_koin'] ?? null;
        $data['sum_cash'] = $this->userModel->getSumTopUp($id)['sum_cash'] ?? null;
        $data['title'] = "Edit User"; // $data['user']['nama'];
        
        $this->render('dashboard/user/edit', $data)->admin();
    }

    

    public function quiz()
    {
        $kategoriQuizModel = $this->model('KategoriQuiz_model');

        $data['all_category'] = $kategoriQuizModel->all();
        $data['title'] = "Admin - Quiz";

        $this->render("dashboard/quiz/index", $data)->admin();
    }

    public function quiz_level(string $category)
    {
        $data['levels'] = $this->quizModel->level($category);
        $data['nama_kategori'] = $data['levels'][0]['nama_kategori'] ?? '';
        
        $data['title'] = "Admin - Level Quiz {$data['nama_kategori']}";
        
        $this->render("dashboard/quiz/level-quiz",$data)->admin();
    }

    public function quiz_show(string $category, int $level)
    {
        $data['title'] = "Admin QuizShow";
        $data['quizzes'] = $this->quizModel->show($category, $level);
        
        $data['nama_kategori'] = $data['quizzes'][0]['nama_kategori'] ?? [];
        $data['nama_level'] = $data['quizzes'][0]['nama_level'] ?? [];
        
        $this->render("dashboard/quiz/show", $data)->admin();
    }

    public function quiz_user_answers(int $quizId)
    {
        $data['jawaban_benar'] = $this->quizModel->correctAnswer($quizId)['jawaban_benar'] ?? [];
        
        $data['users'] = $this->quizModel->userAnswers($quizId);
        $data['title'] = "Jawaban Dari User";
        
        count($data['users']) < 1
            ? $this->render("templates/admin/empty", $data)->admin()
            : $this->render("dashboard/quiz/user-answers",$data)->admin();
    }
    
    public function quiz_edit(int $quizId)
    {
        $data['title'] = "Edit Quiz";
        $data['quiz'] = $this->quizModel->get($quizId);

        
        $this->render("dashboard/quiz/edit", $data)->admin();
    }
    public function quiz_create()
    {
        $data['title'] = "Buat Quiz";
        $data['kategori'] = $this->model("KategoriQuiz_model")->select("kategori_quiz_id", "nama_kategori");
        $data['max_level'] = $this->model("Level_model")->maxLevel();
    
        $this->render("dashboard/quiz/create",$data)->admin();
    }

    //ONLY POST ACTION
    public function update_user(int $id)
    {
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            Validator::check([
                'nama' => ['min' => 8, 'max' => 70],
                'email' => ['min' => 8, 'max' =>70],
                'no_telpon' => ['min' => 8, 'max' => 30],
            ])->ifHasErrorThrowTo("/dashboard/edit_user/{$id}");

            $this->userModel->update($id, [
                "nama" => $_POST['nama'],
                "email" => $_POST['email'],
                "no_telpon" => $_POST["no_telpon"],
                "jumlah_nyawa" => $_POST["jumlah_nyawa"],
                "jumlah_koin" => $_POST["jumlah_koin"]
            ]);      
            return redirect("/dashboard/edit_user/{$id}", ['success' => "Berhasil Mengupdate Data User {$_POST['nama']}!"]);
        }
        else {
            return redirect("/dashboard", ['fail' => 'Akses Halaman Edit User Untuk Mengubah Data User!']);
        }
    }

    public function delete_user(int $id)
    {
        if($_SERVER["REQUEST_METHOD"] !== "POST")
        {
      
            return redirect("/dashboard", ['fail' => 'Silahkan Tekan Tombol Hapus User Untuk Menghapus Pada Halaman Informasi > Pengguna > Hapus']);    
        }

        try {
            
            $this->userModel->delete($id);
        }

        catch(Exception $err)
        {
            return redirect("/dashbaord/user_table", ['fail' => "gagal menghapus user!"]);
        }

        return redirect("/dashboard/user_table", ['success' => 'Berhasil Menghapus User!']);
    }

    public function store_quiz()
    {
        $this->acceptedMethods("POST");
        
        $imageManager = new ImageManager('gambar', 'img/quiz/');

        Validator::check([
            "soal" => ["min" => 5, "max" => 1000],
            "input_opsi_a" => ["min" => 4, "max" => 255],
            "input_opsi_b" => ["min" => 4, "max" => 255],
            "input_opsi_c" => ["min" => 4, "max" => 255],
            "input_opsi_d" => ["min" => 4, "max" => 255],
            "jawaban_benar" => ['min' => 1]
        ])->ifHasErrorThrowTo("dashboard/quiz_create/");

        if(!$imageManager->isNull()){
            try {
                $imageManager
                    ->mustImage()
                    ->mustNotExists()
                    ->upload();
            }
            catch(Exception $fail)
            {
                return redirect("/dashboard/quiz_create/", ['fail' => $fail->getMessage()]);
            }        
        }

        try {
            $this->quizModel->create([
                "soal" => $_POST["soal"],
                "opsi_a" => $_POST["input_opsi_a"],
                "opsi_b" => $_POST["input_opsi_b"],
                "opsi_c" => $_POST["input_opsi_c"],
                "opsi_d" => $_POST["input_opsi_d"],
                "fk_kategori_quiz_id" => $_POST['kategori'],
                "fk_level_id" => $_POST['level'],
                "jawaban_benar" => $_POST['jawaban_benar'],
                "link_foto_soal" => $imageManager->imagePath
            ]);
        }
        catch(Exception $err){
            var_dump($err->getTrace());
            die;
        }
        return redirect("/dashboard/quiz_create/", ['success' => "Berhasil Membuat Quiz Baru!"]);
    }

    public function update_quiz(int $id)
    {
        $this->acceptedMethods("POST");
        $quiz = $this->quizModel->get($id);
        // var_dump($_FILES);
        // var_dump($_POST);
        $imageManager = new ImageManager('gambar','img/quiz/');
      
         Validator::check([
            "soal" => ["min" => 5, "max" => 1000],
            "input_opsi_a" => ["min" => 4, "max" => 255],
            "input_opsi_b" => ["min" => 4, "max" => 255],
            "input_opsi_c" => ["min" => 4, "max" => 255],
            "input_opsi_d" => ["min" => 4, "max" => 255],
            "jawaban_benar" => ['min' => 1]
        ])->ifHasErrorThrowTo("dashboard/quiz_edit/$id");

        if(!$imageManager->isNull()){
            try {
                $imageManager
                    ->mustImage()
                    ->mustNotExists()
                    ->uploadOrChange($quiz['link_foto_soal']);
            }
            catch(Exception $fail)
            {
                return redirect("/dashboard/quiz_edit/{$id}", ['fail' => $fail->getMessage()]);
            }        
        }
        try {
            $this->quizModel->update($id, [
                "soal" => $_POST["soal"],
                "opsi_a" => $_POST["input_opsi_a"],
                "opsi_b" => $_POST["input_opsi_b"],
                "opsi_c" => $_POST["input_opsi_c"],
                "opsi_d" => $_POST["input_opsi_d"],
                "jawaban_benar" => $_POST['jawaban_benar'],
                "link_foto_soal" => $quiz['link_foto_soal'] ?? $imageManager->imagePath
            ]);
        }
        catch(Exception $err){
            var_dump($err->getTrace());
            die;
        }

        return redirect("/dashboard/quiz_edit/{$id}", ['success' => "Berhasil Update Quiz!"]);
        
    }

    public function delete_quiz(int $id)
    {
        $this->acceptedMethods("POST");
        try {
            $quiz = $this->quizModel->get($id);

            $imageManager = new ImageManager('gambar', "img/quiz/");

            if(! $imageManager->isNull()){
                $imageManager->delete($quiz['link_foto_soal']);
            }

            $this->quizModel->delete($id);
        }
        catch(Exception $err)
        {
            return redirect("dashboard/quiz_show/{$quiz['nama_kategori']}/{$quiz['nama_level']}}", ['fail' => 'gagal menghapus quiz']);
        }

        return redirect("dashboard/quiz_show/{$quiz['nama_kategori']}/{$quiz['nama_level']}", ['success' => 'berhasil menghapus quiz']);

    }
    public function store_kategori_quiz()
    {
    
    }

    public function update_kategori_quiz()
    {
    
    }
    
    public function delete_kategori_quiz()
    {
    
    }

    public function store_level()
    {
    
    }

    public function update_level()
    {
    
    }

    public function delete_level()
    {
    
    }
}