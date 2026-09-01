#!/bin/bash
set -e

# Buscar página de cadastro e salvar cookies
curl -s -c /tmp/cookies "http://localhost:8000/cadastro" -o /tmp/cadastro.html

# Extrair token CSRF usando PHP
TOKEN=$(php -r 'echo preg_match("/name=\"_token\" value=\"([^\"]+)\"/", file_get_contents("/tmp/cadastro.html"), $m) ? $m[1] : "";')

if [ -z "$TOKEN" ]; then
  echo "CSRF token não encontrado" >&2
  exit 1
fi

echo "Token: $TOKEN"

# Submeter formulário como se fosse o browser
curl -s -b /tmp/cookies -X POST "http://localhost:8000/cadastro" \
  -F "_token=$TOKEN" \
  -F "tipo=aluno" \
  -F "nome=UI Test $(date +%s)" \
  -F "email=ui-test+$(date +%s)@example.com" \
  -F "cpf=12345678901" \
  -F "matricula=123" \
  -F "senha=senha123" \
  -F "confirmar_senha=senha123" \
  -D /tmp/resp_headers -o /tmp/resp_body

echo "--- Response Headers ---"
cat /tmp/resp_headers
echo "--- Response Body ---"
cat /tmp/resp_body

# Mostrar últimas linhas do log para correlacionar
echo "--- Last 40 log lines ---"
tail -n 40 storage/logs/laravel.log || true
