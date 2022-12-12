<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(About $about) {

        $about = About::find(1);

        $data = [
            'title' => $about->title,
            'description' => $about->description,
        ];
        return view('backend.about.index', $data);
    }

    public function process(Request $request) {
        $rule = [
            'title' => 'required',
            'description' => 'required',
        ];

        $messages = [
            'title.required' => 'The field <strong>title</strong> is required',
            'description.required' => 'The field <strong>description</strong> is required'
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if($validator->fails()) {
            return redirect()->route('backend.manage.about')->withErrors($validator)->withInput();
        }else {
            DB::table('abouts')->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return redirect()->route('backend.manage.about')->with('success', 'The <strong>about</strong> updated successfully');
        }
    }
}
