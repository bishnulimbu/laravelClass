<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.list');
        /* return 'hello i am index page'; */
    }
    public function formIndex()
    {
        return view('product.form');
        /* return 'hello i am index page'; */
    }
}
