@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit music
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
            <form method="POST" action="{{ route('admin.musics.update', $music->id)}}">
              <input type="hidden" name="_token" value="{{  csrf_token()  }}">
              <input type="hidden" name="_method" value="PUT">


              <div class="form-group">
                <label for="artist">Artist</label>
                <input type="text" class="form-control" id="artist" name="artist" value="{{ old('artist', $music->artist) }}" />
              </div>
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $music->title) }}" />
              </div>
              <div class="form-group">
                <label for="likes">Likes</label>
                <input type="text" class="form-control" id="likes" name="likes" value="{{ old('likes', $music->likes) }}" />
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $music->description) }}" />
              </div>
              <div class="form-group">
                <label for="img">Images</label>
                <input type="text" class="form-control" id="img" name="img" value="{{ old('img', $music->img) }}" />
              </div>
              <div class="form-group">
                <label for="created_at">Created at</label>
                <input type="date" class="form-control" id="created_at" name="created_at" value="{{ old('created_at', $music->created_at) }}" />
              </div>
              <div class="form-group">
                <label for="updated_at">Update at</label>
                <input type="date" class="form-control" id="updated_at" name="updated_at" value="{{ old('updated_at', $music->updated_at) }}" />
              </div>

              <a href="{{ route('admin.musics.index') }}" class="btn btn-outline">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
