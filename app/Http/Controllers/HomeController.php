<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function configure(){
    	return "Allows configurations of API through JSON";
    }
}
