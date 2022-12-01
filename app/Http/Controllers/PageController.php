<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landingPage(){
        return view('pages.index');
    }
    public function ProfilePage(){
        return view('pages.galery');
    }
}
