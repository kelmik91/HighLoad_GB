service zabbix-server status
● zabbix-server.service - Zabbix Server
   Loaded: loaded (/lib/systemd/system/zabbix-server.service; enabled; vendor preset: enabled)
   Active: active (running) since Thu 2020-10-15 20:53:21 MSK; 1h 21min ago
 Main PID: 26063 (zabbix_server)
    Tasks: 38 (limit: 2310)
   CGroup: /system.slice/zabbix-server.service
           ├─26063 /usr/sbin/zabbix_server -c /etc/zabbix/zabbix_server.conf
           ├─26067 /usr/sbin/zabbix_server: configuration syncer [synced configuration in 0.039871 sec, idle 60 sec]
           ├─26069 /usr/sbin/zabbix_server: housekeeper [deleted 0 hist/trends, 0 items/triggers, 0 events, 0 sessions, 0 alarms, 0 audit items, 0 r
           ├─26070 /usr/sbin/zabbix_server: timer #1 [updated 0 hosts, suppressed 0 events in 0.002780 sec, idle 59 sec]
           ├─26071 /usr/sbin/zabbix_server: http poller #1 [got 0 values in 0.000756 sec, idle 5 sec]
           ├─26072 /usr/sbin/zabbix_server: discoverer #1 [processed 0 rules in 0.000915 sec, idle 60 sec]
           ├─26073 /usr/sbin/zabbix_server: history syncer #1 [processed 0 values, 0 triggers in 0.000017 sec, idle 1 sec]
           ├─26074 /usr/sbin/zabbix_server: history syncer #2 [processed 2 values, 2 triggers in 0.005787 sec, idle 1 sec]
           ├─26075 /usr/sbin/zabbix_server: history syncer #3 [processed 0 values, 0 triggers in 0.000039 sec, idle 1 sec]
           ├─26076 /usr/sbin/zabbix_server: history syncer #4 [processed 0 values, 0 triggers in 0.000048 sec, idle 1 sec]
           ├─26077 /usr/sbin/zabbix_server: escalator #1 [processed 0 escalations in 0.001753 sec, idle 3 sec]
           ├─26078 /usr/sbin/zabbix_server: proxy poller #1 [exchanged data with 0 proxies in 0.000041 sec, idle 5 sec]
           ├─26079 /usr/sbin/zabbix_server: self-monitoring [processed data in 0.000023 sec, idle 1 sec]
           ├─26080 /usr/sbin/zabbix_server: task manager [processed 0 task(s) in 0.000813 sec, idle 5 sec]
           ├─26081 /usr/sbin/zabbix_server: poller #1 [got 0 values in 0.000068 sec, idle 1 sec]
           ├─26082 /usr/sbin/zabbix_server: poller #2 [got 0 values in 0.000013 sec, idle 1 sec]
           ├─26083 /usr/sbin/zabbix_server: poller #3 [got 2 values in 0.000117 sec, idle 1 sec]
           ├─26084 /usr/sbin/zabbix_server: poller #4 [got 0 values in 0.000021 sec, idle 1 sec]
           ├─26087 /usr/sbin/zabbix_server: poller #5 [got 0 values in 0.000012 sec, idle 1 sec]
           ├─26088 /usr/sbin/zabbix_server: unreachable poller #1 [got 0 values in 0.000031 sec, idle 5 sec]
           ├─26089 /usr/sbin/zabbix_server: trapper #1 [processed data in 0.000570 sec, waiting for connection]
           ├─26090 /usr/sbin/zabbix_server: trapper #2 [processed data in 0.000660 sec, waiting for connection]
           ├─26091 /usr/sbin/zabbix_server: trapper #3 [processed data in 0.000894 sec, waiting for connection]
           ├─26092 /usr/sbin/zabbix_server: trapper #4 [processed data in 0.001903 sec, waiting for connection]
           ├─26093 /usr/sbin/zabbix_server: trapper #5 [processed data in 0.000345 sec, waiting for connection]
           ├─26094 /usr/sbin/zabbix_server: icmp pinger #1 [got 0 values in 0.000014 sec, idle 5 sec]
           ├─26095 /usr/sbin/zabbix_server: alert manager #1 [sent 0, failed 0 alerts, idle 5.009235 sec during 5.009402 sec]
           ├─26096 /usr/sbin/zabbix_server: alerter #1 started
           ├─26097 /usr/sbin/zabbix_server: alerter #2 started
           ├─26098 /usr/sbin/zabbix_server: alerter #3 started
           ├─26099 /usr/sbin/zabbix_server: preprocessing manager #1 [queued 0, processed 13 values, idle 5.012060 sec during 5.012288 sec]
           ├─26100 /usr/sbin/zabbix_server: preprocessing worker #1 started
           ├─26101 /usr/sbin/zabbix_server: preprocessing worker #2 started
           ├─26102 /usr/sbin/zabbix_server: preprocessing worker #3 started
           ├─26104 /usr/sbin/zabbix_server: lld manager #1 [processed 0 LLD rules during 5.007671 sec]
           ├─26105 /usr/sbin/zabbix_server: lld worker #1 [processed 1 LLD rules, idle 1534.084250 sec during 1534.128555 sec]
           ├─26106 /usr/sbin/zabbix_server: lld worker #2 [processed 1 LLD rules, idle 3598.289271 sec during 3598.407912 sec]
           └─26107 /usr/sbin/zabbix_server: alert syncer [queued 0 alerts(s), flushed 0 result(s) in 0.001267 sec, idle 1 sec]

окт 15 20:53:21 virtualbox-grand systemd[1]: Starting Zabbix Server...
окт 15 20:53:21 virtualbox-grand systemd[1]: zabbix-server.service: Can't open PID file /run/zabbix/zabbix_server.pid (yet?) after start: No such fi
окт 15 20:53:21 virtualbox-grand systemd[1]: Started Zabbix Server.

----------------------------------------------------------------------
Шаблон мониторинга HTTP-соединений делал по документации:
https://www.zabbix.com/documentation/current/ru/manual/web_monitoring
Все заработало.


-----------------------------------------------------------------------
Вторая виртуальная машина: Прописал IP zabbix server'a и в Мониторинг->Узлы сети вторая машина стала доступна

service zabbix-agent status
● zabbix-agent.service - Zabbix Agent
   Loaded: loaded (/lib/systemd/system/zabbix-agent.service; enabled; vendor pre
   Active: active (running) since Thu 2020-10-15 22:20:08 MSK; 8min ago
     Docs: man:zabbix_agentd
 Main PID: 28519 (zabbix_agentd)
    Tasks: 6 (limit: 2310)
   CGroup: /system.slice/zabbix-agent.service
           ├─28519 /usr/sbin/zabbix_agentd --foreground
           ├─28550 /usr/sbin/zabbix_agentd: collector [idle 1 sec]
           ├─28551 /usr/sbin/zabbix_agentd: listener #1 [waiting for connection]
           ├─28552 /usr/sbin/zabbix_agentd: listener #2 [waiting for connection]
           ├─28553 /usr/sbin/zabbix_agentd: listener #3 [waiting for connection]
           └─28554 /usr/sbin/zabbix_agentd: active checks #1 [idle 1 sec]

окт 15 22:20:08 user-VirtualBox systemd[1]: Started Zabbix Agent.
окт 15 22:20:08 user-VirtualBox zabbix_agentd[28519]: Starting Zabbix Agent [Zab
окт 15 22:20:08 user-VirtualBox zabbix_agentd[28519]: Press Ctrl+C to exit.

