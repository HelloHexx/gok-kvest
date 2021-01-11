<?php

namespace App;
use Illuminate\Http\Response;


class c_response 
{
    //
    private $string_;
    public $obj;
    function __construct($response_name) {
        $this->string_ = \file_get_contents(asset('json/'.$response_name.'.json'));
        $buf = json_decode($this->string_);
        if($response_name = "cookie_set"){
            $this->obj = $buf->cookie_set;
        }
    }
    function err($result){
        if($result = true){
            return  response($this->obj[0])->cookie('response',$this->obj[0],50);
        }
        else{
            return response($this->obj[0])->cookie('response',$this->obj[0],50);
        }
    }
    function get_obj(){
        return $this->obj;
    }
}
