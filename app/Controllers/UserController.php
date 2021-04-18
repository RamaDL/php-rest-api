<?php

namespace App\Controllers;

class UserController
{

    private $request_method;
    private $user_id;

    private $user_gateway;

    public function __construct($request_method, $user_id)
    {
        $this->request_method = $request_method;
        $this->user_id = $user_id;
        $this->user_gateway = new \App\Gateways\UserGateway;
    }


    public function processRequest()
    {
        switch ($this->request_method) {
            case 'GET':
                if ($this->user_id) {
                    $response = $this->getUser($this->user_id);
                } else {
                    $response = $this->getAllUsers();
                };
                break;
            case 'POST':
                $response = $this->createUser();
                break;
            case 'PUT':
                $response = $this->updateUser($this->user_id);
                break;
            case 'DELETE':
                $response = $this->deleteUser($this->user_id);
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

    private function getAllUsers()
    {
        $result = $this->user_gateway->all();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    private function getUser($id)
    {
        $result = $this->user_gateway->find($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    private function createUser()
    {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        $validation_result  = $this->validateUser($input);
        if (! $validation_result[0]) {
            return $this->unprocessableEntityResponse($validation_result[1]);
        }
        $this->user_gateway->create($input);
        $last_record_id = $this->user_gateway->getLastInsert();
        $last_record_data = $this->user_gateway->find($last_record_id);
        $json_last_record = json_encode($last_record_data);
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = $json_last_record;
        return $response;
    }

    private function updateUser($id)
    {
        $result = $this->user_gateway->find($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        $validation_result  = $this->validateUser($input);
        if (! $validation_result[0]) {
            return $this->unprocessableEntityResponse($validation_result[1]);
        }
        $this->user_gateway->update($id, $input);
        $updated_user = $this->user_gateway->find($id);
        $json_updated_user = json_encode($updated_user);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = $json_updated_user;
        return $response;
    }

    private function deleteUser($id)
    {
        $result = $this->user_gateway->find($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $this->user_gateway->delete($id);
        $deleted_user = $this->user_gateway->find($id);
        $json_deleted_user = json_encode($deleted_user);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = $json_deleted_user;
        return $response;
    }

    private function validateUser($input)
    {
        if (! isset($input['first_name'])) {
            return [false, 'first_name'];
        }
        if (! isset($input['last_name'])) {
            return [false, 'last_name'];
        }
        if (! isset($input['email'])) {
            return [false, 'last_name'];
        }
        if (! isset($input['birth_day'])) {
            return [false, 'birth_day'];
        }
        if (! isset($input['active'])) {
            return [false, 'birth_day'];
        }
        return [true, null];
    }

    private function unprocessableEntityResponse($missing)
    {
        $response['status_code_header'] = 'HTTP/1.1 422 Unprocessable Entity';
        $response['body'] = json_encode([
            'error' => true,
            'message' => "Missing $missing attribute."
        ]);
        return $response;
    }

    private function notFoundResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
}
