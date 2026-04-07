<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeevon | Digital Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="bg-zinc-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 min-h-screen">

    <!-- NAVBAR -->
    <nav
        class="fixed top-0 w-full bg-white/95 dark:bg-zinc-950/95 backdrop-blur-md border-b border-zinc-200 dark:border-zinc-800 z-50">
        <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">

            <!-- Logo → Login -->
            <a href="{{ route('login') }}" class="flex items-center gap-3 hover:opacity-80 transition-opacity">
                <div
                    class="w-10 h-10 bg-emerald-600 rounded-2xl flex items-center justify-center text-white font-bold text-2xl">
                    J</div>
                <span class="font-bold text-2xl tracking-tight text-emerald-600">Jeevon</span>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center gap-8 text-sm font-medium">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
                <a href="{{ route('about') }}" class="nav-link">About</a>
                <a href="{{ route('skills') }}" class="nav-link">Skills</a>
                <a href="{{ route('experience') }}" class="nav-link">Experience</a>
                <a href="{{ route('projects') }}" class="nav-link">Projects</a>
                <a href="{{ route('home') }}#contact" class="nav-link">Contact</a>
            </div>

            <!-- Right Side -->
            <div class="flex items-center gap-4">
                <button id="dark-toggle"
                    class="w-10 h-10 flex items-center justify-center rounded-2xl hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                    <i class="fa-solid fa-moon text-xl"></i>
                </button>

                <button id="hamburger"
                    class="md:hidden w-10 h-10 flex items-center justify-center rounded-2xl hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                    <i id="hamburger-icon" class="fa-solid fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu"
            class="hidden md:hidden bg-white dark:bg-zinc-900 border-t border-zinc-200 dark:border-zinc-800">
            <div class="px-6 py-8 flex flex-col gap-6 text-base font-medium">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
                <a href="{{ route('about') }}" class="nav-link">About</a>
                <a href="{{ route('skills') }}" class="nav-link">Skills</a>
                <a href="{{ route('experience') }}" class="nav-link">Experience</a>
                <a href="{{ route('projects') }}" class="nav-link">Projects</a>
                <a href="{{ route('home') }}#contact" class="nav-link">Contact</a>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="min-h-screen pt-24 flex items-center">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <div
                    class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-100 dark:bg-emerald-900/40 rounded-3xl text-sm font-medium text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800">
                    <span class="relative flex h-3 w-3">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-500 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                    </span>
                    Open to opportunities • Dipolog City, Zamboanga del Norte, Philippines
                </div>

                <h1 class="text-5xl md:text-7xl font-bold tracking-tighter leading-none">
                    Hi, I'm <span class="text-emerald-600">Jeevon</span>.<br>
                    I build and experiment with web applications.
                </h1>

                <p class="text-lg md:text-xl text-zinc-600 dark:text-zinc-400 max-w-lg">
                    "An IT student driven to become a full-stack developer and constantly learn new tools and technologies.”
                </p>

                <a href="{{ route('projects') }}"
                    class="inline-block px-8 py-4 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-3xl transition-all">
                    View My Projects →
                </a>
            </div>

            <!-- Your Photo -->
            <div class="flex justify-center">
                <div
                    class="w-80 h-80 md:w-96 md:h-96 rounded-3xl overflow-hidden border-8 border-emerald-500 shadow-2xl">
                    <img src="{{ asset('images/jeevon.png') }}" alt="Jeevon" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="py-24 bg-white dark:bg-zinc-900">
        <div class="max-w-2xl mx-auto px-6">
            <h2 class="text-5xl font-bold tracking-tighter text-center mb-8">Let's Work Together</h2>
            <p class="text-center text-zinc-600 dark:text-zinc-400 mb-12">Have a project in mind? Drop me a message.</p>

            <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <input type="text" name="name" placeholder="Your Name" required
                        class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                    <input type="email" name="email" placeholder="your@email.com" required
                        class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500">
                </div>
                <textarea name="message" rows="6" placeholder="Tell me about your project..." required
                    class="w-full px-6 py-4 rounded-3xl border border-zinc-200 dark:border-zinc-700 focus:border-emerald-500"></textarea>

                <button type="submit"
                    class="w-full py-5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-3xl transition-all">
                    Send Message
                </button>
            </form>

            <!-- Social Media Link-->
            <div class="mt-12 text-center">
                <p class="text-sm text-zinc-500 mb-4">Or connect with me on:</p>
                <div class="flex justify-center gap-6 text-3xl">
                    <a href="https://github.com/Jibonnnnn" target="_blank"
                        class="text-zinc-700 dark:text-zinc-300 hover:text-black dark:hover:text-white transition">
                        <i class="fa-brands fa-github"></i>
                    </a>
                    <a href="https://www.facebook.com/iam.jeevon" target="_blank"
                        class="text-zinc-700 dark:text-zinc-300 hover:text-blue-600 transition">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/https.jibon" target="_blank"
                        class="text-zinc-700 dark:text-zinc-300 hover:text-pink-600 transition">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://m.me/iam.jeevon" target="_blank"
                        class="text-zinc-700 dark:text-zinc-300 hover:text-blue-600 transition">
                        <i class="fa-brands fa-facebook-messenger"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

</body>

</html>