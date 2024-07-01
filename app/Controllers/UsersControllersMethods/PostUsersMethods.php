<?php

namespace App\Controllers\UsersControllersMethods;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;




trait PostUsersMethods
{
    public function PostUsers (Request $request, Response $response, $args) {
        return $this->sendResponse($response, ['post User'], 200);
    }
}