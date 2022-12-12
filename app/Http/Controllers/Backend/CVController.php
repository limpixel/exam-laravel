<?php

namespace App\Http\Controllers\Backend;

use App\Models\CV;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CVController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'cv' => $cv = CV::find(1),
        ];
        return view('backend.cv.index', $data);
    }

    public function process(Request $request) {
        $rule = [
            'filename' => 'required|mimes:pdf',
        ];

        $message = [
            'filename.required' => ' The field <strong>filename</strong> is required',
        ];

        $validator = Validator::make($request->all(), $rule, $message);

        if ($validator->fails()) {
            return redirect()->route('backend.manage.cv')->withErrors($validator)->withInput();
        } else {
        $filename = 'naufalfaqiihashshiddiq.' . $request->filename->extension();
        $request->filename->move(public_path('cv'), $filename);

        $cv = CV::find(1);

        if(file_exists(public_path('cv/' . $cv->filename)));
        unlink(public_path('cv/' . $cv->filename));

        $cv->filename = $filename;
        $cv->save();

        return redirect()
        ->route('backend.manage.cv')
        ->with('success', 'CV updated successfully');
        }
    }
}
