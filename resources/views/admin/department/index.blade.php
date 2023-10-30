@extends('layouts.admin')
@section('title','all-department')
@push('css')
<link href="{{asset('admin')}}/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@section('contents')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-0">All Department <span
                            class="badge badge-primary">{{$departments->count()}}</span></h4>
                    <a href="{{url('admin/departments/create')}}" class="btn btn-sm btn-primary">
                        <i class="fa-solid fa-plus mr-2"></i>Add New</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th># ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Banner</th>
                                <th>Details</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $key => $data)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$data->name}}</td>
                                <td>
                                    @if ($data->status == 1)
                                    <span class="badge badge-primary">Published</span>
                                    @else
                                    <span class="badge badge-warning">Unpublished</span>
                                    @endif
                                </td>
                                <td><img src="{{asset('storage/department/'.$data->banner)}}" alt="image preview"
                                        class="mt-3 d-block" height="60px">
                                </td>
                                <td>{!!  Str::limit(strip_tags($data->details),35,'...') !!} </td>
                                <td>
                                    <a href="{{url('admin/departments/'.$data->id)}}"
                                        class="btn btn-sm btn-primary"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{url('admin/departments/'.$data->id.'/edit')}}"
                                        class="btn btn-sm btn-primary"><i class="fa-solid fa-pencil"></i></a>
                                    <button type="submit" class="btn btn-sm btn-primary"><i
                                            class="fa-solid fa-trash-can"
                                            onclick="deleteDepartment({{$data->id}})"></i></button>
                                    <form id="delete-form-{{$data->id}}"
                                        action="{{url('admin/departments/'.$data->id)}}" method="post">
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
                                <th>Name</th>
                                <th>Status</th>
                                <th>Banner</th>
                                <th>Details</th>
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
    function deleteDepartment(id) {
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
