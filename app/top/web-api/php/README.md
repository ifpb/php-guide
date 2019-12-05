# TOP API

> Code

```
php
├── api
│   └── v1
│       ├── index.php
│       └── util.php
└── docker-compose.yml
```

> [docker-compose.yml](docker-compose.yml):

```
{% include_relative docker-compose.yml %}
```

> [api/v1/index.php](api/v1/index.php):

```php
{% include_relative api/v1/index.php %}
```

> [api/v1/util.php](api/v1/util.php):

```php
{% include_relative api/v1/util.php %}
```
