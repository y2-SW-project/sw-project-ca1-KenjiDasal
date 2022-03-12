@extends('layouts.test2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="">

                <div class=" text-center w-text">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h3>
                        Welcome to
                    </h3>

                    <h1>
                        KORDZ
                    </h1>

                    <h3>
                        Music Streaming Website
                    </h3>

                </div>
            </div>
        </div>

        <div class="boxes text-center"> DUMMY</div>
<div class="boxes  text-center"> DUMMY</div>
    </div>
</div>


@endsection
