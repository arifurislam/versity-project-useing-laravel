@extends('layouts.admin')
@section('title','edit-teacher')
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
                    <h4 class="card-title">Update Teacher Informations</h4>
                    <a href="{{url('admin/teachers')}}" class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-arrow-left mr-2"></i>All User
                    </a>
                </div>
                <div class="basic-form">
                    <form method="post" action="{{url('admin/teachers/'.$teacher->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>User Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{$teacher->name}}"
                                class="form-control input-default {{$errors->has('name')? 'has-error':''}}">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Designation <span class="text-danger">*</span></label>
                            <input type="text" name="designation" value="{{$teacher->designation}}"
                                class="form-control input-default {{$errors->has('designation')? 'has-error':''}}">
                            @if ($errors->has('designation'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('designation') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Facebook <span class="text-danger">*</span></label>
                            <input type="text" name="facebook" value="{{$teacher->facebook}}"
                                class="form-control input-default {{$errors->has('facebook')? 'has-error':''}}">
                            @if ($errors->has('facebook'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('facebook') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Instagram <span class="text-danger">*</span></label>
                            <input type="text" name="instagram" value="{{$teacher->instagram}}"
                                class="form-control input-default {{$errors->has('instagram')? 'has-error':''}}">
                            @if ($errors->has('instagram'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('instagram') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Twitter <span class="text-danger">*</span></label>
                            <input type="text" name="twitter" value="{{$teacher->twitter}}"
                                class="form-control input-default {{$errors->has('twitter')? 'has-error':''}}">
                            @if ($errors->has('twitter'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('twitter') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label> Picture <span class="text-danger">*</span></label>
                            <input type="file" name="media" id="imageInput"
                                class="form-control-file {{$errors->has('media')? 'has-error':''}}">
                            <img id="imagePreview" src="{{asset('storage/teacher/'.$teacher->photo)}}"
                                alt="image preview" class="mt-3 d-block" height="50px">
                            @if ($errors->has('media'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('media') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="basic-form">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description <span class="text-danger">
                                        *</span></label>
                                <textarea name="desc"
                                    class="my_summerNote form-control h-150">
                                    {!! $teacher->description !!}
                                </textarea>
                            </div>
                            @if ($errors->has('body'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" name="status" type="checkbox"
                                    {{$teacher->status == 1? 'checked':''}}>
                                <label class="form-check-label" for="defaultCheck1">
                                    Want to publish ???
                                </label>
                            </div>
                        </div>
                        <a href="{{url('admin/teachers')}}" class="btn btn-danger"><i
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
