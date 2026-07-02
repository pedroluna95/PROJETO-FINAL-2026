# Script de Setup Robusto para Windows (PowerShell) - Sem dependência de Bash/WSL

Write-Host "Iniciando configuração do projeto Laravel com Docker (Modo Nativo Windows)..." -ForegroundColor Cyan

# 1. Verifica se o Docker está rodando
try {
    docker info > $null 2>&1
} catch {
    Write-Host "Erro: O Docker não parece estar rodando. Por favor, inicie o Docker Desktop." -ForegroundColor Red
    exit
}

# 2. Copia o .env se não existir
if (-not (Test-Path ".env")) {
    Copy-Item ".env.example" ".env"
    Write-Host ".env criado a partir do .env.example" -ForegroundColor Yellow
}

# 3. Sobe os containers usando Docker Compose diretamente
Write-Host "Subindo containers via Docker Compose..." -ForegroundColor Cyan
docker-compose up -d

Write-Host "Aguardando containers iniciarem (10 segundos)..." -ForegroundColor Gray
Start-Sleep -Seconds 10

# 4. Executa comandos DIRETAMENTE via Docker (sem passar pelo script 'sail' que quebra no seu PC)
Write-Host "Instalando dependências do PHP (Composer)..." -ForegroundColor Cyan
docker exec -it $(docker ps -qf "name=laravel.test") composer install

Write-Host "Gerando chave da aplicação..." -ForegroundColor Cyan
docker exec -it $(docker ps -qf "name=laravel.test") php artisan key:generate

Write-Host "Rodando migrações do banco de dados..." -ForegroundColor Cyan
docker exec -it $(docker ps -qf "name=laravel.test") php artisan migrate --seed

Write-Host "Instalando dependências do NPM..." -ForegroundColor Cyan
docker exec -it $(docker ps -qf "name=laravel.test") npm install

Write-Host "Compilando assets (Vite)..." -ForegroundColor Cyan
docker exec -it $(docker ps -qf "name=laravel.test") npm run build

Write-Host "---------------------------------------------------" -ForegroundColor Green
Write-Host "PROJETO CONFIGURADO COM SUCESSO!" -ForegroundColor Green
Write-Host "Acesse em: http://localhost" -ForegroundColor Green
Write-Host "Mailpit: http://localhost:8025" -ForegroundColor Green
Write-Host "---------------------------------------------------" -ForegroundColor Green
Write-Host "DICA: Para rodar comandos depois, use: docker exec -it (nome_do_container) php artisan ..." -ForegroundColor Yellow
