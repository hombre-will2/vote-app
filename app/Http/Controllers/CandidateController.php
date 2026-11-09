<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function create()
    {
        return view('candidates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048', // max 2MB
        ]);

        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('candidates', 'public');
        }

        Candidate::create([
            'name' => $request->name,
            'description' => $request->description,
            'photo_path' => $path,
        ]);

        return redirect('/nomination')->with('success', 'Candidat proposé avec succès !');
    }
}
