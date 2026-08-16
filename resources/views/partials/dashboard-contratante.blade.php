<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Dashboard Contratante</h1>
        <p class="text-gray-600">Gerencie os estagiários da sua empresa</p>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
            <div class="inline-flex p-3 rounded-lg bg-blue-50 text-blue-600 mb-4"><span class="material-symbols-outlined">groups</span></div>
            <h3 class="text-sm text-gray-600 mb-1">Estagiários Ativos</h3>
            <p class="text-2xl font-bold text-gray-900">3</p>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
            <div class="inline-flex p-3 rounded-lg bg-orange-50 text-orange-600 mb-4"><span class="material-symbols-outlined">schedule</span></div>
            <h3 class="text-sm text-gray-600 mb-1">Presenças Pendentes</h3>
            <p class="text-2xl font-bold text-gray-900">8</p>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
            <div class="inline-flex p-3 rounded-lg bg-green-50 text-green-600 mb-4"><span class="material-symbols-outlined">check_circle</span></div>
            <h3 class="text-sm text-gray-600 mb-1">Horas Validadas</h3>
            <p class="text-2xl font-bold text-gray-900">400h</p>
        </div>
    </div>

    {{-- Estagiários --}}
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
        <h2 class="text-xl font-semibold mb-6">Estagiários</h2>
        <div class="space-y-4">
            <div class="p-5 border border-gray-200 rounded-lg hover:shadow-md transition-shadow">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                    <div class="flex-1">
                        <h3 class="font-semibold text-lg">Ana Souza</h3>
                        <p class="text-sm text-gray-500 mb-3">Engenharia de Computação</p>
                        <div class="flex items-center gap-2 mb-2">
                            <div class="flex-1 bg-gray-100 rounded-full h-2">
                                <div class="bg-[#0077fc] h-2 rounded-full transition-all" style="width: 50%"></div>
                            </div>
                            <span class="text-sm font-medium text-gray-700 whitespace-nowrap">120h / 240h</span>
                        </div>
                        <p class="text-xs text-gray-500">Início: 01/03/2024</p>
                    </div>
                    <div class="flex lg:flex-col gap-2">
                        <button class="flex-1 lg:flex-none px-4 py-2 bg-[#0077fc] text-white rounded-lg hover:bg-[#0056c9] transition-colors text-sm flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                            Ver Presenças
                        </button>
                        <button class="flex-1 lg:flex-none px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[16px]">description</span>
                            Ficha
                        </button>
                    </div>
                </div>
            </div>

            <div class="p-5 border border-gray-200 rounded-lg hover:shadow-md transition-shadow">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                    <div class="flex-1">
                        <h3 class="font-semibold text-lg">Carlos Lima</h3>
                        <p class="text-sm text-gray-500 mb-3">Sistemas de Informação</p>
                        <div class="flex items-center gap-2 mb-2">
                            <div class="flex-1 bg-gray-100 rounded-full h-2">
                                <div class="bg-[#0077fc] h-2 rounded-full transition-all" style="width: 50%"></div>
                            </div>
                            <span class="text-sm font-medium text-gray-700 whitespace-nowrap">80h / 160h</span>
                        </div>
                        <p class="text-xs text-gray-500">Início: 15/02/2024</p>
                    </div>
                    <div class="flex lg:flex-col gap-2">
                        <button class="flex-1 lg:flex-none px-4 py-2 bg-[#0077fc] text-white rounded-lg hover:bg-[#0056c9] transition-colors text-sm flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                            Ver Presenças
                        </button>
                        <button class="flex-1 lg:flex-none px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[16px]">description</span>
                            Ficha
                        </button>
                    </div>
                </div>
            </div>

            <div class="p-5 border border-gray-200 rounded-lg hover:shadow-md transition-shadow">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                    <div class="flex-1">
                        <h3 class="font-semibold text-lg">Fernanda Costa</h3>
                        <p class="text-sm text-gray-500 mb-3">Engenharia Elétrica</p>
                        <div class="flex items-center gap-2 mb-2">
                            <div class="flex-1 bg-gray-100 rounded-full h-2">
                                <div class="bg-[#0077fc] h-2 rounded-full transition-all" style="width: 83%"></div>
                            </div>
                            <span class="text-sm font-medium text-gray-700 whitespace-nowrap">200h / 240h</span>
                        </div>
                        <p class="text-xs text-gray-500">Início: 20/01/2024</p>
                    </div>
                    <div class="flex lg:flex-col gap-2">
                        <button class="flex-1 lg:flex-none px-4 py-2 bg-[#0077fc] text-white rounded-lg hover:bg-[#0056c9] transition-colors text-sm flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                            Ver Presenças
                        </button>
                        <button class="flex-1 lg:flex-none px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[16px]">description</span>
                            Ficha
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
