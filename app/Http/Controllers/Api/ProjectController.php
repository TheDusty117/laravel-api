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


        //recuperiamo il progetto per stamparlo nel Project Detail

        $project = Project::with('category:name,slug', 'technologies:name,slug')->where('slug',$slug)->first();   //recuperiamo un singolo project in base allo SLUG

        //controlliamo se il project esiste o meno, se esiste ritorniamo response json(qui sotto), altrimenti faremo uscire un messaggio di errore o altro


        if($project){

            return response()->json([
                'success' => true,
                'project' => $project
            ]);

        } else {

            return response()->json([
                'success' => false,
                'error' => 'nessun project trovato'
            ]);

        }


    }
}
