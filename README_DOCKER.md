# Configuração do Projeto com Docker (Laravel Sail)

Este projeto foi configurado para rodar em qualquer computador utilizando **Docker Desktop** e **Laravel Sail**, garantindo compatibilidade com **PHP 8.2**.

## Pré-requisitos

1.  **Docker Desktop** instalado e rodando.
2.  (Opcional) **WSL2** se estiver no Windows.

## Como rodar o projeto pela primeira vez

Abra o terminal na pasta do projeto e execute:

```bash
./setup-docker.sh
```

Este script irá:
- Iniciar os containers.
- Instalar as dependências do Composer.
- Gerar a chave da aplicação.
- Rodar as migrações do banco de dados.
- Compilar os assets do Vite.

## Comandos úteis do Sail

Como você está usando o Sail, não precisa ter PHP ou Node instalados na sua máquina física. Use os comandos abaixo:

- **Subir o projeto:** `./vendor/bin/sail up -d`
- **Parar o projeto:** `./vendor/bin/sail stop`
- **Rodar comandos Artisan:** `./vendor/bin/sail artisan [comando]`
- **Rodar comandos Composer:** `./vendor/bin/sail composer [comando]`
- **Rodar comandos NPM:** `./vendor/bin/sail npm [comando]`

## Acesso

- **Aplicação:** [http://localhost](http://localhost)
- **Dashboard de E-mails (Mailpit):** [http://localhost:8025](http://localhost:8025)

---
*Configurado por Manus AI - Compatibilidade PHP 8.2 garantida.*
