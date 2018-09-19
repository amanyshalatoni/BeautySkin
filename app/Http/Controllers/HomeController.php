<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return "Index action in HomeController";
        //return view("welcome");
    }
    public function about(){
        return "about action in HomeController";
    }
    public function contact(){
        return "contact action in HomeController";
    }
}
