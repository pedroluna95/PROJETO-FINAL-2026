@extends('layouts.app')
@section('content')
<div class="min-h-screen">
    <div class="space-y-8">
        <!-- Header -->
        <div class="mb-8 animate-in">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Minhas Inscrições</h1>
            <p class="text-gray-500">Acompanhe o status de suas candidaturas</p>
        </div>
        <!-- Tabs -->
        <div class="flex gap-4 border-b border-gray-200">
            <button class="px-4 py-3 font-bold text-[#0077fc] border-b-2 border-[#0077fc] transition-colors" onclick="switchTab(event, 'ativas')">Ativas</button>
            <button class="px-4 py-3 font-bold text-gray-500 hover:text-gray-900 transition-colors" onclick="switchTab(event, 'aceitas')">Aceitas</button>
            <button class="px-4 py-3 font-bold text-gray-500 hover:text-gray-900 transition-colors" onclick="switchTab(event, 'rejeitadas')">Rejeitadas</button>
        </div>
        <!-- Inscriptions List -->
        <div class="space-y-4" id="tab-ativas">
            <!-- Card 1 -->
            <div class="bg-white rounded-xl p-6 border border-gray-200 hover:shadow-lg transition-shadow animate-in">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Desenvolvedor Full Stack</h3>
                        <p class="text-gray-500 text-sm mb-3">Tecnologia • Presencial</p>
                        <span class="badge-pill badge-yellow">
                            <span class="material-symbols-outlined text-sm">schedule</span>
                            Em análise
                        </span>
                    </div>
                    <div class="flex flex-col items-end gap-2">
                        <p class="text-sm text-gray-400">Candidatado em 15 de junho</p>
                        <button class="text-[#0077fc] font-bold hover:underline">Ver detalhes</button>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="bg-white rounded-xl p-6 border border-gray-200 hover:shadow-lg transition-shadow animate-in">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Designer UX/UI</h3>
                        <p class="text-gray-500 text-sm mb-3">Design • Híbrido</p>
                        <span class="badge-pill badge-green">
                            <span class="material-symbols-outlined text-sm">check_circle</span>
                            Aceita
                        </span>
                    </div>
                    <div class="flex flex-col items-end gap-2">
                        <p class="text-sm text-gray-400">Candidatado em 10 de junho</p>
                        <button class="text-[#0077fc] font-bold hover:underline">Ver detalhes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function switchTab(event, tab) {
        // Atualiza estilo das abas
        document.querySelectorAll('.border-b.border-gray-200 button').forEach(btn => {
            btn.classList.remove('text-[#0077fc]', 'border-b-2', 'border-[#0077fc]');
            btn.classList.add('text-gray-500');
        });
        event.currentTarget.classList.remove('text-gray-500');
        event.currentTarget.classList.add('text-[#0077fc]', 'border-b-2', 'border-[#0077fc]');
    }
</script>
@endsection
