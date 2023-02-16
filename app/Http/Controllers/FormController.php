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

    /** save record */
    public function formSaveRecord(Request $request)
    {
        $request->validate([
            'full_name'   => 'required|string|max:255',
            'gender'      => 'required|string|max:255',
            'address'     => 'required|string|max:255',
            'state'       => 'required|string|max:255',
            'city'        => 'required|string|max:255',
            'country'     => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'blood_group' => 'required|not_in:0',
        ]);
        
        return redirect()->back();
    }
}
