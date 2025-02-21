<?php

namespace Models;

use Classes\Database;

class Task
{
    protected $id;
    protected $name;
    protected $description;
    protected $status;
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getTaskFromId($id)
    {
        $sql = "SELECT * FROM tasks WHERE task_id = :id";
        return $this->db->runSQL($sql, [':id'=> $id])->fetch();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM tasks";
        return $this->db->runSQL($sql)->fetchAll();
    }


    public function addTask($name, $description, $status) : bool
    {
        try
        {
            $sql = "INSERT INTO tasks (name, description, status) VALUES (:name, :description, :status)";
            $this->db->runSQL($sql, [':name'=>$name, ':description'=>$description, ':status'=>$status]);
            return true;
        }
        catch(\PDOException $e)
        {
            return false;
        }
    }

    public function deleteTask($id) : void
    {
        $sql = "DELETE FROM tasks WHERE task_id = :id";
        $this->db->runSQL($sql, [':id'=>$id]);
    }
}