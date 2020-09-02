<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $total_pending_posts = Post::where('is_approved',false)->count();
        $author_count = User::where('role_id',2)->count();
        $new_authors_today = User::where('role_id',2)
                                ->whereDate('created_at',Carbon::today())->count();
       $active_authors = User::where('role_id',2)
                                ->withCount('posts')
                                ->take(5)->get();
       $category_count = Category::all()->count();
       $tag_count = Tag::all()->count();
       $pending_posts = Post::where('is_approved',false)->get();

        return view('admin.dashboard',compact('posts','total_pending_posts','author_count','new_authors_today','active_authors','category_count','tag_count','pending_posts'));
    }
}
