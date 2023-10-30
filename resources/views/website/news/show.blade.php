@extends('layouts.website')
@section('title','news & events')
@push('css')

@endpush
@section('contents')

<div class="offcanvas-overly"></div>
<main>
    <div class="container">
        <div class="container">
            <div class="row newsHead mt-3">
                <div class="col-lg-12 mb-4">
                    <h2 class="mt-60 mb-4">News Details Of <span class="text-danger">{{$news->title}}</span></h2>
                </div>
                <div class="col-lg-4 mb-4">
                    <img src="{{asset('storage/news/'.$news->photo)}}" alt="">
                </div>
                <div class="col-lg-5 mb-4">
                    <p>{!!  $news->details !!}</p>
                </div>
                <div class="col-lg-12 mb-4">
                    <h2>Random Events & News</h2>
                </div>

                @foreach ($randomNews as $data)
                <div class="newsPost col-lg-4 mt-3">
                    <img src="{{asset('storage/news/'.$data->photo)}}" alt="{{$data->title}}">
                    <p class="pt-30 pr-48">{!!  Str::limit(strip_tags($data->details),125,'...') !!}</p>
                    <div class="clickRead text-left mb-5">
                        <a href="{{url('news/'.$data->slug)}}">See more</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

@push('js')

@endpush
@endsection
