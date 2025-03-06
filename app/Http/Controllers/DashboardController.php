<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $surveys = auth()->user()->surveys()
            ->withCount(['questions', 'responses'])
            ->latest()
            ->get();

        return view('dashboard', compact('surveys'));
    }
}
