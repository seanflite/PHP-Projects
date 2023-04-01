<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Todo List App';
        return view('pages.home') ->with('title', $title);
    }
}
