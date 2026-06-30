@extends('layouts.app')
@section('content')
<div class="flex gap-6 min-h-screen">
    <!-- Sidebar Filters -->
    <aside class="w-64 flex-shrink-0 bg-surface-container-low rounded-xl p-6 h-fit sticky top-24">
        <h2 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Filtros</h2>
        <div class="space-y-6">
            <!-- Search -->
            <div>
                <label class="text-sm font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-3 block">Buscar</label>
                <input class="w-full px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary/50" placeholder="Nome da vaga..." type="text" />
            </div>
            <!-- Sectors -->
            <div class="pt-6 border-t border-slate-200 dark:border-slate-800">
                <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-4">Setores</h3>
                <div class="space-y-2">
                    <label class="flex items-center gap-3 p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 cursor-pointer transition-colors">
                        <input checked="" class="rounded border-slate-300 text-primary focus:ring-primary bg-transparent" type="checkbox" />
                        <span class="text-sm font-medium">Todos os setores</span>
                    </label>
                    <label class="flex items-center gap-3 p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 cursor-pointer transition-colors">
                        <input class="rounded border-slate-300 text-primary focus:ring-primary bg-transparent" type="checkbox" />
                        <span class="text-sm font-medium">Sinfo</span>
                    </label>
                    <label class="flex items-center gap-3 p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 cursor-pointer transition-colors">
                        <input class="rounded border-slate-300 text-primary focus:ring-primary bg-transparent" type="checkbox" />
                        <span class="text-sm font-medium">Telecomunicações</span>
                    </label>
                </div>
            </div>
            <!-- Modality -->
            <div class="pt-6 border-t border-slate-200 dark:border-slate-800">
                <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-4">Modalidade</h3>
                <div class="space-y-2">
                    <label class="flex items-center gap-3 p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 cursor-pointer transition-colors">
                        <input checked="" class="text-primary focus:ring-primary bg-transparent" name="modality" type="radio" />
                        <span class="text-sm font-medium">Presencial</span>
                    </label>
                    <label class="flex items-center gap-3 p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 cursor-pointer transition-colors">
                        <input class="text-primary focus:ring-primary bg-transparent" name="modality" type="radio" />
                        <span class="text-sm font-medium">Híbrido</span>
                    </label>
                </div>
            </div>
            <div class="p-4 bg-primary/10 rounded-xl border border-primary/20">
                <p class="text-primary text-xs font-bold uppercase mb-1">Dica</p>
                <p class="text-slate-700 dark:text-slate-300 text-sm">Mantenha seu perfil atualizado para receber recomendações personalizadas.</p>
            </div>
        </div>
    </aside>
    <!-- Job List -->
    <div class="flex-1 space-y-4">
        <div class="flex items-center justify-between mb-6">
            <p class="text-slate-500 dark:text-slate-400 font-medium">Mostrando <span class="text-slate-900 dark:text-white font-bold">1 vaga</span> encontrada</p>
            <div class="flex items-center gap-2">
                <span class="text-sm text-slate-500">Ordenar por:</span>
                <select class="bg-transparent border-none text-sm font-bold text-primary focus:ring-0 cursor-pointer">
                    <option>Mais recentes</option>
                    <option>A-Z</option>
                </select>
            </div>
        </div>
        <!-- Job Cards -->
        <div class="grid grid-cols-1 gap-4">
            <!-- Card 1 (Vaga Padrão) -->
            <div class="job-card flex flex-col md:flex-row gap-6 group">
                <div class="h-16 w-16 rounded-xl bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                    <span class="material-symbols-outlined text-4xl">code</span>
                </div>
                <div class="flex-1">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white group-hover:text-primary transition-colors">Desenvolvedor Full Stack</h3>
                            <div class="flex flex-wrap items-center gap-4 mt-2">
                                <div class="flex items-center gap-1 text-slate-500 dark:text-slate-400 text-sm">
                                    <span class="material-symbols-outlined text-lg">business_center</span>
                                    Tecnologia
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <button class="btn-primary">Candidatar-se</button>
                        </div>
                    </div>
                    <p class="mt-4 text-slate-600 dark:text-slate-400 leading-relaxed line-clamp-2">
                        Procuramos um desenvolvedor experiente em PHP e JavaScript para integrar nossa equipe de tecnologia.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection