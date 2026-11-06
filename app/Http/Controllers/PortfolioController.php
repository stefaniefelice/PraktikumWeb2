<?php

namespace App\Http\Controllers;

use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('portfolio.index', [
            'projects' => Project::with('category')
                ->where('status', 'published')
                ->latest()
                ->get(),
        ]);
    }

    public function show(Project $project)
    {
        abort_if($project->status !== 'published', 404);

        $project->load(['category', 'images']);

        return view('portfolio.show', compact('project'));
    }
}