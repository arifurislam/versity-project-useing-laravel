@extends('layouts.admin')
@section('title','create-user')
@push('css')

@endpush
@section('contents')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title">Create New User</h4>
                    <a href="{{url('admin/users')}}" class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-arrow-left mr-2"></i>All User
                    </a>
                </div>
                <div class="basic-form">
                    <form method="post" action="{{url('admin/users')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>User Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{old('name')}}"
                                class="form-control input-default {{$errors->has('name')? 'has-error':''}}"
                                placeholder="enter user name ...">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Email Address <span class="text-danger">*</span></label>
                            <input type="text" name="email" value="{{old('email')}}"
                                class="form-control input-default {{$errors->has('email')? 'has-error':''}}"
                                placeholder="enter a valid email address ...">
                            @if ($errors->has('email'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Password <span class="text-danger">*</span></label>
                            <input type="password" name="password"
                                class="form-control input-default {{$errors->has('password')? 'has-error':''}}"
                                placeholder="enter 8 digit password at least ...">
                            @if ($errors->has('password'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation"
                                class="form-control input-default {{$errors->has('password_confirmation')? 'has-error':''}}"
                                placeholder="re enter your password ...">
                            @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Profile Picture <span class="text-danger">*</span></label>
                            <input type="file" name="media" id="imageInput"
                                class="form-control-file {{$errors->has('media')? 'has-error':''}}">
                            
                                <img id="imagePreview" src="{{asset('storage/valid/white_image.png')}}"
                                alt="image preview" class="mt-3 d-block" height="50px">
                            @if ($errors->has('media'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('media') }}</strong>
                            </span>
                            @endif
                        </div>
                        <a href="{{url('admin/users')}}" class="btn btn-danger"><i
                                class="fa-solid fa-arrow-left pr-2"></i>Back</a>
                        <button type="submit" class="btn btn-primary"><i
                                class="fa-solid fa-upload fa-beat pr-2"></i>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    imageInput.addEventListener('change', function (event) {
        const selectedFile = event.target.files[0];
        if (selectedFile) {
            const reader = new FileReader();
            reader.onload = function (event) {
                imagePreview.src = event.target.result;
            };
            reader.readAsDataURL(selectedFile);
        }
    });
</script>
@endpush
@endsection
