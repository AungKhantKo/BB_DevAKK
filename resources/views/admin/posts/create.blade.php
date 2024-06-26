@extends('layouts.admin');
@section('content')
<div class="container-fluid px-4">
            <div class="my-4">
                <h3 class="my-4 d-inline">Posts Create</h3>
                <a href="{{route('backend.posts.index')}}" class="btn btn-danger float-end">Cancel</a>
            </div>

        <div class="container-md">
            <form action="{{route('backend.posts.store')}}" method="POST" enctype="multipart/form-data" class="border">
                {{csrf_field()}}
                <div class="row py-2">
                    <div class="offset-lg-1 col-lg-10">
                        <div class="mb-3 mt-3">
                            <label for="title" class="form-label fw-bold">Title</label>
                            <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" name="title" id="title" placeholder="">
                            
                            @if($errors->has('title'))
                                <div>
                                    {{$errors->first('title')}}
                                </div>
                            @endif

                        </div>
                        
                        <div class="mb-3">
                            <label for="image" class="form-label fw-bold">Image</label>
                            <input class="form-control {{$errors->has('image') ? 'is-invalid' : ''}}" accept="image/*" type="file" name="image" id="image">

                            @if($errors->has('image'))
                                <div>
                                    {{$errors->first('image')}}
                                </div>
                            @endif

                        </div>

                        <div class="mb-3 ">
                            <label for="user" class="form-label fw-bold">User</label>
                            <select class="form-select {{$errors->has('user_id') ? 'is-invalid' : ''}}" name="user_id" aria-label="Default select example">
                                <option value="">Choose</option>
                                
                                    <option value="1">user</option>
                                    <option value="2">admin</option>
                                                                      
                            </select>

                            @if($errors->has('user_id'))
                                <div>
                                    {{$errors->first('user_id')}}
                                </div>
                            @endif

                        </div>

                        <div class="mb-3 ">
                            <label for="category" class="form-label fw-bold">Category</label>
                            <select class="form-select {{$errors->has('category_id') ? 'is-invalid' : ''}}" name="category_id" aria-label="Default select example">
                                <option value="">Choose Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>             
                                @endforeach                                
                            </select>

                            @if($errors->has('category_id'))
                                <div>
                                    {{$errors->first('category_id')}}
                                </div>
                            @endif

                        </div>

                        <div class="mb-3 ">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" placeholder="" name="description" id="description"></textarea>

                            @if($errors->has('description'))
                                <div>
                                    {{$errors->first('description')}}
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
