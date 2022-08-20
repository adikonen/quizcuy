<?php

class Quiz_model extends Model 
{

   public string $table = "quiz";

   public function show(string $categoryName, int $level)
   {
      $sql = "SELECT quiz_id, soal, opsi_a, opsi_b,
          opsi_c, opsi_d, jawaban_benar,link_foto_soal,
          nama_kategori, nama_level FROM quiz 
          INNER JOIN level ON fk_level_id = level_id
          INNER JOIN kategori_quiz ON fk_kategori_quiz_id = kategori_quiz_id
          WHERE nama_kategori = :nama_kategori AND nama_level = :nama_level";

      $this->db->query($sql);   
      $this->db->bind(":nama_kategori", $categoryName);
      $this->db->bind(":nama_level", $level);
     
      return $this->db->resultSet();
   }

   public function get(int $quizId)
   {
      $sql = "SELECT quiz_id, soal, opsi_a, opsi_b,
          opsi_c, opsi_d, jawaban_benar,link_foto_soal,
          nama_kategori, nama_level FROM quiz INNER JOIN level ON fk_level_id = level_id
          INNER JOIN kategori_quiz ON fk_kategori_quiz_id = kategori_quiz_id WHERE quiz_id = :quiz_id";

      $this->db->query($sql);   
      $this->db->bind(":quiz_id", $quizId);
    
     
      return $this->db->single();
   }
   public function level(string $category)
   {
      $this->db->query("SELECT distinct nama_level, nama_kategori from quiz inner join level on fk_level_id = level_id inner join kategori_quiz on fk_kategori_quiz_id = kategori_quiz_id where nama_kategori = :nama_kategori");
      $this->db->bind(':nama_kategori',$category);
      return $this->db->resultSet();
   }
   public function detail(string $category, int $level)
   {
      $sql = "SELECT quiz_id, soal, opsi_a, opsi_b, opsi_c, opsi_d, jawaban_benar,
         quiz.dibuat_saat, nama_level, nama_kategori FROM quiz 
         INNER JOIN kategori_quiz ON fk_kategori_quiz_id = kategori_quiz_id
         INNER JOIN level ON fk_level_id = level_id
         WHERE nama_kategori = :nama_kategori AND nama_level = :nama_level;
      "; 

      $this->db->query($sql);
      $this->db->bind(":nama_kategori",$category);
      $this->db->bind(":nama_level", $level);

      return $this->db->single();
   }

   public function userAnswers(string $category, int $level)
   {
      $quizId = $this->detail($category, $level)['quiz_id'];
      $this->db->query("SELECT * FROM jawaban_pilihan_user WHERE fk_quiz_id = :fk_quiz_id");
      $this->db->bind(":fk_quiz_id",$quizId);
      return $this->db->resultSet();
   }


} 