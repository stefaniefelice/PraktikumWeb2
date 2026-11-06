<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        return view('posts.projects.index', [
            'projects' => Project::with('category')->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('posts.projects.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'tech_stack' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:published,draft',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp'
                . '|max:2048|dimensions:min_width=400,min_height=300',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')
                ->store('projects/thumbnails', 'public');
        }

        Project::create($validated);

        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil ditambahkan.');
    }

    public function show(Project $project)
    {
        return redirect()->route('portfolio.show', $project);
    }

    public function edit(Project $project)
    {
        return view('posts.projects.edit', [
            'project' => $project->load('images'),
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'tech_stack' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:published,draft',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp'
                . '|max:2048|dimensions:min_width=400,min_height=300',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($project->thumbnail) {
                Storage::disk('public')->delete($project->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')
                ->store('projects/thumbnails', 'public');
        }

        $project->update($validated);

        return redirect()->route('projects.edit', $project)
            ->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        if ($project->thumbnail) {
            Storage::disk('public')->delete($project->thumbnail);
        }
        foreach ($project->images as $image) {
            Storage::disk('public')->delete($image->image);
        }

        $project->delete(); // baris project_images ikut hilang (cascadeOnDelete)

        return redirect()->route('projects.index')
            ->with('success', 'Project dihapus.');
    }
}