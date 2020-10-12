user@virtualbox-grand:~$ sudo rabbitmq-plugins enable rabbitmq_management
The following plugins have been enabled:
  amqp_client
  cowlib
  cowboy
  rabbitmq_web_dispatch
  rabbitmq_management_agent
  rabbitmq_management

Applying plugin configuration to rabbit@virtualbox-grand... started 6 plugins.
user@virtualbox-grand:~$ sudo service rabbitmq-server status 
● rabbitmq-server.service - RabbitMQ broker
   Loaded: loaded (/lib/systemd/system/rabbitmq-server.service; enabled; vendor preset: enabled)
   Active: active (running) since Mon 2020-10-12 15:12:07 MSK; 11min ago
 Main PID: 9513 (beam.smp)
   Status: "Initialized"
    Tasks: 86 (limit: 2310)
   CGroup: /system.slice/rabbitmq-server.service
           ├─9513 /usr/lib/erlang/erts-9.2/bin/beam.smp -W w -A 64 -P 1048576 -t 5000000 -stbt db -zdbbl 128000 -K true -- -root /usr/lib/erlang -progname erl -- -home /var/lib/
           ├─9610 /usr/lib/erlang/erts-9.2/bin/epmd -daemon
           ├─9755 erl_child_setup 1024
           ├─9781 inet_gethost 4
           └─9782 inet_gethost 4

окт 12 15:12:05 virtualbox-grand rabbitmq-server[9513]:               RabbitMQ 3.6.15. Copyright (C) 2007-2018 Pivotal Software, Inc.
окт 12 15:12:05 virtualbox-grand rabbitmq-server[9513]:   ##  ##      Licensed under the MPL.  See http://www.rabbitmq.com/
окт 12 15:12:05 virtualbox-grand rabbitmq-server[9513]:   ##  ##
окт 12 15:12:05 virtualbox-grand rabbitmq-server[9513]:   ##########  Logs: /var/log/rabbitmq/rabbit@virtualbox-grand.log
окт 12 15:12:05 virtualbox-grand rabbitmq-server[9513]:   ######  ##        /var/log/rabbitmq/rabbit@virtualbox-grand-sasl.log
окт 12 15:12:05 virtualbox-grand rabbitmq-server[9513]:   ##########
окт 12 15:12:05 virtualbox-grand rabbitmq-server[9513]:               Starting broker...
окт 12 15:12:07 virtualbox-grand rabbitmq-server[9513]: systemd unit for activation check: "rabbitmq-server.service"
окт 12 15:12:07 virtualbox-grand systemd[1]: Started RabbitMQ broker.
окт 12 15:12:07 virtualbox-grand rabbitmq-server[9513]:  completed with 0 plugins.
user@virtualbox-grand:~$ sudo netstat -tulpn | grep beam
tcp        0      0 0.0.0.0:25672           0.0.0.0:*               LISTEN      9513/beam.smp       
tcp        0      0 0.0.0.0:15672           0.0.0.0:*               LISTEN      9513/beam.smp       
tcp6       0      0 :::5672                 :::*                    LISTEN      9513/beam.smp   