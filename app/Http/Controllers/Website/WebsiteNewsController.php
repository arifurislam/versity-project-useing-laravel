<?php

namespace App\Http\Controllers\Website;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteNewsController extends Controller
{
    public function index(){
        $latestNews = News::select('title','photo','details','slug')
        ->where('status',1)
        ->take(3)
        ->latest()
        ->get();

        $allpreviousNews = News::select('title','photo','details','slug')
        ->paginate(6);
        return view('website.news.index',compact('latestNews','allpreviousNews'));
    }

    public function show($slug){
        $news = News::where('slug',$slug)->first();
        $randomNews = News::select('title','photo','details','slug')
        ->where('status',1)
        ->get()
        ->random(3);
        return view('website.news.show',compact('news','randomNews'));
    }
}
