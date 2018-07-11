# Instruções de instalação

O ambiente é composto por duas máquinas debian, sendo uma configurada como Servidor SNMP e outra configurada como cliente SNMP.
Ambas utilizando o pacote NET-SNMP.

É necessário ter o VirtualBox e o Vagrant instalado.

# Instalação

Coloque todos os arquivos dentro de uma pasta e através do terminal, execute o comando:
```
$ vagrant up
```

Em seguida, para acessar o servidor digite:
```
$ vagrant ssh ServidorSNMP
```

E para o cliente, digite:
```
$ vagrant ssh AgenteSNMP
```

# Teste

Se tudo estiver configurado corretamente, realize no seguinte teste:

Na máquina do servidor, digite o comando:
```
$ snmpwalk -v2c -c ifpb [IP_DO_AGENTE]
```