@extends('layouts.user_nav')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $song->title }}
                    </div>
                    <div class="card-body">
                        <table id="table-musis" class="table table-hover">
                            <tbody>
                                <tr>
                                    <td rowspan="8"><img src="{{ asset('images/' . $song->img) }}" width="50%" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Artist</td>
                                    <td>{{ $song->artists }}</td>
                                </tr>

                                <tr>
                                    <td>Start Date</td>
                                    <td>{{ $song->created_at }}</td>
                                </tr>

                                <tr>
                                    <td>End Date</td>
                                    <td>{{ $song->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>


                        <a href="{{ route('user.songs.index') }}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
