@extends('layouts.admin')
@section('title','create-department')
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
                    <h4 class="card-title">Create New Department</h4>
                    <a href="{{url('admin/departments')}}" class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-arrow-left mr-2"></i>All Department
                    </a>
                </div>
                <div class="basic-form">
                    <form method="post" action="{{url('admin/departments')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Department Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{old('name')}}"
                                class="form-control input-default {{$errors->has('name')? 'has-error':''}}"
                                placeholder="Enter Department Name ...">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="basic-form">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Details <span class="text-danger">
                                        *</span></label>
                                <textarea name="details" class="my_summerNote form-control h-150"></textarea>
                            </div>
                            @if ($errors->has('details'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('details') }}</strong>
                            </span>
                            @endif
                        </div>
                                                
                        <div class="form-group">
                            <label>Department Banner <span class="text-danger">*</span></label>
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
