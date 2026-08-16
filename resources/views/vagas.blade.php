@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Cabeçalho --}}
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-1">Vagas Internas CEFET</h1>
        <p class="text-gray-500">Monitoria, projetos de extensão e estágios internos</p>
    </div>

    {{-- Banner informativo --}}
    <div class="flex items-start gap-3 bg-blue-50 border border-blue-200 rounded-xl px-4 py-3 mb-6">
        <span class="material-symbols-outlined text-blue-500 text-[20px] mt-0.5">info</span>
        <p class="text-sm text-blue-800">
            Estas vagas são gerenciadas internamente pelo CEFET. A validação das horas é feita exclusivamente
            pelo <strong>Supervisor de Estágio Interno</strong> designado pelo seu departamento.
        </p>
    </div>

    {{-- Barra de busca + filtros --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6 overflow-hidden">
        <div class="p-4 flex flex-col sm:flex-row gap-3">
            <div class="flex-1 relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[18px] text-gray-400">search</span>
                <input type="text" id="busca" oninput="filtrar()" placeholder="Buscar por título ou palavra-chave…"
                    class="w-full pl-9 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none"/>
            </div>
            <button onclick="toggleFiltros()" id="btn-filtros"
                class="flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg border-2 border-gray-200 text-gray-600 text-sm font-medium hover:bg-gray-50 transition-colors">
                <span class="material-symbols-outlined text-[18px]">tune</span>
                Filtros
                <span id="badge-filtros" class="hidden ml-1 w-5 h-5 rounded-full bg-[#0077fc] text-white text-xs flex items-center justify-center">0</span>
            </button>
        </div>

        <div id="painel-filtros" class="hidden px-4 pb-5 pt-1 border-t border-gray-100">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Cidade</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-2.5 top-1/2 -translate-y-1/2 text-[18px] text-gray-400">location_on</span>
                        <select id="filtro-cidade" onchange="filtrar()"
                            class="w-full pl-8 pr-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none bg-white">
                            <option value="">Todas as cidades</option>
                            <option value="Rio de Janeiro">Rio de Janeiro</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Curso</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-2.5 top-1/2 -translate-y-1/2 text-[18px] text-gray-400">school</span>
                        <select id="filtro-curso" onchange="filtrar()"
                            class="w-full pl-8 pr-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none bg-white">
                            <option value="">Todos os cursos</option>
                            <option value="Engenharia de Computação">Engenharia de Computação</option>
                            <option value="Engenharia Civil">Engenharia Civil</option>
                            <option value="Engenharia Mecânica">Engenharia Mecânica</option>
                            <option value="Engenharia Elétrica">Engenharia Elétrica</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col justify-between">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Empresa conveniada</label>
                    <button id="btn-conveniada" onclick="toggleConveniada()"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg border-2 border-gray-200 text-gray-500 text-sm font-medium hover:border-gray-300 transition-all">
                        <span class="material-symbols-outlined text-[18px]">verified</span>
                        <span id="texto-conveniada">Todas</span>
                    </button>
                </div>
            </div>

            <div id="chips-filtros" class="hidden flex flex-wrap gap-2 pt-3 border-t border-gray-100"></div>
        </div>
    </div>

    {{-- Contagem --}}
    <p id="contagem" class="text-sm text-gray-500 mb-4"></p>

    {{-- Lista --}}
    <div id="lista-vagas" class="space-y-4"></div>

    {{-- Empty state --}}
    <div id="empty-state" class="hidden bg-white rounded-xl p-12 text-center shadow-sm border border-gray-200">
        <span class="material-symbols-outlined text-gray-200 text-[56px]">school</span>
        <h3 class="text-lg font-semibold text-gray-900 mb-1 mt-4">Nenhuma vaga encontrada</h3>
        <p class="text-sm text-gray-500 mb-5">Tente ajustar os filtros para ver mais resultados</p>
        <button onclick="limparFiltros()" class="px-5 py-2.5 bg-[#0077fc] text-white rounded-lg hover:bg-[#0056c9] transition-colors text-sm font-medium">
            Limpar filtros
        </button>
    </div>
</div>

{{-- Dados das vagas (mock do Figma) --}}
<script>
const VAGAS = [
    {
        id: 4, titulo: "Monitor de Cálculo I", empresa: "CEFET-RJ — Departamento de Matemática",
        cidade: "Rio de Janeiro", tipo: "Monitoria", cargaHoraria: "12h/semana", bolsaAuxilio: "Bolsa + Crédito",
        cursos: ["Engenharia de Computação", "Engenharia Civil", "Engenharia Mecânica", "Engenharia Elétrica"],
        interna: true, conveniada: true, interno: true,
        descricao: "Apoio às aulas de Cálculo I do 1º período: monitoria em sala, atendimento de dúvidas e correção de listas de exercícios.",
        requisitos: ["Estar cursando o 3º período ou superior", "Conceito final A ou B em Cálculo I", "Disponibilidade de 12h semanais", "Boa comunicação e didática"],
        area: "Matemática Aplicada", numVagas: 4, dataPublicacao: "2026-05-20", modalidade: "Presencial"
    },
    {
        id: 5, titulo: "Projeto de Extensão — Inclusão Digital", empresa: "CEFET-RJ — Coordenação de Extensão",
        cidade: "Rio de Janeiro", tipo: "Projeto de Extensão", cargaHoraria: "8h/semana", bolsaAuxilio: "Crédito Extra",
        cursos: ["Engenharia de Computação", "Engenharia Elétrica"],
        interna: true, conveniada: false, interno: true,
        descricao: "Oficinas de inclusão digital para a comunidade do entorno: ensino de informática básica, programação e letramento digital.",
        requisitos: ["Estar cursando o 2º período ou superior", "Conhecimento básico de informática", "Interesse em trabalho comunitário", "Disponibilidade de 8h semanais"],
        area: "Extensão", numVagas: 8, dataPublicacao: "2026-06-02", modalidade: "Presencial"
    }
];

let conveniada = false;

function toggleFiltros() {
    const painel = document.getElementById('painel-filtros');
    painel.classList.toggle('hidden');
    const btn = document.getElementById('btn-filtros');
    if (!painel.classList.contains('hidden')) {
        btn.classList.add('border-[#0077fc]', 'bg-blue-50', 'text-[#0077fc]');
        btn.classList.remove('border-gray-200', 'text-gray-600');
    } else {
        btn.classList.remove('border-[#0077fc]', 'bg-blue-50', 'text-[#0077fc]');
        btn.classList.add('border-gray-200', 'text-gray-600');
    }
}

function toggleConveniada() {
    conveniada = !conveniada;
    const btn = document.getElementById('btn-conveniada');
    document.getElementById('texto-conveniada').textContent = conveniada ? 'Somente conveniadas' : 'Todas';
    if (conveniada) {
        btn.classList.add('border-[#0077fc]', 'bg-blue-50', 'text-[#0077fc]');
        btn.classList.remove('border-gray-200', 'text-gray-500');
    } else {
        btn.classList.remove('border-[#0077fc]', 'bg-blue-50', 'text-[#0077fc]');
        btn.classList.add('border-gray-200', 'text-gray-500');
    }
    filtrar();
}

function contarAtivos() {
    let n = 0;
    if (document.getElementById('filtro-cidade').value) n++;
    if (document.getElementById('filtro-curso').value) n++;
    if (conveniada) n++;
    return n;
}

function renderChips() {
    const chips = document.getElementById('chips-filtros');
    const cidade = document.getElementById('filtro-cidade').value;
    const curso = document.getElementById('filtro-curso').value;
    let html = '';
    if (cidade) html += `<span class="inline-flex items-center gap-1 px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">
        <span class="material-symbols-outlined text-[14px]">location_on</span>${cidade}
        <button onclick="document.getElementById('filtro-cidade').value='';filtrar()" class="ml-1 hover:text-blue-900"><span class="material-symbols-outlined text-[14px]">close</span></button></span>`;
    if (curso) html += `<span class="inline-flex items-center gap-1 px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">
        <span class="material-symbols-outlined text-[14px]">school</span>${curso}
        <button onclick="document.getElementById('filtro-curso').value='';filtrar()" class="ml-1 hover:text-purple-900"><span class="material-symbols-outlined text-[14px]">close</span></button></span>`;
    if (conveniada) html += `<span class="inline-flex items-center gap-1 px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">
        <span class="material-symbols-outlined text-[14px]">verified</span>Conveniadas
        <button onclick="toggleConveniada()" class="ml-1 hover:text-blue-900"><span class="material-symbols-outlined text-[14px]">close</span></button></span>`;
    html += `<button onclick="limparFiltros()" class="text-xs text-gray-400 hover:text-gray-600 underline px-1">Limpar tudo</button>`;
    chips.innerHTML = html;
    chips.classList.toggle('hidden', contarAtivos() === 0);
}

function renderCard(vaga) {
    const cursos = vaga.cursos.map(c => `<span class="px-2 py-0.5 bg-purple-50 text-purple-700 rounded text-xs">${c}</span>`).join('');
    return `
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-[#0077fc] transition-all cursor-pointer" onclick="window.location.href='/vagas/${vaga.id}'">
        <div class="p-5 flex flex-col lg:flex-row lg:items-start gap-4">
            <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-green-700 text-[24px]">school</span>
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex flex-wrap items-start gap-2 mb-1">
                    <h3 class="text-base font-semibold text-gray-900 leading-snug">${vaga.titulo}</h3>
                    <span class="px-2 py-0.5 rounded-full bg-green-100 text-green-700 text-xs font-medium">Interno CEFET</span>
                    ${vaga.conveniada ? `<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-blue-50 text-blue-700 text-xs font-medium"><span class="material-symbols-outlined text-[14px]">verified</span>Conveniada</span>` : ''}
                </div>
                <p class="text-sm text-gray-500 font-medium mb-3">${vaga.empresa}</p>
                <div class="flex flex-wrap gap-2 mb-3">
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-gray-100 text-gray-600 rounded-full text-xs"><span class="material-symbols-outlined text-[14px]">location_on</span>${vaga.cidade}</span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-gray-100 text-gray-600 rounded-full text-xs"><span class="material-symbols-outlined text-[14px]">work</span>${vaga.tipo}</span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-gray-100 text-gray-600 rounded-full text-xs"><span class="material-symbols-outlined text-[14px]">schedule</span>${vaga.cargaHoraria}</span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-gray-100 text-gray-600 rounded-full text-xs"><span class="material-symbols-outlined text-[14px]">attach_money</span>${vaga.bolsaAuxilio}</span>
                </div>
                <div class="flex flex-wrap gap-1 mb-3">${cursos}</div>
                <p class="text-sm text-gray-500 line-clamp-2">${vaga.descricao}</p>
                <div class="flex items-center gap-1.5 mt-3 text-xs text-amber-700 bg-amber-50 px-3 py-1.5 rounded-lg w-fit">
                    <span class="material-symbols-outlined text-[16px]">verified</span>
                    Validação exclusiva pelo Supervisor de Estágio Interno
                </div>
            </div>
            <div class="flex items-center lg:self-center flex-shrink-0">
                <button onclick="event.stopPropagation(); window.location.href='/vagas/${vaga.id}'"
                    class="px-5 py-2.5 bg-[#0077fc] text-white rounded-lg hover:bg-[#0056c9] transition-colors text-sm font-medium whitespace-nowrap">
                    Ver detalhes
                </button>
            </div>
        </div>
    </div>`;
}

function filtrar() {
    const busca = document.getElementById('busca').value.toLowerCase();
    const cidade = document.getElementById('filtro-cidade').value;
    const curso = document.getElementById('filtro-curso').value;
    const filtradas = VAGAS.filter(v => {
        const matchBusca = !busca || v.titulo.toLowerCase().includes(busca) || v.empresa.toLowerCase().includes(busca) || v.descricao.toLowerCase().includes(busca);
        const matchCidade = !cidade || v.cidade === cidade;
        const matchCurso = !curso || v.cursos.includes(curso);
        const matchConveniada = !conveniada || v.conveniada;
        return matchBusca && matchCidade && matchCurso && matchConveniada;
    });
    document.getElementById('lista-vagas').innerHTML = filtradas.map(renderCard).join('');
    document.getElementById('contagem').textContent = `${filtradas.length} ${filtradas.length === 1 ? 'vaga encontrada' : 'vagas encontradas'}`;
    document.getElementById('empty-state').classList.toggle('hidden', filtradas.length > 0);
    document.getElementById('lista-vagas').classList.toggle('hidden', filtradas.length === 0);
    const badge = document.getElementById('badge-filtros');
    const n = contarAtivos();
    badge.textContent = n;
    badge.classList.toggle('hidden', n === 0);
    renderChips();
}

function limparFiltros() {
    document.getElementById('busca').value = '';
    document.getElementById('filtro-cidade').value = '';
    document.getElementById('filtro-curso').value = '';
    if (conveniada) toggleConveniada();
    filtrar();
}

filtrar();
</script>
@endsection
