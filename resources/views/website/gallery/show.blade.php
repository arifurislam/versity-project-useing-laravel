@extends('layouts.website')
@section('title','gallery-photos-details')
@push('css')

@endpush
@section('contents')


<div class="offcanvas-overly"></div>

<main>

    <div class="container">
        <div class="mt-80 mb-80">
            <h2 class="text-center">Student Gallery</h2>
        </div>
        <div class="mt-80 mb-80">
            <div class="row">
                <div class="col-3">
                    <img src="{{asset('website')}}/src/7-Gallery/1-Photos/GALLERY LIST/2-Student Gallery/1.jpeg" alt="">
                </div>
                <div class="col-3">
                    <img src="{{asset('website')}}/src/7-Gallery/1-Photos/GALLERY LIST/2-Student Gallery/2.jpeg" alt="">
                </div>
                <div class="col-3">
                    <img src="{{asset('website')}}/src/7-Gallery/1-Photos/GALLERY LIST/2-Student Gallery/3.jpeg" alt="">
                </div>
                <div class="col-3">
                    <img src="{{asset('website')}}/src/7-Gallery/1-Photos/GALLERY LIST/2-Student Gallery/4.jpg" alt="">
                </div>

            </div>
            <div class="row mt-60 mb-80">
                <div class="col-3">
                    <img src="{{asset('website')}}/src/7-Gallery/1-Photos/GALLERY LIST/2-Student Gallery/5.jpeg " alt="">
                </div>
            </div>
        </div>
    </div>

</main>


@push('js')

@endpush
@endsection
