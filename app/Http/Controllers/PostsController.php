<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\users;
use App\User;
use DB;
use Auth;
use Form;

class PostsController extends Controller
{
   
    
    /**
     * Create a new controller instance.
        *
        * @return void
        */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show']]);
    }
        

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index()
    {
      
     //  $id=Auth::user()->id;

        $psots=DB::select('select * from posts');
        return view('posts.index')->with('psots', $psots);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request_1)
    {
        $this->validate(
            $request_1,
            [
            'title'=>'required',
            'body'=>'required'
        ]
        );
        
        $posts =new Posts;
    
        $posts->title=$request_1->input('title');
        $posts->body=$request_1->input('body');
        //اضافة لل داتا بيز بيانات حسب رقم ال ايدي يلي دخل فيو
        $posts->user_id=auth()->user()->id;
        $posts->save();
        return redirect('/posts')->with('success', 'Post Created');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts=Posts::find($id);
        $show=Posts::findOrFail($id);
        // $posts=Posts::all();
        return view('posts.show')->with('posts', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts=Posts::findOrFail($id);
        return view('posts.edit')->with('posts', $posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
            'title'=>'required',
            'body'=>'required'
            ]
        );
    
        $posts=Posts::find($id);
       
        $posts->title=$request->input('title');
        $posts->body=$request->input('body');
           
        $posts->save();
        return redirect('/posts/')->with('error', 'Post Updated');
        // return redirect('/posts')->with('success', 'Post Created');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $posts=Posts::Find($id)->delete();
        return redirect('/posts/home')->with('success', 'Deleted Post');
    }
    public function profile($id)
    {
      //  $user = Auth::User()->id;
        $user=User::find($id);
        if ($user) {
           // $user=User::find($id);
            return view('posts.profile')->withUser($user);
        } else {
            return  redirect('../');
        }




    }
   
   
}

