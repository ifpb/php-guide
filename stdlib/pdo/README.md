# [PDO — PHP Data Objects](http://php.net/manual/en/book.pdo.php)

- [Database](#database)
  - [Schema](#schema)
  - [Import](#import)
- [Check PDO](#Check PDO)
- [PDO CRUD](#pdo-crud)
  - [Connection](#Connection)
  - [Create Data](#create-data)
  - [Read Data](#read-data)
  - [Update Data](#update-data)
  - [Delete Data](#delete-data)
- [PDO Model](#pdo-model)

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
$ mysql -u root -p < codes/host-crud/database/schema.sql
```

## Check PDO
---

```
$ php -m | grep pdo
pdo_mysql
pdo_sqlite
```

## PDO CRUD
---

### Connection

[codes/host-crud/config.php](codes/host-crud/config.php):
```php
{% include_relative codes/host-crud/config.php %}
```

[codes/host-crud/database.php](codes/host-crud/database.php):
```php
{% include_relative codes/host-crud/database.php %}
```

### Create Data

[codes/host-crud/create-host.php](codes/host-crud/create-host.php):
```php
{% include_relative codes/host-crud/create-host.php %}
```

[codes/host-crud/test-create.php](codes/host-crud/test-create.php):
```php
{% include_relative codes/host-crud/test-create.php %}
```

### Read Data

[codes/host-crud/read-host.php](codes/host-crud/read-host.php):
```php
{% include_relative codes/host-crud/read-host.php %}
```

[codes/host-crud/test-read.php](codes/host-crud/test-read.php):
```php
{% include_relative codes/host-crud/test-read.php %}
```

### Update Data

[codes/host-crud/update-host.php](codes/host-crud/update-host.php):
```php
{% include_relative codes/host-crud/update-host.php %}
```

[codes/host-crud/test-update.php](codes/host-crud/test-update.php):
```php
{% include_relative codes/host-crud/test-update.php %}
```

### Delete Data

[codes/host-crud/delete-host.php](codes/host-crud/delete-host.php):
```php
{% include_relative codes/host-crud/delete-host.php %}
```

[codes/host-crud/test-delete.php](codes/host-crud/test-delete.php):
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