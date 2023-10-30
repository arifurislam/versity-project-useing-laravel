<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class AdminContactController extends Controller
{
    public function index(){
        $contacts = Contact::latest()->get();
        return view('admin.contact.index',compact('contacts'));
    }

    public function show($id){
        $contact = Contact::where('id',$id)->first();
        return view('admin.contact.show',compact('contact'));
    }

    public function delete($id){
        $contact = Contact::find($id);
        $delete = $contact->delete();
        Toastr::success('Contact Has Been Deleted', 'Success');
        return redirect()->back();
    }
}
