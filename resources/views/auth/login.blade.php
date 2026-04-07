<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login • Jeevon</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body class="bg-zinc-50 dark:bg-zinc-950 min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="flex justify-center mb-10">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-14 h-14 bg-emerald-600 rounded-3xl flex items-center justify-center text-white font-bold text-4xl">J</div>
                <span class="font-bold text-3xl tracking-tight text-emerald-600">Jeevon</span>
            </a>
        </div>

        <div class="bg-white dark:bg-zinc-900 rounded-3xl shadow-2xl p-10">
            <h2 class="text-3xl font-bold text-center mb-2">Welcome back</h2>
            <p class="text-center text-zinc-500 dark:text-zinc-400 mb-8">Sign in to manage your portfolio</p>

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="space-y-6">
                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium mb-2 text-zinc-700 dark:text-zinc-300">Email Address</label>
                        <input type="email" name="email" required autofocus
                               class="w-full px-5 py-4 rounded-2xl border border-zinc-200 dark:border-zinc-700 bg-transparent focus:outline-none focus:border-emerald-500 transition">
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-medium mb-2 text-zinc-700 dark:text-zinc-300">Password</label>
                        <input type="password" name="password" required
                               class="w-full px-5 py-4 rounded-2xl border border-zinc-200 dark:border-zinc-700 bg-transparent focus:outline-none focus:border-emerald-500 transition">
                    </div>

                    <button type="submit"
                            class="w-full py-4 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-3xl transition-all active:scale-95">
                        Sign In
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center text-xs text-zinc-500">
                Demo Login • For Portfolio Management
            </div>
        </div>

        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-emerald-600 hover:text-emerald-700 text-sm flex items-center justify-center gap-2">
                ← Back to Portfolio
            </a>
        </div>
    </div>
</body>
</html>