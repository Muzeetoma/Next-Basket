Instructions for usage

To get started:
docker-compose up
docker exec -it next-basket-users-app-1 /bin/bash
php artisan migrate  
php artisan serve --host=0.0.0.0 --port=9000

To make api requests:
Post Request:
http://localhost:9000/api/users
{
    "email”:”muze@gmail.com",
    "firstName”:”Muze”,
    "lastName”:”Johnson”
}

To run tests:
php artisan test
