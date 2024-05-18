@extends('layouts.admin');
@section('content')
<div class="container-fluid px-4">
            <div class="my-4">
                <h3 class="my-4 d-inline">Posts Edit</h3>
                <a href="{{route('backend.posts.index')}}" class="btn btn-danger float-end">Cancel</a>
            </div>

        <div class="container-md">
            <form action="{{route('backend.posts.update',$post->id)}}" method="POST" enctype="multipart/form-data" class="border">
                {{csrf_field()}}
                {{method_field('put')}}
                <div class="row py-2">
                    <div class="offset-lg-1 col-lg-10">
                        <div class="mb-3 mt-3">
                            <label for="title" class="form-label fw-bold">Title</label>
                            <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" name="title" value="{{$post->title}}" id="title" placeholder="">
                            
                            @if($errors->has('title'))
                                <div>
                                    {{$errors->first('title')}}
                                </div>
                            @endif

                        </div>
                        
                        <div class="mb-3">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="old_image-tab" data-bs-toggle="tab" data-bs-target="#old_image-tab-pane" type="button" role="tab" aria-controls="old_image-tab-pane" aria-selected="true">Old image</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls="new_image-tab-pane" aria-selected="false">New image</button>
                                </li>
                            
                            </ul>
                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="old_image-tab-pane" role="tabpanel" aria-labelledby="old_image-tab" tabindex="0">
                                    <img src="{{$post->image}}" alt="" class="w-25  my-3">
                                        <input class="form-control" accept="image/*" type="hidden" name="old_image" id="" value="{{$post->image}}">
                                </div>

                                <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                                    <input class="form-control my-3" accept="image/*" type="file" name="new_image" id="image">
                                </div>  

                            </div>
                        </div>

                        <div class="mb-3 ">
                            <label for="user" class="form-label fw-bold">User</label>
                            <select class="form-select {{$errors->has('user_id') ? 'is-invalid' : ''}}" name="user_id" aria-label="Default select example">
                                <option value="">Choose</option>
                                
                                    <option value="1" {{$post->user_id == 1 ? 'selected':''}}>user</option>
                                    <option value="0" {{$post->user_id == 0 ? 'selected':''}}>admin</option>
                                                                      
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
                                    <option value="{{$category->id}}" {{$post->category_id == $category->id ? 'selected':''}}>{{$category->name}}</option>             
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
                            <textarea class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" placeholder="" name="description" id="description">{{$post->description}}</textarea>

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
