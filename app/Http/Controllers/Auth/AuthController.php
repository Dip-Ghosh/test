<?php

namespace App\Http\Controllers\Auth;

use App\Enum\ResponseCodeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegistrationValidation;
use App\Http\Service\LoginRegistrationService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;
use Session;
use App\Models\User;
use Hash;


class AuthController extends Controller
{
    private $loginRegistration;

    public function __construct(LoginRegistrationService $loginRegistration)
    {
        $this->loginRegistration = $loginRegistration;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function login(LoginValidation $request): \Illuminate\Http\JsonResponse
    {
        $authenticate = $this->loginRegistration->checkAuthentication($request->validated());

        return response()->json([
            'status' => $authenticate ? true : false,
            'message' => $authenticate ? 'Successfully Login' : 'Invalid Credentials',
            'redirect' => $authenticate ? route('admin.home') : false
        ]);
    }

    public function register(RegistrationValidation $request): \Illuminate\Http\JsonResponse
    {
        Auth::login($this->loginRegistration->saveUser($request->validated()));

        return response()->json([
            'status' => true,
            'message' => 'Successfully Registered.',
            'redirect' => route('admin.home')
        ]);
    }


    public function dashboard()

    {

        if (Auth::check()) {

            return view('dashboard');

        }


        return redirect("login")->withSuccess('Opps! You do not have access');

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login.show');
    }
}
