#!/bin/bash
set -e

echo "🚀 Yangilanish boshlandi..."
cd /var/www/Kriminalogiya

echo "📥 Git yangilanishlari olinmoqda..."
git pull origin main

echo "⚡ Keshlar tozalanmoqda va optimallashmoqda..."
php artisan optimize:clear
php artisan optimize

echo "🔄 PHP-FPM qayta yuklanmoqda..."
systemctl reload php8.2-fpm

echo "✅ Sayt muvaffaqiyatli yangilandi va tezligi optimallashtirildi!"
