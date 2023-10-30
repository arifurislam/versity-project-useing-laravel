@extends('layouts.admin')
@section('title','show-news')
@push('css')

@endpush
@section('contents')

<div class="row justify-content-center">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-0">Show News</h4>
                    <a href="{{url('admin/news')}}" class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-arrow-left mr-2"></i>All News
                    </a>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-8">
                        <table class="table table-striped table-bordered view_table_custom">
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td>{{$news->title}}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>
                                    @if ($news->status == 1)
                                        <span class="badge badge-primary">Published</span>
                                    @else
                                        <span class="badge badge-warning">Unpublished</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Create Time</td>
                                <td>:</td>
                                <td>{{$news->created_at->format('g:i  A  ||  D - M - Y')}}</td>
                            </tr>
                            <tr>
                                <td>Photo</td>
                                <td>:</td>
                                <td>
                                    <img src="{{asset('storage/news/'.$news->photo)}}"
                                    alt="image preview" class="mt-3 d-block" height="60px">
                                </td>
                            </tr>
                            <tr>
                                <td>Details</td>
                                <td>:</td>
                                <td>
                                    {!! $news->details !!}
                                </td>
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
