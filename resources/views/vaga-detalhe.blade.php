@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <button onclick="window.location.href='/vagas'"
        class="flex items-center gap-2 text-sm text-gray-600 hover:text-[#0077fc] mb-6">
        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
        Voltar para vagas
    </button>

    {{-- Header gradiente --}}
    <div class="fig-gradient rounded-2xl p-6 mb-6 text-white">
        <div class="flex items-start gap-4">
            <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-[28px]">business</span>
            </div>
            <div>
                <div class="flex flex-wrap items-center gap-2 mb-1">
                    <h1 id="v-titulo" class="text-2xl font-bold"></h1>
                    <span class="px-2 py-0.5 rounded-full bg-green-100 text-green-700 text-xs font-medium">Interno CEFET</span>
                    <span id="v-badge-conveniada" class="hidden inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-blue-100 text-blue-700 text-xs font-medium">
                        <span class="material-symbols-outlined text-[14px]">verified</span>Conveniada
                    </span>
                </div>
                <p id="v-empresa" class="text-blue-100 font-medium"></p>
            </div>
        </div>

        <div class="flex flex-wrap gap-2 mt-4">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white/15 rounded-full text-sm"><span class="material-symbols-outlined text-[16px]">location_on</span><span id="v-cidade"></span></span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white/15 rounded-full text-sm"><span class="material-symbols-outlined text-[16px]">work</span><span id="v-tipo"></span></span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white/15 rounded-full text-sm"><span class="material-symbols-outlined text-[16px]">schedule</span><span id="v-carga"></span></span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white/15 rounded-full text-sm"><span class="material-symbols-outlined text-[16px]">attach_money</span><span id="v-bolsa"></span></span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            {{-- Sobre a vaga --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-3">Sobre a vaga</h2>
                <p id="v-descricao" class="text-gray-600 text-sm leading-relaxed"></p>
            </div>

            {{-- Requisitos --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Requisitos</h2>
                <ul id="v-requisitos" class="space-y-3"></ul>
            </div>
        </div>

        <div class="space-y-6">
            {{-- Detalhes --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Detalhes</h2>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between"><span class="text-gray-500">Área</span><span id="v-area" class="font-medium text-gray-900"></span></div>
                    <div class="flex justify-between"><span class="text-gray-500">Vagas disponíveis</span><span id="v-numvagas" class="font-medium text-gray-900"></span></div>
                    <div class="flex justify-between"><span class="text-gray-500">Data de publicação</span><span id="v-data" class="font-medium text-gray-900"></span></div>
                    <div class="flex justify-between"><span class="text-gray-500">Modalidade</span><span id="v-modalidade" class="font-medium text-gray-900"></span></div>
                </div>
            </div>

            {{-- Ações --}}
            <button onclick="candidatar()" id="btn-candidatar"
                class="w-full flex items-center justify-center gap-2 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors font-medium">
                <span class="material-symbols-outlined text-[20px]">check_circle</span>
                Candidatar-se Agora
            </button>
            <button onclick="salvar()" id="btn-salvar"
                class="w-full flex items-center justify-center gap-2 py-3 border-2 border-[#0077fc] text-[#0077fc] rounded-lg hover:bg-blue-50 transition-colors font-medium">
                <span class="material-symbols-outlined text-[20px]">bookmark</span>
                Salvar para Depois
            </button>

            {{-- Aviso validação --}}
            <div class="bg-amber-50 border border-amber-200 rounded-xl px-4 py-3 text-xs text-amber-700">
                A validação das horas desta vaga é feita exclusivamente pelo Supervisor de Estágio Interno do CEFET.
            </div>
        </div>
    </div>
</div>

<script>
const VAGAS = {
    4: {
        titulo: "Monitor de Cálculo I", empresa: "CEFET-RJ — Departamento de Matemática",
        cidade: "Rio de Janeiro", tipo: "Monitoria", cargaHoraria: "12h/semana", bolsaAuxilio: "Bolsa + Crédito",
        conveniada: true,
        descricao: "Apoio às aulas de Cálculo I do 1º período. O monitor acompanhará as aulas teóricas, atenderá dúvidas dos alunos em horários de plantão e auxiliará na correção de listas de exercícios. É uma excelente oportunidade para consolidar conhecimentos matemáticos, desenvolver didática e ganhar experiência docente enquanto cumpre as horas de estágio interno.",
        requisitos: ["Estar cursando o 3º período ou superior de um curso de Engenharia", "Conceito final A ou B em Cálculo I", "Disponibilidade de 12 horas semanais", "Boa comunicação e didática"],
        area: "Matemática Aplicada", numVagas: 4, dataPublicacao: "2026-05-20", modalidade: "Presencial"
    },
    5: {
        titulo: "Projeto de Extensão — Inclusão Digital", empresa: "CEFET-RJ — Coordenação de Extensão",
        cidade: "Rio de Janeiro", tipo: "Projeto de Extensão", cargaHoraria: "8h/semana", bolsaAuxilio: "Crédito Extra",
        conveniada: false,
        descricao: "Participação em oficinas de inclusão digital voltadas à comunidade do entorno do CEFET. Os alunos ministrarão aulas de informática básica, introdução à programação e letramento digital para diferentes faixas etárias. O projeto contribui diretamente para a formação cidadã e permite cumprir horas de estágio com impacto social.",
        requisitos: ["Estar cursando o 2º período ou superior", "Conhecimento básico de informática", "Interesse em trabalho comunitário", "Disponibilidade de 8 horas semanais"],
        area: "Extensão", numVagas: 8, dataPublicacao: "2026-06-02", modalidade: "Presencial"
    }
};

function formatDate(iso) {
    const d = new Date(iso + 'T12:00:00');
    return d.toLocaleDateString('pt-BR');
}

const id = parseInt('{{ request()->route("id") }}') || 4;
const vaga = VAGAS[id] || VAGAS[4];

document.getElementById('v-titulo').textContent = vaga.titulo;
document.getElementById('v-empresa').textContent = vaga.empresa;
document.getElementById('v-cidade').textContent = vaga.cidade;
document.getElementById('v-tipo').textContent = vaga.tipo;
document.getElementById('v-carga').textContent = vaga.cargaHoraria;
document.getElementById('v-bolsa').textContent = vaga.bolsaAuxilio;
document.getElementById('v-descricao').textContent = vaga.descricao;
document.getElementById('v-area').textContent = vaga.area;
document.getElementById('v-numvagas').textContent = vaga.numVagas;
document.getElementById('v-data').textContent = formatDate(vaga.dataPublicacao);
document.getElementById('v-modalidade').textContent = vaga.modalidade;
document.getElementById('v-badge-conveniada').classList.toggle('hidden', !vaga.conveniada);

document.getElementById('v-requisitos').innerHTML = vaga.requisitos.map(r =>
    `<li class="flex items-start gap-3 text-sm text-gray-600">
        <span class="material-symbols-outlined text-green-600 text-[18px] mt-0.5">check_circle</span>
        <span>${r}</span>
    </li>`).join('');

function candidatar() {
    const btn = document.getElementById('btn-candidatar');
    btn.innerHTML = '<span class="material-symbols-outlined text-[20px]">check_circle</span> Candidatura Enviada!';
    btn.classList.add('bg-green-700');
}

function salvar() {
    const btn = document.getElementById('btn-salvar');
    btn.innerHTML = '<span class="material-symbols-outlined text-[20px]">bookmark_check</span> Salva!';
    btn.classList.add('bg-blue-50');
}
</script>
@endsection
