<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Dashboard Orientador</h1>
        <p class="text-gray-600">Acompanhe e avalie seus orientandos</p>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
            <div class="inline-flex p-3 rounded-lg bg-blue-50 text-blue-600 mb-4"><span class="material-symbols-outlined">groups</span></div>
            <h3 class="text-sm text-gray-600 mb-1">Orientandos</h3>
            <p class="text-2xl font-bold text-gray-900">3</p>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
            <div class="inline-flex p-3 rounded-lg bg-orange-50 text-orange-600 mb-4"><span class="material-symbols-outlined">task_alt</span></div>
            <h3 class="text-sm text-gray-600 mb-1">Avaliações Pendentes</h3>
            <p class="text-2xl font-bold text-gray-900">1</p>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
            <div class="inline-flex p-3 rounded-lg bg-green-50 text-green-600 mb-4"><span class="material-symbols-outlined">trending_up</span></div>
            <h3 class="text-sm text-gray-600 mb-1">Em Andamento</h3>
            <p class="text-2xl font-bold text-gray-900">2</p>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
            <div class="inline-flex p-3 rounded-lg bg-purple-50 text-purple-600 mb-4"><span class="material-symbols-outlined">military_tech</span></div>
            <h3 class="text-sm text-gray-600 mb-1">Concluídos</h3>
            <p class="text-2xl font-bold text-gray-900">12</p>
        </div>
    </div>

    {{-- Orientandos --}}
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
        <h2 class="text-xl font-semibold mb-6">Meus Orientandos</h2>
        <div class="space-y-4">
            <div class="p-5 border border-gray-200 rounded-lg hover:shadow-md transition-shadow">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="flex-1">
                        <div class="flex items-start justify-between mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">João Silva</h3>
                                <p class="text-sm text-gray-600">Eng. Computação</p>
                                <p class="text-sm text-gray-500 mt-1">Tech Solutions Ltda</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Em Andamento</span>
                        </div>
                        <div class="mb-3">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-sm text-gray-600">Progresso</span>
                                <span class="text-sm font-semibold text-[#0077fc]">75%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-[#0077fc] h-2 rounded-full transition-all" style="width: 75%"></div>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500">Última avaliação: 15/05/2026</p>
                    </div>
                    <div class="flex sm:flex-col gap-2">
                        <button class="flex-1 sm:flex-none px-4 py-2 bg-[#0077fc] text-white rounded-lg hover:bg-[#0056c9] transition-colors text-sm flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                            Ver Detalhes
                        </button>
                    </div>
                </div>
            </div>

            <div class="p-5 border border-gray-200 rounded-lg hover:shadow-md transition-shadow">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="flex-1">
                        <div class="flex items-start justify-between mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">Maria Santos</h3>
                                <p class="text-sm text-gray-600">Eng. Civil</p>
                                <p class="text-sm text-gray-500 mt-1">Inovação Digital S.A.</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Em Andamento</span>
                        </div>
                        <div class="mb-3">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-sm text-gray-600">Progresso</span>
                                <span class="text-sm font-semibold text-[#0077fc]">60%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-[#0077fc] h-2 rounded-full transition-all" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex sm:flex-col gap-2">
                        <button class="flex-1 sm:flex-none px-4 py-2 bg-[#0077fc] text-white rounded-lg hover:bg-[#0056c9] transition-colors text-sm flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                            Ver Detalhes
                        </button>
                        <button class="flex-1 sm:flex-none px-4 py-2 border-2 border-orange-500 text-orange-600 rounded-lg hover:bg-orange-50 transition-colors text-sm">
                            Avaliar
                        </button>
                    </div>
                </div>
            </div>

            <div class="p-5 border border-gray-200 rounded-lg hover:shadow-md transition-shadow">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="flex-1">
                        <div class="flex items-start justify-between mb-3">
                            <div>
                                <h3 class="font-semibold text-lg">Pedro Costa</h3>
                                <p class="text-sm text-gray-600">Eng. Computação</p>
                                <p class="text-sm text-gray-500 mt-1">Consultoria Tech</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">Concluindo</span>
                        </div>
                        <div class="mb-3">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-sm text-gray-600">Progresso</span>
                                <span class="text-sm font-semibold text-[#0077fc]">90%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-[#0077fc] h-2 rounded-full transition-all" style="width: 90%"></div>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500">Última avaliação: 01/06/2026</p>
                    </div>
                    <div class="flex sm:flex-col gap-2">
                        <button class="flex-1 sm:flex-none px-4 py-2 bg-[#0077fc] text-white rounded-lg hover:bg-[#0056c9] transition-colors text-sm flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                            Ver Detalhes
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <button class="mt-6 w-full flex items-center justify-center gap-2 py-3 border-2 border-[#0077fc] text-[#0077fc] rounded-lg hover:bg-blue-50 transition-colors font-medium">
            <span class="material-symbols-outlined">description</span>
            Gerar Relatório de Orientações
        </button>
    </div>
</div>
