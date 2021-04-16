<?php
namespace App\Models;

class User extends Model implements ModelInterface{
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $birth_day;
    private $active;
    private $created_at;
    private $deleted_at;
    private $updated_at;

    public function __construct(
        $id = null, 
        $first_name = "", 
        $last_name = "", 
        $email = "", 
        $birth_day = '',
        $active = 1,
        $created_at = '',
        $deleted_at = '',
        $updated_at = ''
    ){
        parent::__construct();
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->birth_day = $birth_day;
        $this->active = $active;
        $this->created_at = $created_at;
        $this->deleted_at = $deleted_at;
        $this->updated_at = $updated_at;
    }

    //Getters
    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getBirthDay()
    {
        return $this->birth_day;
    }
    
    public function getActive() 
    {
        return $this->active;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    //Setters
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setBirthDay($birth_day)
    {
        $this->birth_day = $birth_day;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function toJson()
    {
        //echo json_encode(get_object_vars($this));
        return json_decode((string) json_encode(get_object_vars($this)), true);
    }

    public function all()
    {

    }

    public function find($id)
    {
        
    }

    public function create()
    {
        
    }

    public function update()
    {
        
    }

    public function delete($id)
    {
        
    }
}