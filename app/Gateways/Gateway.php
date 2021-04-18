<?php
namespace App\Gateways;
use \App\Config\DB;

class Gateway 
{
	protected $DB;

    public function __construct()
    {
        $this->DB = new DB();
    }
}