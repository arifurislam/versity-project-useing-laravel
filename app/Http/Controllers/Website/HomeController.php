<?php

namespace App\Http\Controllers\Website;

use App\Models\Future;
use App\Models\Teacher;
use App\Models\Upcoming;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $teachers = Teacher::select('name','designation','facebook','instagram','twitter','photo')
        ->where('status',1)
        ->get()
        ->random(4);

        $upcomeingsEvents = Future::where('status',1)->latest()->get();
        return view('website.home',compact('teachers','upcomeingsEvents'));
    }
}
