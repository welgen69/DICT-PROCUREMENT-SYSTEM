<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Uuid;
use Carbon\Carbon;
use App\Models\FormInput;
use App\Models\FileUpload;
use App\Models\question;
use App\Models\answer;
use App\Models\AnswerSave;
use Brian2694\Toastr\Facades\Toastr;

class FormController extends Controller
{
    /** form index */
    public function formIndex()
    {
        return view('form.form-upload-file');
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
            Toastr::success('Data has been updated successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Data update fail :)','Error');
            return redirect()->back();
        }
    }

    /** delete record */
    public function formDelete(Request $request)
    {
        try {
            FormInput::destroy($request->id);
            Toastr::success('Data has been deleted successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Data delete fail :)','Error');
            return redirect()->back();
        }
    }

    /** form upload file index */
    public function formUpdateIndex()
    {
        return view('form.form-upload-file');
    }

    /** update file */
    public function formFileUpdate(Request $request) 
    {
        $request->validate([
            'upload_by' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'file_name' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $dt = Carbon::now();
            $date_time = $dt->toDayDateTimeString();
            $folder_name = "file_store";
            \Storage::disk('local')->makeDirectory($folder_name, 0775, true); // create directory
            if($request->hasFile('file_name'))
            {
                foreach($request->file_name as $photos) {
                    $file_name = $photos->getClientOriginalName(); // get file original name
                    $saveRecord = new FileUpload;
                    $saveRecord->upload_by = $request->upload_by;
                    $saveRecord->description = $request->description;
                    $saveRecord->date_time = $date_time;
                    $saveRecord->file_name = $file_name;
                    \Storage::disk('local')->put($folder_name.'/'.$file_name,file_get_contents($photos->getRealPath()));
                    $saveRecord->save();
                }
                DB::commit();
                Toastr::success('Data has been saved successfully :)','Success');
                return redirect()->back();
            }

        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Data save fail :)','Error');
            return redirect()->back();
        }
    }

    /** view file upload */
    public function formFileView()
    {
        $fileUpload = FileUpload::all();
        return view('pageview.view-file-upload-table',compact('fileUpload'));
    }

    /** file upload */
    public function fileDownload($file_name)
    {
        $fileDownload = FileUpload::where('file_name',$file_name)->first();
        $download     = storage_path("app/file_store/{$fileDownload->file_name}");
        return \Response::file($download);
    }

        /** file edit input */
        public function fileInputEdit($id)
        {
            $fileInputView = FileUpload::where('id',$id)->first();
            return view('pageview.file-input-edit',compact('fileInputView'));
        }
    
        /** update record form file input */
        public function fileUpdateRecord(Request $request)
        {
            $request->validate([
            'upload_by' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|not_in:0',
            ]);
    
            DB::beginTransaction();
            try {
    
                $updateFile = [
                    'upload_by'   => $request->upload_by,
                    'description'      => $request->description,
                    'status'     => $request->status,
                ];
                
                FileUpload::where('id',$request->id)->update($updateFile);
    
                DB::commit();
                Toastr::success('Data has been updated successfully :)','Success');
                return redirect()->back();
            } catch(\Exception $e) {
                DB::rollback();
                Toastr::error('Data update fail :)','Error');
                return redirect()->back();
            }
        }

    /** delete record and remove file in folder */
    public function fileDelete(Request $request)
    {
        try {
            FileUpload::destroy($request->id);
            unlink(storage_path("app/file_store/".$request->file_name));
            Toastr::success('Data has been deleted successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Data delete fail :)','Error');
            return redirect()->back();
        }
    }

    
} 