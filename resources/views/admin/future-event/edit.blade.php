@extends('layouts.admin')
@section('title','edit-upcoming-event')
@push('css')

@endpush
@section('contents')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title">Edit Upcoming Event</h4>
                    <a href="{{url('upcomming-events')}}" class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-arrow-left mr-2"></i>All Upcoming Event
                    </a>
                </div>
                <div class="basic-form">
                    <form method="post" action="{{url('admin/future/'.$future->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Event Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{$future->name}}"
                                class="form-control input-default {{$errors->has('name')? 'has-error':''}}"
                                placeholder="Enter Event Name ...">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="example mb-3">
                            <label>Pick Up Date <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="date" name="date" value="{{$future->date}}" class="form-control {{$errors->has('date')? 'has-error':''}}"
                                    placeholder="mm/dd/yyyy">
                                    @if ($errors->has('date'))
                                    <span class="invalid-feedback mb-0" role="alert">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Event Media <span class="text-danger">*</span></label>
                            <input type="file" name="media" id="imageInput"
                                class="form-control-file {{$errors->has('media')? 'has-error':''}}">
                            @if ($errors->has('media'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('media') }}</strong>
                            </span>
                            @endif
                            <img id="imagePreview" src="{{asset('storage/future-event/'.$future->photo)}}" alt="image preview"
                                class="mt-3 d-block" height="50px">
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" name="status" type="checkbox" {{$future->status == 1 ? 'checked':''}}>
                                <label class="form-check-label" for="defaultCheck1">
                                    Want to publish ???
                                </label>
                            </div>
                        </div>
                        <a href="{{url('admin/future')}}" class="btn btn-danger"><i
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
