# Integração Figma → Projeto — Portal Estágio CEFET

## Visão Geral

O projeto foi reconstruído para se tornar integralmente o design do Figma (Portal Estágio CEFET). Todas as páginas visíveis no design foram convertidas para Blade, mantendo a estrutura de pastas e a lógica do seu projeto Laravel (app/, config/, Database/, routes/, tests/).

## Páginas criadas (todas do Figma)

| Rota | View | Conteúdo (Figma) |
|---|---|---|
| `/` e `/home` | `home.blade.php` | Hero com gradiente azul, título "Seu estágio começa aqui", grid de funcionalidades |
| `/login` | `login.blade.php` | Tela cheia gradiente #0077fc, card branco, email/senha com ícones, toggle de visibilidade |
| `/cadastro` e `/cadastro/{perfil}` | `cadastro.blade.php` | 2 passos: seleção de perfil (aluno, supervisor, orientador, contratante, administrador) + formulário dinâmico por tipo com validação de senhas |
| `/dashboard` e `/aluno` | `dashboard.blade.php` | Orquestador: carrega o dashboard do perfil logado via `session('user_type')` |
| — | `partials/dashboard-aluno.blade.php` | Saudação, 3 cards (horas, pendências, tutorial), trilha do estágio, estágio atual, documentos |
| — | `partials/dashboard-supervisor.blade.php` | Banner, 4 stats, validação de presenças, estagiários, gerar fichas |
| — | `partials/dashboard-orientador.blade.php` | 4 stats, orientandos com progresso, gerar relatório |
| — | `partials/dashboard-contratante.blade.php` | 3 stats, estagiários com progresso, presenças/ficha |
| — | `partials/dashboard-administrador.blade.php` | 3 stats, ações rápidas, atividades recentes |
| `/vagas` | `vagas.blade.php` | Vagas internas CEFET: busca, filtros (cidade, curso, conveniada), chips, cards com badges |
| `/vagas/{id}` | `vaga-detalhe.blade.php` | Header gradiente, sobre a vaga, requisitos, detalhes, candidatar-se |
| `/inscricoes` | redireciona para `/vagas` | Fluxo antigo preservado |
| `/controle-horas` | `controle-horas.blade.php` | 3 cards de horas, calendário, histórico de presenças, modal registrar presença, exportar/ficha |
| `/tutorial` | `tutorial.blade.php` | Hero gradiente + trilha com 9 etapas do estágio |
| `/perfil` | `perfil.blade.php` | Sidebar com avatar, formulário de informações pessoais, alteração de senha |
| `/empresas` | `empresas.blade.php` | Stats, busca e filtros, grid de empresas conveniadas |
| `/logout` | volta para `/login` | — |

## Navegação interna (header do Figma)

Quando `session('user_id')` existe, o header fica branco e mostra: Dashboard, Empresas (+ Tutorial/Vagas/Controle de Horas para alunos), menu do usuário (/perfil) e Sair (/logout). Sem login, o header mostra o gradiente azul com Entrar/Cadastrar.

## Observações importantes

1. **Sessão**: o header interno, o dashboard por perfil e o perfil dependem das sessões `user_id`, `user_name`, `user_type`, `user_email`, `user_matricula`. Quando você implementar o login (controller `auth/login`), basta gravar essas chaves que tudo funciona automaticamente.
2. **Tailwind via CDN** + `public/css/style.css` (classe `fig-gradient` e utilitários do Figma).
3. **Fontes e ícones**: Inter + Material Symbols (CDN do Google).
4. **Banco**: o projeto continua apontando para MySQL (`SESSION_DRIVER=database`). Para rodar sem banco configurado durante o desenvolvimento visual, troque temporariamente no `.env`: `SESSION_DRIVER=file` (e crie a tabela `sessions` quando voltar para `database`).
5. **Estrutura de pastas preservada**: nada em `app/`, `config/`, `Database/sql/`, `tests/` foi removido.

## Como usar

```bash
# Limpar cache de views compiladas
php artisan view:clear

# Rodar
php artisan serve
```

## Rotas adicionadas (originais mantidas)

Foram adicionadas: `/dashboard`, `/vagas/{id}` (agora aponta para `vaga-detalhe`), `/controle-horas`, `/tutorial`, `/perfil`, `/empresas`. As rotas originais (`/home`, `/login`, `/cadastro`, `/cadastro/{perfil}`, `/vagas`, `/inscricoes`) permanecem funcionando.
