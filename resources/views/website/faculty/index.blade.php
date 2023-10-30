@extends('layouts.website')
@section('title','faculties')
@push('css')

@endpush
@section('contents')


<div class="offcanvas-overly"></div>

<main>
    <div class="container" style="margin-top: 50px; margin-bottom: 30px; text-align: center;">
        <div id="rs-team-2" class="rs-team-2 team-page sec-spacer">
            <div class="container">
                <div class="faculty_container">
                    <div class="sec-title mb-50 text-center">
                        <h1>Department of Bright Minds School & College</h1>
                    </div>
                    <div class="row justify-content-md-center">
                        @foreach ($faculties as $faculty)
                        <div class="col-lg-2 col-md-6 col-xs-6 grid-item">
                            <a href="{{url('faculties/'.$faculty->slug)}}">
                                <div class="team-item">
                                    <div class="team-body">
                                        <span class="designation">Department of</span>
                                        <h3>{{$faculty->name}}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@push('js')

@endpush
@endsection
