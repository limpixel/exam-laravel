<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

class AboutController extends Controller
{
    public function index () {

        $about = About::find(1  );

        $data = [
            'title' => $about->title,
            'description' => $about->description,
        ];

        return view('frontend.about.index', $data);
    }

    public function download_cv() {
        return  Response::download(public_path('cv/naufalfaqiihashshiddiq.pdf'));
    }
}
