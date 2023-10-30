@extends('layouts.admin')
@section('title','all-user')
@push('css')
<link href="{{asset('admin')}}/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@section('contents')

<div class="row justify-content-center">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-0">All User <span class="badge badge-primary">{{$users->count()}}</span></h4>
                    <a href="{{url('admin/users/create')}}" class="btn btn-sm btn-primary">
                        <i class="fa-solid fa-plus mr-2"></i>Add New</a>
                </div>
                <div class="table-responsive">
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
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="{{asset('admin')}}/plugins/tables/js/jquery.dataTables.min.js"></script>
<script src="{{asset('admin')}}/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('admin')}}/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">
    function deleteUser(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-' + id).submit();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    }

</script>
@endpush
@endsection
