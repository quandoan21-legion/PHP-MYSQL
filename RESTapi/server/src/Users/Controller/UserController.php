<?php

namespace RESTapi\Users\Controller;

use RESTapi\Users\Model\UserModel;


class UserController
{
    
    protected string $requestMethod;
    protected string $requestAction;

    protected int $userID;

    public function __construct($requestMethod, $requestAction, $username, $password)
    {
        $this->requestMethod = $requestMethod;
        $this->requestAction = $requestAction;
        $this->username      = $username;
        $this->password      = $password;
    }

    public function userGateway()
    {
        switch ($this->requestMethod) {
            case 'POST':
                switch ($this->requestAction) {
                    case 'logout':
                        session_destroy();
                        $aResponse = [
                            'status' => 'success',
                            'msg'    => 'you have logout successfully'
                        ];
                        return json_encode($aResponse);
                        break;
                }
                break;
            case 'GET':
                switch ($this->requestAction) {
                    case 'login':
                        if ($this->username) {
                            $aResponse  = [
                                "item"  => $this->find($this->username, $this->password),
                            ];
                            if (isset($aResponse['item'][0]) === true) {
                                $aResponseVal =  [

                                    'status' => 'success',
                                    'user'   => $aResponse['item'][0]['username'],

                                ];
                                return json_encode($aResponseVal);
                            } else {
                                $aResponseVal =  [

                                    'status' => 'error',
                                    'msg'    => 'Invalid username or password',

                                ];
                                return json_encode($aResponseVal);
                            }
                        } else {
                            $aResponse  = [
                                "items" => $this->findAll(),
                            ];
                        }
                        break;
                }
                break;

            case 'PUT':
                break;

            case 'DELETE':
                break;
            default:
                header("HTTP/1.1 406");
                break;
        }
        echo json_encode($aResponse);
    }

    private function find(string $username, $password)
    {
        return UserModel::getUser($username, $password);
    }

    private function findAll(): array
    {
        return UserModel::getAll();
    }
}
