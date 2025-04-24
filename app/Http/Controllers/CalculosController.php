<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculosController extends Controller
{
    function somar($x, $y)
    {
        return 'Soma; ' . $x + $y;
    }
    function subtrair($x, $y)
    {
        return 'Subtração; ' . $x - $y;
    }
    
}

