# 1 
crontab -u <user> -l
crontab <<EOF
existente
novo
EOF

# 2
crontab -u <user> -l > /tmp/user_crontab
append new entries to /tmp/user_crontab
crontab -u <user> /tmp/user_crontab
