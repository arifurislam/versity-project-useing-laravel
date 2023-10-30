<?php

namespace App\Http\Controllers\Website;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index(){
        return view('website.contact');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|string|email|max:255',
            'number'      => 'required|string|max:255',
            'address'     => 'required|string|max:255',
            'message'     => 'required|string|min:5',
        ],[
            'name.required'     => 'Plz Enter Your Name...',
            'email.required'    => 'Plz Enter Your Email Address...',
            'number.required'   => 'Plz Enter Your Contact Number...',
            'address.required'  => 'Plz Enter Your Address...',
            'message.required'  => 'Plz Enter Your Message...',
        ]);

        $contact = New Contact ();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->contact = $request->number;
        $contact->address = $request->address;
        $contact->message = $request->message;
        $create = $contact->save();
        if($create){
            Session::flash('success','value');
            return redirect()->back();
        }else{
            Session::flash('error','value');
            return redirect()->back();
        }
    }
}
