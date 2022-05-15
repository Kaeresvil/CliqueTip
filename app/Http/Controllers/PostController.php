<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\PostManagement;
use App\Models\comments;

class PostController extends Controller
{

    public function post(Request $request){
      
        $posts = DB::table('posts')
        ->join('users', 'posts.userId', '=', 'users.id')
        // ->join('comments', 'posts.id', '=', 'comments.postId')
        ->select('users.name','posts.*')
        ->get();
        return view('home', compact('posts')); 
       
    }

    public function comment($id){
    
        $comments = DB::table('comments')
        ->select('comments.comment')
        ->where('comments.postId', '=', $id)
        ->get();
        return response()->json($comments);

    }

  
  
  
   public function addPost(Request $request){
      
////post a comment

       if($request->input('form') == "form2"){

        $validator = Validator::make($request->all(),[
            'comment' => ['required', 'string'],
            'postid' => ['required', ],
            
        ]);
      
        if( $validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            $comment = new comments();
            $comment->userId = \Auth::user()->id;
            $comment->postId = $request->input('postid');
            $comment->comment = $request->input('comment');
            $comment->save();
            return response()->json([
                    'status'=>200,
                    'comment'=>$comment->comment
            ]);
    
        }  


       }
       ////Post a problem 
       else{
 
        $post = new PostManagement();
        $post->userId = \Auth::user()->id;
        $post->title = $request->title;
        $post->post = $request->post;

        if($post->title == null && $post->post == null){
            return redirect()->back()->with('error','Failed to add Post.');
        }else{

            if( $post->save()){
                return redirect()->back()->with('success','You added new Post.');
            }else {
                return redirect()->back()->with('error','Failed to register.');
            } 

        }
      
       }

 
        
    }

    
}
