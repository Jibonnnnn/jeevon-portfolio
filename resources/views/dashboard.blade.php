<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard • Jeevon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body class="bg-zinc-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 min-h-screen">

    <!-- Top Navbar -->
    <nav class="bg-white dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-800">
        <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-emerald-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl">J</div>
                <span class="font-bold text-2xl tracking-tight">Jeevon Dashboard</span>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to logout?')" 
                        class="flex items-center gap-2 px-6 py-3 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-3xl">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-6 py-10">

        <h1 class="text-4xl font-bold tracking-tighter mb-8">Dashboard</h1>

        @if (session('success'))
            <div class="bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 px-6 py-4 rounded-3xl mb-8">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabs -->
        <div class="flex border-b border-zinc-200 dark:border-zinc-700 mb-10 overflow-x-auto">
            <a href="{{ route('dashboard') }}" 
               class="px-8 py-4 font-medium whitespace-nowrap {{ request()->routeIs('dashboard') ? 'border-b-2 border-emerald-600 text-emerald-600' : 'text-zinc-500 hover:text-zinc-700' }}">
                About
            </a>
            <a href="{{ route('dashboard.skills') }}" 
               class="px-8 py-4 font-medium whitespace-nowrap {{ request()->routeIs('dashboard.skills') ? 'border-b-2 border-emerald-600 text-emerald-600' : 'text-zinc-500 hover:text-zinc-700' }}">
                Skills
            </a>
            <a href="{{ route('dashboard.experience') }}" 
               class="px-8 py-4 font-medium whitespace-nowrap {{ request()->routeIs('dashboard.experience') ? 'border-b-2 border-emerald-600 text-emerald-600' : 'text-zinc-500 hover:text-zinc-700' }}">
                Experience
            </a>
            <a href="{{ route('dashboard.projects') }}" 
               class="px-8 py-4 font-medium whitespace-nowrap {{ request()->routeIs('dashboard.projects') ? 'border-b-2 border-emerald-600 text-emerald-600' : 'text-zinc-500 hover:text-zinc-700' }}">
                Projects
            </a>
        </div>

        <!-- ==================== ABOUT TAB ==================== -->
        @if (request()->routeIs('dashboard'))
        <div>
            <h2 class="text-3xl font-semibold mb-8">Manage About Section</h2>
            <form method="POST" action="{{ route('dashboard.about.update') }}" enctype="multipart/form-data" 
                  class="bg-white dark:bg-zinc-900 rounded-3xl p-10 border border-zinc-100 dark:border-zinc-800">

                @csrf

                @if (isset($about) && $about->photo)
                <div class="mb-8">
                    <p class="text-sm text-zinc-500 mb-3">Current Photo</p>
                    <div class="w-64 h-64 rounded-3xl overflow-hidden border-4 border-emerald-500 shadow-xl">
                        <img src="{{ Storage::url($about->photo) }}" alt="Current" class="w-full h-full object-cover">
                    </div>
                </div>
                @endif

                <div class="mb-10">
                    <label class="block text-sm font-medium mb-2">Upload New Profile Photo</label>
                    <input type="file" name="photo" accept="image/*" 
                           class="block w-full text-sm file:mr-4 file:py-4 file:px-8 file:rounded-3xl file:border-0 file:bg-emerald-600 file:text-white">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">First Name</label>
                        <input type="text" name="first_name" value="{{ $about->first_name ?? '' }}" required class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Middle Name</label>
                        <input type="text" name="middle_name" value="{{ $about->middle_name ?? '' }}" class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Last Name</label>
                        <input type="text" name="last_name" value="{{ $about->last_name ?? '' }}" required class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium mb-2">Professional Title</label>
                    <input type="text" name="professional_title" value="{{ $about->professional_title ?? '' }}" required class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">Date of Birth</label>
                        <input type="date" name="date_of_birth" value="{{ $about->date_of_birth ?? '' }}" class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Nationality</label>
                        <input type="text" name="nationality" value="{{ $about->nationality ?? '' }}" class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium mb-2">Place of Birth</label>
                    <input type="text" name="place_of_birth" value="{{ $about->place_of_birth ?? '' }}" class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                </div>

                <div class="mt-8">
                    <label class="block text-sm font-medium mb-2">Biography</label>
                    <textarea name="biography" rows="7" required class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">{{ $about->biography ?? '' }}</textarea>
                </div>

                <div class="mt-8">
                    <label class="block text-sm font-medium mb-2">Education</label>
                    <textarea name="education" rows="5" class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">{{ $about->education ?? '' }}</textarea>
                </div>

                <button type="submit" class="mt-12 w-full py-5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-3xl">
                    Save About Information
                </button>
            </form>
        </div>
        @endif

        <!-- ==================== SKILLS TAB ==================== -->
        @if (request()->routeIs('dashboard.skills') || request()->routeIs('dashboard.skills.edit'))
        <div>
            <h2 class="text-3xl font-semibold mb-8">{{ isset($skill) ? 'Edit Skill' : 'Add New Skill' }}</h2>

            <form method="POST" action="{{ isset($skill) ? route('dashboard.skills.update', $skill->id) : route('dashboard.skills.store') }}" 
                  enctype="multipart/form-data" class="bg-white dark:bg-zinc-900 rounded-3xl p-8 border mb-12">

                @csrf
                @if (isset($skill)) @method('PUT') @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">Skill Name</label>
                        <input type="text" name="name" value="{{ $skill->name ?? '' }}" required class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Category</label>
                        <input type="text" name="category" value="{{ $skill->category ?? '' }}" class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium mb-2">Proficiency (1-100)</label>
                    <input type="number" name="proficiency" value="{{ $skill->proficiency ?? '' }}" min="1" max="100" class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium mb-2">Skill Logo</label>
                    <input type="file" name="logo" accept="image/*" class="block w-full text-sm file:mr-4 file:py-4 file:px-8 file:rounded-3xl file:border-0 file:bg-emerald-600 file:text-white">
                </div>

                <button type="submit" class="mt-10 w-full py-5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-3xl">
                    {{ isset($skill) ? 'Update Skill' : 'Add Skill' }}
                </button>
            </form>

            <h3 class="text-xl font-semibold mb-6">Your Skills</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($skills as $s)
                <div class="bg-white dark:bg-zinc-900 rounded-3xl p-6 text-center border border-zinc-100 dark:border-zinc-800 relative">
                    @if ($s->logo)
                    <img src="{{ Storage::url($s->logo) }}" alt="{{ $s->name }}" class="w-16 h-16 mx-auto mb-4 object-contain">
                    @endif
                    <p class="font-semibold">{{ $s->name }}</p>
                    @if ($s->category)<p class="text-xs text-zinc-500">{{ $s->category }}</p>@endif
                    @if ($s->proficiency)<p class="text-xs text-emerald-600 mt-1">{{ $s->proficiency }}% proficiency</p>@endif

                    <div class="absolute top-4 right-4 flex gap-3">
                        <a href="{{ route('dashboard.skills.edit', $s->id) }}" class="text-blue-600 hover:text-blue-700"><i class="fa-solid fa-pen"></i></a>
                        <form method="POST" action="{{ route('dashboard.skills.destroy', $s->id) }}" onsubmit="return confirm('Delete this skill?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- ==================== EXPERIENCE TAB ==================== -->
        @if (request()->routeIs('dashboard.experience') || request()->routeIs('dashboard.experience.edit'))
        <div>
            <h2 class="text-3xl font-semibold mb-8">{{ isset($experience) ? 'Edit Experience' : 'Add New Experience' }}</h2>

            <form method="POST" action="{{ isset($experience) ? route('dashboard.experience.update', $experience->id) : route('dashboard.experience.store') }}" 
                  class="bg-white dark:bg-zinc-900 rounded-3xl p-8 border mb-12">

                @csrf
                @if (isset($experience)) @method('PUT') @endif

                <div>
                    <label class="block text-sm font-medium mb-2">Date Range (e.g. 2024 — Present)</label>
                    <input type="text" name="date_range" value="{{ $experience->date_range ?? '' }}" required class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium mb-2">Job Title</label>
                    <input type="text" name="title" value="{{ $experience->title ?? '' }}" required class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                </div>

                <div class="mt-8">
                    <label class="block text-sm font-medium mb-2">Description</label>
                    <textarea name="description" rows="6" required class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">{{ $experience->description ?? '' }}</textarea>
                </div>

                <button type="submit" class="mt-10 w-full py-5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-3xl">
                    {{ isset($experience) ? 'Update Experience' : 'Add Experience' }}
                </button>
            </form>

            <h3 class="text-xl font-semibold mb-6">Your Experience</h3>
            <div class="space-y-8">
                @foreach ($experiences as $exp)
                <div class="flex flex-col md:flex-row gap-8 bg-white dark:bg-zinc-900 rounded-3xl p-8 border border-zinc-100 dark:border-zinc-800 relative">
                    <div class="md:w-40 flex-shrink-0">
                        <p class="text-emerald-600 font-medium">{{ $exp->date_range }}</p>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-xl">{{ $exp->title }}</h4>
                        <p class="text-zinc-600 dark:text-zinc-400 mt-3">{{ $exp->description }}</p>
                    </div>

                    <div class="absolute top-6 right-6 flex gap-3">
                        <a href="{{ route('dashboard.experience.edit', $exp->id) }}" class="text-blue-600 hover:text-blue-700"><i class="fa-solid fa-pen"></i></a>
                        <form method="POST" action="{{ route('dashboard.experience.destroy', $exp->id) }}" onsubmit="return confirm('Delete this experience?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- ==================== PROJECTS TAB ==================== -->
        @if (request()->routeIs('dashboard.projects') || request()->routeIs('dashboard.projects.edit'))
        <div>
            <h2 class="text-3xl font-semibold mb-8">{{ isset($project) ? 'Edit Project' : 'Add New Project' }}</h2>

            <form method="POST" action="{{ isset($project) ? route('dashboard.projects.update', $project->id) : route('dashboard.projects.store') }}" 
                  enctype="multipart/form-data" class="bg-white dark:bg-zinc-900 rounded-3xl p-8 border mb-12">

                @csrf
                @if (isset($project)) @method('PUT') @endif

                <div>
                    <label class="block text-sm font-medium mb-2">Project Title</label>
                    <input type="text" name="title" value="{{ $project->title ?? '' }}" required 
                           class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium mb-2">Technologies (comma separated)</label>
                    <input type="text" name="technologies" value="{{ $project->technologies ?? '' }}" 
                           placeholder="Laravel, Tailwind, MySQL, Vue" 
                           class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium mb-2">GitHub URL (optional)</label>
                    <input type="url" name="github_url" value="{{ $project->github_url ?? '' }}" 
                           class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                </div>

                <div class="mt-8">
                    <label class="block text-sm font-medium mb-2">Description</label>
                    <textarea name="description" rows="6" required 
                              class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">{{ $project->description ?? '' }}</textarea>
                </div>

                <div class="mt-8">
                    <label class="block text-sm font-medium mb-2">Project Screenshot</label>
                    <input type="file" name="image" accept="image/*" 
                           class="block w-full text-sm file:mr-4 file:py-4 file:px-8 file:rounded-3xl file:border-0 file:bg-emerald-600 file:text-white">
                    @if (isset($project) && $project->image)
                    <p class="text-xs text-zinc-500 mt-2">Current image will be replaced if new one is uploaded.</p>
                    @endif
                </div>

                <button type="submit" class="mt-10 w-full py-5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-3xl transition-all">
                    {{ isset($project) ? 'Update Project' : 'Add Project' }}
                </button>
            </form>

            <!-- Existing Projects -->
            <h3 class="text-xl font-semibold mb-6">Your Projects</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($projects as $p)
                <div class="bg-white dark:bg-zinc-900 rounded-3xl p-6 border border-zinc-100 dark:border-zinc-800 relative">
                    @if ($p->image)
                    <img src="{{ Storage::url($p->image) }}" alt="{{ $p->title }}" 
                         class="w-full h-48 object-cover rounded-2xl mb-4">
                    @endif
                    <h4 class="font-semibold text-xl mb-2">{{ $p->title }}</h4>
                    @if ($p->technologies)
                    <p class="text-xs text-zinc-500 mb-3">{{ $p->technologies }}</p>
                    @endif
                    <p class="text-zinc-600 dark:text-zinc-400 text-sm line-clamp-3">{{ $p->description }}</p>

                    @if ($p->github_url)
                    <a href="{{ $p->github_url }}" target="_blank" class="text-emerald-600 text-sm mt-3 inline-block">View on GitHub →</a>
                    @endif

                    <!-- Action Buttons -->
                    <div class="absolute top-6 right-6 flex gap-3">
                        <a href="{{ route('dashboard.projects.edit', $p->id) }}" class="text-blue-600 hover:text-blue-700"><i class="fa-solid fa-pen"></i></a>
                        <form method="POST" action="{{ route('dashboard.projects.destroy', $p->id) }}" onsubmit="return confirm('Delete this project?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</body>
</html>