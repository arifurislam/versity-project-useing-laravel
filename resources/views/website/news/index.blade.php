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
                <div class="col-lg-12">
                    <h2 class="mt-60 mb-4">Latest News</h2>
                </div>
                @foreach ($latestNews as $data)
                <div class="newsPost col-lg-4 mt-3">
                    <img src="{{asset('storage/news/'.$data->photo)}}" alt="{{$data->title}}">
                    <p class="pt-30 pr-48">{!!  Str::limit(strip_tags($data->details),125,'...') !!}</p>
                    <div class="clickRead text-left mb-5">
                        <a href="{{url('news/'.$data->slug)}}">See more</a>
                    </div>
                </div>
                @endforeach

                <div class="col-lg-12">
                    <h2 class="mt-60 mb-4">Previous News</h2>
                </div>

                @foreach ($allpreviousNews as $prevNews)
                <div class="newsPost col-lg-4 mt-3">
                    <img src="{{asset('storage/news/'.$prevNews->photo)}}" alt="{{$prevNews->title}}">
                    <p class="pt-30 pr-48">{!!  Str::limit(strip_tags($prevNews->details),125,'...') !!}</p>
                    <div class="clickRead text-left mb-5">
                        <a href="{{url('news/'.$prevNews->slug)}}">See more</a>
                    </div>
                </div>
                @endforeach

                {{$allpreviousNews->links()}}
            </div>
        </div>
    </div>
</main>

@push('js')

@endpush
@endsection
