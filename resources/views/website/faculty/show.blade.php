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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="faculty_container">
                            <div class="sec-title mb-50 text-center">
                                <h1>Department <strong class="text-danger">( <span
                                            class="text-danger">{{$faculty->name}}</span> )</strong> of Bright Minds
                                    School & College</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <img class="mb-5" src="{{asset('storage/department/'.$faculty->banner)}}"
                            alt="{{$faculty->name}}">

                        <p>{!! $faculty->details !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@push('js')

@endpush
@endsection
