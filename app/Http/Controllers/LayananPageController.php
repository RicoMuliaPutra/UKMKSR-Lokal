<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananPageController extends Controller
{
    public function layananPage(){
        return view("LandingPage.layanan_siaga");
    }
}
