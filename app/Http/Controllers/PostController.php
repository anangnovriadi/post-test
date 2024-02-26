<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index() {
        $auth = Auth::id();
        $posts = DB::table('posts')
            ->join('details', 'posts.id', '=', 'details.post_id')
            ->select('posts.id', 'posts.uuid as post_uuid', 'posts.title', 'posts.image', 'posts.category', 'posts.user_id', 'posts.slug', 'details.post_id', 'details.start_date', 'details.end_date', 'details.description', 'details.tags')
            ->where('posts.user_id', $auth)
            ->get();
        
        
        return view('post', compact('posts'));
    }

    // this for api
    public function list() {
        $auth = Auth::id();

        $posts = DB::table('posts')
            ->join('details', 'posts.id', '=', 'details.post_id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id', 'posts.uuid as post_uuid', 'posts.title', 'posts.image', 'posts.category', 'posts.user_id', 'posts.slug', 'details.post_id', 'details.start_date', 'details.end_date', 'details.description', 'details.tags', 'users.name', 'users.id', 'users.uuid')
            ->where('posts.user_id', $auth)
            ->get();
        
        $result = [];
        foreach ($posts as $p) {
            array_push($result, array(
                'id' => $p->id,
                'uuid' => $p->post_uuid,
                'title' => $p->title,
                'category' => $p->category,
                'image' => $p->image,
                'slug' => $p->slug,
                'detail' => array(
                    'date' => Carbon::createFromFormat('Y-m-d H:i:s', $p->start_date)->format('M d, Y') . ' - ' . Carbon::createFromFormat('Y-m-d H:i:s', $p->end_date)->format('M d, Y'),
                    'time' => Carbon::createFromFormat('Y-m-d H:i:s', $p->start_date)->format('H:i:s') . ' - ' . Carbon::createFromFormat('Y-m-d H:i:s', $p->end_date)->format('H:i:s'),
                    'desc' => $p->description,
                    'tags' => explode(',', $p->tags)
                ),
                'author' => array(
                    'name' => $p->name,
                    'uuid' => $p->uuid,
                )
            ));
        }

        return response()->json([
            'data' => [
                'postLists' => $result
            ]
        ]);
    } 

    public function listNoAuth() {
        $posts = DB::table('posts')
            ->join('details', 'posts.id', '=', 'details.post_id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id', 'posts.uuid as post_uuid', 'posts.title', 'posts.image', 'posts.category', 'posts.user_id', 'posts.slug', 'details.post_id', 'details.start_date', 'details.end_date', 'details.description', 'details.tags', 'users.name', 'users.id', 'users.uuid')
            ->get();

        $result = [];
        foreach ($posts as $p) {
            array_push($result, array(
                'id' => $p->id,
                'uuid' => $p->post_uuid,
                'title' => $p->title,
                'category' => $p->category,
                'image' => $p->image,
                'slug' => $p->slug,
                'detail' => array(
                    'date' => Carbon::createFromFormat('Y-m-d H:i:s', $p->start_date)->format('M d, Y') . ' - ' . Carbon::createFromFormat('Y-m-d H:i:s', $p->end_date)->format('M d, Y'),
                    'time' => Carbon::createFromFormat('Y-m-d H:i:s', $p->start_date)->format('H:i:s') . ' - ' . Carbon::createFromFormat('Y-m-d H:i:s', $p->end_date)->format('H:i:s'),
                    'desc' => $p->description,
                    'tags' => explode(',', $p->tags)
                ),
                'author' => array(
                    'name' => $p->name,
                    'uuid' => $p->uuid,
                )
            ));
        }

        return response()->json([
            'data' => [
                'postLists' => $result
            ]
        ]);
    } 
}
