<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('brands');
    }

    public function more()
    {
        return view('brandmodels');
    }

    public function matrix()
    {
        return view('brandmatrix');
    }

    public function show(Brand $brand)
    {
        return view('brand', compact('brand'));
    }
}
