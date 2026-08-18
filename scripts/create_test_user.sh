#!/bin/bash
set -e

# Baixa a página de login e extrai o token CSRF
curl -c /tmp/cookies -s http://localhost:8000/login -o /tmp/login.html
TOKEN=$(sed -n 's/.*name="_token" value="\([^"]*\)".*/\1/p' /tmp/login.html)
echo "CSRF: $TOKEN"

# Faz login com o admin existente
curl -b /tmp/cookies -c /tmp/cookies -s -X POST -d "_token=$TOKEN&email=admin@admin.com&senha=cefet123" -i http://localhost:8000/login

echo "--- attempt create user ---"

# Envia POST para criar usuário (JSON) usando cookie e header CSRF
curl -b /tmp/cookies -s -X POST -H "Content-Type: application/json" -H "X-CSRF-TOKEN: $TOKEN" \
    -d '{"nome":"Aluno Teste","email":"alunoteste@example.com","senha":"senha123","cpf":"12345678910","tipo":"aluno","matricula":"2026005"}' \
    http://localhost:8000/admin/api/usuarios -i
