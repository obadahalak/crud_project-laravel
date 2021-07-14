@extends('layouts.app')
@section('content')
<h1>Edit Post</h1>

{!! Form::open(['action'=>['PostsController@update',$posts->id],'method'=>'PUT']) !!}
<div class="form-group">
{{ Form::label('title','Title')}}
{{ Form::text('title',$posts->title,['class'=>'form-control'])}}  
</div>

<br>
<div class="form-group">
{{ Form::label('body','Body')}}
<br>
{{ Form::textarea('body',$posts->body,['class'=>'form-control'])}}  
<br>
</div>

{{ Form::submit('Edit  ',['class'=>' btn btn-primary'])}}
{{Form::submit('Go Back',['class'=>'btn btn default'])}}

{!!Form::close()!!}
@endsection