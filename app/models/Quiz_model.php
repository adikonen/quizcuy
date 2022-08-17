<?php

class Quiz_model extends Model 
{

   public string $table = "quiz";

   public function all()
   {
      $result = [];

      $this->db->query("SELECT kategori_quiz_id FROM kategori_quiz");
      $quizCategoryIds = $this->db->resultNum();

      $quizCategoryIds = $quizCategoryIds !== null
         ? array_map(fn (array $items) => $items[0], $quizCategoryIds)
         : [];
     
      $sql = "SELECT nama_level, nama_kategori, soal, opsi_a, opsi_b, opsi_c, opsi_d, jawaban_benar, quiz.dibuat_saat FROM quiz
         INNER JOIN level ON fk_level_id = level_id
         INNER JOIN kategori_quiz ON fk_kategori_quiz_id = kategori_quiz_id 
         WHERE fk_kategori_quiz_id = :fk_kategori_quiz_id";
      
      $this->db->query($sql);
      foreach($quizCategoryIds as $id)
      {
         $this->db->bind(":fk_kategori_quiz_id", $id);
         array_push($result, $this->db->resultSet());
      }

      return $result;
   }
}