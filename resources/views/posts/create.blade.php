@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" enctype="multipart/form-data" action="/posts">
        @csrf
        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
            <div class="col-md-6">
                <input id="image" type="file" class="@error('image') is-invalid @enderror" name="image" accept="image/*">

                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="caption" class="col-md-4 col-form-label text-md-right">Caption</label>
            <div class="col-md-6">
                <textarea id="caption" type="textarea" class="form-control @error('caption') is-invalid @enderror" name="caption" placeholder="Caption" value="{{ old('caption') }}" required autocomplete="caption" rows=5 cols=5></textarea>

                @error('caption')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-success">
                    Post
                </button>
            </div>
        </div>
    </form>
</div>
@endsection