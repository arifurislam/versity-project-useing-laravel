<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Image;
use Storage;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::all();
        return view('admin.department.index',compact('departments'));

    }

    public function create()
    {
        return view('admin.department.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'media' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'details'  => 'required|max:900',
        ]);

        $slug = Str::slug($request->name);
        if($request->hasFile('media')){
            $image1 = $request->file('media');
            $imageName = $slug  .'-'.  Carbon::now()->toDateString(). uniqid() . '.' . $image1->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('department'))
            {
                Storage::disk('public')->makeDirectory('department');
            }

            Image::make($image1)->save(base_path('public/storage/department/'.$imageName));
        }

        $department = new Department ();
        $department->name = $request->name;
        $department->slug = $slug;
        $department->status = (boolean)$request->status;
        $department->banner = $imageName;
        $department->details = $request->details;
        $create = $department->save();
        if($create){
            Toastr::success('Successfully New Department Has Been Added', 'Success');
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }

    }

    public function show(Department $department)
    {
        return view('admin.department.show',compact('department'));
        
    }

    public function edit(Department $department)
    {
        return view('admin.department.edit',compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'media'       => 'image|mimes:jpg,png,jpeg,gif,svg',
            'details'     => 'required|max:900',
        ]);

        $slug = Str::slug($request->name);
        if($request->hasFile('media')){
            $image1 = $request->file('media');
            $imageName = $slug  .'-'.  Carbon::now()->toDateString(). uniqid() . '.' . $image1->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('department'))
            {
                Storage::disk('public')->makeDirectory('department');
            }
             // delete old image
             if(Storage::disk('public')->exists('department/'.$department->banner))
             {
                 Storage::disk('public')->delete('department/'.$department->banner);
             }

            Image::make($image1)->save(base_path('public/storage/department/'.$imageName));
        }
        else{
            $imageName = $department->banner;
        }

        $department->name = $request->name;
        $department->slug = $slug;
        $department->status = (boolean)$request->status;
        $department->banner = $imageName;
        $department->details = $request->details;
        $create = $department->save();
        if($create){
            Toastr::success('Successfully Departent Has Been Updated', 'Success');
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

    public function destroy(Department $department)
    {
        if(Storage::disk('public')->exists('department/'.$department->banner))
        {
            Storage::disk('public')->delete('department/'.$department->banner);
        }
        $delete = $department->delete();
        Toastr::success('Department Has Been Deleted', 'Success');
        return redirect()->back();
    }
}
