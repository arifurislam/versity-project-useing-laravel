<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Future;
use Illuminate\Http\Request;
use Image;
use Storage;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class FutureController extends Controller
{

    public function index()
    {
        $allEvents = Future::latest()->get();
        return view('admin.future-event.index',compact('allEvents'));
    }

    public function create()
    {
        return view('admin.future-event.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:futures',
            'date'        => 'required|string|max:255',
            'media'        => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $slug = Str::slug($request->name);
        if($request->hasFile('media')){
            $image1 = $request->file('media');
            $imageName = $slug  .'-'.  Carbon::now()->toDateString(). uniqid() . '.' . $image1->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('future-event'))
            {
                Storage::disk('public')->makeDirectory('future-event');
            }

            Image::make($image1)->resize(985, 350)->save(base_path('public/storage/future-event/'.$imageName));
        }

        $future = new Future ();
        $future->name = $request->name; 
        $future->slug = $slug; 
        $future->photo = $imageName; 
        $future->date = $request->date; 
        $future->status = (boolean)$request->status; 
        $create = $future->save();
        if($create){
            Toastr::success('Successfully A New Event Has Been Stored', 'Success');
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Future  $future
     * @return \Illuminate\Http\Response
     */
    public function show(Future $future)
    {
        //
    }

    public function edit(Future $future)
    {
        return view('admin.future-event.edit',compact('future'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Future  $future
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Future $future)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:futures,name,'.$future->id,
            'date'        => 'required|string|max:255',
            'media'        => 'image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $slug = Str::slug($request->name);
        if($request->hasFile('media')){
            $image1 = $request->file('media');
            $imageName = $slug  .'-'.  Carbon::now()->toDateString(). uniqid() . '.' . $image1->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('future-event'))
            {
                Storage::disk('public')->makeDirectory('future-event');
            }
            // delete old image
            if(Storage::disk('public')->exists('future-event/'.$future->photo))
            {
                Storage::disk('public')->delete('future-event/'.$future->photo);
            }

            Image::make($image1)->resize(985, 350)->save(base_path('public/storage/future-event/'.$imageName));
        }
        else{
            $imageName = $future->photo;
        }

        $future->name = $request->name; 
        $future->slug = $slug; 
        $future->photo = $imageName; 
        $future->date = $request->date; 
        $future->status = (boolean)$request->status; 
        $create = $future->save();
        if($create){
            Toastr::success('Successfully A New Event Has Been Updated', 'Success');
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

    public function destroy(Future $future)
    {
        if(Storage::disk('public')->exists('future-event/'.$future->banner))
        {
            Storage::disk('public')->delete('future-event/'.$future->banner);
        }
        $delete = $future->delete();
        Toastr::success('Event Has Been Deleted', 'Success');
        return redirect()->back();
    }
}
