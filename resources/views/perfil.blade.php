@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Sidebar perfil --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 text-center">
            <div class="w-24 h-24 rounded-full fig-gradient flex items-center justify-center text-white text-4xl font-bold mx-auto mb-4">
                {{ strtoupper(substr(session('user_name', 'A'), 0, 1)) }}
            </div>
            <h2 class="text-xl font-semibold text-gray-900 mb-1">{{ session('user_name', 'Aluno') }}</h2>
            <p class="text-sm text-gray-500 mb-4">{{ session('user_email', 'aluno@cefet-rj.br') }}</p>
            <span class="inline-flex items-center gap-1 px-3 py-1 bg-blue-50 text-[#0077fc] rounded-full text-xs font-medium mb-6">
                <span class="material-symbols-outlined text-[14px]">badge</span>
                {{ ucfirst(session('user_type', 'aluno')) }}
            </span>

            <div class="space-y-2 border-t border-gray-100 pt-4 text-left">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Matrícula</span>
                    <span class="font-medium text-gray-900">{{ session('user_matricula', '20231234') }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Curso</span>
                    <span class="font-medium text-gray-900">Engenharia de Computação</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Período</span>
                    <span class="font-medium text-gray-900">5º</span>
                </div>
            </div>
        </div>

        {{-- Formulário Informações Pessoais --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-5">Informações Pessoais</h2>
                <form action="{{ url('/perfil') }}" method="POST" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nome Completo</label>
                        <input type="text" name="nome" value="{{ session('user_name', '') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none"/>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">E-mail</label>
                        <input type="email" name="email" value="{{ session('user_email', '') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none"/>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">CPF</label>
                        <input type="text" name="cpf" value="{{ session('user_cpf', '') }}" placeholder="000.000.000-00"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none"/>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
                        <input type="tel" name="telefone" value="{{ session('user_telefone', '') }}" placeholder="(21) 99999-9999"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none"/>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Endereço</label>
                        <input type="text" name="endereco" value="" placeholder="Rua, número, bairro"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none"/>
                    </div>
                    <div class="sm:col-span-2 flex justify-end">
                        <button type="submit" class="px-6 py-2.5 bg-[#0077fc] text-white rounded-lg hover:bg-[#0056c9] transition-colors text-sm font-medium">
                            Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>

            {{-- Alterar Senha --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-5">Segurança</h2>
                <form action="{{ url('/perfil/senha') }}" method="POST" class="space-y-4 max-w-md">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Senha Atual</label>
                        <input type="password" name="senha_atual"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none"/>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nova Senha</label>
                        <input type="password" name="nova_senha" id="nova_senha"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none"/>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Confirmar Nova Senha</label>
                        <input type="password" name="confirmar_nova_senha" id="confirmar_nova_senha"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none"/>
                    </div>
                    <button type="submit" class="px-6 py-2.5 bg-[#0077fc] text-white rounded-lg hover:bg-[#0056c9] transition-colors text-sm font-medium">
                        Alterar Senha
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.querySelector('form[action*="senha"]').addEventListener('submit', function (e) {
    const nova = document.getElementById('nova_senha').value;
    const confirmar = document.getElementById('confirmar_nova_senha').value;
    if (nova !== confirmar) {
        e.preventDefault();
        alert('As senhas não coincidem!');
    }
});
</script>
@endsection
