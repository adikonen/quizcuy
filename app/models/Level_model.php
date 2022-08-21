<?php

class Level_model extends Model 
{
    public string $table = "level";

    public function maxLevel()
    {
        $this->db->query("SELECT max(nama_level) AS max_level FROM level");
        return $this->db->single()['max_level'];
    }
}