<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills - Jeevon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="bg-zinc-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 min-h-screen">

    @include('partials.navbar')

    <div class="max-w-6xl mx-auto px-6 py-24">
        <h1 class="text-5xl font-bold tracking-tighter text-center mb-16">Skills & Tools</h1>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($skills as $skill)
                <div
                    class="bg-white dark:bg-zinc-900 rounded-3xl p-8 text-center border border-zinc-100 dark:border-zinc-800">

                    @if ($skill->logo)
                        <div class="flex justify-center mb-6">
                            <img src="{{ Storage::url($skill->logo) }}" alt="{{ $skill->name }}"
                                class="w-20 h-20 object-contain">
                        </div>
                    @endif

                    <h3 class="font-semibold text-xl mb-2">{{ $skill->name }}</h3>

                    @if ($skill->category)
                        <p class="text-sm text-zinc-500 mb-4">{{ $skill->category }}</p>
                    @endif

                    @if ($skill->proficiency)
                        <div class="mt-6 h-2 bg-zinc-200 dark:bg-zinc-700 rounded-full overflow-hidden">
                            <div class="h-full bg-emerald-600 transition-all" style="width: {{ $skill->proficiency }}%"></div>
                        </div>
                        <p class="text-xs text-emerald-600 mt-2">{{ $skill->proficiency }}% proficiency</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    @include('partials.footer')

</body>

</html>