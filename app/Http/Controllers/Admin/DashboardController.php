<?php

namespace App\Http\Controllers\Admin;

use App\Models\Future;
use App\Models\Contact;
use App\Models\Teacher;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $department_count = Department::all()->count();
        $contact_count = Contact::all()->count();
        $teacher_count = Teacher::all()->count();
        $event_count = Future::all()->count();
        return view('admin.dashboard.index',compact('department_count','contact_count','teacher_count','event_count'));
    }
}
