{{-- Cadastro — igual ao RegisterPage do Figma: 2 passos (tipo de usuário → formulário) --}}
<!DOCTYPE html>
<html class="light" lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Criar Conta — Portal Estágio CEFET</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="/css/style.css?v=3">
</head>
<body style="font-family: 'Inter', sans-serif;">
<div class="min-h-screen fig-gradient flex items-center justify-center p-4 py-12">
    <div class="w-full max-w-4xl">
        {{-- Logo e Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-2xl mb-4">
                <span class="material-symbols-outlined text-[40px] text-[#0077fc]">school</span>
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">Criar Conta</h1>
            <p id="subtitulo" class="text-blue-100">Selecione o tipo de usuário</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8">
            {{-- Passo 1: Seleção de tipo --}}
            <div id="passo-tipo" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <button type="button" onclick="selecionarTipo('aluno')" class="p-6 border-2 border-gray-200 rounded-xl hover:border-[#0077fc] hover:bg-blue-50 transition-all text-left group">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-blue-50 group-hover:bg-[#0077fc] rounded-lg transition-colors">
                            <span class="material-symbols-outlined text-[#0077fc] group-hover:text-white">person</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-1">Aluno</h3>
                            <p class="text-sm text-gray-600">Estudante em busca de estágio</p>
                        </div>
                    </div>
                </button>

                <button type="button" onclick="selecionarTipo('supervisor')" class="p-6 border-2 border-gray-200 rounded-xl hover:border-[#0077fc] hover:bg-blue-50 transition-all text-left group">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-blue-50 group-hover:bg-[#0077fc] rounded-lg transition-colors">
                            <span class="material-symbols-outlined text-[#0077fc] group-hover:text-white">manage_accounts</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-1">Supervisor</h3>
                            <p class="text-sm text-gray-600">Supervisor de estágio na empresa</p>
                        </div>
                    </div>
                </button>

                <button type="button" onclick="selecionarTipo('orientador')" class="p-6 border-2 border-gray-200 rounded-xl hover:border-[#0077fc] hover:bg-blue-50 transition-all text-left group">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-blue-50 group-hover:bg-[#0077fc] rounded-lg transition-colors">
                            <span class="material-symbols-outlined text-[#0077fc] group-hover:text-white">school</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-1">Orientador</h3>
                            <p class="text-sm text-gray-600">Professor orientador do CEFET</p>
                        </div>
                    </div>
                </button>

                <button type="button" onclick="selecionarTipo('contratante')" class="p-6 border-2 border-gray-200 rounded-xl hover:border-[#0077fc] hover:bg-blue-50 transition-all text-left group">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-blue-50 group-hover:bg-[#0077fc] rounded-lg transition-colors">
                            <span class="material-symbols-outlined text-[#0077fc] group-hover:text-white">business</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-1">Contratante</h3>
                            <p class="text-sm text-gray-600">Empresa parceira</p>
                        </div>
                    </div>
                </button>

                <button type="button" onclick="selecionarTipo('administrador')" class="p-6 border-2 border-gray-200 rounded-xl hover:border-[#0077fc] hover:bg-blue-50 transition-all text-left group md:col-span-2">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-blue-50 group-hover:bg-[#0077fc] rounded-lg transition-colors">
                            <span class="material-symbols-outlined text-[#0077fc] group-hover:text-white">shield</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-1">Administrador</h3>
                            <p class="text-sm text-gray-600">Administrador do sistema</p>
                        </div>
                    </div>
                </button>
            </div>

            {{-- Passo 2: Formulário dinâmico --}}
            <form id="passo-form" class="hidden space-y-4" method="POST" action="{{ url('/cadastro') }}">
                @csrf
                <button type="button" onclick="voltarTipo()" class="flex items-center gap-2 text-[#0077fc] hover:underline mb-4">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    Voltar
                </button>

                <input type="hidden" name="tipo" id="tipo" value=""/>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nome Completo</label>
                    <input type="text" name="nome" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" required/>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">E-mail</label>
                    <input type="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" required/>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">CPF</label>
                    <input type="text" name="cpf" placeholder="000.000.000-00" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" required/>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
                    <input type="tel" name="telefone" placeholder="(21) 99999-9999" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" required/>
                </div>

                <div id="campos-especificos"></div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Senha</label>
                    <input type="password" name="senha" id="senha" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" required/>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Confirmar Senha</label>
                    <input type="password" name="confirmar_senha" id="confirmar_senha" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" required/>
                </div>

                <button type="submit" class="w-full bg-[#0077fc] text-white py-3 rounded-lg font-medium hover:bg-[#0056c9] transition-colors mt-6">
                    Criar Conta
                </button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-600">
                Já tem uma conta?
                <a href="/login" class="text-[#0077fc] font-medium hover:underline">Faça login</a>
            </div>
        </div>
    </div>
</div>

<script>
    const camposEspecificos = {
        aluno: `
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Matrícula</label>
                <input type="text" name="matricula" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" required/>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Curso</label>
                <select name="curso" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none bg-white" required>
                    <option value="">Selecione...</option>
                    <option value="Engenharia de Computação">Engenharia de Computação</option>
                    <option value="Engenharia Civil">Engenharia Civil</option>
                    <option value="Engenharia Mecânica">Engenharia Mecânica</option>
                    <option value="Engenharia Elétrica">Engenharia Elétrica</option>
                </select>
            </div>`,
        supervisor: `
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Empresa</label>
                <input type="text" name="empresa" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" required/>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Cargo</label>
                <input type="text" name="cargo" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" required/>
            </div>`,
        orientador: `
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Área de Atuação</label>
                <input type="text" name="area_atuacao" placeholder="Ex: Computação, Civil, Mecânica..." class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" required/>
            </div>`,
        contratante: `
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nome da Empresa</label>
                <input type="text" name="empresa" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" required/>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">CNPJ</label>
                <input type="text" name="cnpj" placeholder="00.000.000/0000-00" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" required/>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Cargo</label>
                <input type="text" name="cargo" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none" required/>
            </div>`,
        administrador: ''
    };

    function selecionarTipo(tipo) {
        document.getElementById('tipo').value = tipo;
        document.getElementById('campos-especificos').innerHTML = camposEspecificos[tipo] || '';
        document.getElementById('passo-tipo').classList.add('hidden');
        document.getElementById('passo-form').classList.remove('hidden');
        document.getElementById('subtitulo').textContent = 'Preencha seus dados';
    }

    function voltarTipo() {
        document.getElementById('passo-tipo').classList.remove('hidden');
        document.getElementById('passo-form').classList.add('hidden');
        document.getElementById('subtitulo').textContent = 'Selecione o tipo de usuário';
    }

    // Validação de senhas
    document.getElementById('passo-form').addEventListener('submit', function (e) {
        const senha = document.getElementById('senha').value;
        const confirmar = document.getElementById('confirmar_senha').value;
        if (senha !== confirmar) {
            e.preventDefault();
            alert('As senhas não coincidem!');
        }
    });
</script>
</body>
</html>
