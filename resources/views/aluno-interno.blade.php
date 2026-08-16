@extends('layouts.app')
@section('content')
<!-- Área interna do aluno (design do Figma) -->
<div class="min-h-screen bg-gray-50 -m-4 sm:-m-6 lg:-m-8 p-4 sm:p-6 lg:p-8" id="area-aluno">

    <!-- Sub-navegação interna -->
    <nav class="max-w-7xl mx-auto mb-8 flex flex-wrap gap-2 animate-in">
        <button class="subnav-btn px-4 py-2 rounded-lg text-sm font-medium bg-[#0077fc] text-white" data-section="dashboard">Dashboard</button>
        <button class="subnav-btn px-4 py-2 rounded-lg text-sm font-medium bg-white text-gray-700 border border-gray-200 hover:bg-gray-50" data-section="vagas">Vagas Internas</button>
        <button class="subnav-btn px-4 py-2 rounded-lg text-sm font-medium bg-white text-gray-700 border border-gray-200 hover:bg-gray-50" data-section="controle-horas">Controle de Horas</button>
        <button class="subnav-btn px-4 py-2 rounded-lg text-sm font-medium bg-white text-gray-700 border border-gray-200 hover:bg-gray-50" data-section="tutorial">Tutorial</button>
        <button class="subnav-btn px-4 py-2 rounded-lg text-sm font-medium bg-white text-gray-700 border border-gray-200 hover:bg-gray-50" data-section="perfil">Meu Perfil</button>
        <button class="subnav-btn px-4 py-2 rounded-lg text-sm font-medium bg-white text-gray-700 border border-gray-200 hover:bg-gray-50" data-section="empresas">Empresas</button>
    </nav>

    <div class="max-w-7xl mx-auto">
        <!-- ============ DASHBOARD ============ -->
        <section class="content-section" id="section-dashboard">
            <!-- Welcome Section -->
            <div class="mb-8 animate-in">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Bem-vindo de volta, {{ session('user_name', 'Aluno') }}!</h1>
                <p class="text-gray-600">Acompanhe seu progresso e gerencie seu estágio</p>
            </div>
            <!-- Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <button class="card-figma p-6 text-left hover:border-[#0077fc]" onclick="showSection('controle-horas')">
                    <div class="inline-flex p-3 rounded-lg bg-blue-50 mb-4">
                        <span class="material-symbols-outlined text-blue-600">schedule</span>
                    </div>
                    <h3 class="text-sm text-gray-600 mb-1">Horas Concluídas</h3>
                    <p class="text-2xl font-bold text-gray-900 mb-1">120h</p>
                    <p class="text-sm text-gray-500">de 240h obrigatórias</p>
                </button>
                <button class="card-figma p-6 text-left hover:border-[#0077fc]" onclick="showSection('controle-horas')">
                    <div class="inline-flex p-3 rounded-lg bg-orange-50 mb-4">
                        <span class="material-symbols-outlined text-orange-600">pending_actions</span>
                    </div>
                    <h3 class="text-sm text-gray-600 mb-1">Presença Pendente</h3>
                    <p class="text-2xl font-bold text-gray-900 mb-1">2</p>
                    <p class="text-sm text-gray-500">aguardando validação</p>
                </button>
                <button class="card-figma p-6 text-left hover:border-[#0077fc]" onclick="showSection('tutorial')">
                    <div class="inline-flex p-3 rounded-lg bg-green-50 mb-4">
                        <span class="material-symbols-outlined text-green-600">menu_book</span>
                    </div>
                    <h3 class="text-sm text-gray-600 mb-1">Tutorial</h3>
                    <p class="text-2xl font-bold text-gray-900 mb-1">Aprenda</p>
                    <p class="text-sm text-gray-500">sobre o processo</p>
                </button>
                <a href="/inscricoes" class="card-figma p-6 text-left no-underline hover:border-[#0077fc] block">
                    <div class="inline-flex p-3 rounded-lg bg-purple-50 mb-4">
                        <span class="material-symbols-outlined text-purple-600">assignment</span>
                    </div>
                    <h3 class="text-sm text-gray-600 mb-1">Candidaturas</h3>
                    <p class="text-2xl font-bold text-gray-900 mb-1">2</p>
                    <p class="text-sm text-gray-500">minhas inscrições</p>
                </a>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Trilha do Estágio -->
                <div class="lg:col-span-2 card-figma p-6 animate-in">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold">Trilha do Estágio</h2>
                        <button class="text-[#0077fc] hover:underline text-sm flex items-center gap-1" onclick="showSection('tutorial')">
                            Ver Tutorial <span class="material-symbols-outlined text-base">arrow_forward</span>
                        </button>
                    </div>
                    <!-- Progresso Geral -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700">Progresso Geral</span>
                            <span class="text-sm font-semibold text-[#0077fc]">50%</span>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill" style="width: 50%"></div>
                        </div>
                    </div>
                    <!-- Steps -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-green-500">check_circle</span>
                            <span class="text-sm text-gray-500">Conceito de Estágio</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-green-500">check_circle</span>
                            <span class="text-sm text-gray-500">Empresas Conveniadas</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-green-500">check_circle</span>
                            <span class="text-sm text-gray-500">Documentação</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full border-4 border-[#0077fc] flex-shrink-0"></div>
                            <span class="text-sm font-semibold text-gray-900">Registro de Presença</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full border-2 border-gray-300 flex-shrink-0"></div>
                            <span class="text-sm text-gray-400">Conclusão</span>
                        </div>
                    </div>
                </div>
                <!-- Estágio Atual -->
                <div class="space-y-6 animate-in">
                    <div class="card-figma p-6">
                        <h2 class="text-xl font-semibold mb-4">Estágio Atual</h2>
                        <div class="space-y-4">
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="material-symbols-outlined text-gray-400 text-lg">business</span>
                                    <span class="text-sm text-gray-600">Empresa</span>
                                </div>
                                <p class="font-medium">Tech Solutions Ltda</p>
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="material-symbols-outlined text-gray-400 text-lg">calendar_month</span>
                                    <span class="text-sm text-gray-600">Período</span>
                                </div>
                                <p class="text-sm">01/03/2026 até 20/12/2026</p>
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="material-symbols-outlined text-gray-400 text-lg">trending_up</span>
                                    <span class="text-sm text-gray-600">Status</span>
                                </div>
                                <span class="badge-pill badge-green">Em Andamento</span>
                            </div>
                        </div>
                        <button onclick="showSection('controle-horas')" class="mt-6 w-full bg-[#0077fc] text-white py-2.5 rounded-lg font-medium hover:bg-[#0056c9] transition-colors flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-lg">schedule</span>
                            Registrar Presença
                        </button>
                    </div>
                    <!-- Documentos -->
                    <div class="card-figma p-6">
                        <h3 class="font-semibold mb-3">Documentos</h3>
                        <div class="space-y-2">
                            <button class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors text-left">
                                <span class="material-symbols-outlined text-[#0077fc]">description</span>
                                <div>
                                    <p class="text-sm font-medium">Termo de Compromisso</p>
                                    <p class="text-xs text-gray-500">Assinado</p>
                                </div>
                            </button>
                            <button class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors text-left">
                                <span class="material-symbols-outlined text-[#0077fc]">description</span>
                                <div>
                                    <p class="text-sm font-medium">Plano de Atividades</p>
                                    <p class="text-xs text-gray-500">Aprovado</p>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============ VAGAS INTERNAS ============ -->
        <section class="content-section hidden" id="section-vagas">
            <div class="mb-6 animate-in">
                <h1 class="text-3xl font-bold text-gray-900 mb-1">Vagas Internas CEFET</h1>
                <p class="text-gray-500">Monitoria, projetos de extensão e estágios internos</p>
            </div>
            <div class="flex items-start gap-3 bg-blue-50 border border-blue-200 rounded-xl px-4 py-3 mb-6 animate-in">
                <span class="material-symbols-outlined text-blue-500 mt-0.5">info</span>
                <p class="text-sm text-blue-800">
                    Estas vagas são gerenciadas internamente pelo CEFET. A validação das horas é feita exclusivamente
                    pelo <strong>Supervisor de Estágio Interno</strong> designado pelo seu departamento.
                </p>
            </div>
            <!-- Busca -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6 animate-in">
                <div class="p-4 flex flex-col sm:flex-row gap-3">
                    <div class="flex-1 relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xl">search</span>
                        <input type="text" id="busca-vagas" onkeyup="filtrarVagas()" placeholder="Buscar por título ou palavra-chave…" class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" />
                    </div>
                </div>
            </div>
            <p class="text-sm text-gray-500 mb-4" id="contagem-vagas">4 vagas encontradas</p>
            <div class="space-y-4" id="lista-vagas">
                <!-- Vaga 1 -->
                <div class="vaga-item bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-[#0077fc] transition-all cursor-pointer p-5 animate-in">
                    <div class="flex flex-col lg:flex-row lg:items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-green-700">school</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex flex-wrap items-start gap-2 mb-1">
                                <h3 class="text-base font-semibold text-gray-900 leading-snug">Monitor de Cálculo I</h3>
                                <span class="badge-pill badge-green">Interno CEFET</span>
                            </div>
                            <p class="text-sm text-gray-500 font-medium mb-3">CEFET-RJ</p>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-gray-100 text-gray-600 rounded-full text-xs"><span class="material-symbols-outlined text-sm">location_on</span>Rio de Janeiro</span>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-gray-100 text-gray-600 rounded-full text-xs"><span class="material-symbols-outlined text-sm">work</span>Presencial</span>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-gray-100 text-gray-600 rounded-full text-xs"><span class="material-symbols-outlined text-sm">schedule</span>12h semanais</span>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-gray-100 text-gray-600 rounded-full text-xs"><span class="material-symbols-outlined text-sm">payments</span>Bolsa CEFET</span>
                            </div>
                            <div class="flex flex-wrap gap-1 mb-3">
                                <span class="px-2 py-0.5 bg-purple-50 text-purple-700 rounded text-xs">Engenharia de Computação</span>
                                <span class="px-2 py-0.5 bg-purple-50 text-purple-700 rounded text-xs">Engenharia Elétrica</span>
                                <span class="px-2 py-0.5 bg-purple-50 text-purple-700 rounded text-xs">Sistemas de Informação</span>
                            </div>
                            <p class="text-sm text-gray-500 line-clamp-2">Programa de monitoria interna do CEFET para apoio aos alunos de Cálculo I. O monitor auxilia nas aulas práticas e atendimentos extracurriculares.</p>
                        </div>
                        <div class="flex items-center lg:self-center flex-shrink-0">
                            <button onclick="event.stopPropagation(); candidatarVaga(this)" class="px-5 py-2.5 bg-[#0077fc] text-white rounded-lg font-medium hover:bg-[#0056c9] transition-colors">
                                Candidatar-se
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Vaga 2 -->
                <div class="vaga-item bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-[#0077fc] transition-all cursor-pointer p-5 animate-in">
                    <div class="flex flex-col lg:flex-row lg:items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-green-700">school</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex flex-wrap items-start gap-2 mb-1">
                                <h3 class="text-base font-semibold text-gray-900 leading-snug">Projeto de Extensão — Inclusão Digital</h3>
                                <span class="badge-pill badge-green">Interno CEFET</span>
                            </div>
                            <p class="text-sm text-gray-500 font-medium mb-3">CEFET-RJ</p>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-gray-100 text-gray-600 rounded-full text-xs"><span class="material-symbols-outlined text-sm">location_on</span>Rio de Janeiro</span>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-gray-100 text-gray-600 rounded-full text-xs"><span class="material-symbols-outlined text-sm">work</span>Híbrido</span>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-gray-100 text-gray-600 rounded-full text-xs"><span class="material-symbols-outlined text-sm">schedule</span>20h semanais</span>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-gray-100 text-gray-600 rounded-full text-xs"><span class="material-symbols-outlined text-sm">payments</span>Bolsa CEFET</span>
                            </div>
                            <div class="flex flex-wrap gap-1 mb-3">
                                <span class="px-2 py-0.5 bg-purple-50 text-purple-700 rounded text-xs">Todos os cursos</span>
                            </div>
                            <p class="text-sm text-gray-500 line-clamp-2">Projeto de extensão voltado à capacitação digital de comunidades carentes em parceria com o laboratório de informática do CEFET.</p>
                        </div>
                        <div class="flex items-center lg:self-center flex-shrink-0">
                            <button onclick="event.stopPropagation(); candidatarVaga(this)" class="px-5 py-2.5 bg-[#0077fc] text-white rounded-lg font-medium hover:bg-[#0056c9] transition-colors">
                                Candidatar-se
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============ CONTROLE DE HORAS ============ -->
        <section class="content-section hidden" id="section-controle-horas">
            <div class="mb-8 animate-in">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Controle de Horas</h1>
                        <p class="text-gray-600">Gerencie e acompanhe seu registro de presença</p>
                    </div>
                    <button onclick="abrirModalPresenca()" class="flex items-center justify-center gap-2 px-6 py-3 bg-[#0077fc] text-white rounded-lg hover:bg-[#0056c9] transition-colors font-medium">
                        <span class="material-symbols-outlined text-xl">add</span>
                        Registrar Presença
                    </button>
                </div>
            </div>
            <!-- Cards de categorias -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="card-figma p-6 animate-in">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold text-gray-900">Projetos de Extensão</h3>
                        <div class="p-2 bg-purple-50 rounded-lg">
                            <span class="material-symbols-outlined text-purple-600">extension</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-3xl font-bold text-gray-900">80h</span>
                        <span class="text-sm text-gray-500">de 160h</span>
                    </div>
                    <div class="progress-track mb-3"><div class="progress-fill !bg-purple-500" style="width: 50%"></div></div>
                    <p class="text-sm text-gray-600">Projetos de extensão podem computar até 160 horas.</p>
                </div>
                <div class="card-figma p-6 animate-in">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold text-gray-900">Monitoria</h3>
                        <div class="p-2 bg-blue-50 rounded-lg">
                            <span class="material-symbols-outlined text-blue-600">school</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-3xl font-bold text-gray-900">40h</span>
                        <span class="text-sm text-gray-500">de 160h</span>
                    </div>
                    <div class="progress-track mb-3"><div class="progress-fill !bg-blue-500" style="width: 25%"></div></div>
                    <p class="text-sm text-gray-600">Monitoria pode computar até 160 horas.</p>
                </div>
                <div class="card-figma p-6 animate-in">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold text-gray-900">Estágio Obrigatório</h3>
                        <div class="p-2 bg-green-50 rounded-lg">
                            <span class="material-symbols-outlined text-green-600">work_history</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-3xl font-bold text-gray-900">120h</span>
                        <span class="text-sm text-gray-500">de 240h</span>
                    </div>
                    <div class="progress-track mb-3"><div class="progress-fill !bg-green-500" style="width: 50%"></div></div>
                    <p class="text-sm text-gray-600">Estágio obrigatório exige 240 horas mínimas.</p>
                </div>
            </div>
            <!-- Calendário + Presenças -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 card-figma p-6 animate-in">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold">Calendário de Presenças</h2>
                        <div class="flex items-center gap-2">
                            <button onclick="mudarMes(-1)" class="p-2 hover:bg-gray-100 rounded-lg transition-colors"><span class="material-symbols-outlined">chevron_left</span></button>
                            <span class="font-medium min-w-[150px] text-center" id="mes-atual">Junho 2026</span>
                            <button onclick="mudarMes(1)" class="p-2 hover:bg-gray-100 rounded-lg transition-colors"><span class="material-symbols-outlined">chevron_right</span></button>
                        </div>
                    </div>
                    <div class="grid grid-cols-7 gap-2" id="grade-calendario"></div>
                    <div class="flex items-center gap-6 mt-6 pt-6 border-t border-gray-200">
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            <span class="text-sm text-gray-600">Presença registrada</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                            <span class="text-sm text-gray-600">Dia sem registro</span>
                        </div>
                    </div>
                </div>
                <!-- Presenças recentes -->
                <div class="card-figma p-6 animate-in">
                    <h2 class="text-xl font-semibold mb-4">Presenças Recentes</h2>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div>
                                <p class="text-sm font-medium">02/06/2026</p>
                                <p class="text-xs text-gray-500">08:00 - 12:00</p>
                            </div>
                            <span class="badge-pill badge-green">Validada</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div>
                                <p class="text-sm font-medium">03/06/2026</p>
                                <p class="text-xs text-gray-500">08:00 - 12:00</p>
                            </div>
                            <span class="badge-pill badge-green">Validada</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div>
                                <p class="text-sm font-medium">04/06/2026</p>
                                <p class="text-xs text-gray-500">08:00 - 12:00</p>
                            </div>
                            <span class="badge-pill badge-green">Validada</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div>
                                <p class="text-sm font-medium">05/06/2026</p>
                                <p class="text-xs text-gray-500">08:00 - 12:00</p>
                            </div>
                            <span class="badge-pill badge-yellow">Pendente</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div>
                                <p class="text-sm font-medium">09/06/2026</p>
                                <p class="text-xs text-gray-500">08:00 - 12:00</p>
                            </div>
                            <span class="badge-pill badge-yellow">Pendente</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============ TUTORIAL ============ -->
        <section class="content-section hidden" id="section-tutorial">
            <div class="mb-8 animate-in">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Tutorial do Estágio</h1>
                <p class="text-gray-600">Aprenda sobre o processo de estágio interno do CEFET</p>
            </div>
            <div class="space-y-6">
                <div class="card-figma p-6 animate-in flex gap-4">
                    <div class="w-10 h-10 rounded-full bg-[#0077fc] text-white flex items-center justify-center font-bold flex-shrink-0">1</div>
                    <div>
                        <h2 class="text-xl font-semibold mb-2">Conceito de Estágio</h2>
                        <p class="text-gray-600 mb-3">O estágio é uma atividade acadêmica que complementa sua formação, proporcionando experiência prática na área de estudo.</p>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Estágio Obrigatório: 240 horas mínimas</li>
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Projetos de Extensão: até 160 horas</li>
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Monitoria: até 160 horas</li>
                        </ul>
                    </div>
                </div>
                <div class="card-figma p-6 animate-in flex gap-4">
                    <div class="w-10 h-10 rounded-full bg-[#0077fc] text-white flex items-center justify-center font-bold flex-shrink-0">2</div>
                    <div>
                        <h2 class="text-xl font-semibold mb-2">Tipos de Estágio</h2>
                        <p class="text-gray-600 mb-3">Conheça os diferentes tipos de estágio e como cada um contribui para sua formação acadêmica.</p>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Estágio Obrigatório: Requisito para conclusão do curso</li>
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Estágio Não-Obrigatório: Complementar à formação</li>
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Equivalências: Projetos e Monitoria podem substituir parcialmente</li>
                        </ul>
                    </div>
                </div>
                <div class="card-figma p-6 animate-in flex gap-4">
                    <div class="w-10 h-10 rounded-full bg-[#0077fc] text-white flex items-center justify-center font-bold flex-shrink-0">3</div>
                    <div>
                        <h2 class="text-xl font-semibold mb-2">Horas Obrigatórias</h2>
                        <p class="text-gray-600 mb-3">Entenda a carga horária necessária e como computar suas atividades complementares.</p>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Total obrigatório: 240 horas de estágio</li>
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Até 160h de Projetos de Extensão podem ser computadas</li>
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Até 160h de Monitoria podem ser computadas</li>
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Máximo de 160h de equivalências no total</li>
                        </ul>
                    </div>
                </div>
                <div class="card-figma p-6 animate-in flex gap-4">
                    <div class="w-10 h-10 rounded-full bg-[#0077fc] text-white flex items-center justify-center font-bold flex-shrink-0">4</div>
                    <div>
                        <h2 class="text-xl font-semibold mb-2">Empresas Conveniadas</h2>
                        <p class="text-gray-600 mb-3">O CEFET possui convênios com diversas empresas. Escolha uma empresa parceira para facilitar o processo.</p>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Mais de 48 empresas conveniadas</li>
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Processo simplificado de documentação</li>
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Segurança jurídica garantida</li>
                        </ul>
                    </div>
                </div>
                <div class="card-figma p-6 animate-in flex gap-4">
                    <div class="w-10 h-10 rounded-full bg-[#0077fc] text-white flex items-center justify-center font-bold flex-shrink-0">5</div>
                    <div>
                        <h2 class="text-xl font-semibold mb-2">Currículo e Candidatura</h2>
                        <p class="text-gray-600 mb-3">Prepare seu currículo e candidate-se às vagas disponíveis no portal.</p>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Mantenha seu perfil atualizado</li>
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Destaque suas habilidades e experiências</li>
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Candidate-se às vagas que combinam com seu perfil</li>
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined text-green-500 text-lg">check_circle</span> Acompanhe o status das suas candidaturas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============ PERFIL ============ -->
        <section class="content-section hidden" id="section-perfil">
            <div class="mb-8 animate-in">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Meu Perfil</h1>
                <p class="text-gray-600">Gerencie suas informações pessoais</p>
            </div>
            <div class="max-w-2xl">
                <div class="card-figma p-6 animate-in">
                    <div class="flex items-center gap-4 mb-6 pb-6 border-b border-gray-100">
                        <div class="w-16 h-16 bg-[#0077fc] rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-3xl text-white">person</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold">{{ session('user_name', 'Aluno') }}</h2>
                            <p class="text-sm text-gray-500 capitalize">{{ session('user_type', 'aluno') }}</p>
                        </div>
                    </div>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nome Completo</label>
                            <input type="text" class="input-figma" value="{{ session('user_name', '') }}" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">E-mail Institucional</label>
                            <input type="email" class="input-figma" value="{{ session('user_email', '') }}" />
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Matrícula</label>
                                <input type="text" class="input-figma" value="{{ session('user_matricula', '') }}" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Curso</label>
                                <input type="text" class="input-figma" value="Engenharia de Computação" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
                            <input type="tel" class="input-figma" placeholder="(21) 99999-9999" />
                        </div>
                        <button type="button" onclick="salvarPerfil(this)" class="btn-primary mt-4 flex items-center gap-2">
                            <span class="material-symbols-outlined text-xl">save</span>
                            Salvar Alterações
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!-- ============ EMPRESAS ============ -->
        <section class="content-section hidden" id="section-empresas">
            <div class="mb-8 animate-in">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Empresas Conveniadas</h1>
                <p class="text-gray-600">Conheça as empresas parceiras do CEFET</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6 animate-in">
                <div class="p-4">
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xl">search</span>
                        <input type="text" id="busca-empresas" onkeyup="filtrarEmpresas()" placeholder="Buscar empresa..." class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" />
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="lista-empresas">
                <div class="empresa-item card-figma p-6 animate-in">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[#0077fc]">business</span>
                        </div>
                        <h3 class="font-semibold text-gray-900">Tech Solutions Ltda</h3>
                    </div>
                    <div class="space-y-2 text-sm text-gray-600">
                        <p class="flex items-center gap-2"><span class="material-symbols-outlined text-base">badge</span> 12.345.678/0001-90</p>
                        <p class="flex items-center gap-2"><span class="material-symbols-outlined text-base">location_on</span> Rio de Janeiro, RJ</p>
                        <p class="flex items-center gap-2"><span class="material-symbols-outlined text-base">event</span> Convênio válido até 31/12/2027</p>
                    </div>
                    <span class="badge-pill badge-green mt-4">Ativa</span>
                </div>
                <div class="empresa-item card-figma p-6 animate-in">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[#0077fc]">business</span>
                        </div>
                        <h3 class="font-semibold text-gray-900">Inovação Digital S.A.</h3>
                    </div>
                    <div class="space-y-2 text-sm text-gray-600">
                        <p class="flex items-center gap-2"><span class="material-symbols-outlined text-base">badge</span> 98.765.432/0001-10</p>
                        <p class="flex items-center gap-2"><span class="material-symbols-outlined text-base">location_on</span> São Paulo, SP</p>
                        <p class="flex items-center gap-2"><span class="material-symbols-outlined text-base">event</span> Convênio válido até 15/08/2026</p>
                    </div>
                    <span class="badge-pill badge-green mt-4">Ativa</span>
                </div>
                <div class="empresa-item card-figma p-6 animate-in">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[#0077fc]">business</span>
                        </div>
                        <h3 class="font-semibold text-gray-900">Consultoria Tech</h3>
                    </div>
                    <div class="space-y-2 text-sm text-gray-600">
                        <p class="flex items-center gap-2"><span class="material-symbols-outlined text-base">badge</span> 11.222.333/0001-44</p>
                        <p class="flex items-center gap-2"><span class="material-symbols-outlined text-base">location_on</span> Belo Horizonte, MG</p>
                        <p class="flex items-center gap-2"><span class="material-symbols-outlined text-base">event</span> Convênio válido até 20/03/2027</p>
                    </div>
                    <span class="badge-pill badge-green mt-4">Ativa</span>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Modal de registro de presença -->
<div id="modal-presenca" class="hidden fixed inset-0 z-[100] bg-black/50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl p-6 w-full max-w-md">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold">Registrar Presença</h3>
            <button onclick="fecharModalPresenca()" class="p-1 hover:bg-gray-100 rounded-lg">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Data</label>
                <input type="date" class="input-figma" />
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Entrada</label>
                    <input type="time" class="input-figma" value="08:00" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Saída</label>
                    <input type="time" class="input-figma" value="12:00" />
                </div>
            </div>
            <button onclick="registrarPresenca()" class="w-full bg-[#0077fc] text-white py-3 rounded-lg font-medium hover:bg-[#0056c9] transition-colors">
                Confirmar Registro
            </button>
        </div>
    </div>
</div>

<script>
    // ── Navegação entre seções internas ──────────────────────────
    const MONTHS = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];
    let mesAtual = new Date(2026, 5, 1);
    const diasComPresenca = [2, 3, 4, 5, 6, 9];

    function showSection(name) {
        document.querySelectorAll('.content-section').forEach(s => s.classList.add('hidden'));
        const target = document.getElementById('section-' + name);
        if (target) target.classList.remove('hidden');
        document.querySelectorAll('.subnav-btn').forEach(btn => {
            if (btn.dataset.section === name) {
                btn.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-200', 'hover:bg-gray-50');
                btn.classList.add('bg-[#0077fc]', 'text-white');
            } else {
                btn.classList.remove('bg-[#0077fc]', 'text-white');
                btn.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200', 'hover:bg-gray-50');
            }
        });
        if (name === 'controle-horas') renderizarCalendario();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    document.querySelectorAll('.subnav-btn').forEach(btn => {
        btn.addEventListener('click', () => showSection(btn.dataset.section));
    });

    // ── Seleção de seção via URL (?secao=) ───────────────────────
    const params = new URLSearchParams(window.location.search);
    if (params.has('secao')) showSection(params.get('secao'));

    // ── Calendário ───────────────────────────────────────────────
    function renderizarCalendario() {
        const grade = document.getElementById('grade-calendario');
        const label = document.getElementById('mes-atual');
        label.textContent = MONTHS[mesAtual.getMonth()] + ' ' + mesAtual.getFullYear();
        grade.innerHTML = '';
        const days = ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'];
        days.forEach(d => {
            grade.innerHTML += '<div class="text-center text-sm font-semibold text-gray-600 py-2">' + d + '</div>';
        });
        const daysInMonth = new Date(mesAtual.getFullYear(), mesAtual.getMonth() + 1, 0).getDate();
        const start = new Date(mesAtual.getFullYear(), mesAtual.getMonth(), 1).getDay();
        for (let i = 0; i < start; i++) grade.innerHTML += '<div></div>';
        for (let d = 1; d <= daysInMonth; d++) {
            const has = diasComPresenca.includes(d);
            grade.innerHTML += '<div class="aspect-square flex items-center justify-center rounded-lg text-sm relative ' + (has ? 'bg-blue-50 text-[#0077fc] font-semibold' : 'text-gray-600') + '">' + d + (has ? '<div class="absolute bottom-1 left-1/2 -translate-x-1/2 w-1.5 h-1.5 bg-green-500 rounded-full"></div>' : '') + '</div>';
        }
    }
    function mudarMes(dir) {
        mesAtual.setMonth(mesAtual.getMonth() + dir);
        renderizarCalendario();
    }

    // ── Modal de presença ────────────────────────────────────────
    function abrirModalPresenca() {
        const modal = document.getElementById('modal-presenca');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }
    function fecharModalPresenca() {
        const modal = document.getElementById('modal-presenca');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
    function registrarPresenca() {
        fecharModalPresenca();
        alert('Presença registrada com sucesso! Aguardando validação do Supervisor de Estágio Interno.');
    }

    // ── Candidatar-se em vaga ────────────────────────────────────
    function candidatarVaga(btn) {
        const original = btn.textContent;
        btn.textContent = 'Candidatura enviada!';
        btn.classList.remove('bg-[#0077fc]', 'hover:bg-[#0056c9]');
        btn.classList.add('bg-green-600');
        setTimeout(() => {
            btn.textContent = original;
            btn.classList.remove('bg-green-600');
            btn.classList.add('bg-[#0077fc]', 'hover:bg-[#0056c9]');
        }, 2500);
    }

    // ── Busca de vagas ───────────────────────────────────────────
    function filtrarVagas() {
        const term = document.getElementById('busca-vagas').value.toLowerCase();
        let count = 0;
        document.querySelectorAll('.vaga-item').forEach(item => {
            const match = item.textContent.toLowerCase().includes(term);
            item.classList.toggle('hidden', !match);
            if (match) count++;
        });
        document.getElementById('contagem-vagas').textContent = count + ' ' + (count === 1 ? 'vaga encontrada' : 'vagas encontradas');
    }

    // ── Busca de empresas ────────────────────────────────────────
    function filtrarEmpresas() {
        const term = document.getElementById('busca-empresas').value.toLowerCase();
        document.querySelectorAll('.empresa-item').forEach(item => {
            item.classList.toggle('hidden', !item.textContent.toLowerCase().includes(term));
        });
    }

    // ── Salvar perfil ────────────────────────────────────────────
    function salvarPerfil(btn) {
        const original = btn.textContent;
        btn.textContent = 'Salvo com sucesso!';
        btn.classList.add('!bg-green-600');
        setTimeout(() => {
            btn.textContent = original;
            btn.classList.remove('!bg-green-600');
        }, 2500);
    }
</script>
@endsection
