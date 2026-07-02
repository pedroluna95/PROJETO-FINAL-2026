#!/bin/bash

# Verifica se o Docker está rodando
if ! docker info > /dev/null 2>&1; then
    echo "Erro: O Docker não parece estar rodando. Por favor, inicie o Docker Desktop."
    exit 1
fi

# Copia o .env se não existir
if [ ! -f .env ]; then
    cp .env.example .env
    echo ".env criado a partir do .env.example"
fi

# Sobe os containers
echo "Iniciando os containers do Docker (Laravel Sail)..."
./vendor/bin/sail up -d

# Instala dependências do PHP
echo "Instalando dependências do PHP..."
./vendor/bin/sail composer install

# Gera a chave da aplicação
echo "Gerando chave da aplicação..."
./vendor/bin/sail artisan key:generate

# Roda as migrações
echo "Rodando as migrações do banco de dados..."
./vendor/bin/sail artisan migrate --seed

# Instala dependências do NPM e compila assets
echo "Instalando dependências do NPM e compilando assets..."
./vendor/bin/sail npm install
./vendor/bin/sail npm run build

echo "---------------------------------------------------"
echo "Projeto configurado com sucesso!"
echo "Acesse em: http://localhost"
echo "Mailpit (E-mails): http://localhost:8025"
echo "---------------------------------------------------"
