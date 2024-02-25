Instructions for usage<br>

To get started:<br>
docker-compose up<br>
docker exec -it next-basket-users-app-1 /bin/bash <br>
php artisan migrate <br> 
php artisan serve --host=0.0.0.0 --port=9000 <br>

To make api requests: <br>
Post Request: <br>
http://localhost:9000/api/users <br>
{ <br>
    "email”:”muze@gmail.com", <br>
    "firstName”:”Muze”, <br>
    "lastName”:”Johnson” <br>
}

To run tests: <br>
php artisan test <br>
