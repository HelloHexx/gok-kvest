<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Comments;
use Auth;

class CommentController extends Controller
{
    //
    public function Add(Request $req){
        if(Auth::check()){
            $comm =new Comments;
            $comm->text = $req->text;
            $comm->from = Auth::user()->name;
            $comm->save();
            return back()->with('Status','Успешно!');
        }else
        {
            return back()->with('Status','Вы не авторизированы!');
        }
    }
}
