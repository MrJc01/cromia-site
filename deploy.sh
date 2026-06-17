#!/bin/bash
# Script de Deploy e Atualização Automática para o Cromia Site
# Localização recomendada no VPS: /var/www/cromia-site/deploy.sh

set -e

PROJECT_DIR="/var/www/cromia-site"

echo "=========================================="
echo "   Iniciando Deploy do Cromia Site        "
echo "=========================================="

# 1. Navegar até o diretório do projeto
cd "$PROJECT_DIR"

# 2. Atualizar o repositório
echo "-> Puxando atualizações do Git..."
git fetch origin main
git reset --hard origin/main

# 3. Instalar/atualizar dependências do Composer
echo "-> Instalando dependências do Composer..."
export COMPOSER_ALLOW_SUPERUSER=1
composer install --no-dev --optimize-autoloader --no-interaction

# 4. Compilar assets do Tailwind CSS
if command -v npm &> /dev/null; then
    echo "-> Instalando pacotes npm e compilando assets com Tailwind..."
    npm install
    npm run build
else
    echo "-> [AVISO] npm/Node.js não detectado. Usando assets CSS pré-compilados do repositório."
fi

# 5. Ajustar permissões para o servidor web (Nginx / php-fpm)
echo "-> Ajustando permissões dos diretórios..."
chown -R www-data:www-data "$PROJECT_DIR"
chmod -R 775 "$PROJECT_DIR"/runtime
chmod -R 775 "$PROJECT_DIR"/web/assets

# 6. Executar migrações do banco (SQLite)
echo "-> Executando migrações do banco de dados (SQLite)..."
php yii migrate --interactive=0

# 7. Limpar caches do Yii
echo "-> Limpando caches do Yii..."
php yii cache/flush-all

echo "=========================================="
echo "   Deploy concluído com sucesso!          "
echo "=========================================="
