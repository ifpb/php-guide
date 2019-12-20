# Host Simple Model

- [Code](#code)
- [Database](#database)
- [Install](#install)
- [PDO Model](#pdo-moodel)
  - [Database Model](#database-model)
  - [Host Model](#host-model)
- [How to CRUD](#how-to-crud)

## Code

---

```
host-simple
├── .env
├── Dockerfile
├── database
│   ├── config.php
│   ├── database.php
│   ├── schema.mwb
│   └── schema.sql
├── docker-compose.yml
├── install
│   └── index.php
├── model
│   └── host.php
└── test.php
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

![](assets/schema.png)

> [database/schema.sql](database/schema.sql):

```sql
{% include_relative database/schema.sql %}
```

## Install

---

> [install/index.php](install/index.php):

```php
{% include_relative install/index.php %}
```

> [database/config.php](database/config.php):

```php
{% include_relative database/config.php %}
```

> [http://localhost:8080/install/](http://localhost:8080/install/)

## PDO Model

---

![](assets/model-host.svg)

### Database Model

> [database/database.php](database/database.php):

```php
{% include_relative database/database.php %}
```

### Host Model

> [model/host.php](model/host.php):

```php
{% include_relative model/host.php %}
```

## How to CRUD

---

> [test.php](test.php):

```php
{% include_relative test.php %}
```

> [http://localhost:8080/test.php](http://localhost:8080/test.php)
