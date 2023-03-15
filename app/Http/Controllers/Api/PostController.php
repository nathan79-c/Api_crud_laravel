<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return 'liste des articles';
    }
    public function store(CreatePostRequest $Request)
    {

        $Post = new Post();
        $Post->titre = $Request->titre;
        $Post->description = $Request->description;
        $Post->save();

        return response()->json([
            'status_code'=>200,
            'status_message'=>'le post a ete cree',
            'data' =>$Post
        ]);
    }

}
