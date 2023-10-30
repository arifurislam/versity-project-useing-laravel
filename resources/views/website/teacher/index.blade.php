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
                <h1 class="mt-60" text align-left>TEACHERS LIST</h1>
                <br>
                <h1 class="mt-50"></h1>
            </div>
            @foreach ($teachers as $teacher)
            <div class="col-lg-6 mb-5">
                <div class="d-flex align-items-center">
                    <div class="teacher-left">
                        <img class="teacher-media" src="{{asset('storage/teacher/'.$teacher->photo)}}" alt="{{$teacher->photo}}">
                    </div>
                    <div class="techer-right ml-40">
                        <h3>Speach from <span class="text-danger">{{$teacher->name}}</span></h3>
                        <p>{{Str::limit($teacher->description ,150)}}</p>
                        <a href="{{url('teachers/'.$teacher->slug)}}">Read More ...</a>
                     </div>
                </div>
            </div>
            @endforeach
            {{ $teachers->links() }}
        </div>
    </div>

</main>

@push('js')

@endpush
@endsection
