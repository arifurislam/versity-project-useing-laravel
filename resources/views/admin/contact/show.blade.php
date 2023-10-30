@extends('layouts.admin')
@section('title','show-contact-details')
@push('css')

@endpush
@section('contents')

<div class="row justify-content-center">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-0">Contact Details</h4>
                    <a href="{{url('admin/contact')}}" class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-arrow-left mr-2"></i>All Contact
                    </a>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-8">
                        <table class="table table-striped table-bordered view_table_custom">
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td>{{$contact->name}}</td>
                            </tr>
                            <tr>
                                <td>Email Address</td>
                                <td>:</td>
                                <td>{{$contact->email}}</td>
                            </tr>
                            <tr>
                                <td>Contact Number</td>
                                <td>:</td>
                                <td>{{$contact->contact}}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td>{{$contact->address}}</td>
                            </tr>
                            <tr>
                                <td>Create Time</td>
                                <td>:</td>
                                <td>{{$contact->created_at->format('g : i : h  A  ||  D - M - Y')}}</td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td>:</td>
                                <td>{{$contact->message}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')


@endpush
@endsection
