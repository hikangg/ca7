<?php

namespace App\Http\Controllers;

use App\Modell;
use Illuminate\Http\Request;

class ModellController extends Controller
{
    public function index()
    {
        return view('models');
    }

    public function show(Modell $model)
    {
        return view('model', compact('model'));
    }

}
