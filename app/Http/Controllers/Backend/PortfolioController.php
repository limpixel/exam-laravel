<?php

namespace App\Http\Controllers\Backend;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $data = [
            'portfolio' => Portfolio::get(),
        ];
        return view('backend.portfolio.index', $data);
    }

    public function create() {
        return view('backend.portfolio.create');
    }

    public function create_process(Request $request) {
        $rule = [
            'title' => 'required',
            // 'image' => 'required|max:2048|mimes:jpg,jpeg,png',
            'image' => 'required|mimes:jpg,jpeg,png',
            'description' => 'required',
        ];

        $message = [
            'title.required' => ' The field <strong>title</strong> is required',
            'image.required' => ' The field <strong>image</strong> is required',
            'description.required' => ' The field <strong>description</strong> is required',
        ];

        $validator = Validator::make($request->all(), $rule, $message);

        if ($validator->fails()) {
            return redirect()->route('backend.create.portfolio')->withErrors($validator)->withInput();
        } else {
        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/portfolio'), $image);

        Portfolio::create([
            'title' => $request->title,
            'image' => $image,
            'description' => $request->description,
        ]);

        return redirect()
        ->route('backend.manage.portfolio')
        ->with('success', 'Item created successfully');
        }
    }

    public function show($id = null ) {
        if ($id == null) {
            return redirect()->route('b.manage.portofolio')->with('error', "The ID Is Empty");
        } else {
            $portfolio = Portfolio::find($id);

            if ($portfolio) {
                return view('backend.portfolio.show', compact('portfolio'));
            } else {
                return redirect()->route('b.manage.portofolio')->with('error', "The ID Is Empty");
            }
        }
    }

    public function edit(Portfolio $portfolio) {
        $data = [
            'portfolio' => $portfolio,
        ];

        return view('backend.portfolio.edit', $data);
    }

    public function edit_process(Request $request, Portfolio $portfolio) {
        $rule = [
            'title' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'description' => 'required',
        ];

        $message = [
            'title.required' => ' The field <strong>title</strong> is required',
            'image.required' => ' The field <strong>image</strong> is required',
            'description.required' => ' The field <strong>description</strong> is required',
        ];

        $validator = Validator::make($request->all(), $rule, $message);

        if ($validator->fails()) {
            return redirect()->route('backend.edit.portfolio', $portfolio->id)->withErrors($validator)->withInput();
        } else {
        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/portfolio'), $image);

        Portfolio::where('id', $portfolio->id)->update([
            'title' => $request->title,
            'image' => $image,
            'description' => $request->description,
        ]);

        return redirect()
        ->route('backend.manage.portfolio')
        ->with('success', 'Item created successfully');
        }
    }

    public function destroy($id = null)
    {
        $portfolio = Portfolio::find($id);

       if (public_path('images/portfolio/'. $portfolio->image))
           unlink(public_path('images/portfolio/'. $portfolio->image));

        $portfolio->delete();


        return redirect()
            ->route('backend.manage.portfolio')
            ->with('success', 'Item Destroy Successfully');
    }
}
