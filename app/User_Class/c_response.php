<?php
namespace App\User_Class;
use Illuminate\Http\Response;

class c_response
{
    private $string_;
    public $obj;
    function __construct($response_name) {
        var_dump($response_name);
        // $string_ = file_get_contents('json/'.$response_name.'.json');
        $string_ = \file_get_contents("json/cookie.json");
        $obj = json_decode($string_);
    }
    function get_er($num){
        return response('Error')->cookie(
            'er', $obj[$num]->er, 50
        );
    }
    function get_obj(){
        return response(var_dump(obj));
    }
}