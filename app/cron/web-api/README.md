# Cron API

- [Get tasks](#get-tasks)
- [Add task](#add-task)
- [Remove task](#remove-task)

## Get tasks

---

```
/cron.php?info=getTasks
```

**Params**

| Name  | Type   | Description |
| ----- | ------ | ----------- |
| :info | String | `getTasks`  |

**Examples**

> [http://localhost:8080/v1/cron.php?info=getTasks](http://localhost:8080/v1/cron.php?info=getTasks):

```js
[
  {
    minute: "",
    hour: "",
    day: "30",
    month: "08",
    weekDay: "10",
    task: "06"
  }
];
```

**Commands**

```sh
$ crontab -l
30 08 10 06 * /scripts/full-backup
```

## Add task

---

```
/cron.php?info=addTask&minute=:minute&hour=:hour&day=:day&month=:month&weekDay=:weekDay&task=:task
```

**Params**

| Name     | Type   | Description |
| -------- | ------ | ----------- |
| :info    | String | `addTask`   |
| :minute  | String |             |
| :hour    | String |             |
| :day     | String |             |
| :month   | String |             |
| :weekDay | String |             |
| :task    | String |             |

**Examples**

> <a href="http://localhost:8080/v1/cron.php?info=addTask&minute=30&hour=08&day=10&month=06&weekDay=*&task=/scripts/full-backup">http://localhost:8080/v1/cron.php?info=addTask&minute=30&hour=08&day=10&month=06&weekDay=\*&task=/scripts/full-backup</a>:

```js
{
  "status":"task added"
}
```

**Commands**

```sh
$ crontab -l
```

```sh
$ crontab <<EOF
30 08 10 06 * /scripts/full-backup
EOF
```

```sh
$ crontab -l
30 08 10 06 * /scripts/full-backup
```

## Remove task

---

```
/cron.php?info=rmTask&&remove=:remove
```

**Params**

| Name    | Type    | Description |
| ------- | ------- | ----------- |
| :info   | String  | `rmTask`    |
| :remove | Integer |             |

**Examples**

> [http://localhost:8080/v1/cron.php?info=rmTask&remove=0](http://localhost:8080/v1/cron.php?info=rmTask&remove=0):

```js
{
  "status":"task removed"
}
```

**Commands**

```sh
$ crontab -l
30 08 10 06 * /scripts/full-backup
```

```sh
$ TODO
```

```sh
$ crontab -l
```
