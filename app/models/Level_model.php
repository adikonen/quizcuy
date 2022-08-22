<?php

class Level_model extends Model 
{
    public string $table = "level";

    public function maxLevel()
    {
        $this->db->query("SELECT max(nama_level) AS max_level FROM level");
        return $this->db->single()['max_level'];
    }

    public function get_level(int $level)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE nama_level = :nama_level");
        $this->db->bind(":nama_level",$level);
        return $this->db->singleOr404()['nama_level'];
    }
}