@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                    {{ __('You are logged in!') }}
                  <br>
                  <br>
                 
                  @if (count($newpost)>0)
                  <h3>your blogs</h3>
                  
                  @foreach ($newpost as $new)
                  <table class="table table-striped "> 
                   <tr> 
                       <th>ID</th>  
                       
                       <td>{{$new->id}}</td> 
                   <th>Title</th>
                   
                   <td>{{$new->title}}</td>
                   
                   <th>Body</th>
                   
                   <td>{{$new->body}}</td>
                   <th>Edit</th>
                   <td><a class="btn btn-secondary"href="/posts/{{$new->id}}/edit/">Edit Here</a></td>
               
                   <td>
                   {!!Form::open(['action'=>['PostsController@destroy',$new->id],'method'=>'POST','class'=>'pull-reight'])!!}
                   {{Form::hidden('_method','Delete') }}
                   
                   {{ Form::submit('Dleete',['class'=>'btn btn-primary'])}}
                   {!!Form::close()!!}
                   </td>   
                
                </tr>


           </table>

                  @endforeach
                  @else
                  <h3>You Not Have Blogs</h3>
                  @endif                 
                       
                    <a  class="btn btn-secondary"href="posts/create">Create </a>     
                </div>
            </div>
        </div>
    </div>
</div> 


                      
                       
@endsection



