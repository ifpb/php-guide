# Ping Model

- [Database](#database)
- [Install](#install)
- [PDO Model](#pdo-moodel)
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

![](assets/model-database.svg)

[database/database.php](database/database.php):
```php
{% include_relative database/database.php %}
```

![](assets/model-host.svg)

[model/host.php](model/host.php):
```php
{% include_relative model/host.php %}
```

![](assets/model-icmp.svg)

[model/icmp.php](model/icmp.php):
```php
{% include_relative model/icmp.php %}
```

![](assets/model-packet.svg)

[model/packet.php](model/packet.php):
```php
{% include_relative model/packet.php %}
```

## How to CRUD
---

[test.php](test.php):
```php
{% include_relative test.php %}
```
