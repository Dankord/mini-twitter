<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirp;

class ChirpController extends Controller
{
    public function index()
    {
        $chirp = Chirp::with('user')->latest()->take(50)->get();

        return view('home', ['chirps' => $chirp]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
            'message.required' => 'Please write something to chirp!',
            'message.max' => 'Chirps must be 255 characters or less.'
        ]);

        \App\Models\Chirp::create([
            'message' => $validated['message'],
            'user_id' => null,
        ]);

        return redirect('/')->with('success', 'Chirp Created!');
    }

    public function edit(Chirp $chirp)
    {
        return view('components.edit', compact('chirp'));
    }

    public function update(Request $request, Chirp $chirp)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
            'message.required' => 'Please write something to chirp!',
            'message.max' => 'Chirp must be 255 characters or less'
        ]);
        $chirp->update($validated);

        return redirect('/')->with('success', 'Successfully Updated!');
    }

    public function destroy(Chirp $chirp) {
        $chirp->delete();
        return redirect('/')->with('success', 'Successfully Deleted!');
    }
}
