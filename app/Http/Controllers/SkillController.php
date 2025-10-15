<?php
namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    // list semua skill
    public function index()
    {
        $skills = Skill::all();
        return view('backend.skill.index', compact('skills'));
    }

    public function create()
    {
        return view('backend.skill.create');
    }
    
    public function edit(Skill $skill)
    {
        return view('backend.skill.edit', compact('skill'));
    }
    

    // simpan skill baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'details' => 'required|array',
            'details.*' => 'string'
        ]);

        Skill::create([
            'name' => $request->name,
            'details' => $request->details
        ]);

        return redirect()->route('skills.index')->with('success', 'Skill berhasil ditambahkan');
    }

    // form edit
    // update skill
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string',
            'details' => 'required|array',
            'details.*' => 'string'
        ]);

        $skill->update([
            'name' => $request->name,
            'details' => $request->details
        ]);

        return redirect()->route('skills.index')->with('success', 'Skill berhasil diperbarui');
    }

    // hapus skill
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'Skill berhasil dihapus');
    }
}
