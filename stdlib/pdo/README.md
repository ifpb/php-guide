# [PDO — PHP Data Objects](http://php.net/manual/en/book.pdo.php)

- [Database](#database)
  - [Schema](#schema)
  - [Import](#import)
- [Check PDO](#check-pdo)
- [PDO CRUD](#pdo-crud)
  - [Connection](#connection)
  - [Host Model](#host-model)
  - [Create Data](#create-data)
  - [Read Data](#read-data)
  - [Update Data](#update-data)
  - [Delete Data](#delete-data)
- [PDO Model](#pdo-model)

## Code

```
host-crud
├── .env
├── Dockerfile
├── config.php
├── database
│   ├── schema.mwb
│   └── schema.sql
├── database.php
├── docker-compose.yml
├── host.php
├── test-create.php
├── test-delete.php
├── test-read.php
└── test-update.php
```

> [codes/host-crud/docker-compose.yml](codes/host-crud/docker-compose.yml):

```
{% include_relative codes/host-crud/docker-compose.yml %}
```

> [codes/host-crud/Dockerfile](codes/host-crud/Dockerfile):

```
{% include_relative codes/host-crud/Dockerfile %}
```

> [codes/host-crud/.env](codes/host-crud/.env):

```
{% include_relative codes/host-crud/.env %}
```

## Database

---

### Schema

![](codes/host-crud/assets/schema.png)

[codes/host-crud/database/schema.sql](codes/host-crud/database/schema.sql):

```sql
{% include_relative codes/host-crud/database/schema.sql %}
```

### Import

```
$ docker-compose exec web bash
# mysql -h mysql -u root -p < pdo/codes/host-crud/database/schema.sql
```

## Check PDO

---

```
$ docker-compose exec web bash
# php -m | grep pdo
pdo_mysql
pdo_sqlite
```

## PDO CRUD

---

### Connection

> [codes/host-crud/config.php](hostcodes/-crud/config.php):

```php
{% include_relative codes/host-crud/config.php %}
```

> [codes/host-crud/database.php](hostcodes/-crud/database.php):

```php
{% include_relative codes/host-crud/database.php %}
```

### Host Model

> [codes/host-crud/host.php](codes/host-crud/host.php):

```php
{% include_relative codes/host-crud/host.php %}
```

### Create Data

> [http://localhost:8080/test-create.php](http://localhost:8080/test-create.php):

```php
{% include_relative codes/host-crud/test-create.php %}
```

### Read Data

> [http://localhost:8080/test-read.php](http://localhost:8080/test-read.php):

```php
{% include_relative codes/host-crud/test-read.php %}
```

### Update Data

> [http://localhost:8080/test-update.php](http://localhost:8080/test-update.php):

```php
{% include_relative codes/host-crud/test-update.php %}
```

### Delete Data

> [http://localhost:8080/test-delete.php](http://localhost:8080/test-delete.php):

```php
{% include_relative codes/host-crud/test-delete.php %}
```

## PDO Model

---

- [Host Simple Model](codes/host-simple/)
- [Host Address Model (1:1)](codes/host-address/)
- [Host Interfaces Model (1:n)](codes/host-interface/)
- [Host DNS Server Model (n:m)](codes/host-dns/)
- [Ping Model](codes/ping/)
