
@extends('layouts.app')

@section('content')


<!-- Registration Form Section -->
<section class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 md:p-24 bg-surface">
            <div class="w-full max-w-md">
                <div class="mb-10 text-center lg:text-left">
                    <h2 class="font-headline text-4xl font-extrabold text-on-surface tracking-tight">Crie sua conta</h2>
                    <p class="text-on-surface-variant font-medium">Preencha os dados abaixo para iniciar sua jornada.</p>
                </div>
                <form id="cadastroForm" class="space-y-4" method="POST" action="../public/index.php?url=auth/login" novalidate>
                    
                    <!-- Full Name -->
                    <div class="space-y-1.5">
                        <label class="text-sm font-semibold text-on-surface-variant ml-1" for="name">Nome Completo</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-xl">person</span>
                            <input class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all text-on-surface placeholder:text-gray-400" id="name" name="name" placeholder="Nome" type="text" autocomplete="name" />
                        </div>
                        <p id="erro-name" class="hidden text-xs text-red-500 ml-1 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> Informe seu nome completo.</p>
                    </div>
                    <!-- Institutional Email -->
                    <div class="space-y-1.5">
                        <label class="text-sm font-semibold text-on-surface-variant ml-1" for="email">Email Institucional</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-xl">school</span>
                            <input class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all text-on-surface placeholder:text-gray-400" id="email" name="email" placeholder="voce@instituicao.edu.br" type="email" autocomplete="email" />
                        </div>
                        <p id="erro-email" class="hidden text-xs text-red-500 ml-1 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> Informe um e-mail válido.</p>
                    </div>
                    <!-- ID / Enrollment Number -->
                    <div class="space-y-1.5">
                        <label class="text-sm font-semibold text-on-surface-variant ml-1" for="matricula">Matrícula</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-xl">badge</span>
                            <input class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all text-on-surface placeholder:text-gray-400" id="matricula" name="matricula" placeholder="Matrícula ou SIAPE" type="text" />
                        </div>
                        <p id="erro-matricula" class="hidden text-xs text-red-500 ml-1 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> Informe sua matrícula ou SIAPE.</p>
                    </div>
                    <!-- Password Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="text-sm font-semibold text-on-surface-variant ml-1" for="password">Senha</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-xl">lock</span>
                                <input class="w-full pl-12 pr-10 py-3.5 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all text-on-surface placeholder:text-gray-400" id="password" name="password" placeholder="••••••••" type="password" autocomplete="new-password" />
                                <button type="button" class="toggle-senha absolute right-4 top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-primary transition-colors" data-target="password" tabindex="-1" aria-label="Mostrar senha">
                                    <span class="material-symbols-outlined text-xl">visibility</span>
                                </button>
                            </div>
                            <p id="erro-password" class="hidden text-xs text-red-500 ml-1 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> A senha deve ter no mínimo 8 caracteres.</p>
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-sm font-semibold text-on-surface-variant ml-1" for="confirm-password">Confirmar Senha</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-xl">lock_reset</span>
                                <input class="w-full pl-12 pr-10 py-3.5 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all text-on-surface placeholder:text-gray-400" id="confirm-password" name="confirm_password" placeholder="••••••••" type="password" autocomplete="new-password" />
                                <button type="button" class="toggle-senha absolute right-4 top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-primary transition-colors" data-target="confirm-password" tabindex="-1" aria-label="Mostrar confirmação de senha">
                                    <span class="material-symbols-outlined text-xl">visibility</span>
                                </button>
                            </div>
                            <p id="erro-confirm-password" class="hidden text-xs text-red-500 ml-1 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> As senhas não coincidem.</p>
                        </div>
                    </div>
                    <!-- Terms checkbox -->
                    <div class="space-y-1">
                        <div class="flex items-start gap-3 py-2">
                            <input class="mt-1 w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary focus:ring-offset-0 bg-surface-container-low" id="terms" name="terms" type="checkbox" />
                            <label class="text-sm text-on-surface-variant leading-snug" for="terms">
                                Eu aceito os <a class="text-primary font-semibold hover:underline" href="#">Termos de Uso</a> e a <a class="text-primary font-semibold hover:underline" href="#">Política de Privacidade</a> do TURING
                            </label>
                        </div>
                        <p id="erro-termos" class="hidden text-xs text-red-500 ml-1 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> Você precisa aceitar os termos para continuar.</p>
                    </div>
                    <!-- Submit Button -->
                    <button class=" bg-primary w-full editorial-gradient text-white font-headline font-bold py-4 rounded-full shadow-lg shadow-primary/20 hover:shadow-xl hover:shadow-primary/30 active:scale-[0.98] transition-all flex items-center justify-center gap-2 group mt-4" type="submit">
                        Cadastrar-se
                        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </button>
                    <!-- Footer Link -->
                    <p class="text-center text-on-surface-variant font-medium mt-8">
                        Já tenho uma conta?
                        <a class=" text-primary font-bold hover:underline ml-1" href="?url=home/login">Entrar agora</a>
                    </p>
                </form>
                
                <!-- Help Link -->
                <div class="mt-12 pt-8 border-t border-surface-container-highest text-center">
                    <button class="text-sm font-medium text-on-surface-variant hover:text-primary transition-colors flex items-center justify-center gap-2 mx-auto">
                        <span class="material-symbols-outlined text-lg">help</span>
                        Precisa de ajuda com o seu cadastro?
                    </button>
                </div>
            </div>
        </section>

        <script>
            // ── Utilitários ──────────────────────────────────────────────
            function mostrar(id) { document.getElementById(id)?.classList.remove('hidden'); }
            function esconder(id) { document.getElementById(id)?.classList.add('hidden'); }
            function setErro(input, erroId) {
                input.classList.add('ring-2', 'ring-red-400');
                input.classList.remove('ring-primary/20');
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
                    if (primeiroErro) primeiroErro.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            });
        </script>

        @endsection