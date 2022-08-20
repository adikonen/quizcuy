<?php

class Shop_model extends Model {

    public function buy($user_id)
    {
        $sql = "SELECT jumlah_koin FROM user WHERE user_id = '$user_id'";

        $this->db->query($sql);
        $hasil = $this->db->single();   
        return $hasil; 
    }

    public function readKoin()
    {
        $sql = "SELECT * FROM koin_nyawa";

        $this->db->query($sql);
        $hasil = $this->db->resultSet();   
        return $hasil; 
    }

    public function readCash()
    {
        $sql = "SELECT * FROM cash_nyawa";

        $this->db->query($sql);
        $hasil = $this->db->resultSet();   
        return $hasil;
    }

    public function cash_payment(int $user_id, int $cash_nyawa_id)
    {   
        $this->db->query("SELECT jumlah_nyawa FROM user WHERE user_id = :user_id");
        $this->db->bind(":user_id", $user_id);
        $jumlah_nyawa_sebelumnya = $this->db->single()['jumlah_nyawa'];
        
        $userSql = "UPDATE user SET jumlah_nyawa = :jumlah_nyawa WHERE user_id = :user_id";
        $cashSql = "SELECT jumlah_nyawa_dipulihkan FROM cash_nyawa WHERE cash_nyawa_id = :cash_nyawa_id";

        $this->db->query($cashSql);
        $this->db->bind(":cash_nyawa_id",$cash_nyawa_id);
        $jumlah_nyawa_dipulihkan = $this->db->single()['jumlah_nyawa_dipulihkan'];

        $this->db->query($userSql);
        $this->db->bind(":jumlah_nyawa",$jumlah_nyawa_sebelumnya + $jumlah_nyawa_dipulihkan);
        $this->db->bind(":user_id", $user_id);
        $this->db->execute();

        $this->db->query("INSERT INTO user_cash_nyawa (fk_user_id, fk_cash_nyawa_id)
             VALUES (:fk_user_id, :fk_cash_nyawa_id)
        ");

        $this->db->bind(":fk_user_id", $user_id);
        $this->db->bind("fk_cash_nyawa_id", $cash_nyawa_id);

        $this->db->execute();
        return redirect("/shop", ['success' => "berhasil membeli nyawa!"]);
    }
    public function coin_payment(int $user_id, int $koin_nyawa_id)
    {   
        $this->db->query("SELECT jumlah_nyawa, jumlah_koin FROM user WHERE user_id = :user_id");
        $this->db->bind(":user_id", $user_id);
        $user = $this->db->single();
        
        $jumlah_nyawa_sebelumnya = $user['jumlah_nyawa'];
        $jumlah_koin_sebelumnya = $user['jumlah_koin'];

        $koinSql = "SELECT jumlah_nyawa_dipulihkan, jumlah_koin_dibayar FROM koin_nyawa WHERE koin_nyawa_id = :koin_nyawa_id";
        
        $this->db->query($koinSql);
        $this->db->bind(":koin_nyawa_id",$koin_nyawa_id);
        $koin_nyawa = $this->db->single();

        $jumlah_nyawa_dipulihkan = $koin_nyawa['jumlah_nyawa_dipulihkan'];
        $jumlah_koin_dibayar = $koin_nyawa['jumlah_koin_dibayar'] ;
        $koin_user = $jumlah_koin_sebelumnya - $jumlah_koin_dibayar;

        if ($koin_user < 0){
            return false;
        }

        $userSql = "UPDATE user SET jumlah_nyawa = :jumlah_nyawa, jumlah_koin = :jumlah_koin WHERE user_id = :user_id";

        $this->db->query($userSql);
        $this->db->bind(":jumlah_nyawa",$jumlah_nyawa_sebelumnya + $jumlah_nyawa_dipulihkan);
        $this->db->bind(":jumlah_koin",$koin_user);
        $this->db->bind(":user_id", $user_id);
        $this->db->execute();

        $this->db->query("INSERT INTO user_koin_nyawa (fk_user_id, fk_koin_nyawa_id)
             VALUES (:fk_user_id, :fk_koin_nyawa_id)
        ");

        $this->db->bind(":fk_user_id", $user_id);
        $this->db->bind("fk_koin_nyawa_id", $koin_nyawa_id);

        $this->db->execute();
        return true;
    }
  
}