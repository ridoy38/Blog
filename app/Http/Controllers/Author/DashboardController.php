<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

        public function index()
    {
        $user = Auth::user();
        $posts = $user->posts;
        $total_pending_posts = $posts->where('is_approved',false)->count();
        return view('author.dashboard',compact('posts','total_pending_posts'));
    }
    
}
