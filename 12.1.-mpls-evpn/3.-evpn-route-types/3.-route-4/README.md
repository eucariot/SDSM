# Маршрут типа 4 \(Ethernet Segment Route\)

Теперь разберем маршрут типа 4. Этот маршрут нужен для выбора DF, о назначении которого я писал ранее. Данный маршрут выглядит следующим образом:  
![](https://habrastorage.org/files/4c5/ce0/965/4c5ce09653474292a212a86610c45ac5.jpg)

```text
bormoglotx@RZN-PE-2> show route table bgp.evpn.0 match-prefix *4:6*

bgp.evpn.0: 11 destinations, 11 routes (11 active, 0 holddown, 0 hidden)
+ = Active Route, - = Last Active, * = Both

4:62.0.0.1:0::112233445566778899aa:62.0.0.1/304
                   *[BGP/170] 01:07:57, localpref 100, from 62.0.0.255
                      AS path: I, validation-state: unverified
                    > to 10.62.0.3 via ge-0/0/0.0, Push 299808
```

Примечательно, что данный маршрут не несет комьюнити, которое сконфигурено на экспорт из routing-instance:

```text
bormoglotx@RZN-PE-2> show route table bgp.evpn.0 match-prefix *4:6* detail

bgp.evpn.0: 11 destinations, 11 routes (11 active, 0 holddown, 0 hidden)
4:62.0.0.1:0::112233445566778899aa:62.0.0.1/304 (1 entry, 0 announced)
        *BGP    Preference: 170/-101
                Route Distinguisher: 62.0.0.1:0
                Next hop type: Indirect
                Address: 0x95c1954
                Next-hop reference count: 14
                Source: 62.0.0.255
                Protocol next hop: 62.0.0.1
                Indirect next hop: 0x2 no-forward INH Session ID: 0x0
                State: Active Int Ext
                Local AS: 6262 Peer AS: 6262
                Age: 1:07:59 Metric2: 1
                Validation State: unverified
                Task: BGP_6262.62.0.0.255+51796
                AS path: I (Originator)
                Cluster list: 62.0.0.255
                Originator ID: 62.0.0.1
                Communities: es-import-target:33-44-55-66-77-88
                Import Accepted
                Localpref: 100
                Router ID: 62.0.0.255
                Secondary Tables: __default_evpn__.evpn.0
```

Данные маршруты используют новое комьюнити: **es-import-target:XX-XX-XX-XX-XX-XX**. Само комьюнити генерируется из ESI. Для этого из идентификатора берутся 48 бит, как это показано ниже:

ESI:  
11:22:**33:44:55:66:77:88**:99:aa

Сгенерированное коммьюнити:  
Communities: es-import-target:**33-44-55-66-77-88**

Только PE маршрутизаторы, имеющие одинаковые ESI \(точнее одинаковые биты с 16 по 64 в идентификаторе\), импортируют данный маршрут. Как видите, в анонсе нет RT, указанного на импорт или экспорт в routing instance. То есть маршруты типа 4 не видны в таблице маршрутизации самой EVPN. Их можно посмотреть только в таблицах bgp.evpn.0 и \_\_default\_evpn\_\_.evpn.0.

Если у другого PE маршрутизатора будет ESI, например aaaa334455667788aaaa, то, как не трудно догадаться, их коммьюнити будет одинаково, а значит маршрут будет тоже импортирован. Но не стоит паниковать, все уже украдено до нас: в теле самого маршрута указан полный идентификатор ESI и данный маршрут будет импортирован, но проигнорирован. Как и RT, es-import-target предназначен только для фильтрации маршрутов. Ниже представлен сам маршрут типа 4 и его комьюнити:

```text
bormoglotx@RZN-PE-1> show route table bgp.evpn.0 match-prefix *4:62* detail | match "comm|\/304"
4:62.0.0.2:0::112233445566778899aa:62.0.0.2/304 (1 entry, 0 announced)
                Communities: es-import-target:33-44-55-66-77-88
```

Интересным случаем является вот такой конфиг:

```text
bormoglotx@RZN-PE-1> show configuration interfaces ae1 | match esi | display set
set interfaces ae1 esi 62:00:00:00:00:00:00:00:00:01
set interfaces ae1 esi all-active
```

Думаю, вы уже догадались, что мы получаем в анонсе расширенное комьюнити, состоящее из всех нулей:

```text
bormoglotx@RZN-PE-1> show route advertising-protocol bgp 62.0.0.255 table __default_evpn__.evpn.0 detail match-prefix *62000000000000000001:6*

__default_evpn__.evpn.0: 9 destinations, 9 routes (9 active, 0 holddown, 0 hidden)
* 4:62.0.0.1:0::62000000000000000001:62.0.0.1/304 (1 entry, 1 announced)
 BGP group RR-NODES type Internal
     Route Distinguisher: 62.0.0.1:0
     Nexthop: Self
     Flags: Nexthop Change
     Localpref: 100
     AS path: [6262] I
     Communities: es-import-target:0-0-0-0-0-0
```

Не стоит полагать, что из за этого все сломается. Даже с таким комьюнити все будет работать, но если у вас в сети будут, например, ESI в диапазоне хх: хх:00:00:00:00:00:00:00:01-хх: хх:00:00:00:00:00:00:99:99, то у всех маршрутов типа 4 будут одинаковые комьюнити, а значит PE маршрутизаторы будут принимать и устанавливать в таблицы маршрутизации все маршруты типа 4, даже если они им не нужны. Но думаю, что об это не стоит париться, плюс/минус 100 маршрутов погоды не сделают \(почему не сделают — поймете, когда дочитаете статью до конца\).

Не знаю, заметил ли читатель, но в маршрутах типа 1 и 4 RD выглядит несколько странно. Например, маршрут типа 2 от PE2:

```text
2:62.0.0.2:1::777::aa:bb:cc:00:07:00/304
                   *[BGP/170] 00:00:18, localpref 100, from 62.0.0.255
                      AS path: I, validation-state: unverified
                    > to 10.62.0.1 via ge-0/0/0.0, Push 299792
```

А вот маршрут типа 1 с того же PE2:

```text
1:62.0.0.2:0::112233445566778899aa::0/304
                   *[BGP/170] 00:00:56, localpref 100, from 62.0.0.255
                      AS path: I, validation-state: unverified
                    > to 10.62.0.1 via ge-0/0/0.0, Push 299792
```

От PE2 маршурт типа 1 имеет **RD 62.0.0.2:0**, хотя от этого же PE2 маршруты типа 2 или 3 прилетают с **RD 62.0.0.2:1**, который и сконфигурен в routing instance. Что происходит с RD? Для проверки данного явления создадим два routing instance с типом EVPN и назначим им совершенно разные RD:

```text
bormoglotx@RZN-PE-1> show configuration routing-instances RZN-VPN-3 | match route
route-distinguisher 62.0.0.1:3;

bormoglotx@RZN-PE-1> show configuration routing-instances RZN-VPN-4 | match route
route-distinguisher 9999:99;
```

Теперь посмотрим, с каким RD будет анонсироваться маршрут типа 1:

```text
bormoglotx@RZN-PE-1> show route advertising-protocol bgp 62.0.0.255 | match "1:6"
  1:62.0.0.1:0::112233445566778899aa::0/304
  1:62.0.0.1:0::aaaa334455667788aaaa::0/304
```

RD в маршруте не соответствует сконфигуренному ни на RZN-VPN-3, ни на RZN-VPN-4. Откуда же это RD берется? JunOS генерирует его автоматически из router-id или loopback адреса. Причем первое значение имеет приоритет. Например, сейчас имеем router-id:

```text
bormoglotx@RZN-PE-1> show configuration routing-options router-id
router-id 62.0.0.1;
```

И это значение берется как первая часть RD, а вторая выставляется в нашем случае в ноль. Давайте помянем router id:

```text
bormoglotx@RZN-PE-1> show configuration routing-options router-id
router-id 62.62.62.62;
```

Смотрим, какие теперь отдаются маршруты:

```text
bormoglotx@RZN-PE-1> show route advertising-protocol bgp 62.0.0.255 | match "1:6"
  1:62.62.62.62:0::112233445566778899aa::0/304
  1:62.62.62.62:0::aaaa334455667788aaaa::0/304
```

Как видите JunOS сам сгенерировал RD. Что будет если мы не укажем router-id? Давайте проверим. Но усложним задачу, навесив на лупбек еще пару адресов:

```text
bormoglotx@RZN-PE-1> show configuration interfaces lo0
description "BGP & MPLS router-id";
unit 0 {
    family inet {
        address 10.1.1.1/32;
        address 62.0.0.1/32;
        address 62.62.62.62/32;
    }
    family iso {
        address 49.0000.0620.0000.0001.00;
    }
}
```

Смотрим теперь:

```text
bormoglotx@RZN-PE-1> show route advertising-protocol bgp 62.0.0.255 | match " 1:(1|6)"
  1:10.1.1.1:0::112233445566778899aa::0/304
  1:10.1.1.1:0::aaaa334455667788aaaa::0/304
```

JunOS выбрал наименьший IP-адрес лупбека и использовал его как router-id. Это происходит потому, что данный маршрут типа 1 сгенеирирован per-ESI. Если маршрут будет генерироваться per-EVI, то у него будет нативный RD инстанса, из которого данный маршрут анонсируется. А вот маршрут типа 4 всегда будет иметь RD, уникальный на маршрутизатор, так как он всегда генерируется per-ESI.

Генерация маршрута per-ESI имеет некоторую особенность. Так как идентификатор ESI конфигурируется на физическом интерфейсе, то если у нас будет например 10 логических юнитов \(можно сказать вланов\) на данном интерфейсе и все в разных EVPN-инстансах, то мы получим, что в разных инстансах будет сгенерирован один и тот же маршрут типа 1. Зачем генерировать 10 одинаковых маршрутов \(разница в них будет только в RT\), если можно сгенерировать только один и навесить на него RT-ки всех заинтересованных в данном маршруте инстансов?

Давайте посмотрим как это работает на примере. Вот конфигурация ESI на физическом интерфейсе:

```text
bormoglotx@RZN-PE-1> show configuration interfaces ge-0/0/2 | match esi | display set
set interfaces ge-0/0/2 esi 00:00:00:00:00:00:00:00:00:07
set interfaces ge-0/0/2 esi single-active
```

Данный интерфейс используется двумя инстансами с типом evpn:

```text
bormoglotx@RZN-PE-1> show configuration routing-instances | display set | match ge-0/0/2.
set routing-instances RZN-VPN-1 interface ge-0/0/2.0
set routing-instances eVPN-test interface ge-0/0/2.200
```

Посмотрим, какие RT соответствуют данным инстансам \(я удалил политики и прописал RT с помощью vrf-target для наглядности\):

```text
bormoglotx@RZN-PE-1> show configuration routing-instances RZN-VPN-1 | match target
vrf-target target:62:1;

bormoglotx@RZN-PE-1> show configuration routing-instances eVPN-test | match target
vrf-target target:62:2;
```

А теперь посмотрим маршрут типа 1, анонсируемый на рефлектор:

```text
bormoglotx@RZN-PE-1> show route advertising-protocol bgp 62.0.0.255 table __default_evpn__.evpn.0 match-prefix *1:6*:07:* detail

__default_evpn__.evpn.0: 8 destinations, 8 routes (8 active, 0 holddown, 0 hidden)
* 1:62.0.0.1:0::07::0/304 (1 entry, 1 announced)
 BGP group RR-NODES type Internal
     Route Distinguisher: 62.0.0.1:0
     Nexthop: Self
     Flags: Nexthop Change
     Localpref: 100
     AS path: [6262] I
     Communities: target:62:1 target:62:2 esi-label:100000(label 0)
```

Как видите, у маршрута две RT-ки: target:62:1, которая соответствует RZN-VPN-1 и target:62:2, соответствующая eVPN-test. Эта функция уменьшает время сходимости. Если данный линк отвалится, то он отвалится у всех инстансов, к которым он прикреплен. В нашем случае вместо 2-x BGP Withdrawn сообщений, улетит только одно, но с двумя RT.

> Примечание: маршруты типа 1 и 4 будем рассматривать отдельно в главе, посвященной EVPN multihoming.

