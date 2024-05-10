# Comandos consola

# Primero debemos crear la imagen de docker:

docker-compose -f docker-compose-local.yml up --build

# configuramos el .env
cp .env.example .env

# en el .env creado modificamos la conexion de base de datos en los siguientes campos

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=db_pares
DB_USERNAME=root
DB_PASSWORD=secret

# ingresar a la consola del docker
cd /var/wwww/html

# para instalar laravel
composer install

# para instalar node
npm install

# crear base de datos y hacer migraciones
php artisan migrate --seed

# ejecutar node
npm run dev

# usuario para ingresar por defecto 
admin@admin.com
12341234