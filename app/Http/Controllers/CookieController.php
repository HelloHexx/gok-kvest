<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    //
    public function visit(Request $request){

        $request->session()->put('visit', true);
        return redirect('/game');
    }
}
