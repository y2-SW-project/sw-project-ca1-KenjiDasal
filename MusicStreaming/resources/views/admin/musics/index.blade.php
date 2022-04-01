@extends('layouts.test2')

@section('content')
<div class="song-list">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    musics
                    <a href="{{ route('admin.musics.create') }}" class="btn btn-primary float-right">Add</a>
                </div>
                <div class="card-body">
                    @if (count($musics)=== 0)
                        <p>There are no music.</p>
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
                            @foreach ($musics as $music)
                        <tr data-id="$music->id">
                            <td>{{ $music->id }}</td>
                            <td>{{ $music->artist}}</td>
                            <td>{{ $music->title }}</td>
                            <td>{{ $music->likes}}</td>
                            <td>{{ $music->description}}</td>

                            <td>
                                <a href="{{route('admin.musics.show', $music->id)}}" class="btn btn-primary">View</a>
                                <a href="{{route('admin.musics.edit', $music->id)}}">Edit</a>
                                <form style="display: inline-block" method="POST" action="{{route('admin.musics.destroy', $music->id)}}">
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
