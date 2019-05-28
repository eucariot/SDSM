# Практика. Продолжение

На реальной сети при выборе диапазона анонсируемых подсетей нужно руководствоваться регламентом и насущными потребностями.

Прежде чем мы перейдём к тестированию резервных линков и скорости, сделаем ещё одну полезную вещь.  
Если бы у нас была возможность отловить трафик на интерфейсе FE0/0.2 msk-arbat-gw1, который смотрит в сторону серверов, то мы бы увидели, что каждые 10 секунд в неизвестность улетают сообщения Hello. Ответить на Hello некому, отношения смежности устанавливать не с кем, поэтому и пытаться рассылать отсюда сообщения смысла нет.  
Выключается это очень просто:

```text
msk-arbat-gw1(config)#router OSPF 1
msk-arbat-gw1(config-router)#passive-interface fastEthernet 0/0.2
```

Такую команду нужно дать для всех интерфейсов, на которых точно нет соседей OSPF \(в том числе в сторону интернета\).  
В итоге картина у вас будет такая:

![](http://img-fotki.yandex.ru/get/6423/83739833.1f/0_9da8b_920c7b5b_XL.jpg)  
_Не представляю, как вы до сих пор не запутались_

Кроме того, эта команда повышает безопасность — никто из этой сети не прикинется маршрутизатором и не будет пытаться поломать нас полностью.

Теперь займёмся самым интересным — тестированием.  
Ничего сложного нет в настройке OSPF на всех маршрутизаторах в Сибирском кольце — сделаете сами.  
И после этого картина должна быть следующей:

```text
msk-arbat-gw1#sh ip OSPF neighbor 

Neighbor ID Pri State Dead Time Address Interface
172.16.255.32 1 FULL/DR 00:00:31 172.16.2.2 FastEthernet0/1.4
172.16.255.48 1 FULL/DR 00:00:31 172.16.2.18 FastEthernet0/1.5
172.16.255.80 1 FULL/BDR 00:00:36 172.16.2.130 FastEthernet0/1.8
172.16.255.112 1 FULL/BDR 00:00:37 172.16.2.197 FastEthernet1/0.911
```

Питер, Кемерово, Красноярск и Владивосток — непосредственно подключенные.

> msk-arbat-gw1\#show ip route  
>   
> Gateway of last resort is 198.51.100.1 to network 0.0.0.0  
>   
> 172.16.0.0/16 is variably subnetted, 25 subnets, 6 masks  
> C 172.16.0.0/24 is directly connected, FastEthernet0/0.3  
> C 172.16.1.0/24 is directly connected, FastEthernet0/0.2  
> C 172.16.2.0/30 is directly connected, FastEthernet0/1.4  
> S 172.16.2.4/30 \[1/0\] via 172.16.2.2  
> C 172.16.2.16/30 is directly connected, FastEthernet0/1.5  
> C 172.16.2.32/30 is directly connected, FastEthernet0/1.7  
> C 172.16.2.128/30 is directly connected, FastEthernet0/1.8  
> O 172.16.2.160/30 \[110/2\] via 172.16.2.130, 00:05:53, FastEthernet0/1.8  
> O 172.16.2.192/30 \[110/2\] via 172.16.2.197, 00:04:18, FastEthernet1/0.911  
> C 172.16.2.196/30 is directly connected, FastEthernet1/0.911  
> C 172.16.3.0/24 is directly connected, FastEthernet0/0.101  
> C 172.16.4.0/24 is directly connected, FastEthernet0/0.102  
> C 172.16.5.0/24 is directly connected, FastEthernet0/0.103  
> C 172.16.6.0/24 is directly connected, FastEthernet0/0.104  
> S 172.16.16.0/21 \[1/0\] via 172.16.2.2  
> S 172.16.24.0/22 \[1/0\] via 172.16.2.18  
> O 172.16.24.0/24 \[110/2\] via 172.16.2.18, 00:24:03, FastEthernet0/1.5  
> O 172.16.128.0/24 \[110/2\] via 172.16.2.130, 00:07:18, FastEthernet0/1.8  
> O 172.16.129.0/26 \[110/2\] via 172.16.2.130, 00:07:18, FastEthernet0/1.8  
> C 172.16.255.1/32 is directly connected, Loopback0  
> O 172.16.255.32/32 \[110/2\] via 172.16.2.2, 00:24:03, FastEthernet0/1.4  
> O 172.16.255.48/32 \[110/2\] via 172.16.2.18, 00:24:03, FastEthernet0/1.5  
> O 172.16.255.80/32 \[110/2\] via 172.16.2.130, 00:07:18, FastEthernet0/1.8  
> O 172.16.255.96/32 \[110/3\] via 172.16.2.130, 00:04:18, FastEthernet0/1.8  
> \[110/3\] via 172.16.2.197, 00:04:18, FastEthernet1/0.911  
> O 172.16.255.112/32 \[110/2\] via 172.16.2.197, 00:04:28, FastEthernet1/0.911  
> 198.51.100.0/28 is subnetted, 1 subnets  
> C 198.51.100.0 is directly connected, FastEthernet0/1.6  
> S\* 0.0.0.0/0 \[1/0\] via 198.51.100.1

Все обо всех всё знают.  
Каким маршрутом трафик доставляется из Москвы в Красноярск? Из таблицы видно, что krs-stolbi-gw1 подключен напрямую и это же видно из трассировки:

![](http://img-fotki.yandex.ru/get/6511/83739833.1f/0_9c868_9702fcf4_XL.jpg)

```text
msk-arbat-gw1#traceroute 172.16.128.1
Type escape sequence to abort.
Tracing the route to 172.16.128.1

1 172.16.2.130 35 msec 8 msec 5 msec
```

Теперь рвём интерфейс между Москвой и Красноярском и смотрим, через сколько линк восстановится.  
Не проходит и 5 секунд, как все маршрутизаторы узнали о происшествии и пересчитали свои таблицы маршрутизации:

```text
msk-arbat-gw1(config-subif)#do sh ip ro 172.16.128.0
Routing entry for 172.16.128.0/24
Known via "OSPF 1", distance 110, metric 4, type intra area
Last update from 172.16.2.197 on FastEthernet1/0.911, 00:00:53 ago
Routing Descriptor Blocks:
* 172.16.2.197, from 172.16.255.80, 00:00:53 ago, via FastEthernet1/0.911
Route metric is 4, traffic share count is 1

vld-gw1#sh ip route 172.16.128.0
Routing entry for 172.16.128.0/24
Known via "OSPF 1", distance 110, metric 3, type intra area
Last update from 172.16.2.193 on FastEthernet1/0, 00:01:57 ago
Routing Descriptor Blocks:
* 172.16.2.193, from 172.16.255.80, 00:01:57 ago, via FastEthernet1/0
Route metric is 3, traffic share count is 1

msk-arbat-gw1#traceroute 172.16.128.1
Type escape sequence to abort.
Tracing the route to 172.16.128.1

1 172.16.2.197 4 msec 10 msec 10 msec 
2 172.16.2.193 8 msec 11 msec 15 msec 
3 172.16.2.161 15 msec 13 msec 6 msec
```

То есть теперь Красноярска трафик достигает таким путём:

![](http://img-fotki.yandex.ru/get/6613/83739833.1f/0_9c869_7d771721_XL.jpg)

Как только вы поднимете линк, маршрутизаторы снова вступают в связь, обмениваются своими базами, пересчитываются кратчайшие пути и заносятся в таблицу маршрутизации.  
На видео всё это более наглядно. Рекомендую [ознакомиться](http://www.youtube.com/watch?v=8zxdW6ag8Us).

