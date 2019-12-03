# Add task

## By String EOF

```
$ crontab -u <user> -l
$ crontab -u www-data -l
$ crontab <<EOF
existente
novo
EOF
```

## By File

```
$ crontab -u <user> -l > /tmp/user_crontab
$ append new entries to /tmp/user_crontab
$ crontab -u <user> /tmp/user_crontab
```
