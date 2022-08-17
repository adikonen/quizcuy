<?php
class Dashboard extends Controller
{

    public User_model $userModel;

    public function __construct()
    {
        $this->userModel = $this->model("User_model");
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
        $this->view('templates/admin-header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/admin-footer');
    }

    public function user_quiz_table(?string $searchedUserByName = null)
    {
        $data['title'] = "Admin - Advance - UserInformation";

        $data['user_quiz_information'] = $this->userModel->userQuizLevel($searchedUserByName);

        $this->view('templates/admin-header', $data);
        $this->view("dashboard/user/advance",$data);
        $this->view("templates/admin-footer");
    }
    public function user_table(?string $searchedUserByName = null)
    {
        $data['title'] = "Admin - UserInformation";
        
        $searchedUserByName == null 
            ?$data['users'] = $this->userModel->all()
            :$data['users'] = $this->userModel->searchByUserName($searchedUserByName);

        $this->view('templates/admin-header', $data);
        $this->view('dashboard/user/index', $data);
        $this->view('templates/admin-footer');
    }

    public function edit_user(int $id)
    {
        
        $data['user'] = $this->userModel->get($id);
        $data['sum_koin'] = $this->userModel->getSumCoin($id)['sum_koin'] ?? null;
        $data['sum_cash'] = $this->userModel->getSumTopUp($id)['sum_cash'] ?? null;
        $data['title'] = "Edit " . $data['user']['nama'];
      
        $this->view('templates/admin-header', $data);
        $this->view('dashboard/user/edit', $data);
        $this->view('templates/admin-footer');
    }

    public function quiz()
    {
        $quizModel = $this->model('Quiz_model');
        $kategoriQuizModel = $this->model('KategoriQuiz_model');

        $data['all_category'] = $kategoriQuizModel->all();
        $data['title'] = "Admin - Quiz";

        $this->view("templates/admin-header", $data);
        $this->view("dashboard/quiz/index", $data);
        $this->view("templates/admin-footer");
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
}