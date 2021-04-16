<?php
namespace App\Models;

class Model 
{
	public $db_connection;

    public function __construct()
    {
        $this->db_connection = new \App\Config\DB;
    }
}