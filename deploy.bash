php artisan down
git pull origin
php artisan migrate --seed --force
php artisan route:cache
php artisan config:cache
php artisan optimize
composer dump-autoload -o
php artisan up