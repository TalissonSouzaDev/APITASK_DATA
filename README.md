# API TASK

Uma API para criação de bloco de notas LARAVEL 9.0


## Instalação

Instale my-project com npm

```bash
  
  git clone https://github.com/TalissonSouzaDev/APITASK_DATA.git
```
```bash
  
 cp .env.example .env
```

```bash
  
 composer install
```

```bash
  
 php artisan key:generate
```

```bash
  
 php artisan migrate
```

```bash
  
 php artisan db:seed
```

## Documentação da API

#### Fazer Login

```http
  POST http://127.0.0.1:8000/api/login
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `email` | `string` | **Obrigatório** |
| `password` | `string` | **Obrigatório** |



#### Retorna todos os items do usuario autenticado

```http
  GET http://127.0.0.1:8000/api/task/index
```

#### Retorna um item

```http
  GET http://127.0.0.1:8000/api/task/show/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do item que você quer |

#### CADASTRO de task

```http
  POST http://127.0.0.1:8000/api/task/store
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `title`      | `string` | **Obrigatório** |
| `descritpion`      | `string` | **Obrigatório** |
| `Authorization`      | `string` | **TOKEN DE AUTENTICAÇÃO** |


#### ATUALIZA de task

```http
  PUT http://127.0.0.1:8000/api/task/store
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do item que você quer |
| `title`      | `string` | **Obrigatório** |
| `descritpion`      | `string` | **Obrigatório** |
| `Authorization`      | `string` | **TOKEN DE AUTENTICAÇÃO** |

#### DELETA de task
```http
  DELETE http://127.0.0.1:8000/api/task/destroy/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do item que você quer |

#### FILTRAR de task
```http
  POST/GET http://127.0.0.1:8000/api/task/filter
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `filter`      | `string` | **O QUE DESEJA FILTRAR** |
