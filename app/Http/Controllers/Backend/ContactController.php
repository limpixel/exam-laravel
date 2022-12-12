<?php

namespace App\Http\Controllers\Backend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $contacts = Contact::orderBy('id')->get();
        $data = [
            'contacts' => $contacts,
        ];
        return view('backend.contact.index', $data);
    }
}
