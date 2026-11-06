<?php

namespace App\Http\Controllers;

use App\Models\{Category, Project, Skill, Technology};

class DashboardController extends Controller
{
    public function index()
    {
        return view('posts.dashboard', [
            'totalProjects' => Project::count(),
            'totalCategories' => Category::count(),
            'totalTechnologies' => Technology::count(),
            'totalSkills' => Skill::count(),
            'publishedProjects' => Project::where('status', 'published')->count(),
            'draftProjects' => Project::where('status', 'draft')->count(),
            'topSkills' => Skill::orderByDesc('level')->take(3)->get(),
            'categories' => Category::withCount('projects')->get(),
            'latestProjects' => Project::with('category')->latest()->take(5)->get(),
        ]);
    }
}