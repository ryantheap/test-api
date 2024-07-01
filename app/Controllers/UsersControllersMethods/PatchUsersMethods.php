<?php

namespace App\Controllers\UsersControllersMethods;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

trait PatchUsersMethods
{
    public function PatchUsers (Request $request, Response $response, $args) {
        return $this->sendResponse($response, ['patch User'], 200);
    }
}