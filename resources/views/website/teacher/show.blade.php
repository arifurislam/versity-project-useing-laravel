@extends('layouts.website')
@section('title','teachers')
@push('css')

@endpush
@section('contents')

<div class="offcanvas-overly"></div>
<main>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-60" text align-left>TEACHER DETAILS</h1>
                <br>
                <h1 class="mt-50"></h1>
            </div>
            <div class="col-lg-5 mb-5">
                
                <img src="{{asset('storage/teacher/'.$teacher->photo)}}" alt="{{$teacher->slug}}">
            </div>
            <div class="col-lg-7">
                <h2 class="mb-4">{{$teacher->name}} <br>(<span>{{$teacher->designation}}</span>)</h2>
                <p class="mb-5">{!! $teacher->description !!}</p>
                <ul class="teacher-profileLinks mt-5">
                    <li><a href="{{$teacher->facebook}}">Facebook</a></li>
                    <li><a href="{{$teacher->instagram}}">Instagram</a></li>
                    <li><a href="{{$teacher->twitter}}">Twitter</a></li>
                </ul>
            </div>
        </div>
    </div>

</main>

@push('js')

@endpush
@endsection
