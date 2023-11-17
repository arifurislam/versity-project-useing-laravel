@extends('layouts.admin')
@section('title','home')
@push('css')

@endpush
@section('contents')
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <a href="{{url('/admin/departments')}}">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Department</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">
                            @if($department_count >9)
                                {{$department_count}}
                            @else
                                0{{$department_count}}
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6">
        <a href="{{url('/admin/contact')}}">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Contacts</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">
                        @if($contact_count >9)
                                {{$contact_count}}
                            @else
                                0{{$contact_count}}
                            @endif
                        </h2>  
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6">
        <a href="{{url('admin/teachers')}}">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Teacher</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">
                            @if($teacher_count >9)
                                {{$teacher_count}}
                            @else
                                0{{$teacher_count}}
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6">
        <a href="{{url('/admin/future')}}">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">Upcoming Events</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">
                            @if($event_count >9)
                                {{$event_count}}
                            @else
                                0{{$event_count}}
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>


@push('js')

@endpush
@endsection
