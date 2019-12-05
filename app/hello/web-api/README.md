# Hello API

- [Hello message](#hello-message)

## Hello message

---

```
/api/v1/?name=:name
```

**Params**

| Name  | Type   | Description |
| ----- | ------ | ----------- |
| :name | String | Person name |

**Examples**

> [http://localhost:8080/api/v1/](http://localhost:8080/api/v1/):

```
Olá
```

> [http://localhost:8080/api/v1/?name=Alice](http://localhost:8080/api/v1/?name=Alice):

```
Olá Alice
```
