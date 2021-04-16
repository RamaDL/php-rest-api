<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
    private $user;

    public function setUp(){
        $this->user = new App\Models\User;
    }

    /** @test */
    public function get_user_id(){
        $this->assertEquals(null, $this->user->getId());
    }

    /** @test */
    public function get_user_first_name(){
        $this->assertEquals("", $this->user->getFirstName());
    }

    /** @test */
    public function get_user_last_name(){
        $this->assertEquals("", $this->user->getLastName());
    }

    /** @test */
    public function get_user_email(){
        $this->assertEquals("", $this->user->getEmail());
    }

    /** @test */
    public function get_user_birth_day(){
        $this->assertEquals("", $this->user->getBirthDay());
    }

    /** @test */
    public function get_user_active(){
        $this->assertEquals(1, $this->user->getActive());
    }

    /** @test */
    public function get_user_created_at(){
        $this->assertEquals('', $this->user->getCreatedAt());
    }

    /** @test */
    public function get_user_updated_at(){
        $this->assertEquals('', $this->user->getUpdatedAt());
    }

    /** @test */
    public function get_user_deleted_at(){
        $this->assertEquals('', $this->user->getDeletedAt());
    }

    /** @test */
    public function get_user_as_json(){
        var_dump($this->user->toJson());
        $this->assertArrayHasKey('first_name', $this->user->toJson());
    }

    /** @test */
    public function set_user_first_name(){
        $this->assertEquals("Mikhail", $this->user->getFirstName());
    }

    /** @test */
    public function set_user_last_name(){
        $this->user->setLastName("Lomonosov");
        $this->assertEquals("Lomonosov", $this->user->getLastName());
    }

    /** @test */
    public function set_user_email(){
        $this->user->setEmail("ramirodl@gmail.com");
        $this->assertEquals("ramirodl@gmail.com", $this->user->getEmail());
    }

    /** @test */
    public function set_user_birth_day(){
        $this->user->setBirthday('1999-12-12');
        $this->assertEquals('1999-12-12', $this->user->getBirthday());
    }

    /** @test */
    public function set_user_active(){
        $this->user->setActive(0);
        $this->assertEquals(0, $this->user->getActive());
    }
}