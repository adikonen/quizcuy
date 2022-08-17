<?php 

class User_model extends Model {
    public string $table = 'user';

    public function getSumTopUp(int $userId)
    {
        $this->db->query("SELECT sum(jumlah_cash_dibayar) as sum_cash from user_cash_nyawa inner join cash_nyawa on fk_cash_nyawa_id = cash_nyawa_id where fk_user_id = :fk_user_id");
        $this->db->bind("fk_user_id", $userId);
        return $this->db->single();
    }

    public function getSumCoin(int $userId)
    {
        $this->db->query("SELECT sum(jumlah_koin_dibayar) as sum_koin from user_koin_nyawa inner join koin_nyawa on fk_koin_nyawa_id = koin_nyawa_id where fk_user_id = :fk_user_id");
        $this->db->bind("fk_user_id", $userId);
        return $this->db->single();
    }

    public function searchByUserName(string $nama)
    {
        $sql = "SELECT * FROM {$this->table} WHERE nama LIKE concat('%', :nama, '%')";
        $this->db->query($sql);
        $this->db->bind(":nama", $nama);
        return $this->db->resultSet();
    }

    public function topUpStats()
    {
        $currentYear = date('Y');
        $sql = "SELECT date_format(user_cash_nyawa.dibuat_saat, '%M') as Month,sum(jumlah_cash_dibayar) as total
            from user_cash_nyawa inner join cash_nyawa ON cash_nyawa_id = fk_cash_nyawa_id WHERE YEAR(user_cash_nyawa.dibuat_saat) = $currentYear
            group by date_format(user_cash_nyawa.dibuat_saat, '%M') ";

        return $this->db->quickQuery($sql);
    }

    public function currentYearEarn()
    {
        $year = date('Y');

        $sql = "SELECT sum(jumlah_cash_dibayar) as total FROM user_cash_nyawa INNER JOIN cash_nyawa ON fk_cash_nyawa_id = cash_nyawa_id WHERE YEAR(user_cash_nyawa.dibuat_saat) = $year";
       
        $res = $this->db->quickQuery($sql)[0]['total'];
        
        return $res;
    }

    public function currentMonthEarn()
    {
        $month = date('m');
        $year = date('Y');

        $sql = "SELECT sum(jumlah_cash_dibayar) as total FROM user_cash_nyawa 
            INNER JOIN cash_nyawa ON fk_cash_nyawa_id = cash_nyawa_id WHERE 
            MONTH(user_cash_nyawa.dibuat_saat) = {$month} AND YEAR(user_cash_nyawa.dibuat_saat) = {$year}
            ";
        
        $res = $this->db->quickQuery($sql)[0]['total'];
        return $res;
    }

    public function register($nama, $email, $password, $noTelpon)
    {
        $sql = "INSERT INTO user (nama, email, password, no_telpon) VALUES ('$nama', '$email', '$password', '$noTelpon') ";  
        try {
            $this->db->quickQuery($sql);
        }
        catch(Exception $e){
            var_dump($e->getTrace());
        }
    }

    public function userQuizLevel(?string $username = null)
    {
        $sql = "SELECT user.nama, nama_level, nama_kategori FROM user_level_kategori
         INNER JOIN user ON fk_user_id = user_id 
         INNER JOIN level ON fk_level_id = level_id
         INNER JOIN kategori_quiz ON fk_kategori_quiz_id = kategori_quiz_id
         ";

        if($username != null && $username !== 'all')
        {
            $sql .= "WHERE user.nama LIKE concat('%',:nama,'%')";
        }

        $this->db->query($sql);
        
        if($username != null && $username !== 'all')
        {
            $this->db->bind(":nama",$username);
        }
        return $this->db->resultSet();
    }
}