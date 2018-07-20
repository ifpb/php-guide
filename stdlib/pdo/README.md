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

![](host-crud/assets/schema.png)

[host-crud/database/schema.sql](host-crud/database/schema.sql):
```sql
{% include_relative host-crud/database/schema.sql %}
```

### Import

```
$ mysql -u root -p < host-crud/database/schema.sql
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

[host-crud/config.php](host-crud/config.php):
```php
{% include_relative host-crud/config.php %}
```

[host-crud/database.php](host-crud/database.php):
```php
{% include_relative host-crud/database.php %}
```

### Create Data

[host-crud/create-host.php](host-crud/create-host.php):
```php
{% include_relative host-crud/create-host.php %}
```

### Read Data

[host-crud/read-host.php](host-crud/read-host.php):
```php
{% include_relative host-crud/read-host.php %}
```

### Update Data

[host-crud/update-host.php](host-crud/update-host.php):
```php
{% include_relative host-crud/update-host.php %}
```

### Delete Data

[host-crud/delete-host.php](host-crud/delete-host.php):
```php
{% include_relative host-crud/delete-host.php %}
```

## PDO Model
---

- [Host Model Simple](codes/host-simple/)
- [Host Model (1:1)](codes/host-uniq-address/)
- [Host Model (1:n)](codes/host-multiple-address/)
- [Host Model (n:m)](codes/host-user/)
- [Ping Model](codes/ping/)