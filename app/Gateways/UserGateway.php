<?php
namespace App\Gateways;

class UserGateway extends Gateway implements GatewayInterface{

    public function __construct( )
    {
        parent::__construct();
    }

    public function all()
    {
        $statement = "SELECT * FROM Users;";

        try {
            $con = $this->DB->getConnection();
            $result = $con->query($statement)->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function find($id)
    {
        $statement = "SELECT * FROM Users WHERE id = $id;";
        try {
            $con = $this->DB->getConnection();
            $result = $con->query($statement)->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function create($input)
    {
        $statement = "INSERT INTO Users(first_name, last_name, email, birth_day, active)
            VALUES(:first_name, :last_name, :email, :birth_day, :active);";

        try {
             $con = $this->DB->getConnection();
             $prepared_statement = $con->prepare($statement);
             $prepared_statement->execute(array(
                'first_name' => $input['first_name'],
                'last_name'  => $input['last_name'],
                'email' => $input['email'],
                'birth_day'  => $input['birth_day'],
                'active'  => $input['active'],
             ));
            return $prepared_statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($id, $input)
    {
        $statement = "UPDATE Users SET first_name = :first_name, last_name  = :last_name, email = :email, birth_day = :birth_day, active = :active, updated_at = CURRENT_TIMESTAMP() WHERE id = :id;";
        
        try {
            $con = $this->DB->getConnection();
            $prepared_statement = $con->prepare($statement);
            $prepared_statement->execute(array(
                'id' => (int) $id,
                'first_name' => $input['first_name'],
                'last_name'  => $input['last_name'],
                'email' => $input['email'],
                'birth_day'  => $input['birth_day'],
                'active'  => $input['active'],
            ));
            return $prepared_statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        } 
    }

    public function delete($id)
    {
        $statement = "UPDATE Users SET active = 0, deleted_at = CURRENT_TIMESTAMP() WHERE id = :id;";
        try {
            $con = $this->DB->getConnection();
            $prepared_statement = $con->prepare($statement);
            $prepared_statement->execute(array('id' => $id));
            return $prepared_statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        } 
    }

    public function getLastInsert(){
        try {
            $con = $this->DB->getConnection();
            return $con->lastInsertId();;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}