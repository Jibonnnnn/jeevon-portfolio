<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - Jeevon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body class="bg-zinc-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 min-h-screen">

    @include('partials.navbar')

    <div class="max-w-6xl mx-auto px-6 py-24">
        <h1 class="text-5xl font-bold tracking-tighter text-center mb-16">Featured Projects</h1>

        @if ($projects->isEmpty())
            <div class="text-center py-20 text-zinc-500">
                No projects added yet.
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($projects as $project)
                <div class="bg-white dark:bg-zinc-900 rounded-3xl overflow-hidden border border-zinc-100 dark:border-zinc-800 shadow-sm hover:shadow-xl transition-all duration-300">
                    
                    @if ($project->image)
                    <div class="h-56 overflow-hidden">
                        <img src="{{ Storage::url($project->image) }}" 
                             alt="{{ $project->title }}" 
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    @endif

                    <div class="p-8">
                        <h3 class="text-2xl font-semibold mb-3">{{ $project->title }}</h3>
                        
                        @if ($project->technologies)
                        <div class="flex flex-wrap gap-2 mb-5">
                            @foreach (explode(',', $project->technologies) as $tech)
                                <span class="text-xs px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 rounded-full">
                                    {{ trim($tech) }}
                                </span>
                            @endforeach
                        </div>
                        @endif

                        <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed mb-6 line-clamp-4">
                            {{ $project->description }}
                        </p>

                        @if ($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank"
                           class="inline-flex items-center gap-2 text-emerald-600 hover:text-emerald-700 font-medium">
                            <i class="fa-brands fa-github"></i>
                            View on GitHub
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    @include('partials.footer')

</body>
</html>