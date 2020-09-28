В проекте использованы Symfony framework, PostgreSQL.

Для запуска проекта необходимо выполнить следующие действия:
1. Создаем .env на основе .env.example и заполняем его правильныи доступами к postgres
2. Запускаем команду composer install
3. Запускаем команду php bin/console doctrine:database:create в папке проекта. Команда создает базу данных.
4. Запускаем команду php bin/console doctrine:migrations:migrate в папке проекта. Команда выполнит миграцию базы данных.
5. Запускаем команду php bin/console doctrine:fixtures:load в папке проекта. Команда заполнит таблицу users тестовыми данными.



