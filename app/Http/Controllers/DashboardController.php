<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutContent;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $about = AboutContent::first();
        $skills = Skill::all();
        $experiences = Experience::orderBy('order')->get();
        $projects = Project::orderBy('order')->get();
        return view('dashboard', compact('about', 'skills', 'experiences', 'projects'));
    }

    // ==================== ABOUT ====================
    public function updateAbout(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'last_name' => 'required|string|max:100',
            'date_of_birth' => 'nullable|date',
            'place_of_birth' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:100',
            'professional_title' => 'required|string|max:255',
            'biography' => 'required|string',
            'education' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $about = AboutContent::firstOrNew([]);

        if ($request->hasFile('photo')) {
            if ($about->photo)
                Storage::disk('public')->delete($about->photo);
            $about->photo = $request->file('photo')->store('about', 'public');
        }

        $about->first_name = $request->first_name;
        $about->middle_name = $request->middle_name;
        $about->last_name = $request->last_name;
        $about->full_name = trim($request->first_name . ' ' . ($request->middle_name ?? '') . ' ' . $request->last_name);
        $about->date_of_birth = $request->date_of_birth;
        $about->place_of_birth = $request->place_of_birth;
        $about->nationality = $request->nationality;
        $about->professional_title = $request->professional_title;
        $about->biography = $request->biography;
        $about->education = $request->education;
        $about->save();

        return redirect()->route('dashboard')->with('success', 'About updated successfully!');
    }

    // ==================== SKILLS ====================
    public function skills()
    {
        $about = AboutContent::first();
        $skills = Skill::all();
        $experiences = Experience::all();
        return view('dashboard', compact('about', 'skills', 'experiences'));
    }

    public function editSkill($id)
    {
        $about = AboutContent::first();
        $skills = Skill::all();
        $experiences = Experience::all();
        $skill = Skill::findOrFail($id);   // This is the key variable for edit

        return view('dashboard', compact('about', 'skills', 'experiences', 'skill'));
    }

    public function storeSkill(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'category' => 'nullable|string|max:50',
            'proficiency' => 'nullable|integer|min:1|max:100',
        ]);

        $skill = new Skill();
        $skill->name = $request->name;
        $skill->category = $request->category;
        $skill->proficiency = $request->proficiency;

        if ($request->hasFile('logo')) {
            $skill->logo = $request->file('logo')->store('skills', 'public');
        }

        $skill->save();

        return redirect()->route('dashboard.skills')->with('success', 'Skill added successfully!');
    }

    public function updateSkill(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'category' => 'nullable|string|max:50',
            'proficiency' => 'nullable|integer|min:1|max:100',
        ]);

        $skill = Skill::findOrFail($id);
        $skill->name = $request->name;
        $skill->category = $request->category;
        $skill->proficiency = $request->proficiency;

        if ($request->hasFile('logo')) {
            if ($skill->logo)
                Storage::disk('public')->delete($skill->logo);
            $skill->logo = $request->file('logo')->store('skills', 'public');
        }

        $skill->save();

        return redirect()->route('dashboard.skills')->with('success', 'Skill updated successfully!');
    }

    public function destroySkill($id)
    {
        $skill = Skill::findOrFail($id);
        if ($skill->logo)
            Storage::disk('public')->delete($skill->logo);
        $skill->delete();

        return redirect()->route('dashboard.skills')->with('success', 'Skill deleted successfully!');
    }

    // ==================== EXPERIENCE ====================
    public function experience()
    {
        $about = AboutContent::first();
        $skills = Skill::all();
        $experiences = Experience::orderBy('order')->get();
        return view('dashboard', compact('about', 'skills', 'experiences'));
    }

    public function editExperience($id)
    {
        $about = AboutContent::first();
        $skills = Skill::all();
        $experiences = Experience::all();
        $experience = Experience::findOrFail($id);   // Key variable for edit

        return view('dashboard', compact('about', 'skills', 'experiences', 'experience'));
    }

    public function storeExperience(Request $request)
    {
        $request->validate([
            'date_range' => 'required|string|max:100',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $exp = new Experience();
        $exp->date_range = $request->date_range;
        $exp->title = $request->title;
        $exp->description = $request->description;
        $exp->order = $request->order ?? 0;
        $exp->save();

        return redirect()->route('dashboard.experience')->with('success', 'Experience added successfully!');
    }

    public function updateExperience(Request $request, $id)
    {
        $request->validate([
            'date_range' => 'required|string|max:100',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $exp = Experience::findOrFail($id);
        $exp->date_range = $request->date_range;
        $exp->title = $request->title;
        $exp->description = $request->description;
        $exp->order = $request->order ?? 0;
        $exp->save();

        return redirect()->route('dashboard.experience')->with('success', 'Experience updated successfully!');
    }

    public function destroyExperience($id)
    {
        Experience::findOrFail($id)->delete();
        return redirect()->route('dashboard.experience')->with('success', 'Experience deleted successfully!');
    }

    // ==================== PROJECTS ====================
    public function projects()
    {
        $about = AboutContent::first();
        $skills = Skill::all();
        $experiences = Experience::all();
        $projects = Project::orderBy('order')->get();
        return view('dashboard', compact('about', 'skills', 'experiences', 'projects'));
    }

    public function editProject($id)
    {
        $about = AboutContent::first();
        $skills = Skill::all();
        $experiences = Experience::all();
        $projects = Project::orderBy('order')->get();
        $project = Project::findOrFail($id);

        return view('dashboard', compact('about', 'skills', 'experiences', 'projects', 'project'));
    }

    public function storeProject(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'github_url' => 'nullable|url',
            'technologies' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->github_url = $request->github_url;
        $project->technologies = $request->technologies;
        $project->order = $request->order ?? 0;

        if ($request->hasFile('image')) {
            $project->image = $request->file('image')->store('projects', 'public');
        }

        $project->save();

        return redirect()->route('dashboard.projects')->with('success', 'Project added successfully!');
    }

    public function updateProject(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'github_url' => 'nullable|url',
            'technologies' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $project = Project::findOrFail($id);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->github_url = $request->github_url;
        $project->technologies = $request->technologies;
        $project->order = $request->order ?? 0;

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $project->image = $request->file('image')->store('projects', 'public');
        }

        $project->save();

        return redirect()->route('dashboard.projects')->with('success', 'Project updated successfully!');
    }

    public function destroyProject($id)
    {
        $project = Project::findOrFail($id);
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();

        return redirect()->route('dashboard.projects')->with('success', 'Project deleted successfully!');
    }
}