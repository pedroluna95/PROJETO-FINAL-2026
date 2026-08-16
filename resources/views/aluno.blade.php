@extends('layouts.app')
@section('content')
<!-- Cadastro por Perfil (estilo Figma: gradiente azul + card branco) -->
<section class="fig-gradient -mx-4 sm:-mx-6 lg:-mx-8 min-h-[calc(100vh-128px)] flex items-center justify-center p-4 sm:p-8 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-1/2 h-full opacity-10 pointer-events-none">
        <span class="material-symbols-outlined text-[320px] absolute -right-16 -top-16 text-white">rocket_launch</span>
    </div>
    <div class="w-full max-w-xl relative z-10 animate-in">
        <!-- Logo e Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-2xl mb-4 shadow-lg">
                <span class="material-symbols-outlined text-5xl text-[#0077fc]">school</span>
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">Crie sua conta</h1>
            <p class="text-blue-100">Preencha os dados abaixo para iniciar sua jornada.</p>
        </div>
        <!-- Card de Cadastro -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <form id="cadastroForm" class="space-y-5" method="POST" action="../public/index.php?url=auth/login" novalidate>
                <!-- Full Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="name">Nome Completo</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400">person</span>
                        <input class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none transition-all" id="name" name="name" placeholder="Nome" type="text" autocomplete="name" required />
                    </div>
                    <p id="erro-name" class="hidden text-xs text-red-500 mt-1.5 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> Informe seu nome completo.</p>
                </div>
                <!-- Institutional Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="email">Email Institucional</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400">school</span>
                        <input class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none transition-all" id="email" name="email" placeholder="voce@instituicao.edu.br" type="email" autocomplete="email" required />
                    </div>
                    <p id="erro-email" class="hidden text-xs text-red-500 mt-1.5 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> Informe um e-mail válido.</p>
                </div>
                <!-- CPF -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="cpf">CPF</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400">badge</span>
                        <input class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none transition-all" id="cpf" name="cpf" placeholder="000.000.000-00" type="text" />
                    </div>
                    <p id="erro-cpf" class="hidden text-xs text-red-500 mt-1.5 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> Informe um CPF válido.</p>
                </div>
                <!-- ID / Enrollment Number -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="matricula">Matrícula</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400">id_card</span>
                        <input class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none transition-all" id="matricula" name="matricula" placeholder="Matrícula ou SIAPE" type="text" />
                    </div>
                    <p id="erro-matricula" class="hidden text-xs text-red-500 mt-1.5 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> Informe sua matrícula ou SIAPE.</p>
                </div>
                <!-- Curso -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="curso">Curso</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400">menu_book</span>
                        <select class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none transition-all bg-white appearance-none" id="curso" name="curso" required>
                            <option value="">Selecione...</option>
                            <option value="Engenharia de Computação">Engenharia de Computação</option>
                            <option value="Engenharia Civil">Engenharia Civil</option>
                            <option value="Engenharia Mecânica">Engenharia Mecânica</option>
                            <option value="Engenharia Elétrica">Engenharia Elétrica</option>
                        </select>
                    </div>
                </div>
                <!-- Telefone -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="telefone">Telefone</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400">phone</span>
                        <input class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none transition-all" id="telefone" name="telefone" placeholder="(21) 99999-9999" type="tel" />
                    </div>
                </div>
                <!-- Password Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="password">Senha</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400">lock</span>
                            <input class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none transition-all" id="password" name="password" placeholder="••••••••" type="password" autocomplete="new-password" required />
                            <button type="button" class="toggle-senha absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600" data-target="password" tabindex="-1" aria-label="Mostrar senha">
                                <span class="material-symbols-outlined text-xl">visibility</span>
                            </button>
                        </div>
                        <p id="erro-password" class="hidden text-xs text-red-500 mt-1.5 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> A senha deve ter no mínimo 8 caracteres.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="confirm-password">Confirmar Senha</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400">lock_reset</span>
                            <input class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0077fc] focus:border-transparent outline-none transition-all" id="confirm-password" name="confirm_password" placeholder="••••••••" type="password" autocomplete="new-password" required />
                            <button type="button" class="toggle-senha absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600" data-target="confirm-password" tabindex="-1" aria-label="Mostrar confirmação de senha">
                                <span class="material-symbols-outlined text-xl">visibility</span>
                            </button>
                        </div>
                        <p id="erro-confirm-password" class="hidden text-xs text-red-500 mt-1.5 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> As senhas não coincidem.</p>
                    </div>
                </div>
                <!-- Terms checkbox -->
                <div class="flex items-start gap-3 py-2">
                    <input class="mt-1 w-5 h-5 rounded border-gray-300 text-[#0077fc] focus:ring-[#0077fc] focus:ring-offset-0" id="terms" name="terms" type="checkbox" />
                    <label class="text-sm text-gray-600 leading-snug" for="terms">
                        Eu aceito os <a class="text-[#0077fc] font-semibold hover:underline" href="#">Termos de Uso</a> e a <a class="text-[#0077fc] font-semibold hover:underline" href="#">Política de Privacidade</a>
                    </label>
                </div>
                <p id="erro-termos" class="hidden text-xs text-red-500 ml-1 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> Você precisa aceitar os termos para continuar.</p>
                <!-- Submit Button -->
                <button class="w-full bg-[#0077fc] text-white font-semibold py-3 rounded-lg shadow-lg shadow-blue-500/20 hover:bg-[#0056c9] transition-all flex items-center justify-center gap-2 group mt-4" type="submit">
                    Cadastrar-se
                    <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform text-xl">arrow_forward</span>
                </button>
                <!-- Footer Link -->
                <p class="text-center text-sm text-gray-600 mt-6">
                    Já tenho uma conta?
                    <a class="text-[#0077fc] font-semibold hover:underline" href="/login">Entrar agora</a>
                </p>
            </form>
        </div>
        <!-- Footer -->
        <p class="text-center text-blue-100 text-sm mt-6">
            © 2026 CEFET. Todos os direitos reservados.
        </p>
    </div>
</section>
<script>
    // ── Utilitários ──────────────────────────────────────────────
    function mostrar(id) {
        document.getElementById(id)?.classList.remove('hidden');
    }
    function esconder(id) {
        document.getElementById(id)?.classList.add('hidden');
    }
    function setErro(input, erroId) {
        input.classList.add('ring-2', 'ring-red-400');
        input.classList.remove('focus:ring-[#0077fc]');
        mostrar(erroId);
    }
    function limparErro(input, erroId) {
        input.classList.remove('ring-2', 'ring-red-400');
        esconder(erroId);
    }
    // ── Toggle mostrar/ocultar senha ─────────────────────────────
    document.querySelectorAll('.toggle-senha').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const targetId = btn.dataset.target;
            const input = document.getElementById(targetId);
            const icon = btn.querySelector('.material-symbols-outlined');
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility';
            }
        });
    });
    // ── Validação em tempo real ───────────────────────────────────
    const campoName = document.getElementById('name');
    const campoEmail = document.getElementById('email');
    const campoMatricula = document.getElementById('matricula');
    const campoPassword = document.getElementById('password');
    const campoConfirm = document.getElementById('confirm-password');
    const campoTerms = document.getElementById('terms');
    campoName.addEventListener('blur', function() {
        if (campoName.value.trim().length < 3) setErro(campoName, 'erro-name');
        else limparErro(campoName, 'erro-name');
    });
    campoEmail.addEventListener('blur', function() {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(campoEmail.value.trim())) setErro(campoEmail, 'erro-email');
        else limparErro(campoEmail, 'erro-email');
    });
    campoMatricula.addEventListener('blur', function() {
        if (campoMatricula.value.trim().length < 3) setErro(campoMatricula, 'erro-matricula');
        else limparErro(campoMatricula, 'erro-matricula');
    });
    campoPassword.addEventListener('input', function() {
        if (campoPassword.value.length >= 8) limparErro(campoPassword, 'erro-password');
        // Re-valida confirmação quando senha muda
        if (campoConfirm.value && campoConfirm.value === campoPassword.value)
            limparErro(campoConfirm, 'erro-confirm-password');
        else if (campoConfirm.value)
            setErro(campoConfirm, 'erro-confirm-password');
    });
    campoConfirm.addEventListener('input', function() {
        if (campoConfirm.value === campoPassword.value) limparErro(campoConfirm, 'erro-confirm-password');
        else setErro(campoConfirm, 'erro-confirm-password');
    });
    campoTerms.addEventListener('change', function() {
        if (campoTerms.checked) esconder('erro-termos');
    });
    // ── Validação no envio ────────────────────────────────────────
    document.getElementById('cadastroForm').addEventListener('submit', function(e) {
        let valido = true;
        // Nome
        if (campoName.value.trim().length < 3) {
            setErro(campoName, 'erro-name');
            valido = false;
        } else {
            limparErro(campoName, 'erro-name');
        }
        // E-mail
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(campoEmail.value.trim())) {
            setErro(campoEmail, 'erro-email');
            valido = false;
        } else {
            limparErro(campoEmail, 'erro-email');
        }
        // Matrícula
        if (campoMatricula.value.trim().length < 3) {
            setErro(campoMatricula, 'erro-matricula');
            valido = false;
        } else {
            limparErro(campoMatricula, 'erro-matricula');
        }
        // Senha – mínimo 8 caracteres
        if (campoPassword.value.length < 8) {
            setErro(campoPassword, 'erro-password');
            valido = false;
        } else {
            limparErro(campoPassword, 'erro-password');
        }
        // Confirmação de senha
        if (campoConfirm.value !== campoPassword.value || campoConfirm.value === '') {
            setErro(campoConfirm, 'erro-confirm-password');
            valido = false;
        } else {
            limparErro(campoConfirm, 'erro-confirm-password');
        }
        // Termos
        if (!campoTerms.checked) {
            mostrar('erro-termos');
            valido = false;
        } else {
            esconder('erro-termos');
        }
        if (!valido) {
            e.preventDefault();
            // Rola até o primeiro erro visível
            const primeiroErro = document.querySelector('.text-red-500:not(.hidden)');
            if (primeiroErro) primeiroErro.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }
    });
</script>
@endsection
