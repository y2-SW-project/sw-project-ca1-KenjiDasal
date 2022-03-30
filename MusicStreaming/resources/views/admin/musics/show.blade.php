@extends('layouts.test2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    music By: {{$music->artist}}
                </div>
                <div class="card-body">
                    <table id="table-musics" class="table table-hover">
                        <tbody>
                            <tr>
                                <td rowspan="8"><img src="{{ asset('images/' . $music->img) }}" width="150"/></td>
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
                                <td>Created At</td>
                                <td>{{$music->created_at}}</td>
                            </tr>

                            <tr>
                                <td>Update At</td>
                                <td>{{$music->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{route('admin.musics.index')}}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

