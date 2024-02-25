<h1>Instructions for usage</h1>

<h3>To get started:</h3>
<ul>
    <li>docker-compose up</li>
    <li>docker exec -it next-basket-users-app-1 /bin/bash</li>
    <li>php artisan migrate</li>
    <li>php artisan serve --host=0.0.0.0 --port=9000</li>
</ul>


<h3>To make api requests:</h3>
Post Request: <br>

```
http://localhost:9000/api/users <br>
{ <br>
    "email”:”muze@gmail.com", <br>
    "firstName”:”Muze”, <br>
    "lastName”:”Johnson” <br>
}
```

<h3>To run tests:</h3>
php artisan test <br>
