<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Models\Post;
class UserController extends Controller
{
    public function viewpost(Request $request)
    {
        
        try {
            $post_id = Crypt::decrypt($request->post_id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }
        $post= Post::where('id',$post_id)->with(['user'=> function($query){
            $query->select('id','name','profile_photo_path');
        }])->first();
    
        if ($request->post_id==null||$post->user_id != $request->user()->id) {
            return redirect()->back();
        }

        return view('user-pages.view-post',['post'=>$post]);
    }

}