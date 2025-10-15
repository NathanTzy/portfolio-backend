<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    // Tampil semua experience (misal untuk API/frontend)
    public function index()
    {
        $experiences = Experience::orderBy('start_year', 'desc')->get();
        return view('welcome', compact('experiences'));
    }

    // Simpan experience baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'start_year' => 'required|string|max:20',
            'end_year' => 'nullable|string|max:20',
            'description' => 'nullable|string',
        ]);

        Experience::create($validated);

        return redirect()->back()->with('success', 'Experience berhasil ditambahkan!');
    }

    // Update experience
    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'start_year' => 'required|string|max:20',
            'end_year' => 'nullable|string|max:20',
            'description' => 'nullable|string',
        ]);

        $experience->update($validated);

        return redirect()->back()->with('success', 'Experience berhasil diupdate!');
    }

    // Hapus experience
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->back()->with('success', 'Experience berhasil dihapus!');
    }
}
