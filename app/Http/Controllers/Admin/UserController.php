<?php

namespace App\Http\Controllers\Admin;

use Image;
use Storage;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{

    public function index()
    {
        $users = User::latest()->get();
        return view('admin.user.index',compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|confirmed|string|max:255|confirmed',
            'password_confirmation' => 'required',
            'media' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $slug = Str::slug($request->name);
        if($request->hasFile('media')){
            $image1 = $request->file('media');
            $imageName = $slug  .'-'.  Carbon::now()->toDateString(). uniqid() . '.' . $image1->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('profile'))
            {
                Storage::disk('public')->makeDirectory('profile');
            }

            Image::make($image1)->resize(200, 200)->save(base_path('public/storage/profile/'.$imageName));
        }

        $user = new User ();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile = $imageName;
        $create = $user->save();
        if($create){
            Toastr::success('Successfully Registerd', 'Success');
            return redirect('admin/users');
        }
        else{
            return redirect()->back();
        } 
    }

    public function show($id)
    {
        $user = User::where('id',$id)->firstOrFail(); 
        return view('admin.user.show',compact('user'));
    }


    public function edit($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|string|max:255|email|unique:users,email,'.$id,
            'password' => 'required|confirmed|string|max:255|confirmed',
            'password_confirmation' => 'required',
            'media' => 'image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        
        $slug = Str::slug($request->name);
        if($request->hasFile('media')){
            $image1 = $request->file('media');
            $imageName = $slug  .'-'.  Carbon::now()->toDateString(). uniqid() . '.' . $image1->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('profile'))
            {
                Storage::disk('public')->makeDirectory('profile');
            }
            // delete old image
            if(Storage::disk('public')->exists('profile/'.$user->profile))
            {
                Storage::disk('public')->delete('profile/'.$user->profile);
            }
            Image::make($image1)->resize(200, 200)->save(base_path('public/storage/profile/'.$imageName));
        }
        else{
            $imageName = $user->profile;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile = $imageName;
        $update = $user->save();
        if($update){
            Toastr::success('Successfully updated', 'Success');
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        // delete image
        if(Storage::disk('public')->exists('profile/'.$user->profile))
        {
            Storage::disk('public')->delete('profile/'.$user->profile);
        }
        
        $delete = $user->delete();
        if($delete){
            Toastr::success('User Has Been Deleted', 'Success');
            return redirect()->back();
        }
    }
}
