<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Image;
use Storage;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class NewsController extends Controller
{

    public function index()
    {
        $allNews = News::all();
        return view('admin.news.index',compact('allNews'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255|unique:news',
            'details'      => 'required|max:900',
            'media'        => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $slug = Str::slug($request->title);
        if($request->hasFile('media')){
            $image1 = $request->file('media');
            $imageName = $slug  .'-'.  Carbon::now()->toDateString(). uniqid() . '.' . $image1->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('news'))
            {
                Storage::disk('public')->makeDirectory('news');
            }

            Image::make($image1)->resize(275, 183)->save(base_path('public/storage/news/'.$imageName));
        }

        $news = new News ();
        $news->title = $request->title;
        $news->slug = $slug;
        $news->status = (boolean)$request->status;
        $news->photo = $imageName;
        $news->details = $request->details;
        $create = $news->save();
        if($create){
            Toastr::success('Successfully News Has Been Added', 'Success');
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

    public function show(News $news)
    {
        return view('admin.news.show',compact('news'));
    }

    public function edit(News $news)
    {
        return view('admin.news.edit',compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255|unique:news,title,'.$news->id,
            'details'      => 'required|max:900',
            'media'        => 'image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $slug = Str::slug($request->title);
        if($request->hasFile('media')){
            $image1 = $request->file('media');
            $imageName = $slug  .'-'.  Carbon::now()->toDateString(). uniqid() . '.' . $image1->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('news'))
            {
                Storage::disk('public')->makeDirectory('news');
            }
             // delete old image
             if(Storage::disk('public')->exists('news/'.$news->photo))
             {
                 Storage::disk('public')->delete('news/'.$news->photo);
             }

            Image::make($image1)->resize(275, 183)->save(base_path('public/storage/news/'.$imageName));
        }
        else{
            $imageName = $news->photo;
        }

        $news->title = $request->title;
        $news->slug = $slug;
        $news->status = (boolean)$request->status;
        $news->photo = $imageName;
        $news->details = $request->details;
        $create = $news->save();
        if($create){
            Toastr::success('Successfully News Has Been Updated', 'Success');
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

    public function destroy(News $news)
    {
        if(Storage::disk('public')->exists('news/'.$news->banner))
        {
            Storage::disk('public')->delete('news/'.$news->banner);
        }
        $delete = $news->delete();
        Toastr::success('News Has Been Deleted', 'Success');
        return redirect()->back();
    }
}
