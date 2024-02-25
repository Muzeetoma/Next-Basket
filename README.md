<h1>Instructions for usage</h1>

<h3>To get started:</h3>

    - [ ]docker-compose up
    - [ ] docker exec -it next-basket-users-app-1 /bin/bash
    - [ ] php artisan migrate
    - [ ] php artisan serve --host=0.0.0.0 --port=9000


<h3>To make api requests:</h3>
Post Request: <br>

```
http://localhost:9000/api/users <br>
{
    "email”:”muze@gmail.com", <br>
    "firstName”:”Muze”, <br>
    "lastName”:”Johnson” <br>
}
```

<h3>To run tests:</h3>
php artisan test <br>
