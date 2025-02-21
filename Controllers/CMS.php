<?php

namespace Controllers;

use Classes\Database;
use Models\Task;

class CMS
{
    protected $db = null;
    protected $task = null;
    public function __construct($dsn, $username, $password)
    {
        $this->db = new Database($dsn, $username, $password);
    }

    public function getTask()
    {
        $this->task = new Task($this->db);
        return $this->task;
    }
}