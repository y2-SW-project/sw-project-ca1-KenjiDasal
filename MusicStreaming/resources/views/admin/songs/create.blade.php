@extends('layouts.admin_nav')

@section('content')
    <div class="main">
        <div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Create Song
                    </div>
                    <div class="card-body">
                        <!-- this block is ran if the validation code in the controller fails
              this code looks after displaying the correct error message to the user -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('admin.songs.store') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="flex">
                                <div class="form-group">
                                    <label for="artists">Artist</label>
                                    <input type="text" class="form-control" id="artists" name="artists"
                                        value="{{ old('artists') }}" />
                                </div>
                                <div class="form-group ml-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title') }}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="path">Video</label>
                                <input type="file" class="form-control" id="path" name="path" />
                            </div>

                            <div class="form-group">
                                <label for="img">Image</label>
                                <input type="file" class="form-control" id="img" name="img" />
                            </div>

                            <div class="flex">
                                <div class="form-group">
                                    <label for="created_at">Created At</label>
                                    <input type="date" class="form-control" id="created_at" name="created_at"
                                        value="{{ old('created_at') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="updated_at">Updated At</label>
                                    <input type="date" class="form-control" id="updated_at" name="updated_at"
                                        value="{{ old('updated_at') }}" />
                                </div>
                            </div>

                            <a href="{{ route('admin.songs.index') }}" class="btn btn-outline">Cancel</a>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
