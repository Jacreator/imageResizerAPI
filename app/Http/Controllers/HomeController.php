<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuration;
use App\User;

class HomeController extends Controller
{
    public function index(){
    	return view("pages.home");
    }

    public function register(){
    	return view("pages.register");
    }

    //returns documentation as JSON
    public function documentation(){
    	return "Documentation returned as JSON";
    }

    //allows configuration of files through JSON
    public function configure(Request $request){
        $configuration = User::find(auth()->user()->id)->configuration;

        $configuration->receipt_format = $request->input('format');
        $configuration->user_id = auth()->user()->id;

        if($configuration->save()){
            return "Configuration updated successfully";
        }

    }
}
