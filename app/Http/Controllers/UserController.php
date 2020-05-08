<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\UserModel;
use Hash;
use Session;

class UserController extends Controller
{
    //Registracia
    public function register()
    {
        return view('/register');
    }

    public function sent_register_data(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            "reg_name" => "required",
            "reg_email" => "required|email",
            "reg_password" => "required|min:6|max:18",
            "reg_cmf_password" => "required|same:reg_password"
        ],
        [
            "reg_name.required" => "The name field is required.",
            "reg_email.required" => "The email field is required.",
            "reg_email.email" => "The email must be a valid email address.",
            "reg_password.required" => "The password field is required.",
            "reg_password.min" => "The new password must be at least 6 characters.",
            "reg_password.max" => "The password may not be greater than 18 characters.",
            "reg_cmf_password.required" => "The comfirm password field is required.",
            "reg_cmf_password.same" => "The comfirm password and new password must match."
        ]
        );
        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()]);
        }
        else{
            $same_email = UserModel::where('email', $request->reg_email)->first();
            if($same_email != null){
                $err = "This email address has already been registered.";
                return response()->json(['error'=>$validator->errors()->add('reg_email', $err)]);
            }
            else{
                $user = new UserModel();
                $user->name = $request->reg_name;
                $user->email = $request->reg_email;
                $user->password = Hash::make($request->reg_password);
                $user->save();
            }
        }
    }
    //Registracia end


    //Login start
    public function show_login()
    {
        return view('/login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            "login_email" => "required|email",
            "login_password" => "required|min:6|max:18",
        ],
        [
            "login_email.required" => "The email field is required.",
            "login_email.email" => "The email must be a valid email address.",
            "login_password.required" => "The password field is required.",
            "login_password.min" => "The new password must be at least 6 characters.",
            "login_password.max" => "The password may not be greater than 18 characters.",
        ]
        );
        $data = UserModel::where('email', $request->login_email)->first();
        $validator->after(function($validator) use ($data, $request){
            if(!$data){
                $validator->errors()->add('login_email', 'chka tenc email');
            }
            else if(!Hash::check($request->login_password, $data['password'])){
                $validator->errors()->add('login_password', 'sxal parol');
            }
        });
        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()]);
        }
        else{
            Session::put('id', $data['id']);
        }
    }
    //Login End
}
