<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function artboard($id){

        if($id == 1){
            return view('artboard1');
        }elseif ($id == 2){
            return view('artboard2');
        }elseif ($id == 3){
            return view('artboard3');
        }elseif ($id == 4){
            return view('artboard4');
        }elseif ($id == 5){
            return view('artboard5');
        }elseif ($id == 6){
            return view('artboard6');
        }elseif ($id == 7){
            return view('artboard7');
        }
    }
}
