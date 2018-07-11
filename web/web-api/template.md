# Cron API

Falar sobre a finalidade da API, os requisitos e instalação necessárias...

## Serviços

- [Adiconar Tarefa](#adiconar-tarefa)
- [Outro serviço](#outro-serviço)

### Adiconar Tarefa

Esse serviço tem a finalidade...

```
/add-task.php?time=:time&com=:command
```

**Parâmetros**

| Name | Tipo | Descrição |
|-|-|-|
| :time | String | ... [contrab time](http://url) |
| :command | String | ... |

**Exemplos**

[http://localhost:8080/add-task.php](http://localhost:8080/add-task.php):

```js
{
  "error": "faltam parâmetros."
}
```

[http://localhost:8080/add-task.php?time=00+09&com=echo+hello](http://localhost:8080/add-task.php?time=00+09&com=echo+hello):

```js
{
  "status": "tarefa adicionada com sucesso."
}
```

**Comandos**

Para executar tal ação é necessário executar o comando:

```
$ crontab <<EOF
00 09 * * 1-5 echo hello
EOF
```

Para verificar se o comando foi executado com sucesso:

```
$ crontab -l
00 09 * * 1-5 echo hello
```

### Outro serviço