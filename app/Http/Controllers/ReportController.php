<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Campus;
class ReportController extends Controller
{

    protected function getAllUsersPostsCount($campus)
    {
        return Post::whereHas('user', function ($query) use ($campus) {
            $query->where('campus_id', $campus);
        })->count();
    }
    
    public function percampus()
    {
        return view('admin-pages.per-campus',[
            'campuses' => Campus::all(),
        ]);
    }
}