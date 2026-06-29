@extends('layouts.app')

@section('content')


<section class="mb-20 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
    <div class="lg:col-span-7">
        <span class="text-primary font-bold tracking-widest uppercase text-xs mb-4 block">Bem-vindo ao Portal de estágio CEFET</span>
        <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tighter text-on-surface leading-none mb-6">
            Onde o talento <br />encontra a <span class="text-primary">oportunidade</span>.
        </h1>
        <p class="text-xl text-on-surface-variant mb-10 max-w-xl leading-relaxed">
            Explore o portal oficial de estágios do CEFET/RJ.
        </p>
        <div class="flex flex-wrap gap-4">
            <button class="bg-gradient-to-r from-primary to-primary-container text-on-primary px-8 py-4 rounded-full font-bold text-lg editorial-shadow hover:brightness-110 active:scale-95 transition-all">
                Explorar Vagas
            </button>
            <button class="bg-surface-container-high text-on-surface px-8 py-4 rounded-full font-bold text-lg hover:bg-surface-container-highest transition-all">
                Minha Jornada
            </button>
        </div>
    </div>

</section>
<!-- Bento Access Grid -->

<section class="mb-24">
    <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-6 h-auto md:h-[400px]">
        <div class="md:col-span-2 md:row-span-2 bg-surface-container-low rounded-xl p-10 flex flex-col justify-between group cursor-pointer hover:bg-surface-container transition-colors">

            <div>
                <span class="material-symbols-outlined text-4xl text-primary mb-6">work_history</span>
                <h3 class="text-3xl font-bold tracking-tight mb-4">Vagas em Destaque</h3>
                <p class="text-on-surface-variant text-lg">As posições mais competitivas nas áreas de Tecnologia, Design e Negócios.</p>
            </div>

            <div class="flex items-center gap-2 font-bold text-primary">
                Ver todas as vagas <span class="material-symbols-outlined transition-transform group-hover:translate-x-2">arrow_forward</span>
            </div>

        </div>

        <div class="md:col-span-2 bg-inverse-surface text-white rounded-xl p-8 flex items-center justify-between group cursor-pointer">
            <div class="max-w-[60%]">
                <h3 class="text-xl font-bold mb-2">Trilhas de Aprendizado</h3>
                <p class="text-stone-400 text-sm">Desenvolva as soft skills mais requisitadas pelo mercado atual.</p>
            </div>

        </div>

        <div class="md:col-span-1 bg-primary text-on-primary rounded-xl p-8 flex flex-col justify-center items-center text-center cursor-pointer hover:brightness-110 transition-all">
            <span class="material-symbols-outlined text-3xl mb-2">rocket_launch</span>
            <p class="font-bold">Currículo Nota 10</p>
        </div>

        <div class="md:col-span-1 bg-surface-container-lowest rounded-xl p-8 flex flex-col justify-center items-center text-center border-2 border-surface-container cursor-pointer hover:border-primary/20 transition-all">
            <span class="material-symbols-outlined text-3xl mb-2 text-tertiary">support_agent</span>
            <p class="font-bold text-on-surface">Mentoria Individual</p>
        </div>

    </div>

</section>



<!-- Quick Access / CTA Section -->
<section class="bg-surface-container-low rounded-3xl p-12 md:p-20 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-1/2 h-full opacity-10">
        <span class="material-symbols-outlined text-[400px] absolute -right-20 -top-20 text-primary">trending_up</span>
    </div>
    <div class="relative z-10 max-w-2xl">
        <h2 class="text-4xl md:text-5xl font-extrabold tracking-tighter mb-8 leading-tight">Pronto para dar o <br />próximo grande passo?</h2>
        <p class="text-xl text-on-surface-variant mb-12">Nossos conselheiros de carreira estão prontos para ajudar você a refinar seu perfil e encontrar a vaga ideal.</p>
        <div class="flex flex-col sm:flex-row gap-6">
            <button class="bg-primary text-on-primary px-10 py-4 rounded-full font-bold editorial-shadow hover:brightness-110 transition-all">
                Nova Candidatura
            </button>
            <button class="bg-surface-container-lowest text-on-surface px-10 py-4 rounded-full font-bold border-2 border-surface-container hover:border-primary transition-all">
                Falar com Consultor
            </button>
        </div>
    </div>
</section>

@endsection