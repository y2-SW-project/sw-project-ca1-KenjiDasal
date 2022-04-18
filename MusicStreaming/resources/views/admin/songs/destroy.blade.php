@extends('layouts.test2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    songs
                </div>
                <div class="card-body">
                    @if (count($songs)=== 0)
                        <p>There are no song.</p>
                    @else
                    <table id="table-songs" class="table table-hover">
                        <thead>
                            <th>ID</th>
                            <th>Artist</th>
                            <th>Likes</th>
                            <th>Title</th>
                            <th>Description</th>
                        </thead>
                        <tbody>
                            @foreach ($songs as $song)
                        <tr data-id="$song->id">
                            <td>{{ $song->id }}</td>
                            <td>{{ $song->artist}}</td>
                            <td>{{ $song->title }}</td>
                            <td>{{ $song->likes}}</td>
                            <td>{{ $song->description}}</td>

                            <td>
                                <a href="{{route('admin.songs.show', $song->id)}}" class="btn btn-primary">Views</a>
                                <a href="{{route('admin.songs.edit', $song->id)}}">Edit</a>
                                <form style="display: inline-block" method="POST" action="{{route('admin.songs.destroy', $song->id)}}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    input type="hidden" name="_token" value="{{ csrf_token() }}">
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
