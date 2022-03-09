@extends('layouts.test2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in! user in media musics') }}

                    <br>

                     <a href="{{ route('user.musics.index')}}">View musics</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
