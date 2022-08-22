<?php

class Quiz_model extends Model 
{

   public string $table = "quiz";
   private string $commonSql = "SELECT quiz_id, soal, opsi_a, opsi_b,
          opsi_c, opsi_d, jawaban_benar,link_foto_soal,
          nama_kategori, nama_level FROM quiz INNER JOIN level ON fk_level_id = level_id
          INNER JOIN kategori_quiz ON fk_kategori_quiz_id = kategori_quiz_id ";

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
     
      $result = $this->db->resultSetOr404();
      return $result;
   }

   public function get(int $quizId)
   {
      $sql = $this->commonSql . "WHERE quiz_id = :quiz_id";

      $this->db->query($sql);   
      $this->db->bind(":quiz_id", $quizId);
     
      $result = $this->db->singleOr404();
      
      return $result;
   }



   public function level(string $category)
   {
      $this->db->query("SELECT distinct nama_level, nama_kategori from quiz inner join level on fk_level_id = level_id inner join kategori_quiz on fk_kategori_quiz_id = kategori_quiz_id where nama_kategori = :nama_kategori ORDER BY nama_level");
      $this->db->bind(':nama_kategori',$category);
      return $this->db->resultSetOr404();
   }
   // public function detail(string $category, int $level)
   // {
   //    $sql = "SELECT quiz_id, soal, opsi_a, opsi_b, opsi_c, opsi_d, jawaban_benar,
   //       quiz.dibuat_saat, nama_level, nama_kategori FROM quiz 
   //       INNER JOIN kategori_quiz ON fk_kategori_quiz_id = kategori_quiz_id
   //       INNER JOIN level ON fk_level_id = level_id
   //       WHERE nama_kategori = :nama_kategori AND nama_level = :nama_level;
   //    "; 

   //    $this->db->query($sql);
   //    $this->db->bind(":nama_kategori",$category);
   //    $this->db->bind(":nama_level", $level);

   //    return $this->db->singleOr404();
   // }

   public function userAnswers(int $quizId)
   {
      $this->db->query("SELECT
         nama, pilihan, fk_quiz_id, jawaban_benar
          FROM jawaban_pilihan_user
         INNER JOIN user ON fk_user_id = user_id 
         INNER JOIN quiz ON fk_quiz_id = quiz_id
         WHERE fk_quiz_id = :fk_quiz_id
      ");
      $this->db->bind(":fk_quiz_id",$quizId);
      return $this->db->resultSet();
   }

   public function randomPickByLevel(int $level, string $categoryName)
   {
      $sql = $this->commonSql . "WHERE nama_level = :nama_level AND nama_kategori = :nama_kategori";
      $this->db->query($sql);
      $this->db->bind(":nama_level",$level);
      $this->db->bind(":nama_kategori",$categoryName);
      $hasil = $this->db->resultSet();

      return $hasil[mt_rand(0, count($hasil) - 1)];
   }
   public function correctAnswer(int $quizId)
   {
      $this->db->query("SELECT jawaban_benar FROM quiz WHERE quiz_id = :quiz");
      $this->db->bind(":quiz",$quizId);
      return $this->db->singleOr404();
   }

   public function isCorrect(int $quizId, string $answers)
   {
      return $this->get($quizId)['jawaban_benar'] === $answers;
   }

   public function category($categoryName)
   {
      $this->db->query("SELECT DISTINCT nama_level, nama_kategori FROM level INNER JOIN quiz ON fk_level_id = level_id INNER JOIN 
      kategori_quiz ON fk_kategori_quiz_id = kategori_quiz_id WHERE nama_kategori = '$categoryName'");

      return $this->db->resultSet();
   }  


} 