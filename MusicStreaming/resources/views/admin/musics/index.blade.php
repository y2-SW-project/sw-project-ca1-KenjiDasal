@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Posts
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary float-right">Add</a>
                </div>
                <div class="card-body">
                    @if (count($posts)=== 0)
                        <p>There are no post.</p>
                    @else
                    <table id="table-posts" class="table table-hover">
                        <thead>
                            <th>ID</th>
                            <th>Artist</th>
                            <th>Likes</th>
                            <th>Title</th>
                            <th>Description</th>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                        <tr data-id="$post->id">
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->artist}}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->likes}}</td>
                            <td>{{ $post->description}}</td>

                            <td>
                                <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary">View</a>
                                <a href="{{route('admin.posts.edit', $post->id)}}">Edit</a>
                                <form style="display: inline-block" method="POST" action="{{route('admin.posts.destroy', $post->id)}}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="form-control btn btn-danger">Delete</button>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
