    <!-- Registration Form Section -->
        <section class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 md:p-24 bg-surface">
            <div class="w-full max-w-md">
                <div class="mb-10 text-center lg:text-left">
                    <h2 class="font-headline text-4xl font-extrabold text-on-surface tracking-tight">Crie sua conta</h2>
                    <p class="text-on-surface-variant font-medium">Preencha os dados abaixo para iniciar sua jornada.</p>
                </div>
                <form class="space-y-5">
                    <!-- Full Name -->
                    <div class="space-y-1.5">
                        <label class="text-sm font-semibold text-on-surface-variant ml-1" for="name">Nome Completo</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-xl">person</span>
                            <input class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all text-on-surface placeholder:text-gray-400" id="name" placeholder="Como você quer ser chamado?" type="text" />
                        </div>
                    </div>
                    <!-- Institutional Email -->
                    <div class="space-y-1.5">
                        <label class="text-sm font-semibold text-on-surface-variant ml-1" for="email">Email Institucional</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-xl">school</span>
                            <input class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all text-on-surface placeholder:text-gray-400" id="email" placeholder="seu.nome@instituicao.edu.br" type="email" />
                        </div>
                    </div>
                    <!-- ID / Enrollment Number -->
                    <div class="space-y-1.5">
                        <label class="text-sm font-semibold text-on-surface-variant ml-1" for="matricula">Matrícula</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-xl">badge</span>
                            <input class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all text-on-surface placeholder:text-gray-400" id="matricula" placeholder="Número de registro acadêmico" type="text" />
                        </div>
                    </div>
                    <!-- Password Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="text-sm font-semibold text-on-surface-variant ml-1" for="password">Senha</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-xl">lock</span>
                                <input class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all text-on-surface placeholder:text-gray-400" id="password" placeholder="••••••••" type="password" />
                            </div>
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-sm font-semibold text-on-surface-variant ml-1" for="confirm-password">Confirmar Senha</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-xl">lock_reset</span>
                                <input class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all text-on-surface placeholder:text-gray-400" id="confirm-password" placeholder="••••••••" type="password" />
                            </div>
                        </div>
                    </div>
                    <!-- Terms checkbox -->
                    <div class="flex items-start gap-3 py-2">
                        <input class="mt-1 w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary focus:ring-offset-0 bg-surface-container-low" id="terms" type="checkbox" />
                        <label class="text-sm text-on-surface-variant leading-snug" for="terms">
                            Eu aceito os <a class="text-primary font-semibold hover:underline" href="#">Termos de Uso</a> e a <a class="text-primary font-semibold hover:underline" href="#">Política de Privacidade</a> do TURING
                        </label>
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
    