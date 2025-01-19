run:
1.  cd user-management-dika
2.  cp .env.example .env
3.  php artsian migrate:fresh --seed
4.  php artisan key:generate
5.  php artisan serve

email: admin@admin.com
pasword: password
