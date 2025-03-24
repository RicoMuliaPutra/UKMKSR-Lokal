<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananPageController extends Controller
{
    public function layananPage(){
        return view("LandingPage.layanan");
    }

    public function layananSiaga(){
        return view('LandingPage.layananSiaga');
    }


    public function layananFacilitator(){
        return view ("LandingPage.Facilitator");
    }
}
