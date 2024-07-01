<?php
namespace App\Models;

use App\Models\UsersModelsMethods\{
    GetUsersMethods,
    PostUsersMethods,
    PatchUsersMethods,
    DeleteUsersMethods
};

class UsersModel extends BaseModel {
    use GetUsersMethods;
    use PostUsersMethods;
    use PatchUsersMethods;
    use DeleteUsersMethods;
}