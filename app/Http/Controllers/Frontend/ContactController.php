<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index () {
        return view('frontend.contact.index');
    }

    public function process(Request $request) {
        $rule = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ];

        $message = [
            'name.required' => ' The field <strong>name</strong> is required',
            'email.required' => ' The field <strong>email</strong> is required',
            'phone.required' => ' The field <strong>phone</strong> is required',
            'message.required' => ' The field <strong>message</strong> is required',
        ];

        $validator = Validator::make($request->all(), $rule, $message);

        if ($validator->fails()) {
            return redirect()->route('frontend.contact.index')->withErrors($validator)->withInput();
        } else {
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            ]);

            $pesan = 'Hi '. $request->name .', thank you for contacting us.';
            return redirect()->route('frontend.contact.index')->with('success', $pesan);
        }
    }
}
