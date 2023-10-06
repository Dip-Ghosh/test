<?php

namespace App\Http\Controllers\Auth;

use App\Enum\ResponseCodeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegistrationValidation;
use App\Http\Service\LoginRegistrationService;
use Exception;
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

    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.register');
    }


    public function login(LoginValidation $request)
    {
        $authCheck = $this->loginRegistration->checkAuthentication($request->only(['email', 'password']));

        if (!$authCheck) return $this->responseError(null, 'Invalid Credentials', ResponseCodeEnum::UNAUTHORIZED->value);

        return redirect()->route('admin.home');

    }


    public function register(RegistrationValidation $request)
    {
        dd($request->all());
        Auth::login($this->loginRegistration->saveUser($request->only(['name', 'email', 'password'])));

        return response()->json([
            "status"   => true,
            "redirect" => url("dashboard")
        ]);

    }


    /**
     * Write code on Method
     *
     * @return response()
     */

    public function dashboard()

    {

        if (Auth::check()) {

            return view('dashboard');

        }


        return redirect("login")->withSuccess('Opps! You do not have access');

    }


    /**
     * Write code on Method
     *
     * @return response()
     */

    public function create(array $data)

    {

        return User::create([

            'name' => $data['name'],

            'email' => $data['email'],

            'password' => Hash::make($data['password']),

        ]);

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
