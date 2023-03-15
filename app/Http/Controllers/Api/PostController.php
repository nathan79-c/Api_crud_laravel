<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return 'liste des articles';
    }
    public function store(CreatePostRequest $Request)
    {

       try{

            $Post = new Post();
            $Post->titre = $Request->titre;
            $Post->description = $Request->description;
            $Post->save();

            return response()->json([
                'status_code'=>200,
                'status_message'=>'le post a ete cree',
                'data' =>$Post
            ]);

       }catch(Exception $e){
            return response()->json($e);
       }
    }
    public function update(EditRequest $Request,$id)
    {
        $Post=  Post::find($id);
        $Post->titre = $Request->titre;
        $Post->description = $Request->description;
        $Post->save();

    }

}
