<?php

namespace App\Http\Controllers\Admin;


use Image;
use Storage;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;


class TeacherController extends Controller
{
 
    public function index()
    {
        $teachers = Teacher::latest()->get();
        return view('admin.teacher.index',compact('teachers'));
    }

    public function create()
    {
        return view('admin.teacher.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'facebook'    => 'required|string|max:255',
            'instagram'   => 'required|string|max:255',
            'twitter'     => 'required|string|max:255',
            'media' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'details'  => 'required',
        ]);


        $slug = Str::slug($request->name);
        if($request->hasFile('media')){
            $image1 = $request->file('media');
            $imageName = $slug  .'-'.  Carbon::now()->toDateString(). uniqid() . '.' . $image1->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('teacher'))
            {
                Storage::disk('public')->makeDirectory('teacher');
            }

            Image::make($image1)->resize(400, 400)->save(base_path('public/storage/teacher/'.$imageName));
        }

        $teacher = new Teacher ();
        $teacher->name  = $request->name;
        $teacher->slug  = $slug;
        $teacher->designation  = $request->designation;
        $teacher->facebook  = $request->facebook;
        $teacher->instagram  = $request->instagram;
        $teacher->twitter  = $request->twitter;
        $teacher->photo  = $imageName;
        $teacher->description  = $request->details;
        $teacher->status  = (boolean)$request->status;
        $create = $teacher->save();
        if($create){
            Toastr::success('Successfully Teacher Added', 'Success');
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }
    public function show(Teacher $teacher)
    {
        return view('admin.teacher.show',compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teacher.edit',compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'facebook'    => 'required|string|max:255',
            'instagram'   => 'required|string|max:255',
            'twitter'     => 'required|string|max:255',
            'media' => 'image|mimes:jpg,png,jpeg,gif,svg',
            'desc'  => 'required',
        ]);

        $slug = Str::slug($request->name);
        if($request->hasFile('media')){
            $image1 = $request->file('media');
            $imageName = $slug  .'-'.  Carbon::now()->toDateString(). uniqid() . '.' . $image1->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('teacher'))
            {
        		Storage::disk('public')->makeDirectory('teacher');
            }
            // delete old image
            if(Storage::disk('public')->exists('teacher/'.$teacher->photo))
            {
                Storage::disk('public')->delete('teacher/'.$teacher->photo);
            }

            Image::make($image1)->resize(400, 400)->save(base_path('public/storage/teacher/'.$imageName));
        }
        else{
            $imageName = $teacher->photo;
        }

        $teacher->name  = $request->name;
        $teacher->slug  = $slug;
        $teacher->designation  = $request->designation;
        $teacher->facebook  = $request->facebook;
        $teacher->instagram  = $request->instagram;
        $teacher->twitter  = $request->twitter;
        $teacher->photo  = $imageName;
        $teacher->description  = $request->desc;
        $teacher->status  = (boolean)$request->status;
        $create = $teacher->save();
        if($create){
            Toastr::success('Successfully Updated', 'Success');
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

    public function destroy(Teacher $teacher)
    {
        if(Storage::disk('public')->exists('teacher/'.$teacher->photo))
        {
            Storage::disk('public')->delete('teacher/'.$teacher->photo);
        }
        $delete = $teacher->delete();
        Toastr::success('Teacher Successfully deleted', 'Success');
        return redirect()->back();
    }
}
