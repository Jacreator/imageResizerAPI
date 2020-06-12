<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Validator;
use App\User;
use App\Configuration;

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

            //save token to users table
            $user->accessToken = $accessToken;
            $user->save();

            //create default configuration for user 
            $configuration = new Configuration();

	        $configuration->receipt_format = "JSON";
	        $configuration->user_id = $user->id;

	        $configuration->save();

            return view("pages.token_show")->with("accessToken", $accessToken);
         }
        else{
            return $validator->errors()->all();
        }



    }


    public function authenticate(Request $request){
    			//rules for validation of fields
	    $rules = [
	        'email' => 'required|email',  
	        'password' => 'required'
	    ];

	    	    //convert object to array
	    $data = array(
	    	"email" => $request->email,
	    	"password" => $request->password,
	    );

	   	//run the validator
	    $validator = Validator::make($data, $rules);


        if($validator->passes()){
            //authenticate user
            if (!auth()->attempt($data)) {
                return response(['message'=>'Invalid credentials']);
            }
            return view("pages.token_show")->with("accessToken", auth()->user()->accessToken);
        	


        }
        else{
        	redirect('/login');
        }
       

    }
}
