<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\FormInput;

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

        DB::beginTransaction();
        try {

            $saveRecord = new FormInput;
            $saveRecord->full_name   = $request->full_name;
            $saveRecord->gender      = $request->gender;
            $saveRecord->address     = $request->address;
            $saveRecord->state       = $request->state;
            $saveRecord->city        = $request->city;
            $saveRecord->country     = $request->country;
            $saveRecord->postal_code = $request->postal_code;
            $saveRecord->blood_group = $request->blood_group;
            $saveRecord->save();
            DB::commit();
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->back();
        }
    }

    /** page form view */
    public function formView()
    {
        $dataFormInput = FormInput::all();
        return view('pageview.form-input-table',compact('dataFormInput'));
    }

    /** page edit form input */
    public function formInputEdit($id)
    {
        $formInputView = FormInput::where('id',$id)->first();
        return view('pageview.form-input-edit',compact('formInputView'));
    }

    /** update record form input */
    public function formUpdateRecord(Request $request)
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

        DB::beginTransaction();
        try {

            $updateRecord = [
                'full_name'   => $request->full_name,
                'gender'      => $request->gender,
                'address'     => $request->address,
                'state'       => $request->state,
                'city'        => $request->city,
                'country'     => $request->country,
                'postal_code' => $request->postal_code,
                'blood_group' => $request->blood_group,
            ];
            
            FormInput::where('id',$request->id)->update($updateRecord);

            DB::commit();
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->back();
        }
    }
}
