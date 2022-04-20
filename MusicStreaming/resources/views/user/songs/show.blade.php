@extends('layouts.user_nav')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    music By: {{$music->artist}}
                </div>
                <div class="card-body">
                    <table id="table-musis" class="table table-hover">
                        <tbody>
                            <tr>

                                    <img src="{{$music-> img}}" alt="">

                            </tr>
                            <tr>
                                <td>Title</td>
                                <td>{{$music->title}}</td>
                            </tr>

                            <tr>
                                <td>Description</td>
                                <td>{{$music->description}}</td>
                            </tr>

                            <tr>
                                <td>Likes</td>
                                <td>{{$music->likes}}</td>
                            </tr>

                            <tr>
                                <td>Start Date</td>
                                <td>{{$music->start_date}}</td>
                            </tr>

                            <tr>
                                <td>End Date</td>
                                <td>{{$music->end_date}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{route('user.musics.index')}}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

