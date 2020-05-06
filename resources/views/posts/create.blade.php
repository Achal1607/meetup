@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="font-weight-bolder">Create Post</h2>
    <form method="POST" enctype="multipart/form-data" action="/posts">
        @csrf
        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label text-md-right" style="font-size: 20px">Image</label>
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
            <label for="caption" class="col-md-4 col-form-label text-md-right" style="font-size: 20px">Caption</label>
            <div class="col-md-6">
                <textarea id="caption" type="textarea" class="form-control @error('caption') is-invalid @enderror" name="caption" placeholder="Caption" value="{{ old('caption') }}" required autocomplete="caption" rows=5 cols=5></textarea>

                @error('caption')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="feeling" class="col-md-4 col-form-label text-md-right" style="font-size: 20px">Feelings</label>
            <div class="col-md-6">
                <select class="form-control" name="feeling" id="feeling">
                    <option hidden selected value=null> -- select an option --</option>
                    <option value="&#128512; happy">&#128512; Happy</option>
                    <option value="&#128519; blessed">&#128519; Blessed</option>
                    <option value="&#128526; cool">&#128526; Cool</option>
                    <option value="&#128532; sad">&#128532; Sad</option>
                    <option value="&#128536; loved">&#128536; Loved</option>
                    <option value="&#128548; angry">&#128548; Angry</option>
                    <option value="&#128522; thankful">&#128522; Thankful</option>
                    <option value="&#128567; quarantine">&#128567; Quarantined</option>
                    <option value="&#128516; relaxed">&#128516; Relaxed</option>
                    <option value="&#128540; silly">&#128540; Silly</option>
                    <option value="&#128525; excited">&#128525; Excited</option>
                    <option value="&#128561; shock">&#128561; Shocked</option>
                </select>
                @error('feeling')
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