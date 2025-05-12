<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact.index');
    }

    public function about(){
        return view('contact.about');
    }

}
