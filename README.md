composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve


Diagrama ER

plans ──< subscriptions >── companies ──< users
+-------------+        +----------------+        +------------------+
|   plans     |        |  subscriptions |        |     companies    |
|-------------|        |----------------|        |------------------|
| id (PK)     |<--1  n-| plan_id (FK)   |n----1->| company_id (PK)  |
| name        |        | company_id (FK)|        | name             |
| price       |        | started_at     |        | email            |
| user_limit  |        | ended_at       |        | plan_id (FK)     |
| features    |        | status         |        |                  |
+-------------+        +----------------+        +------------------+
                                                    |
                                                    | 1
                                                    | 
                                                    n
                                            +----------------+
                                            |      users     |
                                            |----------------|
                                            | id (PK)        |
                                            | company_id (FK)|
                                            | name           |
                                            | email          |
                                            | password       |
                                            |                |
                                            +----------------+

Extructura de Carpetas

app/
 ├─ Domain/
 ├─ Application/
 ├─ Infrastructure/
 ├─ Http/
 └─ Models/
