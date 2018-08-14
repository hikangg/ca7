<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index()
    {
        return view('manufacturers');
    }

    public function show(Manufacturer $manufacturer)
    {
        // return $manufacturer;
        return view('manufacturer', compact('manufacturer'));
    }

}
