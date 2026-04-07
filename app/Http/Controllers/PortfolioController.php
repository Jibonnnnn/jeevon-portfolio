<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('portfolio');           // Main page: Hero + Contact
    }

    public function about()
    {
        $about = \App\Models\AboutContent::first();   // Use full namespace to avoid import issues
        return view('pages.about', compact('about'));
    }

    public function skills()
    {
        $skills = \App\Models\Skill::all();   // Fetch all skills
        return view('pages.skills', compact('skills'));
    }

    public function experience()
    {
        $experiences = \App\Models\Experience::orderBy('order')->get();
        return view('pages.experience', compact('experiences'));
    }

    public function projects()
    {
        $projects = \App\Models\Project::orderBy('order')->get();
        return view('pages.projects', compact('projects'));
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:20',
        ]);

        return back()->with('success', 'Thank you! Your message has been sent.');
    }
}