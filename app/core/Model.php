<?php

abstract class Model {
    public string $table;
    protected ?Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get(int $id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE {$this->table}_id = :id LIMIT 1");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function all()
    {
       return $this->db->quickQuery("SELECT * FROM {$this->table}");
    }

    public function update(int $id, array $data)
    {
        $updateSyntax = "UPDATE {$this->table} SET ";
        $lastIndex = count($data) - 1;
        $currentIndex = 0;
        $bind = [];
        foreach($data as $k => $v)
        {
            $bind[":$k"] = $v;

            if($currentIndex < $lastIndex){
                $updateSyntax .= $k . " = " . ":$k" . ", ";
            }
            $currentIndex++;
        }
        
        $updateSyntax .= $k . " = " .":$k". " WHERE {$this->table}_id = :{$this->table}_id";
        
        $this->db->query($updateSyntax);
        
        foreach($bind as $key => $value){
            $this->db->bind($key, $value);
        }
        $this->db->bind(":{$this->table}_id", $id);
        return $this->db->resultSet();
    }

    public function delete(int $id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE {$this->table}_id = :{$this->table}_id");
        $this->db->bind("{$this->table}_id", $id);
        return $this->db->single();    
    }

}