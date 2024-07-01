<?php

namespace App\Controllers\UsersControllersMethods;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

trait GetUsersMethods
{
    public function getUsers(Request $request, Response $response, $args) {
        return $this->sendResponse($response, ['get User'], 200);
    }
}