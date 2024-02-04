<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return response()->json([
            'results' => $projects,
        ]);
    }


    public function show(string $slug)
    {
        $project = Project::with('type')->where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'results' => $project,
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Nessun post trovato'
            ]);
        }
    }
}
