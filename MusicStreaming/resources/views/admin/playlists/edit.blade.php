@extends('layouts.admin_nav')

@section ('content')
  <div class="main">
    <div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Edit Playlist playlist
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
            <form method="POST" action="{{ route('admin.playlists.update', $playlist->id)}}">
              <input type="hidden" name="_token" value="{{  csrf_token()  }}">
              <input type="hidden" name="_method" value="PUT">

<div class="flex">
              <div class="form-group">
                <label for="artist">Artist</label>
                <input type="text" class="form-control" id="artist" name="artist" value="{{ old('artist', $playlist->artists) }}" />
              </div>
              <div class="form-group ml-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $playlist->title) }}" />
              </div>
            </div>

              <div class="form-group">
                <label for="path">Images</label>
                <input type="text" class="form-control" id="path" name="path" value="{{ old('img', $playlist->path) }}" />
              </div>

              <div class="flex">
              <div class="form-group">
                <label for="created_at">Created at</label>
                <input type="date" class="form-control" id="created_at" name="created_at" value="{{ old('created_at', $playlist->created_at) }}" />
              </div>
              <div class="form-group">
                <label for="updated_at">Update at</label>
                <input type="date" class="form-control" id="updated_at" name="updated_at" value="{{ old('updated_at', $playlist->updated_at) }}" />
              </div>
            </div>

              <a href="{{ route('admin.playlists.playlist') }}" class="btn btn-outline">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
