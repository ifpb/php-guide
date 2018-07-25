# Host Address Model

- [Database](#database)
- [Install](#install)
- [PDO Model](#pdo-moodel)
  - [Database Model](#database-model)
  - [Host Model](#host-model)
- [How to CRUD](#how-to-crud)

## Database
---

![](assets/schema.png)

[database/schema.sql](database/schema.sql):
```sql
{% include_relative database/schema.sql %}
```

## Install
---

[http://localhost:8080/php/stdlib/pdo/codes/ping/install/](http://localhost:8080/php/stdlib/pdo/codes/ping/install/):
```php
{% include_relative install/index.php %}
```

[database/config.php](database/config.php):
```php
{% include_relative database/config.php %}
```

## PDO Model
---

### Database Model

![](assets/model-database.svg)

[database/database.php](database/database.php):
```php
{% include_relative database/database.php %}
```

### Host Model

![](assets/model-host.svg)

[model/host.php](model/host.php):
```php
{% include_relative model/host.php %}
```

### Address Model

![](assets/model-address.svg)

[model/address.php](model/address.php):
```php
{% include_relative model/address.php %}
```

## How to CRUD
---

[test.php](test.php):
```php
{% include_relative test.php %}
```
