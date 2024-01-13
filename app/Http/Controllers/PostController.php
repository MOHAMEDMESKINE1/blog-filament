<?php

namespace App\Http\Controllers;

use App\DataTables\PostsDataTable;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(PostsDataTable $dataTable)
    {
        
        return $dataTable->render('yajra.posts');
    }
}
