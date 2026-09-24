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
}
