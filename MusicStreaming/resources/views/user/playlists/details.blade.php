@extends('layouts.user_nav')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $playlist->title }}
                    </div>
                    <div class="card-body">
                        <table id="table-musis" class="table table-hover">
                            <tbody>
                                <tr>
                                    <td rowspan="8"><img src="{{ asset('images/' . $playlist->img) }}" width="50%" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Artist</td>
                                    <td>{{ $playlist->artists }}</td>
                                </tr>

                                <tr>
                                    <td>Start Date</td>
                                    <td>{{ $playlist->created_at }}</td>
                                </tr>

                                <tr>
                                    <td>End Date</td>
                                    <td>{{ $playlist->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>


                        <a href="{{ route('user.playlists.playlist') }}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
