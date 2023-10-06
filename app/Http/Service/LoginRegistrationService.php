<?php

namespace App\Http\Service;

use App\Http\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegistrationService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function checkAuthentication(array $params)
    {
        return Auth::attempt($params);
    }

    public function saveUser(array $params)
    {
       return $this->userRepository->save([
            'name'     => $params['name'],
            'email'    => $params['email'],
            'password' => Hash::make($params['password'])
        ]);
    }
}
