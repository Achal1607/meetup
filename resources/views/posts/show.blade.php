@extends('layouts.app')

@section('content')
<div class="container mt-md-3">
<div class="row d-flex">
<img src="/storage/{{$post->image}}" alt="Post number {{$post->id}}" style="height: 500px;width:500px">
<h3 class="offset-md-1">
{{$post->caption}}
</h3>
</div>
</div>
@endsection