<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Validator;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
      /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function checkEmail(Request $request){
        $validator = Validator::make($request->all(),[
                    'email' => "required|email|exists:users,email"
                ]);
                if ($validator->fails()) {
                    $errors=$validator->errors();
                    return "<p style='color:red'><i class='fa fa-times'></i>". $errors->first('email') ."</p>";

                }else{
                    return "<p style='color:green'><i class='fa fa-check-circle'></i> Email is found. </p>";
                }
    }

}
