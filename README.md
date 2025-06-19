# Klinik Antrian

### Instalation Demo (Local)

-   clone this repository
-   cp.env.example .env (copy environtment variable)
-   config the DB Connection
-   `composer install`
-   `php artisan key:generate`
-   `php artisan migrate:fresh`
-   `php artisan db:seed --class=AdminSeeder`
-   `php artisan db:seed --class=SettingwebSeeder`

### User Account For Demo

-   superadmin@gmail.com (superadmin)
-   pasien@gmail.com (password)
