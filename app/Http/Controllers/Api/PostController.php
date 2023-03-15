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
    public function index(Post $Post)
    {

       try{

        return response()->json([
            'status_code'=>200,
            'status_message'=>'voici la liste des article',
            'data' =>$Post::all()
        ]);

   }catch(Exception $e){
        return response()->json($e);
   }
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
    public function update(EditRequest $Request,Post $Post)
    {
        try{

            $Post->titre = $Request->titre;
            $Post->description = $Request->description;
            $Post->save();

            return response()->json([
                'status_code'=>200,
                'status_message'=>'le post a ete mis a jour',
                'data' =>$Post
            ]);

        }catch(Exception $e){
            return response()->json($e);

        }


    }
    public function delete(Post $Post)
    {
        try{
            $Post->delete();


            return response()->json([
                'status_code'=>200,
                'status_message'=>'le post a ete mis a ete supprimer',
                'data' =>$Post
            ]);
        }catch(Exception $e){
            return response()->json($e);

        }
    }

}
