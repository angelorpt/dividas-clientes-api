---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://127.0.0.1:8000/docs/collection.json)

<!-- END_INFO -->

#Auth


<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Login
Logs in the user, receiving the token in response

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"smith@email.com","password":"secret"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "smith@email.com",
    "password": "secret"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9..."
}
```
> Example response (401):

```json
{
    "success": false,
    "message": "Invalid Email or Password"
}
```

### HTTP Request
`POST api/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | Email do usuário.
        `password` | string |  required  | Senha do usuário.
    
<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## Register
Register a new user

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"sr smith","email":"smith@email.com","password":"secret"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "sr smith",
    "email": "smith@email.com",
    "password": "secret"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "data": {
        "name": "sr smith",
        "email": "smith@email.com",
        "updated_at": "2020-04-28T13:28:08.000000Z",
        "created_at": "2020-04-28T13:28:08.000000Z",
        "id": 1
    }
}
```
> Example response (422):

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The email field is required."
        ]
    }
}
```

### HTTP Request
`POST api/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | User's name.
        `email` | string |  required  | User's email.
        `password` | string |  required  | User's password.
    
<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_61739f3220a224b34228600649230ad1 -->
## Logout
Logout is invalidate the token

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9..."}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9..."
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "User logged out successfully"
}
```
> Example response (401):

```json
{
    "message": "Token not provided"
}
```
> Example response (422):

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "token": [
            "The token field is required."
        ]
    }
}
```

### HTTP Request
`POST api/logout`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `token` | string |  required  | User's token.
    
<!-- END_61739f3220a224b34228600649230ad1 -->

<!-- START_b19e2ecbb41b5fa6802edaf581aab5f6 -->
## Me
Return the user by the token

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/me"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "name": "sr smith",
    "email": "smith@email.com",
    "email_verified_at": null,
    "created_at": "2020-04-28T13:28:08.000000Z",
    "updated_at": "2020-04-28T13:28:08.000000Z"
}
```
> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/me`


<!-- END_b19e2ecbb41b5fa6802edaf581aab5f6 -->

#Clientes


<!-- START_4708a91a0309f0ddbadd902f0e0f3767 -->
## Listar

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/clientes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/clientes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/clientes`


<!-- END_4708a91a0309f0ddbadd902f0e0f3767 -->

<!-- START_c7130feb7007e7ce36b8fbc7584cbe58 -->
## Salvar

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/clientes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":1,"id_jsonph":1,"name":"Leanne Graham","username":"Bret","email":"Sincere@april.biz","phone":"1-770-736-8031 x56442","website":"hildegard.org"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/clientes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 1,
    "id_jsonph": 1,
    "name": "Leanne Graham",
    "username": "Bret",
    "email": "Sincere@april.biz",
    "phone": "1-770-736-8031 x56442",
    "website": "hildegard.org"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/clientes`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | integer |  required  | ID do Cliente.
        `id_jsonph` | integer |  required  | ID do JSON Placeholder.
        `name` | string |  required  | Nome do cliente.
        `username` | string |  required  | Nome de usuário.
        `email` | string |  optional  | optional  Email do cliente.
        `phone` | string |  optional  | optional  Telefone do cliente.
        `website` | string |  optional  | optional  Website do cliente.
    
<!-- END_c7130feb7007e7ce36b8fbc7584cbe58 -->

<!-- START_d42edddc5c01411c3dddf01adb8a2f79 -->
## Consultar

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/clientes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/clientes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Cliente] 1"
}
```

### HTTP Request
`GET api/clientes/{cliente}`


<!-- END_d42edddc5c01411c3dddf01adb8a2f79 -->

<!-- START_84238590a7a12d110fd20345273abb25 -->
## Atualizar

> Example request:

```bash
curl -X PUT \
    "http://127.0.0.1:8000/api/clientes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":1,"id_jsonph":1,"name":"Leanne Graham","username":"Bret","email":"Sincere@april.biz","phone":"1-770-736-8031 x56442","website":"hildegard.org"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/clientes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 1,
    "id_jsonph": 1,
    "name": "Leanne Graham",
    "username": "Bret",
    "email": "Sincere@april.biz",
    "phone": "1-770-736-8031 x56442",
    "website": "hildegard.org"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/clientes/{cliente}`

`PATCH api/clientes/{cliente}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | integer |  required  | ID do Cliente.
        `id_jsonph` | integer |  required  | ID do JSON Placeholder.
        `name` | string |  required  | Nome do cliente.
        `username` | string |  required  | Nome de usuário.
        `email` | string |  optional  | optional  Email do cliente.
        `phone` | string |  optional  | optional  Telefone do cliente.
        `website` | string |  optional  | optional  Website do cliente.
    
<!-- END_84238590a7a12d110fd20345273abb25 -->

<!-- START_6864d4bf53f3add54af093e7fd2e8864 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://127.0.0.1:8000/api/clientes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/clientes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/clientes/{cliente}`


<!-- END_6864d4bf53f3add54af093e7fd2e8864 -->

#Dividas


<!-- START_4dba3b3a7a420a18d23f0faf0a1ab50a -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/dividas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/dividas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/dividas`


<!-- END_4dba3b3a7a420a18d23f0faf0a1ab50a -->

<!-- START_c022dfc28d1903d4f1439def2e8661e9 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/dividas/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/dividas/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/dividas/create`


<!-- END_c022dfc28d1903d4f1439def2e8661e9 -->

<!-- START_c8f1d524f8a6cabaa4b0614621ee85a8 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/dividas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/dividas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/dividas`


<!-- END_c8f1d524f8a6cabaa4b0614621ee85a8 -->

<!-- START_33ea587cae2435c849bbcf0aa0dede95 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/dividas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/dividas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Divida] 1"
}
```

### HTTP Request
`GET api/dividas/{divida}`


<!-- END_33ea587cae2435c849bbcf0aa0dede95 -->

<!-- START_a6fd040ff2c2347e67e8d35c1a3117c2 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/dividas/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/dividas/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Divida] 1"
}
```

### HTTP Request
`GET api/dividas/{divida}/edit`


<!-- END_a6fd040ff2c2347e67e8d35c1a3117c2 -->

<!-- START_48eeb9a5ec9460bf032808fa51ec81a9 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://127.0.0.1:8000/api/dividas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/dividas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/dividas/{divida}`

`PATCH api/dividas/{divida}`


<!-- END_48eeb9a5ec9460bf032808fa51ec81a9 -->

<!-- START_1d5db53335f9c0417c538c04f48222a9 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://127.0.0.1:8000/api/dividas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/dividas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/dividas/{divida}`


<!-- END_1d5db53335f9c0417c538c04f48222a9 -->


