# Guia de Configuração e Uso: Laravel + Docker (Sail)

Este guia fornece um passo a passo detalhado para garantir que seu projeto **PROJETO-FINAL-2026** funcione de forma idêntica em qualquer computador, utilizando o **Docker Desktop** e o **Laravel Sail** com **PHP 8.2**.

---

## 1. Preparação do Ambiente (Uma única vez por computador)

Antes de rodar o projeto, você precisa garantir que o computador tenha as ferramentas necessárias instaladas.

| Ferramenta | Descrição | Link de Instalação |
| :--- | :--- | :--- |
| **Docker Desktop** | O motor que roda os containers (PHP, MySQL, Redis). | [Instalar Docker](https://www.docker.com/products/docker-desktop/) |
| **WSL 2** | Necessário apenas para usuários de **Windows**. | [Guia WSL 2](https://learn.microsoft.com/pt-br/windows/wsl/install) |
| **Terminal** | Git Bash, PowerShell ou Terminal do VS Code. | Pré-instalado no SO |

> **Nota Importante:** Certifique-se de que o Docker Desktop esteja aberto e rodando antes de prosseguir para os próximos passos.

---

## 2. Primeira Execução (Setup Inicial)

Siga estes passos quando estiver baixando o projeto em um computador novo ou após clonar o repositório.

### Passo 2.1: Extração
Extraia o conteúdo do arquivo `PROJETO-FINAL-2026-DOCKER.zip` em uma pasta de sua preferência.

### Passo 2.2: Executar o Script de Setup
Abra o terminal dentro da pasta do projeto e execute o comando abaixo. Este script automatiza a criação do arquivo `.env`, sobe os containers e instala as dependências.

```bash
./setup-docker.sh
```

**O que este comando faz internamente?**
1. Verifica se o Docker está ativo.
2. Cria o arquivo `.env` (configurações de ambiente).
3. Sobe os serviços (Banco de dados, PHP, Redis).
4. Instala as dependências do PHP (`composer install`).
5. Gera a chave de segurança do Laravel.
6. Cria as tabelas no banco de dados (`migrate`).
7. Compila os arquivos de interface (`npm install` e `build`).

---

## 3. Uso Diário (Como rodar nas próximas vezes)

Após a primeira configuração, você não precisa mais rodar o `setup-docker.sh`. O processo diário é muito mais simples.

### Iniciando o Projeto
Sempre que quiser trabalhar no site, abra o terminal na pasta e digite:
```bash
./vendor/bin/sail up -d
```
*O parâmetro `-d` faz com que ele rode em segundo plano.*

### Acessando as Ferramentas
Com o projeto rodando, você pode acessar:
*   **Site:** [http://localhost](http://localhost)
*   **Banco de Dados:** Conexão via `localhost:3306` (usuário: `sail`, senha: `password`).
*   **E-mails (Mailpit):** [http://localhost:8025](http://localhost:8025) (para ver e-mails enviados pelo sistema).

### Encerrando o Trabalho
Quando terminar de usar, pare os containers para liberar memória do computador:
```bash
./vendor/bin/sail stop
```

---

## 4. Comandos Úteis do Laravel Sail

Como o PHP e o Node estão dentro do Docker, você deve usar o prefixo `./vendor/bin/sail` para comandos que normalmente usaria diretamente.

| Comando Comum | Equivalente no Docker (Sail) |
| :--- | :--- |
| `php artisan ...` | `./vendor/bin/sail artisan ...` |
| `composer install` | `./vendor/bin/sail composer install` |
| `npm run dev` | `./vendor/bin/sail npm run dev` |
| `php artisan migrate` | `./vendor/bin/sail artisan migrate` |

---

## 5. Resolução de Problemas Comuns

> "O comando `./vendor/bin/sail` não funciona."
> 
> **Solução:** Verifique se você está na pasta raiz do projeto e se o Docker Desktop está aberto. No Windows, prefira usar o terminal dentro do WSL2 para melhor performance.

> "Erro de permissão ao rodar o script."
> 
> **Solução:** Execute `chmod +x setup-docker.sh` no terminal para dar permissão de execução.

---
**Desenvolvido por Manus AI**
