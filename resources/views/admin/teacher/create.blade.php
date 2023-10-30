@extends('layouts.admin')
@section('title','create-teacher')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@section('contents')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title">Create New Teacher</h4>
                    <a href="{{url('admin/teachers')}}" class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-arrow-left mr-2"></i>All Teacher
                    </a>
                </div>
                <div class="basic-form">
                    <form method="post" action="{{url('admin/teachers')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Teacher Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{old('name')}}"
                                class="form-control input-default {{$errors->has('name')? 'has-error':''}}"
                                placeholder="Enter Teacher Name ...">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Teacher Designation <span class="text-danger">*</span></label>
                            <input type="text" name="designation" value="{{old('designation')}}"
                                class="form-control input-default {{$errors->has('designation')? 'has-error':''}}"
                                placeholder="Enter Teacher Designation ...">
                            @if ($errors->has('designation'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('designation') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Facebook Url <span class="text-danger">*</span></label>
                            <input type="text" name="facebook"
                                class="form-control input-default {{$errors->has('facebook')? 'has-error':''}}"
                                placeholder="Enter Teacher Facebook url ...">
                            @if ($errors->has('facebook'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('facebook') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Instagram Url <span class="text-danger">*</span></label>
                            <input type="text" name="instagram"
                                class="form-control input-default {{$errors->has('instagram')? 'has-error':''}}"
                                placeholder="Enter Teacher Instagram url ...">
                            @if ($errors->has('instagram'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('instagram') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Twitter Url <span class="text-danger">*</span></label>
                            <input type="text" name="twitter"
                                class="form-control input-default {{$errors->has('twitter')? 'has-error':''}}"
                                placeholder="Enter Teacher Twitter url ...">
                            @if ($errors->has('twitter'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('twitter') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Profile Picture <span class="text-danger">*</span></label>
                            <input type="file" name="media" id="imageInput"
                                class="form-control-file {{$errors->has('media')? 'has-error':''}}">
                                @if ($errors->has('media'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('media') }}</strong>
                                </span>
                                @endif
                            <img id="imagePreview" src="{{asset('storage/valid/white_image.png')}}" alt="image preview"
                                class="mt-3 d-block" height="50px">
                        </div>
                        <div class="basic-form">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description <span class="text-danger">
                                        *</span></label>
                                <textarea name="desc" class="my_summerNote form-control h-150"></textarea>
                            </div>
                            @if ($errors->has('body'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" name="status" type="checkbox">
                                <label class="form-check-label" for="defaultCheck1">
                                    Want to publish ???
                                </label>
                            </div>
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function () {
        $(".my_summerNote").summernote();
    });

</script>
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
