@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Complete Your Profile</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="/profile/{{$user->id}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row col-md-6 offset-md-4">
                            <label for="avatar">
                                <input type="file" name="avatar" id="avatar" style="display:none;" accept="image/*">
                                @if($user->profile->avatar==null)
                                <img src="/svg/male.png" alt="profile image" class="rounded-circle" style="cursor: pointer;height:250px;width:250px">
                                @else
                                <img src="/storage/{{$user->profile->avatar}}" alt="profile image" class="rounded-circle" style="cursor: pointer;height:250px;width:250px">
                                @endif
                            </label>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" value="{{ old('username') ?? $user->profile->username }}" required autocomplete="username">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">Date Of Birth</label>
                            <span class="ml-md-3">
                                <select value="16" name="day" value="{{ old('day') ?? $user->profile->day }}">
                                    <?php for ($i = 1; $i <= 31; $i++) {  ?>
                                        <option value=<?php echo $i ?>><?php echo $i ?></option>
                                    <?php } ?></select>

                                <select value="July" name="month" value="{{ old('month') ?? $user->profile->month }}">
                                    <?php for ($i = 1; $i <= 12; $i++) {
                                        $month_name = date("F", mktime(0, 0, 0, $i, 10)); ?>
                                        <option value="<?php echo $month_name ?>"><?php echo $month_name ?></option>
                                    <?php } ?></select>

                                <select value="2000" name="year" value="{{ old('year') ?? $user->profile->year }}">
                                    <?php for ($i = 1900; $i <= 2020; $i++) {  ?>
                                        <option value=<?php echo $i ?>><?php echo $i ?></option>
                                    <?php } ?></select></p>
                            </span>
                            @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Gender</label>
                            <span class="ml-md-3">
                                <label class="radio-inline pr-md-2"><input type="radio" name="gender" value="Male" required />Male</label>
                                <label class="radio-inline pr-md-2"><input type="radio" name="gender" value="Female" />Female</label>
                                <label class="radio-inline"><input type="radio" name="gender" value="Other" />Other</label>


                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </span>
                        </div>
                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">Bio <small>(Optional)</small></label>

                            <div class="col-md-6">
                                <textarea id="bio" type="textarea" class="form-control" name="bio" value="{{ old('bio') ?? $user->profile->bio }}" placeholder="bio" autocomplete="bio">
                                </textarea>
                            </div>
                            @error('bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group row">
                            <label for="place" class="col-md-4 col-form-label text-md-right">Current City <small>(Optional)</small></label>

                            <div class="col-md-6">
                                <input id="place" type="text" class="form-control" name="place" value="{{ old('place') ?? $user->profile->place }}" placeholder="Current City" autocomplete="place">
                            </div>
                            @error('place')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="education" class="col-md-4 col-form-label text-md-right">Place Of Education <small>(Optional)</small></label>

                            <div class="col-md-6">
                                <input id="education" type="text" class="form-control" name="education" value="{{ old('education') ?? $user->profile->education }}" placeholder="Place Of Education" autocomplete="education">
                            </div>
                            @error('education')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Save Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection