<?php

namespace RESTapi\Users\Controller;

use RESTapi\Users\Model\UserModel;


class UserController
{
    
    protected string $requestMethod;

    protected int $userID;

    public function __construct($requestMethod, $username, $password)
    {
        $this->requestMethod = $requestMethod;
        $this->username      = $username;
        $this->password      = $password;
    }

    public function userGateway()
    {
        switch ($this->requestMethod) {
            case 'POST':
                break;
                header("HTTP/1.1 200 oK");
            case 'GET':
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
                        }
                        else {
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
