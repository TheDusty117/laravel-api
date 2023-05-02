<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;  //importo i project dal model

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::limit(20)->get();  //prendo tutti i prject

        return response()->json([   //rendo i project del JSON
            'projects' => $projects,
        ]);

    }
}
