@extends('layouts.admin')
@section('title','show-user')
@push('css')

@endpush
@section('contents')

<div class="row justify-content-center">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-0">All User</h4>
                    <a href="{{url('admin/users')}}" class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-arrow-left mr-2"></i>All User
                    </a>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-8">
                        <table class="table table-striped table-bordered view_table_custom">
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td>Create Time</td>
                                <td>:</td>
                                <td>{{$user->created_at->format('g:i  A  ||  D - M - Y')}}</td>
                            </tr>
                            <tr>
                                <td>User Image</td>
                                <td>:</td>
                                <td><img src="{{asset('storage/profile/'.$user->profile)}}"
                                    alt="image preview" class="mt-3 d-block" height="60px"></td>
                            </tr>
                        </table>
                    </div>

                </div>
                {{-- <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th># ID</th>
                                <th>User Name</th>
                                <th>email</th>
                                <th>Create Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $data)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{Str::limit($data->email , 10)}}</td>
                                <td>{{$data->created_at->format('g:i  A  ||  D - M - Y')}}</td>
                                <td>
                                    <a href="{{url('admin/users/'.$data->id)}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{url('admin/users/'.$data->id.'/edit')}}" class="btn btn-sm btn-primary"><i
                                            class="fa-solid fa-pencil"></i></a>
                                    <button type="submit" class="btn btn-sm btn-primary"><i
                                            class="fa-solid fa-trash-can" onclick="deleteUser({{$data->id}})"></i></button>
                                    <form id="delete-form-{{$data->id}}"
                                        action="{{url('admin/users/'.$data->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th># ID</th>
                                <th>User Name</th>
                                <th>email</th>
                                <th>Create Time</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div> --}}
            </div>
        </div>
    </div>
</div>

@push('js')


@endpush
@endsection
