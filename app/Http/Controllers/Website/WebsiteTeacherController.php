<?php

namespace App\Http\Controllers\Website;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteTeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::select('name','description','photo','slug')
        ->paginate(8);
        return view('website.teacher.index',compact('teachers'));
    }

    public function show($slug){
        $teacher = Teacher::where('slug',$slug)->first();
        return view('website.teacher.show',compact('teacher'));
    }
}
