<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html class="light" lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Portal de Estágios Internos</title>
    
    <!-- Scripts e Fontes Externas -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- CSS Personalizado (Adicionado v=1 para forçar atualização de cache) -->
    <link rel="stylesheet" href="/app/Views/css/style.css?v=1">
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: { 
                        // Corrigido: Atualizado para o novo azul
                        "primary": "#5a2dfd" 
                    },
                    fontFamily: { "display": ["Public Sans", "sans-serif"] }
                }
            }
        }
    </script>
</head>
<body class="font-display min-h-screen">
    <div class="relative flex flex-col w-full overflow-x-hidden">
        <header class="sticky top-0 z-50 w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo -->
                    <div class="flex items-center gap-8">
                        <div class="flex items-center gap-3 text-primary cursor-pointer" onclick="window.location.href='?url=home'">
                            <span class="material-symbols-outlined text-3xl font-bold">rocket_launch</span>
                            <h1 class="text-slate-900 dark:text-white text-xl font-extrabold tracking-tight">SaBOOR feijao 67 com farituring de von neumann</h1>
                        </div>
                        <nav class="hidden md:flex items-center gap-6">
                            <a class="<?php echo $pagina == 'home' ? 'text-primary border-b-2 border-primary pb-1' : 'text-slate-600 dark:text-slate-300 hover:text-primary'; ?>" href="?url=home">Início</a>
                            <a class="<?php echo $pagina == 'vagas' ? 'text-primary border-b-2 border-primary pb-1' : 'text-slate-600 dark:text-slate-300 hover:text-primary'; ?>" href="?url=vagas">Vagas</a>
                            <a class="<?php echo $pagina == 'inscricoes' ? 'text-primary border-b-2 border-primary pb-1' : 'text-slate-600 dark:text-slate-300 hover:text-primary'; ?>" href="?url=inscricoes">Minhas Inscrições</a>
                        </nav>
                    </div>
                    
                    <!-- Busca e Perfil -->
                    <div class="flex items-center gap-4 flex-1 justify-end max-w-md ml-8">
                        <div class="relative w-full group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">search</span>
                            </div>
                            <input class="block w-full pl-10 pr-3 py-2 border border-slate-200 dark:border-slate-700 rounded-xl bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all text-sm" placeholder="Buscar vagas..." type="text"/>
                        </div>
                        
                        <div class="flex items-center gap-3 pl-4 border-l border-slate-200 dark:border-slate-700">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <div class="size-9 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                                    <span class="material-symbols-outlined">notifications</span>
                                </div>
                                <div class="size-10 rounded-full border-2 border-primary overflow-hidden">
                                    <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA-PUlNYuds7dvdLdpEkyq2D_fGYZZJmCbEcdFI7o_f9Jz2ttWhIpS0lwF79VQoq6PChg_hucXo12NNqW2IsNW9nWO5MOxvuq7m5H9N2cvZM76BHnlpWftyXT4Tp_pnLTCXK3zm63YItgRZ6UKSabT6Jwh4F2PgVbler3P15uleA5gWD-rY5AhWX-EkLI7QxDHrGGJQK79X79X0uzc7ZYc1wiOO9kc8fFdSYUnMAQ0W6jpKc7aQTeajv2bVbLIQX6aQJ3ARLj9aXFo" alt="Avatar"/>
                                </div>
                            <?php else: ?>
                                <div class="flex items-center gap-2">
                                    <a href="?url=home/login" class="text-sm font-semibold text-slate-600 dark:text-slate-300 hover:text-primary transition-colors">Login</a>
                                    <a href="?url=home/cadastro" class="text-sm font-semibold text-slate-600 dark:text-slate-300 hover:text-primary transition-colors">Cadastrar</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-8">
