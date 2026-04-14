<section class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-surface">
<div class="w-full max-w-md space-y-12">
   
    <!-- form header --> 
    <div class="space-y-4">
        <div class="lg:hidden flex items-center gap-2 mb-8">
            <span class="editorial-gradient h-8 w-8 rounded flex items-center justify-center">
                <span class="material-symbols-outlined text-white text-lg">link</span>
            </span>
        </div>
        
        <h2 class="font-headline text-4xl font-extrabold text-on-surface tracking-tight">Bem-vindo de volta</h2>
        <p class="text-on-surface-variant font-body">Acesse sua conta para gerenciar suas candidaturas e explorar novas vagas.</p>
    </div>


<!-- Form -->
<form method ="POST" action = "../public/index.php?url=auth/login" class="space-y-6">

    <div class="space-y-2">

        <label class="block text-sm font-semibold text-on-surface font-headline" for="email">E-mail corporativo ou acadêmico</label>
        <div class="relative">
            <input class="w-full px-4 py-4 bg-surface-container-low border-none rounded-lg focus:ring-1 focus:ring-primary focus:bg-surface-container-lowest transition-all text-on-surface placeholder:text-gray-400" id="email" placeholder="nome@exemplo.com" type="email"/>
        </div>

    </div>


    <div class="space-y-2">

        <div class="flex justify-between items-center">
            <label class="block text-sm font-semibold text-on-surface font-headline" for="password">Senha</label>
            <a class="text-xs font-medium text-primary hover:text-primary-container transition-colors" href="#">Esqueci minha senha</a>
        </div>
        <div class="relative">
            <input class="w-full px-4 py-4 bg-surface-container-low border-none rounded-lg focus:ring-1 focus:ring-primary focus:bg-surface-container-lowest transition-all text-on-surface placeholder:text-gray-400" id="password" placeholder="••••••••" type="password"/>
        </div>

    </div>

    <button type="submit" class="bg-primary text-white px-10 py-4 rounded-full font-bold editorial-shadow hover:brightness-110 transition-all"> Fazer Login </button>
    
    <p class="text-center text-on-surface-variant font-medium mt-8">
            Não tem uma conta?
        <a class="text-primary font-bold hover:underline ml-1" href="?url=home/cadastro">Cadastre-se</a>
    </p>
    
</div>
</div>
</section>
























