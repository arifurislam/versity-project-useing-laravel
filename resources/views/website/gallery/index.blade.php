@extends('layouts.website')
@section('title','gallery-photos')
@push('css')

@endpush
@section('contents')


<div class="offcanvas-overly"></div>

<main>
    <div class="container">
        <div class="text-center">
            <h2 class="mt-80">GALLERY LIST</h2>
            <a href="{{url('/gallery/photos/details')}}">
                <h4 class="mt-30">Academic Gallery</h4>
            </a>
            <a href="{{url('/gallery/photos/details')}}">
                <h4 class="mt-30">Student Gallery</h4>
            </a>
            <a href="{{url('/gallery/photos/details')}}">
                <h4 class="mt-30 mb-20">Campus</h4>
            </a>
        </div>
    </div>
</main>


@push('js')

@endpush
@endsection
