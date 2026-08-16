@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-1">Controle de Horas</h1>
        <p class="text-gray-500">Registre suas presenças e acompanhe seu progresso</p>
    </div>

    {{-- Cards de horas por atividade --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm text-gray-600">Projetos de Extensão</span>
                <span class="material-symbols-outlined text-purple-600">extension</span>
            </div>
            <p class="text-2xl font-bold text-gray-900">80<span class="text-base text-gray-400 font-medium">/160h</span></p>
            <div class="w-full bg-gray-100 rounded-full h-2 mt-3">
                <div class="bg-purple-500 h-2 rounded-full" style="width: 50%"></div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm text-gray-600">Monitoria</span>
                <span class="material-symbols-outlined text-blue-600">school</span>
            </div>
            <p class="text-2xl font-bold text-gray-900">40<span class="text-base text-gray-400 font-medium">/160h</span></p>
            <div class="w-full bg-gray-100 rounded-full h-2 mt-3">
                <div class="bg-blue-500 h-2 rounded-full" style="width: 25%"></div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm text-gray-600">Estágio</span>
                <span class="material-symbols-outlined text-green-600">work</span>
            </div>
            <p class="text-2xl font-bold text-gray-900">120<span class="text-base text-gray-400 font-medium">/240h</span></p>
            <div class="w-full bg-gray-100 rounded-full h-2 mt-3">
                <div class="bg-green-500 h-2 rounded-full" style="width: 50%"></div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Calendário --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold">Junho 2026</h2>
                <button onclick="abrirModal()" class="flex items-center gap-2 px-4 py-2 bg-[#0077fc] text-white rounded-lg text-sm font-medium hover:bg-[#0056c9] transition-colors">
                    <span class="material-symbols-outlined text-[16px]">add</span>
                    Registrar Presença
                </button>
            </div>
            <div class="grid grid-cols-7 gap-1 text-center text-xs mb-2">
                <span class="text-gray-400 font-medium py-1">Dom</span>
                <span class="text-gray-400 font-medium py-1">Seg</span>
                <span class="text-gray-400 font-medium py-1">Ter</span>
                <span class="text-gray-400 font-medium py-1">Qua</span>
                <span class="text-gray-400 font-medium py-1">Qui</span>
                <span class="text-gray-400 font-medium py-1">Sex</span>
                <span class="text-gray-400 font-medium py-1">Sáb</span>
            </div>
            <div id="calendario" class="grid grid-cols-7 gap-1"></div>
            <div class="flex items-center gap-4 mt-4 text-xs text-gray-500">
                <span class="inline-flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-green-500"></span> Ponto registrado</span>
                <span class="inline-flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-[#0077fc]"></span> Hoje</span>
            </div>
        </div>

        {{-- Histórico + Ações --}}
        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold">Histórico Recente</h2>
                    <div class="flex gap-2 text-xs">
                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full font-medium">4 validadas</span>
                        <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded-full font-medium">2 pendentes</span>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-green-500 text-[20px]">check_circle</span>
                            <div>
                                <p class="text-sm font-medium text-gray-900">01/06/2026</p>
                                <p class="text-xs text-gray-500">09:00 – 17:00 (8h)</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full font-medium">Validada</span>
                    </div>
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-green-500 text-[20px]">check_circle</span>
                            <div>
                                <p class="text-sm font-medium text-gray-900">02/06/2026</p>
                                <p class="text-xs text-gray-500">09:00 – 17:00 (8h)</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full font-medium">Validada</span>
                    </div>
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-orange-500 text-[20px]">pending</span>
                            <div>
                                <p class="text-sm font-medium text-gray-900">03/06/2026</p>
                                <p class="text-xs text-gray-500">14:00 – 18:00 (4h)</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 bg-orange-100 text-orange-700 text-xs rounded-full font-medium">Pendente</span>
                    </div>
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-green-500 text-[20px]">check_circle</span>
                            <div>
                                <p class="text-sm font-medium text-gray-900">04/06/2026</p>
                                <p class="text-xs text-gray-500">09:00 – 17:00 (8h)</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full font-medium">Validada</span>
                    </div>
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-orange-500 text-[20px]">pending</span>
                            <div>
                                <p class="text-sm font-medium text-gray-900">05/06/2026</p>
                                <p class="text-xs text-gray-500">09:00 – 13:00 (4h)</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 bg-orange-100 text-orange-700 text-xs rounded-full font-medium">Pendente</span>
                    </div>
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-green-500 text-[20px]">check_circle</span>
                            <div>
                                <p class="text-sm font-medium text-gray-900">08/06/2026</p>
                                <p class="text-xs text-gray-500">09:00 – 17:00 (8h)</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full font-medium">Validada</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <button class="flex items-center justify-center gap-2 py-3 bg-[#0077fc] text-white rounded-lg hover:bg-[#0056c9] transition-colors font-medium text-sm">
                    <span class="material-symbols-outlined text-[18px]">file_download</span>
                    Exportar Histórico
                </button>
                <button class="flex items-center justify-center gap-2 py-3 border-2 border-[#0077fc] text-[#0077fc] rounded-lg hover:bg-blue-50 transition-colors font-medium text-sm">
                    <span class="material-symbols-outlined text-[18px]">task_alt</span>
                    Gerar Ficha Final
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Modal Registrar Presença --}}
<div id="modal-presenca" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-md">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-semibold text-gray-900">Registrar Presença</h2>
            <button onclick="fecharModal()" class="text-gray-400 hover:text-gray-600">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form id="form-presenca" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Data</label>
                <input type="date" name="data" id="p-data"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" required/>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hora de Entrada</label>
                    <input type="time" name="entrada" id="p-entrada"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" required/>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hora de Saída</label>
                    <input type="time" name="saida" id="p-saida"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" required/>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Observações</label>
                <textarea name="observacoes" rows="3"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none"
                    placeholder="Atividades realizadas no período..."></textarea>
            </div>
            <div class="flex items-start gap-2 bg-amber-50 border border-amber-200 rounded-lg px-3 py-2 text-xs text-amber-700">
                <span class="material-symbols-outlined text-[16px] mt-0.5">info</span>
                <span>Registre apenas períodos já encerrados. A validação é feita pelo Supervisor de Estágio Interno.</span>
            </div>
            <button type="submit" class="w-full bg-[#0077fc] text-white py-3 rounded-lg font-medium hover:bg-[#0056c9] transition-colors">
                Registrar Presença
            </button>
        </form>
    </div>
</div>

<script>
// Calendário — Junho 2026 (inicia na segunda-feira)
const diasComPonto = [1, 2, 3, 4, 5, 8, 9, 10, 11, 12, 15];
const hoje = 16;

function montarCalendario() {
    const grid = document.getElementById('calendario');
    let html = '';
    // Junho/2026 começa na segunda (1 espaço em branco para domingo)
    html += '<span></span>';
    for (let d = 1; d <= 30; d++) {
        const temPonto = diasComPonto.includes(d);
        const ehHoje = d === hoje;
        let classes = 'aspect-square flex items-center justify-center rounded-lg text-sm ';
        if (temPonto) classes += 'bg-green-100 text-green-700 font-medium cursor-pointer hover:bg-green-200';
        else if (ehHoje) classes += 'bg-[#0077fc] text-white font-medium';
        else if (d <= hoje) classes += 'text-gray-800';
        else classes += 'text-gray-300';
        const onclick = temPonto ? `onclick="alert('Ponto registrado em ${String(d).padStart(2,'0')}/06/2026')"` : '';
        html += `<span class="${classes}" ${onclick}>${d}</span>`;
    }
    grid.innerHTML = html;
}

function abrirModal() {
    document.getElementById('modal-presenca').classList.remove('hidden');
    const ontem = new Date();
    ontem.setDate(ontem.getDate() - 1);
    document.getElementById('p-data').value = ontem.toISOString().split('T')[0];
    document.getElementById('p-data').max = ontem.toISOString().split('T')[0];
}

function fecharModal() {
    document.getElementById('modal-presenca').classList.add('hidden');
}

document.getElementById('modal-presenca').addEventListener('click', function (e) {
    if (e.target === this) fecharModal();
});

document.getElementById('form-presenca').addEventListener('submit', function (e) {
    e.preventDefault();
    const entrada = document.getElementById('p-entrada').value;
    const saida = document.getElementById('p-saida').value;
    if (saida <= entrada) {
        alert('A hora de saída deve ser posterior à hora de entrada!');
        return;
    }
    fecharModal();
    alert('Presença registrada com sucesso! Aguardando validação do supervisor.');
});

montarCalendario();
</script>
@endsection
