@extends('layouts.user_nav')

@section('content')
<div class="main">

                    song By: {{$song->artist}}

                    <table id="table-songs" class="table table-hover">
                        <tbody>
                            <tr>
                                <td rowspan="8"><img src="{{ asset('images/' . $song->img) }}" width="150"/></td>
                            </tr>


                            <tr>
                                <td>Title</td>
                                <td>{{$song->title}}</td>
                            </tr>

                            <tr>
                                <td>Description</td>
                                <td>{{$song->description}}</td>
                            </tr>

                            <tr>
                                <td>Likes</td>
                                <td>{{$song->likes}}</td>
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

                    <a href="{{route('user.songs.index')}}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

