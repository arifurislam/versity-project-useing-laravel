<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteGalleryController extends Controller
{
    public function index(){
        return view('website.gallery.index');
    }
    public function show(){
        return view('website.gallery.show');
    }
    
}
