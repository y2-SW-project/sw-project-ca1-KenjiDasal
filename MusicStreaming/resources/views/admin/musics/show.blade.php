@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Post By: {{$post->artist}}
                </div>
                <div class="card-body">
                    <table id="table-posts" class="table table-hover">
                        <tbody>
                            <tr>
                                <td rowspan="8"><img src="{{ asset('images/' . $post->img) }}" width="150"/></td>
                            </tr>


                            <tr>
                                <td>Title</td>
                                <td>{{$post->title}}</td>
                            </tr>

                            <tr>
                                <td>Description</td>
                                <td>{{$post->description}}</td>
                            </tr>

                            <tr>
                                <td>Likes</td>
                                <td>{{$post->likes}}</td>
                            </tr>

                            <tr>
                                <td>Created At</td>
                                <td>{{$post->created_at}}</td>
                            </tr>

                            <tr>
                                <td>Update At</td>
                                <td>{{$post->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{route('admin.posts.index')}}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

