<?php

namespace app\models;

use app\core\Model;
use http\Encoding\Stream;

class UserModel extends Model
{
    public string $name;
    public string $email;
    public string $gender;
    public string $status;

    public function pass()
    {
        echo "Creating new user";
    }

}
