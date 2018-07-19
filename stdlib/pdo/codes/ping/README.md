# Ping Model

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

## CRUD
---

![](assets/model.svg)

[database/database.php](database/database.php):
```php
{% include_relative database/database.php %}
```

[model/host.php](model/host.php):
```php
{% include_relative model/host.php %}
```

[model/icmp.php](model/icmp.php):
```php
{% include_relative model/icmp.php %}
```

[model/packet.php](model/packet.php):
```php
{% include_relative model/packet.php %}
```

## Test
---

[test.php](test.php):
```php
{% include_relative test.php %}
```
