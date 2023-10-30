<?php

namespace App\Http\Controllers\Website;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteFacultyController extends Controller
{
    public function index(){
        $faculties = Department::where('status',1)->orWhere('id','ASC')->get();
        return view('website.faculty.index',compact('faculties'));
    }

    public function show($slug){
        $faculty = Department::where('slug',$slug)->first();
        return view('website.faculty.show',compact('faculty'));
    }
}
