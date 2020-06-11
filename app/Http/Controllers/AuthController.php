<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\User;

class AuthController extends Controller
{
    public function register_user(Request $request){
		//rules for validation of fields
	    $rules = [
	    	'name' => 'required|unique:users',
	        'email' => 'email|required|unique:users',  
	        'password' => 'required|confirmed'
	    ];

	    //convert object to array
	    $data = array(
	    	"name" => $request->name,
	    	"email" => $request->email,
	    	"password" => $request->password,
	    	"password_confirmation" => $request->password_confirmation,
	    );


	    //run the validator
	    $validator = Validator::make($data, $rules);


        if($validator->passes()){
            //encrypt the password input
            $data['password'] = bcrypt($data['password']);
            //create user
            $user = User::create($data);

            //generate access token for client
            $accessToken = $user->createToken('authToken')->accessToken;

            return view("pages.token_show")->with("accessToken", $accessToken);
         }
        else{
            return $validator->errors()->all();
        }



    }

}
