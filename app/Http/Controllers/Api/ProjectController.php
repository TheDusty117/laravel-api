<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;  //importo i project dal model

class ProjectController extends Controller
{
    public function index(){

        // $projects = Project::limit(20)->get();  //prendo tutti i prject
        $projects = Project::with('category','category.projects',  'technologies')->orderBy('created_at', 'asc')->paginate(10); //paginate gestisce la paginazione e esegue la query


        return response()->json([   //trasformo i project in JSON
            'success' => true,
            'results' => $projects,
        ]);

    }

    public function show($slug){

        return response()->json([
            'success' => true,
            'project' => $slug
        ]);

    }
}
