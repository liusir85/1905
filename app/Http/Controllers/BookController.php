<?php

namespace App\Http\Controllers; 

class BookController extends Controller
{
    public function book(){
        return view('book/book');
    }
    public function bookDo(){
        $name=request()->name;
        $res=$name;
        return $res; 
    }
    public function btn(){
        return view('book/btn');
    }
}