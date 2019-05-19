# Полезные команды для траблшутинга

1\) Список соседей и состояние связи с ними вызывается командой **show ip ospf neighbor**

```text
msk-arbat-gw1:

Neighbor ID Pri State Dead Time Address Interface
172.16.255.32 1 FULL/DROTHER 00:00:33 172.16.2.2 FastEthernet0/1.4
172.16.255.48 1 FULL/DR 00:00:34 172.16.2.18 FastEthernet0/1.5
172.16.255.64 1 FULL/DR 00:00:33 172.16.2.34 FastEthernet0/1.7
172.16.255.80 1 FULL/DR 00:00:33 172.16.2.130 FastEthernet0/1.8
172.16.255.112 1 FULL/DR 00:00:33 172.16.2.197 FastEthernet1/0.911
```

2\) Или для EIGRP: **show ip eigrp neighbors**

```text
IP-EIGRP neighbors for process 1
H Address Interface Hold Uptime SRTT RTO Q Seq
(sec) (ms) Cnt Num
0 172.16.2.38 Fa0/1 12 00:04:51 40 1000 0 54
1 172.16.2.42 Fa0/0 13 00:04:51 40 1000 0 58
```

3\) С помощью команды **show ip protocols** можно посмотреть информацию о запущенных протоколах динамической маршрутизации и их взаимосвязи.

klgr-balt-gw1:

```text
Routing Protocol is "EIGRP 1 " 
Outgoing update filter list for all interfaces is not set 
Incoming update filter list for all interfaces is not set 
Default networks flagged in outgoing updates 
Default networks accepted from incoming updates 
EIGRP metric weight K1=1, K2=0, K3=1, K4=0, K5=0
EIGRP maximum hopcount 100
EIGRP maximum metric variance 1
Redistributing: EIGRP 1, OSPF 1 
Automatic network summarization is in effect 
Automatic address summarization: 
Maximum path: 4
Routing for Networks: 
172.16.0.0
Routing Information Sources: 
Gateway Distance Last Update 
172.16.2.42 90 4 
172.16.2.38 90 4 
Distance: internal 90 external 170

Routing Protocol is "OSPF 1"
Outgoing update filter list for all interfaces is not set 
Incoming update filter list for all interfaces is not set 
Router ID 172.16.255.64
It is an autonomous system boundary router
Redistributing External Routes from,
EIGRP 1 
Number of areas in this router is 1\. 1 normal 0 stub 0 nssa
Maximum path: 4
Routing for Networks:
172.16.2.32 0.0.0.3 area 0
Routing Information Sources: 
Gateway Distance Last Update 
172.16.255.64 110 00:00:23
Distance: (default is 110)
```

4\) Для отладки и понимания работы протоколов будет полезно воспользоваться следующими командами:  
**debug ip OSPF events  
debug ip OSPF adj  
debug EIGRP packets**

Попробуйте подёргать разные интерфейсы и посмотреть, что происходит в дебаге, какие сообщения летят.

