run:
1.  git clone https://github.com/ikhlasrama16/user-management-dika.git
2.  cd user-management-dika
3.  composer install
4.  cp .env.example .env
5.  set your database
6.  php artsian migrate:fresh --seed
7.  php artisan key:generate
8.  php artisan serve

email: admin@admin.com
pasword: password
