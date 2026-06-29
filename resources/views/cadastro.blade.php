@extends('layouts.app')

@section('content')

<div class="bg-surface-container-low text-on-surface min-h-[calc(100vh-100px)] flex items-center justify-center p-8 md:p-16">
        <div class="max-w-6xl w-full">


            <!-- Role Selection Grid: Bento Style Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                <!-- Role: Aluno -->
                <button class="role-card group text-left p-8 rounded-2xl bg-surface-container-lowest shadow-sm hover:shadow-2xl hover:scale-[1.02] active:scale-[0.98] border-2 border-transparent hover:border-primary-container/20" onclick="selectRole('aluno')">
                    <div class="icon-container w-16 h-16 rounded-xl bg-surface-container-high flex items-center justify-center text-on-surface-variant transition-all mb-6">
                        <span class="material-symbols-outlined text-4xl">school</span>
                    </div>
                    <h4 class="text-2xl font-bold text-on-surface font-manrope mb-2">Aluno</h4>
                    <p class="text-on-surface-variant text-base leading-relaxed">Busco oportunidades de estágio e crescimento profissional.</p>
                </button>
                <!-- Role: Supervisor -->
                <button class="role-card group text-left p-8 rounded-2xl bg-surface-container-lowest shadow-sm hover:shadow-2xl hover:scale-[1.02] active:scale-[0.98] border-2 border-transparent hover:border-primary-container/20" onclick="selectRole('supervisor')">
                    <div class="icon-container w-16 h-16 rounded-xl bg-surface-container-high flex items-center justify-center text-on-surface-variant transition-all mb-6">
                        <span class="material-symbols-outlined text-4xl">supervisor_account</span>
                    </div>
                    <h4 class="text-2xl font-bold text-on-surface font-manrope mb-2">Supervisor</h4>
                    <p class="text-on-surface-variant text-base leading-relaxed">Acompanho o desenvolvimento técnico do estagiário na empresa.</p>
                </button>
                <!-- Role: Orientador -->
                <button class="role-card group text-left p-8 rounded-2xl bg-surface-container-lowest shadow-sm hover:shadow-2xl hover:scale-[1.02] active:scale-[0.98] border-2 border-transparent hover:border-primary-container/20" onclick="selectRole('orientador')">
                    <div class="icon-container w-16 h-16 rounded-xl bg-surface-container-high flex items-center justify-center text-on-surface-variant transition-all mb-6">
                        <span class="material-symbols-outlined text-4xl">local_library</span>
                    </div>
                    <h4 class="text-2xl font-bold text-on-surface font-manrope mb-2">Orientador</h4>
                    <p class="text-on-surface-variant text-base leading-relaxed">Faço o acompanhamento acadêmico e pedagógico dos estágios.</p>
                </button>
                <!-- Role: Contratante -->
                <button class="role-card group text-left p-8 rounded-2xl bg-surface-container-lowest shadow-sm hover:shadow-2xl hover:scale-[1.02] active:scale-[0.98] border-2 border-transparent hover:border-primary-container/20" onclick="selectRole('contratante')">
                    <div class="icon-container w-16 h-16 rounded-xl bg-surface-container-high flex items-center justify-center text-on-surface-variant transition-all mb-6">
                        <span class="material-symbols-outlined text-4xl">corporate_fare</span>
                    </div>
                    <h4 class="text-2xl font-bold text-on-surface font-manrope mb-2">Contratante</h4>
                    <p class="text-on-surface-variant text-base leading-relaxed">Gerencio vagas e contratos de estágio da minha organização.</p>
                </button>
            </div>

            <div class="flex justify-center mt-8">
                <button id="btn-next" disabled onclick="redirectToRegister()"
                    class="px-8 py-3 rounded-xl bg-slate-200 text-slate-500 font-semibold transition-all cursor-not-allowed">
                    Confirmar escolha
                </button>
            </div>

        </div>
    </div>
    <script>
        // Função que você chama nos botões (role-cards)
        let selectedRole = null;

        function selectRole(role) {
            selectedRole = role;

            // Ativa o botão de confirmar e muda a cor
            const btn = document.getElementById('btn-next');
            btn.disabled = false;
            btn.classList.remove('bg-slate-200', 'text-slate-500', 'cursor-not-allowed');
            btn.classList.add('bg-primary', 'text-white', 'hover:brightness-110');

            // Remove active styles from all
            document.querySelectorAll('.role-card').forEach(card => {
                card.classList.remove('ring-4', 'ring-primary-container/30', 'border-primary-container');
                card.classList.add('bg-surface-container-lowest');
            });

        }




        function redirectToRegister() {
            if (selectedRole) {
                window.location.href = '/cadastro/' + selectedRole;
            }
        }
    </script>

    @endsection