<?php

class DatabaseTest extends PHPUnit\Framework\TestCase
{
    /** @test */
    public function can_connect_to_database(){
        $db = new \App\Config\DB;
        $this->assertInstanceOf ('PDO', $db->getConnection());
    }
}