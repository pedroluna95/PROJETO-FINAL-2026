@extends('layouts.app')
@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-slate-900 dark:text-white mb-2">Minhas Inscrições</h1>
        <p class="text-slate-600 dark:text-slate-400">Acompanhe o status de suas candidaturas</p>
    </div>

    <!-- Tabs -->
    <div class="flex gap-4 border-b border-slate-200 dark:border-slate-800">
        <button class="px-4 py-3 font-bold text-primary border-b-2 border-primary">Ativas</button>
        <button class="px-4 py-3 font-bold text-slate-500 hover:text-slate-900 dark:hover:text-white transition-colors">Aceitas</button>
        <button class="px-4 py-3 font-bold text-slate-500 hover:text-slate-900 dark:hover:text-white transition-colors">Rejeitadas</button>
    </div>

    <!-- Inscriptions List -->
    <div class="space-y-4">
        <!-- Card 1 -->
        <div class="bg-white dark:bg-slate-800 rounded-xl p-6 border border-slate-200 dark:border-slate-700 hover:shadow-lg transition-shadow">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Desenvolvedor Full Stack</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mb-3">Tecnologia • Presencial</p>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-200 text-xs font-bold">
                            <span class="material-symbols-outlined text-sm">schedule</span>
                            Em análise
                        </span>
                    </div>
                </div>
                <div class="flex flex-col items-end gap-2">
                    <p class="text-sm text-slate-500">Candidatado em 15 de junho</p>
                    <button class="text-primary font-bold hover:underline">Ver detalhes</button>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white dark:bg-slate-800 rounded-xl p-6 border border-slate-200 dark:border-slate-700 hover:shadow-lg transition-shadow">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Designer UX/UI</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mb-3">Design • Híbrido</p>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200 text-xs font-bold">
                            <span class="material-symbols-outlined text-sm">check_circle</span>
                            Aceita
                        </span>
                    </div>
                </div>
                <div class="flex flex-col items-end gap-2">
                    <p class="text-sm text-slate-500">Candidatado em 10 de junho</p>
                    <button class="text-primary font-bold hover:underline">Ver detalhes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
