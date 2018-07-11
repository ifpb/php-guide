# Dynamic pages

## Server-side rendering
---

### Layout

```
layout
├── index.php
├── page1.php
└── page2.php
```

[codes/layout/index.php](codes/layout/index.php)
```php
{% include_relative codes/layout/index.php %}
```

[codes/layout/page1.php](codes/layout/page1.php)
```php
{% include_relative codes/layout/page1.php %}
```

[codes/layout/page2.php](codes/layout/page2.php)
```php
{% include_relative codes/layout/page2.php %}
```

