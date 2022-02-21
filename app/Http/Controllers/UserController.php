<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Models\Post;
use App\Models\Event;
use App\Models\Announcement;

class UserController extends Controller
{
    public function viewpost(Request $request)
    {
        if ($request->post_id==null) {
            return redirect()->back();
        }
            try {
                $post_id = Crypt::decrypt($request->post_id);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
     
      
        // $post= Post::where('id',$post_id)->with(['user'=> function($query){
        //     $query->select('id','name','profile_photo_path');
        // }])->first();
    
        

        return view('user-pages.view-post',['post_id'=>$post_id]);
    }

    public function userprofile(Request $request)
    {
        try {
            $user_id = Crypt::decrypt($request->id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }
        return view('user-pages.user-profile',[
            'user_id'=>$user_id
        ]);
    }

    public function viewevent(Request $request)
    {
        try {
            $event_id = Crypt::decrypt($request->event_id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }
        $event = Event::where('id',$event_id)->with(['user'=> function($query){
            $query->select('id','name','profile_photo_path');
        }])->first();
    
        return view('user-pages.view-event',[
            'event'=>$event
        ]);
    }

    public function notification()
    {
        
        return view('user-pages.notifications');
    }

    public function viewannouncement(Request $request)
    {
         try {
            $announcement_id = Crypt::decrypt($request->announcement_id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }
        $announcement = Announcement::where('id',$announcement_id)->with(['user'=> function($query){
            $query->select('id','name','profile_photo_path');
        }])->first();
        return view('user-pages.view-announcement',[
            'announcement'=>$announcement
        ]);
    }

}