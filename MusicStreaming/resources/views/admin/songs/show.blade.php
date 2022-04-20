@extends('layouts.admin_nav')

@section('content')
<div class="main">

                    song By: {{$song->artist}}

                    <table id="table-songs" class="table table-hover">
                        <tbody>
                            <tr>
                                <td rowspan="8"><img src="{{ asset('images/' . $song->id) }}.jpg" width="150"/></td>
                            </tr>


                            <tr>
                                <td>Title</td>
                                <td>{{$song->title}}</td>
                            </tr>

                            <tr>
                                <td>Artist</td>
                                <td>{{$song->artist}}</td>
                            </tr>

                            <tr>
                                <td>Created At</td>
                                <td>{{$song->created_at}}</td>
                            </tr>

                            <tr>
                                <td>Update At</td>
                                <td>{{$song->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{route('admin.songs.index')}}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
