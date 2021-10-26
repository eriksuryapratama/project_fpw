<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
     //fungsi untuk menampilkan menuBar login
     public function login()
     {
         return view('fitur_website.login');
     }
}
