В проекте использованы **Symfony framework, PostgreSQL.**

Для запуска проекта необходимо выполнить следующие действия:
1. Создаем .env на основе .env.example и заполняем его доступами к postgres
2. Запускаем команду composer install
3. Запускаем команду php bin/console doctrine:database:create в папке проекта. Команда создает базу данных.
4. Запускаем команду php bin/console doctrine:migrations:migrate в папке проекта. Команда выполнит миграцию базы данных.
5. Запускаем команду php bin/console doctrine:fixtures:load в папке проекта. Команда наполнит таблицу users тестовыми данными.

Эндпоинты:
> POST | http://domain/api/user/credit
```xml
<?xml version="1.0"?>
<credit amount="1" tid="QMisjoCTc1GBM3RdoP2xvVJlusQNntQVoaGQ=" uid="8pbc1B0bAfVKlZ8xRjRsSjDkjw=="></credit>
```

> POST | http://domain/api/user/debit
```xml
<?xml version="1.0"?>
<debit amount="1" tid="QMisjoCTc1GBMy3RdoP2xvVJlusQNntQVoaGQ=" uid="8pbc1B0bAfVKlZ8xRjRsSjDkjw=="></debit>
```
