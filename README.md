для того что бы развернуть проет на локальной машине нужно 
1) скачать репозиторий в папку
2) на локальной машине запустить консоль и выполнить команду compopser install
3) Переименовать .env.example в .env и обновил его с вашими данными базы данных
4) выполнить команду php artisan key:generate
5) выполнить команду php artisan migrate
6) выполнить команду php artisan db:seed --class=DatabaseSeeder
7) выполнить команду php artisan storage:link
8) можно запускать проект 
