<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\UsersControllersMethods\{
    GetUsersMethods,
    PostUsersMethods,
    PatchUsersMethods,
    DeleteUsersMethods,
};

use App\Models\{
    UsersModel,
};

class UsersController extends BaseController {

    protected $usersModel;

  
    public function __construct()
    {
        parent::__construct();
        $this->usersModel = new UsersModel();
    }
   
    use GetUsersMethods;
    use PostUsersMethods;
    use PatchUsersMethods;
    use DeleteUsersMethods;   
}