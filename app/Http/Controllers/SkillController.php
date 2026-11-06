<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SkillController extends Controller
{
    public function index()
    {
        return view('posts.skills.index', [
            'skills' => Skill::orderByDesc('level')->get(),
        ]);
    }

    public function edit(Skill $skill)
    {
        return view('posts.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:100', Rule::unique('skills', 'name')->ignore($skill->id)],
            'level' => 'required|integer|min:0|max:100',
        ]);

        $skill->update($validated);

        return redirect()->route('skills.index')
            ->with('success', 'Skill berhasil diperbarui.');
    }
}