<?php

namespace App\Http\Repository;

use App\Models\User;

class UserRepository
{
    public function save(array $params)
    {
       return User::create($params);
    }

    public function saveImage($params)
    {

    }
}
