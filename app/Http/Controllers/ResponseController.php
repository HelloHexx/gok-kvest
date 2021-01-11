<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\c_response;
use Illuminate\Http\Response;



class ResponseController extends Controller
{
    //
    
    public function SetCookie($response,$cookie_name,Request $request){
        $response = new c_response("cookie");

        
        return \response(var_dump($response->err(true)))->cookie('$cookie_name',true,50) ;
    }
}
