@extends('layouts.admin')
@section('content')
            <div class="container-fluid px-4">

                <div class="my-5">
                        <h3 class="my-4 d-inline">User Tables</h1>
                        <a href="{{route('backend.users.create')}}" class="btn btn-primary float-end">Add User</a>
                </div>
            users
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody id="user_tbody">
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->password}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>
                                        <a href="{{route('backend.users.edit',$user->id)}}" class="btn btn-sm btn-warning d-inline">Edit</a>
                                        <button class="btn btn-sm btn-danger d-inline delete" type="button" data-userid="{{$user->id}}">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-light">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure to delete?</p>
                        </div>
                        <div class="modal-footer">                                    
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

                            <form action="" method="post" id="deleteForm">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                            <button type="submit" class="btn btn-danger">Yes</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection


@section('script')

    <script>
            $(document).ready(function(){
                $('#user_tbody').on('click','.delete',function(){
                    let id = $(this).data('userid');
                    // console.log(id);
                    $('#deleteModal').modal('show');
                    $('#deleteForm').prop('action','users/'+id);
                })
            })
    </script>

@endsection