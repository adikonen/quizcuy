<?php 

class User_model {
    private $table = 'user';
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function find(int $id)
    {
        $this->db->query("SELECT * FROM kategori_quiz WHERE kategori_quiz_id = :user_id");
        $this->db->bind(":kategori_quiz_id", $id);
        return $this->db->single();
    }
}