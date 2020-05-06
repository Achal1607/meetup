@extends('layouts.app')

@section('content')

<!--Create Post-->

<div class="container">
    <h1>{{$user->name}}</h1>
    @if($user->profile->gender==null || $user->profile->day==null || $user->profile->month==null || $user->profile->year==null)
    <div class="alert alert-danger alert-dismissible fade show">
        <h2><img src="/svg/warning.jpg" alt="Warning Logo" style="height: 25px;width:25px"> Please Complete Your Profile</h2>
        <a href="/profile/{{$user->id}}/edit"><button name="editProfile" class="btn btn-danger">Complete Profile</button></a>
    </div>
    @endif
    @can('update',$user->profile)
    <div class="card">
        <div class="card-header font-weight-bold">Create Post</div>
        <div class="card-body">
            <input type="text" class="form-control" data-toggle="modal" data-target="#post" placeholder="What's on your mind , {{$user->name}} ?" style="cursor: pointer">
            <hr>
            <div class="d-flex">
                <a href="#" name="photo" class="offset-md-3" style="display: block;text-decoration:none" data-toggle="modal" data-target="#post">
                    <img src="/svg/photo.png" alt="Photo icon" style="height:35px;width:35px;">
                    <span class="font-weight-bolder" style="color:#6c757d"> Photo/Video</span>
                </a>

                <a href="#" name="feeling" class="offset-md-3" style="display:block;text-decoration:none" data-toggle="modal" data-target="#post">
                    <img src="/svg/feeling.jpg" alt="Photo icon" style="height:35px;width:35px;">
                    <span class="font-weight-bolder" style="color:#6c757d"> Feeling</span>
                </a>
            </div>
        </div>
    </div>
    @endcan

    <!--Posts Display-->

    @foreach($user->posts as $post)
    <div style="background-color:white;border-radius:20px" class="col-md-6 py-md-4 my-md-3 mx-auto d-block">
        @if($post->user->profile->avatar==null && $post->user->profile->gender=='Male')
        <img src="/svg/male.png" alt="profile image" class="rounded-circle" style="cursor: pointer;height:40px;width:40px">

        @elseif($post->user->profile->avatar==null && $post->user->profile->gender=='Female')
        <img src="/svg/female.png" alt="profile image" class="rounded-circle" style="cursor: pointer;height:40px;width:40px">

        @else
        <img src="/storage/{{$user->profile->avatar}}" alt="profile image" class="rounded-circle" style="cursor:pointer;height:40px;width:40px">
        @endif
        <span class="font-weight-bold" style="font-size: 18px">{{$post->user->name}}</span>

        @if($post->feeling!='null')
        is feeling <span class="font-weight-bold" style="font-size: 18px">{{$post->feeling}}</span>
        @endif
        <br>
        <small style="margin-left:43.7px">
            {{$post->created_at}}
        </small>
        <p class="py-md-2">{{$post->caption}}</p>
        @if($post->image!==null)
        <a href="/posts/{{$post->id}}">
            <img src="/storage/{{$post->image}}" class="w-100 mx-md-0" style="height:500px;width:500px">
        </a>
        @endif
    </div>
    @endforeach
</div>

<!-- Modal -->
<div class="modal fade" id="post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Create Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <input name="create" type="text" class="form-control" placeholder="What's on your mind , {{$user->name}} ?">
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-primary">Create Post</button>
            </div>
        </div>
    </div>
</div>

@endsection