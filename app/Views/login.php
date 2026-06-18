<!-- Login Form Section -->
<section class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 md:p-24 bg-surface">
    <div class="w-full max-w-md">
        <div class="mb-10 text-center lg:text-left">
            <h2 class="font-headline text-4xl font-extrabold text-on-surface tracking-tight">Bem-vindo de volta</h2>
            <p class="text-on-surface-variant font-medium">Acesse sua conta para gerenciar suas candidaturas e explorar novas vagas.</p>
        </div>
        
        <form id="loginForm" class="space-y-4" method="POST" action="../public/index.php?url=auth/login" novalidate>
            
            <!-- Email -->
            <div class="space-y-1.5">
                <label class="text-sm font-semibold text-on-surface-variant ml-1" for="email">E-mail corporativo ou acadêmico</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-xl">school</span>
                    <input class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all text-on-surface placeholder:text-gray-400" id="email" name="email" placeholder="nome@exemplo.com" type="email" autocomplete="email" />
                </div>
                <p id="erro-email" class="hidden text-xs text-red-500 ml-1 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> Informe um e-mail válido.</p>
            </div>

            <!-- Password -->
            <div class="space-y-1.5">
                <div class="flex justify-between items-center px-1">
                    <label class="text-sm font-semibold text-on-surface-variant" for="password">Senha</label>
                    <a class="text-xs font-medium text-primary hover:underline" href="#">Esqueci minha senha</a>
                </div>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-xl">lock</span>
                    <input class="w-full pl-12 pr-10 py-3.5 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all text-on-surface placeholder:text-gray-400" id="password" name="password" placeholder="••••••••" type="password" autocomplete="current-password" />
                    <button type="button" class="toggle-senha absolute right-4 top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-primary transition-colors" data-target="password" tabindex="-1" aria-label="Mostrar senha">
                        <span class="material-symbols-outlined text-xl">visibility</span>
                    </button>
                </div>
                <p id="erro-password" class="hidden text-xs text-red-500 ml-1 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> Informe sua senha.</p>
            </div>

            <!-- Submit Button -->
            <button class="bg-primary w-full editorial-gradient text-white font-headline font-bold py-4 rounded-full shadow-lg shadow-primary/20 hover:shadow-xl hover:shadow-primary/30 active:scale-[0.98] transition-all flex items-center justify-center gap-2 group mt-8" type="submit">
                Fazer Login
                <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">login</span>
            </button>

            <!-- Footer Link -->
            <p class="text-center text-on-surface-variant font-medium mt-8">
                Não tem uma conta?
                <a class="text-primary font-bold hover:underline ml-1" href="?url=home/cadastro">Cadastre-se</a>
            </p>
        </form>
        
        <!-- Help Link -->
        <div class="mt-12 pt-8 border-t border-surface-container-highest text-center">
            <button class="text-sm font-medium text-on-surface-variant hover:text-primary transition-colors flex items-center justify-center gap-2 mx-auto">
                <span class="material-symbols-outlined text-lg">help</span>
                Precisa de ajuda com o seu acesso?
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
    const campoEmail = document.getElementById('email');
    const campoPassword = document.getElementById('password');

    campoEmail.addEventListener('blur', function() {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(campoEmail.value.trim())) setErro(campoEmail, 'erro-email');
        else limparErro(campoEmail, 'erro-email');
    });

    campoPassword.addEventListener('input', function() {
        if (campoPassword.value.length > 0) limparErro(campoPassword, 'erro-password');
    });

    // ── Validação no envio ────────────────────────────────────────
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        let valido = true;

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(campoEmail.value.trim())) {
            setErro(campoEmail, 'erro-email');
            valido = false;
        }

        if (campoPassword.value.length === 0) {
            setErro(campoPassword, 'erro-password');
            valido = false;
        }

        if (!valido) {
            e.preventDefault();
        }
    });
</script>
