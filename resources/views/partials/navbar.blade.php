<!-- Fixed Navbar - Logo goes to Login -->
<nav
    class="fixed top-0 w-full bg-white/95 dark:bg-zinc-950/95 backdrop-blur-md border-b border-zinc-200 dark:border-zinc-800 z-50">
    <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">

        <!-- Logo → Goes to Login Page -->
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
            <!-- Dark Mode -->
            <button id="dark-toggle"
                class="w-10 h-10 flex items-center justify-center rounded-2xl hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                <i class="fa-solid fa-moon text-xl"></i>
            </button>

            <!-- Hamburger -->
            <button id="hamburger"
                class="md:hidden w-10 h-10 flex items-center justify-center rounded-2xl hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                <i id="hamburger-icon" class="fa-solid fa-bars text-2xl"></i>
            </button>

            <!-- GitHub -->
            <a href="https://github.com/yourusername" target="_blank"
                class="hidden md:flex px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-3xl items-center gap-2 transition-all">
                <i class="fa-brands fa-github"></i> GitHub
            </a>
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