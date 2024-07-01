<?php

namespace App\Controllers\UsersControllersMethods;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

trait DeleteUsersMethods
{
    public function DeleteUsers(Request $request, Response $response, $args) {  
        return $this->sendResponse($response, ['delete User'], 200);
    }
}