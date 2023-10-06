<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageValidation;
use Illuminate\Http\Request;
use Nette\Utils\Image;

class UserController extends Controller
{
    public function index()
    {
        return view('users');
    }

}
