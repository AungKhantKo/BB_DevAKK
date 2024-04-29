@extends('layouts.admin');
@section('content')
<div class="container-fluid px-4">
            <div class="my-4">
                <h3 class="my-4 d-inline">Users Create</h3>
                <a href="{{route('backend.users.index')}}" class="btn btn-danger float-end">Cancel</a>
            </div>

        <div class="container-md">
            <form action="{{route('backend.users.store')}}" method="POST" class="border">
                {{csrf_field()}}
                <div class="row py-2">
                    <div class="offset-lg-1 col-lg-10">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" value="{{$user->name}}" id="name" placeholder="">

                            @if($errors->has('name'))
                                <div>
                                    {{$errors->first('name')}}
                                </div>
                            @endif

                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" type="email" name="email" value="{{$user->email}}" id="email" placeholder="example@gmail.com">

                            @if($errors->has('email'))
                                <div>
                                    {{$errors->first('email')}}
                                </div>
                            @endif

                        </div>

                        <div class="mb-3 ">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password" value="{{$user->password}}"id="password" placeholder="">

                            @if($errors->has('password'))
                                <div>
                                    {{$errors->first('password')}}
                                </div>
                            @endif

                        </div>
                        <div class="mb-3 ">
                            <label for="role" class="form-label fw-bold">Role</label>
                            <select class="form-select {{$errors->has('role') ? 'is-invalid' : ''}}" name="role" aria-label="Default select example">
                                <option value="">Choose Role</option>
                                <option value="1" {{$user->role == 1 ? 'selected':''}}>Admin</option>
                                <option value="0" {{$user->role == 0 ? 'selected':''}}>User</option>                                
                            </select>

                            @if($errors->has('role'))
                                <div>
                                    {{$errors->first('role')}}
                                </div>
                            @endif

                        </div>                     
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="Submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection