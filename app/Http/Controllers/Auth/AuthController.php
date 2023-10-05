<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\User;
use Hash;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.register');
    }


    public function postLogin(Request $request)
    {


        $validator = Validator::make($request->all(), [



        ]);


        if ($validator->fails()) {

            return response()->json([
                "status" => false, "errors" => $validator->errors(),]);

        } else {

            if (Auth::attempt($request->only(["email", "password"]))) {

                return response()->json([
                    "status" => true,

                    "redirect" => url("dashboard"),

                ]);

            } else {

                return response()->json([

                    "status" => false,

                    "errors" => ["Invalid credentials"],

                ]);

            }

        }

    }


    /**
     * Write code on Method
     *
     * @return response()
     */

    public function postRegistration(RegistrationValidation $request)

    {

        $validator = Validator::make($request->all(), [



        ]);


        if ($validator->fails()) {

            return response()->json([

                "status" => false,

                "errors" => $validator->errors(),

            ]);

        }


        $data = $request->all();

        $user = $this->create($data);


        Auth::login($user);


        return response()->json([

            "status" => true,

            "redirect" => url("dashboard"),

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


    /**
     * Write code on Method
     *
     * @return response()
     */

    public function logout()
    {

        Session::flush();

        Auth::logout();


        return Redirect('login');

    }

}
