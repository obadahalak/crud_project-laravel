@extends('layouts.app')
@section('content')
<p>show page</p>

<a  href="/posts"class="btn btn-default"> Go Back</a>
<h1>{{$posts->title}}</h1>
<p>{{$posts->body }}</p>
<hr>
<small>Writen On {{$posts->created_at}}</small>
<hr>
<a  href="/posts/{{$posts->id}}/edit" class="btn btn-primary">Edit</a>



{!!Form::open(['action'=>['PostsController@destroy',$posts->id],'method'=>'POST','class'=>'pull-right'])!!}

{{Form::hidden('_method','Delete')}}
<br>
{{ Form::submit('Delete',['class'=>' btn btn-primary'])}}

{!!Form::close()!!}

@endsection