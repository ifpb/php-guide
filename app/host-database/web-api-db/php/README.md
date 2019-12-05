# Host Database PHP

- [Code](#code)
- [Host Simple Model](#host-simple-model)
- [Install](#install)
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

## Host Simple Model

---

> [Host Simple Model](../../../../stdlib/pdo/codes/host-simple/)

![](assets/schema.png)

> [database/schema.sql](database/schema.sql):

```sql
{% include_relative database/schema.sql %}
```

## Install

---

> [http://localhost:8080/install/](http://localhost:8080/install/):

```php
{% include_relative install/index.php %}
```

> [database/config.php](database/config.php):

```php
{% include_relative database/config.php %}
```

## API

---

> [api/v1/index.php](api/v1/index.php):

```php
{% include_relative api/v1/index.php %}
```
