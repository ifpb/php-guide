# [PDO — PHP Data Objects](http://php.net/manual/en/book.pdo.php)

- [Code](#code)
- [Database](#database)
  - [Schema](#schema)
  - [Import](#import)
- [PDO CRUD](#pdo-crud)
  - [Check PDO](#check-pdo)
  - [Connection](#connection)
  - [Host Model](#host-model)
  - [Create Data](#create-data)
  - [Read Data](#read-data)
  - [Update Data](#update-data)
  - [Delete Data](#delete-data)
- [PDO Model](#pdo-model)

## Code

---

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
MYSQL_ROOT_PASSWORD=secret
MYSQL_DATABASE=example
MYSQL_USER=devuser
MYSQL_PASSWORD=devpass
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

## PDO CRUD

---

### Check PDO

```
$ docker-compose exec web bash
# php -m | grep pdo
pdo_mysql
pdo_sqlite
```

### Connection

> [codes/host-crud/config.php](codes/host-crud/config.php):

```php
{% include_relative codes/host-crud/config.php %}
```

> [codes/host-crud/database.php](codes/host-crud/database.php):

```php
{% include_relative codes/host-crud/database.php %}
```

### Host Model

> [codes/host-crud/host.php](codes/host-crud/host.php):

```php
{% include_relative codes/host-crud/host.php %}
```

### Create Data

> [codes/host-crud/test-create.php](codes/host-crud/test-create.php):

```php
{% include_relative codes/host-crud/test-create.php %}
```

> [http://localhost:8080/test-create.php](http://localhost:8080/test-create.php)

### Read Data

> [codes/host-crud/test-read.php](codes/host-crud/test-read.php):

```php
{% include_relative codes/host-crud/test-read.php %}
```

> [http://localhost:8080/test-read.php](http://localhost:8080/test-read.php)

### Update Data

> [codes/host-crud/test-update.php](codes/host-crud/test-update.php):

```php
{% include_relative codes/host-crud/test-update.php %}
```

> [http://localhost:8080/test-update.php](http://localhost:8080/test-update.php)

### Delete Data

> [codes/host-crud/test-delete.php](codes/host-crud/test-delete.php):

```php
{% include_relative codes/host-crud/test-delete.php %}
```

> [http://localhost:8080/test-delete.php](http://localhost:8080/test-delete.php)

## PDO Model

---

- [Host Simple Model](codes/host-simple/)
- [Host Address Model (1:1)](codes/host-address/)
- [Host Interfaces Model (1:n)](codes/host-interface/)
- [Host DNS Server Model (n:m)](codes/host-dns/)
- [Ping Model](codes/ping/)
