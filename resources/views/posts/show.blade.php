@extends('layouts.app')

@section('content')
<div class="container mt-md-3">
    <div class="row d-flex">
        @if($post->image!==null)
        <img src="/storage/{{$post->image}}" style="height:500px;width:500px">
        @endif
        @if($post->user->profile->avatar==null && $post->user->profile->gender=='Male')
        <img src="/svg/male.png" alt="profile image" class="rounded-circle ml-md-4" style="cursor: pointer;height:40px;width:40px">

        @elseif($post->user->profile->avatar==null && $post->user->profile->gender=='Female')
        <img src="/svg/female.png" alt="profile image" class="rounded-circle ml-md-4" style="cursor: pointer;height:40px;width:40px">

        @else
        <img src="/storage/{{$user->profile->avatar}}" alt="profile image" class="rounded-circle ml-md-4" style="cursor: pointer;height:40px;width:40px">
        @endif
        <span class="font-weight-bold ml-md-2" style="font-size: 18px"> {{$post->user->name}}</span>

        @if($post->feeling!='null')
        <span class="px-md-2">is feeling</span><span class="font-weight-bold" style="font-size: 18px">{{$post->feeling}}</span>
        @endif
        <small style="margin-left: -255px;margin-top:5px;">
        <br>    
        {{$post->created_at}}
        </small> 
        {{$post->caption}}
    </div>
</div>
@endsection