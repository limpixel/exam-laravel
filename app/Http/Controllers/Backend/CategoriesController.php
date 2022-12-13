<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\ServiceCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $categories = [ 'portfolio' => Portfolio::get()];
        return view("backend.service.categories", compact('categories'));
    }

    public function create(){
        return view('backend.service.create_category');
    }

    public function create_process(Request $request){
        $rule = [
            'title' => 'required',
            'slug' => 'required',
        ];

        $message = [
            'title.required' => ' The field <strong>title</strong> is required',
            'slug.required' => ' The field <strong>slug</strong> is required',
        ];

        $validator = Validator::make($request->all(), $rule, $message);

        if ($validator->fails()) {
            return redirect()->route('backend.create.categories')->withErrors($validator)->withInput();
        } else {
            ServiceCategories::create([
                'title' => $request->title,
                'slug' => $request->slug,
            ]);

            return redirect()->route('backend.manage.categories')->with('success', 'Categories Has Created');;
        }
        
    }
}
