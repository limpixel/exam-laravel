<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PortfolioController extends Controller
{
    public function index () {
        $data = [
            'portfolio' => Portfolio::get(),
        ];
        return view('frontend.portfolio.index', $data);
    }
}
