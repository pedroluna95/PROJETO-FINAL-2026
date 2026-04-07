<?php
// <!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>Login</title>
// </head>
// <body>

//     <button type="button" onclick="window.location.href='../public/index.php?url=home'">
//         Voltar
//     </button>

//     <button type="button" onclick="window.location.href='../public/index.php?url=home/cadastro'">
//         Não tem conta? Cadastre-se
//     </button>

// </body>
// </html>
?>





<!-- Right Section: Login Form -->
<section class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-surface">
<div class="w-full max-w-md space-y-12">
<!-- Form Header -->
<div class="space-y-4">
<div class="lg:hidden flex items-center gap-2 mb-8">
<span class="editorial-gradient h-8 w-8 rounded flex items-center justify-center">
<span class="material-symbols-outlined text-white text-lg">link</span>
</span>
<span class="text-on-surface font-headline text-xl font-extrabold tracking-tight">InternHub</span>
</div>
<h2 class="font-headline text-4xl font-extrabold text-on-surface tracking-tight">Bem-vindo de volta</h2>
<p class="text-on-surface-variant font-body">Acesse sua conta para gerenciar suas candidaturas e explorar novas vagas.</p>
</div>
<!-- Form -->
<form class="space-y-6">
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
<div class="flex items-center space-x-3 py-2">
</div>
<button class="w-full editorial-gradient text-white font-headline font-bold py-4 px-6 rounded-full shadow-lg hover:opacity-90 active:scale-[0.98] transition-all flex items-center justify-center gap-2" type="submit">
<span>Entrar</span>
<span class="material-symbols-outlined text-xl">login</span>
</button>
</form>
</div>
</div>
</section>
</main>
</body>
</html>



















