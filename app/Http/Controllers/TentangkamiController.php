<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangkamiController extends Controller
{
    public function tentangme() {
        return view ("LandingPage.tentang");
    }

    public function sejarah() {
        return view("LandingPage.sejarah");
    }

    public function lambang() {
        return view("LandingPage.lambang");
    }


}
