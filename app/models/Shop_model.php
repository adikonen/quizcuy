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

    public function cash_payment(int $user_id, int $cash_id)
    {
        $this->db->query("SELECT jumlah_nyawa FROM user WHERE user_id = :user_id");
        $this->db->bind(":user_id", $user_id);
        $jumlah_nyawa = $this->db->single()['jumlah_nyawa'];
        $userSql = "UPDATE user SET jumlah_nyawa = :jumlah_nyawa WHERE user_id = :user_id";
        $cashSql = "SELECT jumlah_nyawa_dipulihkan WHERE cash_id = :cash_id";

        $this->db->query($cashSql);
        $this->db->bind(":cash_id",$cash_id);
        $jumlah_nyawa_dipulihkan = $this->db->single()['jumlah_nyawa_dipulihkan'];

        $this->db->query($userSql);
        $this->db->bind(":jumlah_nyawa",$jumlah_nyawa_dipulihkan);
    }
  
}