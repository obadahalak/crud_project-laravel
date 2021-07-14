@extends('layouts.app')

@section('content')
    
<h1> profile page!!</h1>
{!! Form::open(['action'=>['PostsController@update_user',$user->id],'method'=>'PUT']) !!}
<div class="form-group">
 {{ Form::label('name','name')}}
 {{ Form::text('name',$user['name'], ['class'=>'form-control']) }}
 {{ Form::label('email','email') }}
 {{ Form::text('email',$user['email'],['class'=>'form-control'])}}
 <br>
 {{ Form::submit('Save ',['class'=>'btn btn-primary']) }}
 {{Form::submit('Go Back',['class'=>'btn btn-default'])}}
    

    

</div>



 {!!Form::close()!!}

@endsection