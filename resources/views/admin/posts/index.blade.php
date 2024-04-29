@extends('layouts.admin')
@section('content')
                <div class="container-fluid px-4">

                    <div class="my-5">
                        <h3 class="my-4 d-inline">Post Tables</h1>
                        <a href="{{route('backend.posts.create')}}" class="btn btn-primary float-end">Add Post</a>
                    </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->image}}</td>
                                            <td>
                                                <a href="{{route('backend.posts.edit',$post->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                                <button class="btn btn-sm btn-danger" type="button">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
@endsection