# Маршруты EVPN

В данный момент времени еще обмена пакетами между CE маршрутизаторами не производилось (естественно, CDP и прочие радости отключены, дабы в сеть не улетало что то лишнее), поэтому ни один из PE маршрутизаторов не изучил ни одного MAC-адреса. Это можно проверить:

```
bormoglotx@RZN-PE-1> show evpn instance RZN-VPN-1 brief
                            Intfs       IRB intfs         MH      MAC addresses
Instance                    Total   Up  Total   Up  Nbrs  ESIs    Local  Remote
RZN-VPN-1                       1    1      0    0     2     0        0       0
```

Из данного вывода мы можем узнать, что всего в данном routing-instance 1 интерфейс и он в активном состоянии, IRB интерфейсов у нас нет (о них позже). Мы видим двух соседей (по нашей схеме это PE2 и PE3), а также что нами еще не изучен ни один MAC-адрес (local — это MAC-адреса, локальные для данного PE маршрутизатора, а remote — это MAC-адреса, полученные от соседних PE маршрутизаторов).

Теперь посмотрим, какие маршруты у нас есть в таблице маршрутизации данной routing-instance:

```
bormoglotx@RZN-PE-1> show route table RZN-VPN-1.evpn.0

RZN-VPN-1.evpn.0: 3 destinations, 3 routes (3 active, 0 holddown, 0 hidden)
+ = Active Route, - = Last Active, * = Both

3:62.0.0.1:1::777::62.0.0.1/304
                   *[EVPN/170] 01:33:42
                      Indirect
3:62.0.0.2:1::777::62.0.0.2/304
                   *[BGP/170] 01:10:22, localpref 100, from 62.0.0.255
                      AS path: I, validation-state: unverified
                    > to 10.62.0.1 via ge-0/0/0.0, Push 299808
3:62.0.0.3:1::777::62.0.0.3/304
                   *[BGP/170] 01:10:01, localpref 100, from 62.0.0.255
                      AS path: I, validation-state: unverified
                    > to 10.62.0.1 via ge-0/0/0.0, Push 299776
```

У нас всего три маршрута, причем первый локальный для PE1. Что же это за маршруты и зачем они нужны? Давайте разбираться. В EVPN существует всего 5 типов маршрутов:

* 1 — Ethernet Auto-Discovery (A-D) Route
* 2 — MAC/IP Advertisement Route
* 3 — Inclusive Multicast Ethernet Tag Route
* 4 — Ethernet Segment Route
* 5 — IP Prefix Route\*

> Примечание: маршрут 5-го типа описан в [RFC 9136](https://tools.ietf.org/html/rfc9136) (IP Prefix Advertisement in Ethernet VPN (EVPN)), но в данной статье мы его рассматривать не будем.
