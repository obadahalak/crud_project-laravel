@extends('layouts.app')
@section('content')
<h1>Posts</h1>
@if (count($psots)>0)
<div class="card">
    <ul class="list-group list-group-flush"> 


@foreach ($psots as $newpost)
<li class="list-group-item">
   
<h3><a href="/posts/{{$newpost->id}}">{{$newpost->title}}</a></h3> 
<small>Writen on{{$newpost->created_at}}</small>
</li>

@endforeach
    </ul>
</div>

    
    @endif
    
@endsection