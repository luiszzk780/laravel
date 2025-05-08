<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Empresa extends Controller
{
        public function index(){
            return view('funcionario');
        }

    public function gravar(){
        return view('funcionario');
    }
};
