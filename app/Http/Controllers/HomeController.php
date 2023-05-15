<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /** index page dashboard */
    public function index()
    {
        return view('form.form-upload-file');
    }
}
