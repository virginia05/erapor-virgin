## Cara Install

-   di cmd ketik git clone https://github.com/virginia05/erapor-virgin.git
-   masuk ke folder erapor-virgin (masih memakai cmd) (caranya ketik cd erapor-virgin)
-   ketik composer install
-   rename file .env.example menjadi .env
-   buat db di phpmyadmin dengan nama 'dberapor'
-   run php artisan key:generate
-   di cmd ketik php artisan migrate
-   di cmd ketik php artisan db:seed
-   untuk menjalankan ketik php artisan serve
