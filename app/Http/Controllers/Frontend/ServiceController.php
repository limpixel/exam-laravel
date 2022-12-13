<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ServicesItems;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $service_items = ServicesItems::orderBy('name', 'asc')->get();
        return view('frontend.service.index', compact('service_items'));
    }
}
