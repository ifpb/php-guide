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
- [PDO Model](#PDO Model)

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

### Read Data

[codes/host-crud/read-host.php](codes/host-crud/read-host.php):
```php
{% include_relative codes/host-crud/read-host.php %}
```

### Update Data

[codes/host-crud/update-host.php](codes/host-crud/update-host.php):
```php
{% include_relative codes/host-crud/update-host.php %}
```

### Delete Data

[codes/host-crud/delete-host.php](codes/host-crud/delete-host.php):
```php
{% include_relative codes/host-crud/delete-host.php %}
```

## PDO Model
---

- [Host Model Simple](codes/host-simple/)
- [Host Model (1:1)](codes/host-uniq-address/)
- [Host Model (1:n)](codes/host-multiple-address/)
- [Host Model (n:m)](codes/host-user/)
- [Ping Model](codes/ping/)