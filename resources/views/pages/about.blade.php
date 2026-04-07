<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Jeevon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body class="bg-zinc-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 min-h-screen">

    @include('partials.navbar')

    <div class="max-w-4xl mx-auto px-6 py-24">

        @if (isset($about) && $about)

            <!-- Photo - Direct Storage Path (Most Reliable for XAMPP) -->
            @if ($about->photo)
            <div class="flex justify-center mb-12">
                <div class="w-64 h-64 rounded-3xl overflow-hidden border-8 border-emerald-500 shadow-2xl">
                    <img src="/storage/{{ $about->photo }}" 
                         alt="{{ $about->full_name }}" 
                         class="w-full h-full object-cover">
                </div>
            </div>
            @endif

            <!-- Name and Title -->
            <div class="text-center mb-12">
                <h1 class="text-5xl font-bold tracking-tighter mb-3">
                    {{ $about->full_name }}
                </h1>
                <p class="text-2xl text-emerald-600 font-medium">
                    {{ $about->professional_title }}
                </p>
            </div>

            <!-- Biography -->
            <div class="prose dark:prose-invert max-w-none text-lg leading-relaxed mb-16">
                {!! nl2br(e($about->biography)) !!}
            </div>

            <!-- Personal Details -->
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h3 class="font-semibold text-lg mb-4">Personal Information</h3>
                    <div class="space-y-3 text-sm">
                        <div><strong>Date of Birth:</strong> {{ $about->date_of_birth ? $about->date_of_birth->format('F j, Y') : 'Not provided' }}</div>
                        <div><strong>Place of Birth:</strong> {{ $about->place_of_birth ?? 'Not provided' }}</div>
                        <div><strong>Nationality:</strong> {{ $about->nationality ?? 'Not provided' }}</div>
                    </div>
                </div>

                <div>
                    <h3 class="font-semibold text-lg mb-4">Education</h3>
                    <div class="text-sm text-zinc-600 dark:text-zinc-400 whitespace-pre-line">
                        {{ $about->education ?? 'No education details provided yet.' }}
                    </div>
                </div>
            </div>

        @else
            <div class="text-center py-20 text-zinc-500">
                No About information available yet. Please update it from the Dashboard.
            </div>
        @endif

    </div>

    @include('partials.footer')

</body>
</html>