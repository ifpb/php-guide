# Ping API DB

- [Code](#code)
- [Database](#database)
- [Back-end side](#back-end-side)

## Code

---

```
├── Dockerfile
├── api
│   ├── database
│   │   ├── config.php
│   │   ├── database.php
│   │   ├── schema.mwb
│   │   ├── schema.png
│   │   └── schema.sql
│   ├── install
│   │   └── index.php
│   ├── model
│   │   ├── host.php
│   │   ├── icmp.php
│   │   └── packet.php
│   ├── util
│   │   └── Ping.php
│   └── v1
│       └── index.php
└── docker-compose.yml
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

> [api/database/schema.png](api/database/schema.png):

![](api/database/schema.png)

> [api/database/schema.sql](api/database/schema.sql):

```
{% include_relative api/database/schema.sql %}
```

> [api/install/index.php](api/install/index.php):

```php
{% include_relative api/install/index.php %}
```

> [api/database/config.php](api/database/config.php):

```php
{% include_relative api/database/config.php %}
```

## Back-end side

---

> [api/database/database.php](api/database/database.php):

```php
{% include_relative api/database/database.php %}
```

> [api/model/host.php](api/model/host.php):

```php
{% include_relative api/model/host.php %}
```

> [api/model/icmp.php](api/model/icmp.php):

```php
{% include_relative api/model/icmp.php %}
```

> [api/model/packet.php](api/model/packet.php):

```php
{% include_relative api/model/packet.php %}
```

> [api/util/Ping.php](api/util/Ping.php):

```php
{% include_relative api/util/Ping.php %}
```

> [api/v1/index.php](api/v1/index.php):

```php
{% include_relative api/v1/index.php %}
```
