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
    -d '{"email":"admin@email.com","password":"admin"}'

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
    "email": "admin@email.com",
    "password": "admin"
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


<!-- START_ac00975e5466c8f2738ab98a7c964728 -->
## Dividas

Retorna a lista de dívidas de um cliente

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/clientes/1/dividas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/clientes/1/dividas"
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
`GET api/clientes/{id}/dividas`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | ID do Cliente.

<!-- END_ac00975e5466c8f2738ab98a7c964728 -->

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


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/clientes/{cliente}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | ID do Cliente.

<!-- END_d42edddc5c01411c3dddf01adb8a2f79 -->

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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | ID do Cliente.

<!-- END_6864d4bf53f3add54af093e7fd2e8864 -->

#Dividas


<!-- START_4dba3b3a7a420a18d23f0faf0a1ab50a -->
## Listar

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

<!-- START_c8f1d524f8a6cabaa4b0614621ee85a8 -->
## Salvar

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/dividas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"motivo":"Compra de telefone","data":"2020-12-03","valor":"1299.90","cliente_id":1}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/dividas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "motivo": "Compra de telefone",
    "data": "2020-12-03",
    "valor": "1299.90",
    "cliente_id": 1
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
`POST api/dividas`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `motivo` | string |  required  | Motivo da Dívida.
        `data` | date |  required  | Data da Dívida.
        `valor` | numeric |  required  | Valor da Dívida.
        `cliente_id` | integer |  required  | ID do Cliente.
    
<!-- END_c8f1d524f8a6cabaa4b0614621ee85a8 -->

<!-- START_33ea587cae2435c849bbcf0aa0dede95 -->
## Consultar

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


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/dividas/{divida}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | ID da Dívida.

<!-- END_33ea587cae2435c849bbcf0aa0dede95 -->

<!-- START_48eeb9a5ec9460bf032808fa51ec81a9 -->
## Atualizar

> Example request:

```bash
curl -X PUT \
    "http://127.0.0.1:8000/api/dividas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"motivo":"Compra de telefone","data":"2020-12-03","valor":"1299.90","cliente_id":1}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/dividas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "motivo": "Compra de telefone",
    "data": "2020-12-03",
    "valor": "1299.90",
    "cliente_id": 1
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
`PUT api/dividas/{divida}`

`PATCH api/dividas/{divida}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | ID da Dívida.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `motivo` | string |  required  | Motivo da Dívida.
        `data` | date |  required  | Data da Dívida.
        `valor` | numeric |  required  | Valor da Dívida.
        `cliente_id` | integer |  required  | ID do Cliente.
    
<!-- END_48eeb9a5ec9460bf032808fa51ec81a9 -->

<!-- START_1d5db53335f9c0417c538c04f48222a9 -->
## Deletar

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

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | ID da Dívida.

<!-- END_1d5db53335f9c0417c538c04f48222a9 -->

#Integração


<!-- START_3b226aa5724ea1394b2fd9093b5d375f -->
## Integrar/Clientes

> Example request:

```bash
curl -X PUT \
    "http://127.0.0.1:8000/api/integracao/clientes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/integracao/clientes"
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
`PUT api/integracao/clientes`


<!-- END_3b226aa5724ea1394b2fd9093b5d375f -->


