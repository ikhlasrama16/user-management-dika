run:
1.  cd user-management-dika
2.  cp .env.example .env
3.  set your database
4.  php artsian migrate:fresh --seed
5.  php artisan key:generate
6.  php artisan serve

email: admin@admin.com
pasword: password
