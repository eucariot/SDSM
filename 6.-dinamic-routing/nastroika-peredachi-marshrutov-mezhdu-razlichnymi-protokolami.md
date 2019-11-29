# Настройка передачи маршрутов между различными протоколами

Наша задача организовать передачу маршрутов между этими протоколами: из OSPF в EIGRP и наоборот, чтобы все знали маршрут до любой подсети.
Это называется редистрибуцией (перераспределением) маршрутов.

Для её осуществления нам нужна хотя бы одна точка стыка, где будут запущены одновременно два протокола. Это может быть msk-arbat-gw1 или klgr-balt-gw1. Выберем второй.

Из EIGRP в OSPF:
```text
klgr-balt-gw1(config)#router ospf 1
klgr-balt-gw1(config-router)#router-id 172.16.255.64
klgr-balt-gw1(config-router)#redistribute eigrp 1 subnets
```

Смотрим маршруты на msk-arbat-gw1:
```text
msk-arbat-gw1#sh ip route
Codes: C — connected, S — static, I — IGRP, R — RIP, M — mobile, B — BGP
D — EIGRP, EX — EIGRP external, O — OSPF, IA — OSPF inter area
N1 — OSPF NSSA external type 1, N2 — OSPF NSSA external type 2
E1 — OSPF external type 1, E2 — OSPF external type 2, E — EGP
i — IS-IS, L1 — IS-IS level-1, L2 — IS-IS level-2, ia — IS-IS inter area
* — candidate default, U — per-user static route, o — ODR
P — periodic downloaded static route

Gateway of last resort is 198.51.100.1 to network 0.0.0.0

10.0.0.0/8 is variably subnetted, 3 subnets, 2 masks
O E2 10.0.0.0/8 [110/20] via 172.16.2.34, 00:25:11, FastEthernet0/1.7
O E2 10.0.1.0/24 [110/20] via 172.16.2.34, 00:25:11, FastEthernet0/1.7
O E2 10.0.2.0/24 [110/20] via 172.16.2.34, 00:24:50, FastEthernet0/1.7
172.16.0.0/16 is variably subnetted, 30 subnets, 5 masks
O E2 172.16.0.0/16 [110/20] via 172.16.2.34, 00:25:11, FastEthernet0/1.7
C 172.16.0.0/24 is directly connected, FastEthernet0/0.3
C 172.16.1.0/24 is directly connected, FastEthernet0/0.2
C 172.16.2.0/30 is directly connected, FastEthernet0/1.4
C 172.16.2.16/30 is directly connected, FastEthernet0/1.5
C 172.16.2.32/30 is directly connected, FastEthernet0/1.7
O E2 172.16.2.36/30 [110/20] via 172.16.2.34, 01:00:55, FastEthernet0/1.7
O E2 172.16.2.40/30 [110/20] via 172.16.2.34, 01:00:55, FastEthernet0/1.7
O E2 172.16.2.44/30 [110/20] via 172.16.2.34, 01:00:55, FastEthernet0/1.7
C 172.16.2.128/30 is directly connected, FastEthernet0/1.8
O 172.16.2.160/30 [110/2] via 172.16.2.130, 01:00:55, FastEthernet0/1.8
O 172.16.2.192/30 [110/2] via 172.16.2.197, 00:13:21, FastEthernet1/0.911
C 172.16.2.196/30 is directly connected, FastEthernet1/0.911
C 172.16.3.0/24 is directly connected, FastEthernet0/0.101
C 172.16.4.0/24 is directly connected, FastEthernet0/0.102
C 172.16.5.0/24 is directly connected, FastEthernet0/0.103
C 172.16.6.0/24 is directly connected, FastEthernet0/0.104
O 172.16.24.0/24 [110/2] via 172.16.2.18, 01:00:55, FastEthernet0/1.5
O 172.16.128.0/24 [110/2] via 172.16.2.130, 01:00:55, FastEthernet0/1.8
O 172.16.129.0/26 [110/2] via 172.16.2.130, 01:00:55, FastEthernet0/1.8
O 172.16.144.0/24 [110/3] via 172.16.2.130, 00:13:21, FastEthernet0/1.8
[110/3] via 172.16.2.197, 00:13:21, FastEthernet1/0.911
O 172.16.160.0/24 [110/2] via 172.16.2.197, 00:13:31, FastEthernet1/0.911
C 172.16.255.1/32 is directly connected, Loopback0
O 172.16.255.48/32 [110/2] via 172.16.2.18, 01:00:55, FastEthernet0/1.5
O E2 172.16.255.64/32 [110/20] via 172.16.2.34, 01:00:55, FastEthernet0/1.7
O E2 172.16.255.65/32 [110/20] via 172.16.2.34, 01:00:55, FastEthernet0/1.7
O E2 172.16.255.66/32 [110/20] via 172.16.2.34, 01:00:55, FastEthernet0/1.7
O 172.16.255.80/32 [110/2] via 172.16.2.130, 01:00:55, FastEthernet0/1.8
O 172.16.255.96/32 [110/3] via 172.16.2.130, 00:13:21, FastEthernet0/1.8
[110/3] via 172.16.2.197, 00:13:21, FastEthernet1/0.911
O 172.16.255.112/32 [110/2] via 172.16.2.197, 00:13:31, FastEthernet1/0.911
198.51.100.0/28 is subnetted, 1 subnets
C 198.51.100.0 is directly connected, FastEthernet0/1.6
S* 0.0.0.0/0 [1/0] via 198.51.100.1
```

Вот те, что с меткой Е2 — новые импортированные маршруты. Е2 — означает, что это внешние маршруты 2-го типа ([External](http://habrahabr.ru/post/117099/)), то есть они были введены в процесс OSPF извне.

Предполагается, что где-то уже была выполнена комнада "network", чтобы вообще было что редистрибьютить:
```text
klgr-balt-gw1(config-router)#network 172.16.0.0 0.0.255.255 area 0
```


Теперь из OSPF в EIGRP. Это чуточку сложнее:
```
klgr-balt-gw1(config)#router eigrp 1
klgr-balt-gw1(config-router)#redistribute ospf 1 metric 100000 20 255 1 1500 
```

Без указания метрики (вот этого длинного набора цифр) команда выполнится, но редистрибуции не произойдёт.

Импортированные маршруты получают метку EX в таблице маршрутизации и административную дистанцию 170, вместо 90 для внутренних:
```
klgr-center-gw1#sh ip route

Gateway of last resort is not set

172.16.0.0/16 is variably subnetted, 30 subnets, 4 masks
D EX 172.16.0.0/24 [170/33280] via 172.16.2.37, 00:00:07, FastEthernet0/0
D EX 172.16.1.0/24 [170/33280] via 172.16.2.37, 00:00:07, FastEthernet0/0
D EX 172.16.2.0/30 [170/33280] via 172.16.2.37, 00:00:07, FastEthernet0/0
D EX 172.16.2.4/30 [170/33280] via 172.16.2.37, 00:00:07, FastEthernet0/0
D EX 172.16.2.16/30 [170/33280] via 172.16.2.37, 00:00:07, FastEthernet0/0
D 172.16.2.32/30 [90/30720] via 172.16.2.37, 00:38:59, FastEthernet0/0
C 172.16.2.36/30 is directly connected, FastEthernet0/0
D 172.16.2.40/30 [90/30720] via 172.16.2.37, 00:38:59, FastEthernet0/0
[90/30720] via 172.16.2.46, 00:38:59, FastEthernet0/1
….
```

Вот так, казалось бы незамысловато это делается, но простота поверхностная — редистрибуция таит в себе много тонких и неприятных [моментов](https://habr.com/ru/post/117062/), когда добавляется хотя бы один избыточный линк между двумя разными доменами.
Универсальный совет — старайтесь избегать редистрибуции, если это возможно. Тут работает главное жизненное правило — чем проще, тем лучше.
