<body class="font-display min-h-screen">
<div class="relative flex flex-col w-full overflow-x-hidden">
<header class="sticky top-0 z-50 w-full bg-primary shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center gap-8">
                <div class="flex items-center gap-3 text-primary cursor-pointer" onclick="window.location.href='/home'">
                    <span class="material-symbols-outlined text-3x1 font-bold text-white">rocket_launch</span>
                    <h1 class="text-white text-xl font-extrabold tracking-tight">Portal Estágio CEFET</h1>
                </div>
                <!-- Navbar -->
                <nav class="hidden md:flex items-center gap-6">
                    <a class="text-white {{ request()->is('home') ? 'border-b-2 border-white pb-1' : 'hover:drop-shadow-[0_0_8px_rgba(255,255,255,0.8)] transition-all duration-300' }}" href="/home">Início</a>
                    <a class="text-white {{ request()->is('vagas*') ? 'border-b-2 border-white pb-1' : 'hover:drop-shadow-[0_0_8px_rgba(255,255,255,0.8)] transition-all duration-300' }}" href="/vagas">Vagas</a>
                    <a class="text-white {{ request()->is('inscricoes*') ? 'border-b-2 border-white pb-1' : 'hover:drop-shadow-[0_0_8px_rgba(255,255,255,0.8)] transition-all duration-300' }}" href="/inscricoes">Minhas Inscrições</a>
                </nav>
            </div>
            <!-- Direita -->
            <div class="flex items-center gap-4 flex-1 justify-end max-w-md ml-8">
                <div class="relative w-full group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-white group-focus-within:text-white transition-colors">
                        <span class="material-symbols-outlined text-xl">search</span>
                    </div>
                    <input class="block w-full pl-10 pr-3 py-2 border border-slate-200 dark:border-slate-700 rounded-xl bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all text-sm" placeholder="Buscar vagas..." type="text"/>
                </div>
                @if(session('user_id'))
                    <div class="flex items-center gap-3">
                        <div class="size-9 rounded-full bg-white/20 flex items-center justify-center text-white">
                            <span class="material-symbols-outlined">notifications</span>
                        </div>
                        <div class="size-10 rounded-full border-2 border-white overflow-hidden">
                            <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA-PUlNYuds7dvdLdpEkyq2D_fGYZZJmCbEcdFI7o_f9Jz2ttWhIpS0lwF79VQoq6PChg_hucXo12NNqW2IsNW9nWO5MOxvuq7m5H9N2cvZM76BHnlpWftyXT4Tp_pnLTCXK3zm63YItgRZ6UKSabT6Jwh4F2PgVbler3P15uleA5gWD-rY5AhWX-EkLI7QxDHrGGJQK79X79X0uzc7ZYc1wiOO9kc8fFdSYUnMAQ0W6jpKc7aQTeajv2bVbLIQX6aQJ3ARLj9aXFo" alt="Avatar"/>
                        </div>
                    </div>
                @else
                    <div class="flex gap-2">
                        <a class="text-white hover:drop-shadow-[0_0_8px_rgba(255,255,255,0.8)] transition-all duration-300" href="/login">Login</a>
                        <a class="text-white hover:drop-shadow-[0_0_8px_rgba(255,255,255,0.8)] transition-all duration-300" href="/cadastro">Cadastrar</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>
<main class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-8">
