<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experience - Jeevon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body class="bg-zinc-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 min-h-screen">

    @include('partials.navbar')

    <div class="max-w-4xl mx-auto px-6 py-24">
        <h1 class="text-5xl font-bold tracking-tighter mb-16">Experience & Seminars Attended</h1>

        <div class="space-y-16">
            @foreach ($experiences as $exp)
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Date -->
                <div class="md:w-40 flex-shrink-0 pt-1">
                    <p class="text-emerald-600 font-medium text-lg">{{ $exp->date_range }}</p>
                </div>

                <!-- Content -->
                <div class="flex-1">
                    <h3 class="text-2xl font-semibold mb-3">{{ $exp->title }}</h3>
                    <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed">
                        {{ $exp->description }}
                    </p>
                </div>
            </div>
            @endforeach

            @if ($experiences->isEmpty())
            <div class="text-center py-20 text-zinc-500">
                No experience added yet.
            </div>
            @endif
        </div>
    </div>

    @include('partials.footer')

</body>
</html>