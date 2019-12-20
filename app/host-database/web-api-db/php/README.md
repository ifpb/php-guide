# Host Database PHP

- [Code](#code)
- [Database](#database)
  - [Schema](#schema)
  - [Install](#install)
  - [Model](#model)
- [API](#api)

## Code

---

```
php
├── api
│   └── v1
│       └── index.php
├── database
│   ├── config.php
│   ├── database.php
│   └── schema.sql
├── .env
├── docker-compose.yml
├── Dockerfile
├── install
│   └── index.php
└── model
    └── host.php
```

> [docker-compose.yml](docker-compose.yml):

```
{% include_relative docker-compose.yml %}
```

> [Dockerfile](Dockerfile):

```
{% include_relative Dockerfile %}
```

> [.env](.env):

```
{% include_relative .env %}
```

## Database

---

### Schema

> [Host Simple Model](../../../../stdlib/pdo/codes/host-simple/)

![](assets/schema.png)

> [database/schema.sql](database/schema.sql):

```sql
{% include_relative database/schema.sql %}
```

### Install

> [http://localhost:8080/install/](http://localhost:8080/install/) ([install/index.php](install/index.php)):

```php
{% include_relative install/index.php %}
```

> [database/config.php](database/config.php):

```php
{% include_relative database/config.php %}
```

### Model

> [database/database.php](database/database.php):

```php
{% include_relative database/database.php %}
```

> [model/host.php](model/host.php):

```php
{% include_relative model/host.php %}
```

## API

---

> [api/v1/index.php](api/v1/index.php):

```php
{% include_relative api/v1/index.php %}
```
