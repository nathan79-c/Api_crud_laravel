<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return 'liste des articles';
    }
    public function store()
    {
        $Post = new Post();
        $Post->titre = 'Titre exemple';
        $Post->description = 'description exemple';
        $Post->save();
    }
}
