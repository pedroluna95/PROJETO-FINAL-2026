@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Hero --}}
    <div class="fig-gradient rounded-2xl p-8 mb-8 text-white">
        <h1 class="text-3xl font-bold mb-2">Trilha Completa do Estágio</h1>
        <p class="text-blue-100">9 etapas para você completar seu estágio com segurança e sem dúvidas</p>
        <div class="flex flex-wrap gap-4 mt-6 text-sm">
            <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/15 rounded-full">
                <span class="material-symbols-outlined text-[16px]">route</span> 9 Etapas
            </span>
            <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/15 rounded-full">
                <span class="material-symbols-outlined text-[16px]">schedule</span> 240h de estágio
            </span>
            <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/15 rounded-full">
                <span class="material-symbols-outlined text-[16px]">business</span> 48+ empresas conveniadas
            </span>
        </div>
    </div>

    {{-- Timeline das 9 etapas --}}
    <div class="space-y-4">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex gap-4">
            <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-blue-600">lightbulb</span>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">1. Conceito de Estágio</h3>
                <p class="text-sm text-gray-600">O estágio é um ato educativo escolar supervisionado que prepara o estudante para o trabalho produtivo. É regulamentado pela Lei nº 11.788/2008 e faz parte do projeto pedagógico do curso.</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex gap-4">
            <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-purple-600">category</span>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">2. Tipos de Estágio</h3>
                <p class="text-sm text-gray-600">O estágio pode ser <strong>obrigatório</strong> (exigido pela grade curricular) ou <strong>não obrigatório</strong> (opcional, complementa a formação). Também existem as modalidades interna (CEFET) e externa (empresas conveniadas).</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex gap-4">
            <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-orange-600">timer</span>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">3. Horas Obrigatórias</h3>
                <p class="text-sm text-gray-600">Cada curso exige um número mínimo de horas: geralmente <strong>240 horas</strong> para estágio obrigatório. As horas podem ser cumpridas em monitoria, projetos de extensão ou estágios em empresas conveniadas.</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex gap-4">
            <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-green-600">business</span>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900 mb-1">4. Empresas Conveniadas</h3>
                <p class="text-sm text-gray-600">O CEFET possui parcerias com mais de 48 empresas. O processo de documentação é simplificado: basta consultar a lista de empresas conveniadas e escolher onde deseja estagiar.</p>
                <a href="/empresas" class="inline-flex items-center gap-2 mt-3 px-4 py-2 bg-[#0077fc] text-white rounded-lg text-sm font-medium hover:bg-[#0056c9] transition-colors">
                    <span class="material-symbols-outlined text-[16px]">business</span>
                    Ver Empresas Conveniadas
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex gap-4">
            <div class="w-12 h-12 rounded-xl bg-pink-50 flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-pink-600">description</span>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">5. Currículo e Candidatura</h3>
                <p class="text-sm text-gray-600">Mantenha seu currículo atualizado no perfil e candidate-se às vagas disponíveis. Empresas e o próprio CEFET avaliam o perfil do candidato antes de contratar.</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex gap-4">
            <div class="w-12 h-12 rounded-xl bg-indigo-50 flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-indigo-600">folder</span>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">6. Documentação Necessária</h3>
                <p class="text-sm text-gray-600">Para formalizar o estágio são necessários: <strong>Termo de Compromisso</strong> (assinado por aluno, empresa e instituição), <strong>Plano de Atividades</strong> e seguro contra acidentes pessoais.</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex gap-4">
            <div class="w-12 h-12 rounded-xl bg-cyan-50 flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-cyan-600">search</span>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900 mb-1">7. Busca por Vagas</h3>
                <p class="text-sm text-gray-600">Utilize o portal para buscar vagas internas (monitoria e projetos de extensão) ou em empresas conveniadas. Filtre por cidade, curso e modalidade.</p>
                <a href="/vagas" class="inline-flex items-center gap-2 mt-3 px-4 py-2 bg-[#0077fc] text-white rounded-lg text-sm font-medium hover:bg-[#0056c9] transition-colors">
                    <span class="material-symbols-outlined text-[16px]">search</span>
                    Buscar Vagas
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex gap-4">
            <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-yellow-600">calendar_month</span>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900 mb-1">8. Registro e Controle de Horas</h3>
                <p class="text-sm text-gray-600">Registre suas presenças diariamente no controle de horas do portal, como um ponto digital. Seu supervisor validará as horas registradas.</p>
                <a href="/controle-horas" class="inline-flex items-center gap-2 mt-3 px-4 py-2 bg-[#0077fc] text-white rounded-lg text-sm font-medium hover:bg-[#0056c9] transition-colors">
                    <span class="material-symbols-outlined text-[16px]">calendar_month</span>
                    Registrar Presença
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex gap-4">
            <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-green-600">flag</span>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">9. Conclusão do Estágio</h3>
                <p class="text-sm text-gray-600">Ao completar as horas exigidas, o orientador faz a avaliação final e a ficha de conclusão é gerada automaticamente. As horas são então registradas no histórico acadêmico.</p>
            </div>
        </div>
    </div>

    {{-- CTA final --}}
    <div class="fig-gradient rounded-2xl p-8 mt-8 text-white text-center">
        <h2 class="text-2xl font-bold mb-2">Pronto para começar?</h2>
        <p class="text-blue-100 mb-6">Busque vagas e empresas conveniadas agora mesmo.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/vagas" class="btn-pill btn-pill-secondary">Buscar Vagas</a>
            <a href="/empresas" class="btn-pill btn-pill-primary">Ver Empresas Conveniadas</a>
        </div>
    </div>
</div>
@endsection
