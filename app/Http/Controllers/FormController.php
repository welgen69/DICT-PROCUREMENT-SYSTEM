<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    /** form index */
    public function formIndex()
    {
        return view('form.forminput');
    }
}
