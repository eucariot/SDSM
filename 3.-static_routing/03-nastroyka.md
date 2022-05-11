# Настройка

Содержание:

* Настройка  
  * Москва. Арбат
  * Провайдер
  * Санкт-Петербург. Васильевский остров
  * Санкт-Петербург. Озерки
  * Кемерово. Красная горка

Каким образом мы организуем каналы связи? Как мы уже сказали выше, в нашем офисе на Арбате есть некий провайдер Балаган-Телеком. Он обещает нам предоставить всё, что мы только захотим почти задарма. И мы заказываем у него две услуги L2VPN, то есть он отдаст нам два влана на Арбате в Москве, и по одному в Питере и Кемерово.  
Вообще говоря, номера вланов вам придётся согласовывать с вашим провайдером по той простой причине, что у него они могут быть просто заняты. Поэтому вполне возможно, что у вас будет влан, например, 2912 или 754. Но предположим, что нам повезло, и мы вольны сами выбирать номер.

## Москва. Арбат

На циске в Москве у нас два интерфейса, к одному — FE0/0 — уже подключена наша локальная сеть, а второй \(FE0/1\)мы будем использовать для выхода в интернет и для подключения удалённых офисов.  
Как и в самом начале создадим саб-интерфейсы. Выделим для Санкт-Петербурга и Кемерова 4 и 5-й вланы соответственно. IP-адреса берём из нового IP-плана.

```text
msk-arbat-gw1(config)#interface FastEthernet 0/1.4
msk-arbat-gw1(config-subif)#description Saint-Petersburg
msk-arbat-gw1(config-subif)#encapsulation dot1Q 4
msk-arbat-gw1(config-subif)#ip address 172.16.2.1 255.255.255.252
msk-arbat-gw1(config)#interface FastEthernet 0/1.5
msk-arbat-gw1(config-subif)#description Kemerovo
msk-arbat-gw1(config-subif)#encapsulation dot1Q 5
msk-arbat-gw1(config-subif)#ip address 172.16.2.17 255.255.255.252
```

## Провайдер

Разумеется, мы не будем строить всю сеть провайдера. Вместо этого просто поставим коммутатор, ведь по сути сеть провайдера с нашей точки зрения будет одним огромным абстрактным коммутатором.

Тут всё просто: принимаем транком линк с Арбата в один порт и с двух других портов отдаём их на удалённые узлы. Ещё раз хотим подчеркнуть, что все эти 3 порта не принадлежат одному коммутатору — они разнесены на сотни километров, между ними сложная MPLS-сеть с кучей коммутаторов.

Настраиваем “эмулятор провайдера”:

```text
Switch(config)#vlan 4
Switch(config-vlan)#vlan 5
Switch(config)#interface fa0/1
Switch(config-if)#switchport mode trunk 
Switch(config-if)#switchport trunk allowed vlan 4-5
Switch(config-if)#exit
Switch(config)#int fa0/2
Switch(config-if)#switchport trunk allowed vlan 4
Switch(config-if)#int fa0/3
Switch(config-if)#switchport trunk allowed vlan 5
```

## Санкт-Петербург. Васильевский остров

Теперь обратимся к нашему spb-vsl-gw1. Тут у нас тоже 2 порта, но решим вопрос нехватки портов иначе: добавим сюда плату. Плата с двумя FastEthernet-портам и двумя слотами для WIC вполне подойдёт.

![](http://img-fotki.yandex.ru/get/5606/83739833.14/0_819ec_bf9c3159_XL.jpg)

Пусть встроенные порты будут для локальной сети, а порты на дополнительной плате мы используем для аплинка и связи с Озерками.

![](http://img-fotki.yandex.ru/get/6101/83739833.14/0_819ed_12b6f87_L.jpg)

Здесь вы можете увидеть отличие в нумерации портов и понять их смысл.  
FastEthernet — это тип порта \(Ethernet, Fastethernet, GigabitEthernet, POS, Serial или другие\)  
x/y/z.w=Slot/Sub-slot/Interface.Sub-interface.

Каким образом здесь вам провайдер будет отдавать канал — транком или аксесом, вы решаете сообща. Как правило, для него не составит проблем ни один из вариантов.  
Но мы уже настроили транк, поэтому соответствующим образом настраиваем порт на циске:

```text
spb-vsl-gw1(config)interface FastEthernet1/0.4
spb-vsl-gw1(config-if)description Moscow
spb-vsl-gw1(config-if)encapsulation dot1Q 4
spb-vsl-gw1(config-if)ip address 172.16.2.2 255.255.255.252
```

Добавим ещё локальную сеть:

```text
spb-vsl-gw1(config)#int fa0/0
spb-vsl-gw1(config-if)#description LAN
spb-vsl-gw1(config-if)#ip address 172.16.16.1 255.255.255.0
```

Вернёмся в Москву. С msk-arbat-gw1 мы можем увидеть адрес 172.16.2.2:

```text
msk-arbat-gw1#ping 172.16.2.2

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 172.16.2.2, timeout is 2 seconds:
!!!!!
Success rate is 100 percent (5/5), round-trip min/avg/max = 2/7/13 ms
```

Но так же не видим 172.16.16.1:

```text
msk-arbat-gw1#ping 172.16.16.1

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 172.16.16.1, timeout is 2 seconds:
.....
Success rate is 0 percent (0/5)
```

Опять же, потому что маршрутизатор не знает, куда слать пакет:

```text
msk-arbat-gw1#sh ip route 

Gateway of last resort is not set

172.16.0.0/16 is variably subnetted, 8 subnets, 2 masks
C 172.16.0.0/24 is directly connected, FastEthernet0/0.3
C 172.16.1.0/24 is directly connected, FastEthernet0/0.2
C 172.16.2.0/30 is directly connected, FastEthernet0/1.4
C 172.16.3.0/24 is directly connected, FastEthernet0/0.101
C 172.16.4.0/24 is directly connected, FastEthernet0/0.102
C 172.16.5.0/24 is directly connected, FastEthernet0/0.103
C 172.16.6.0/24 is directly connected, FastEthernet0/0.104
```

Исправим это недоразумение:

```text
msk-arbat-gw1(config)#ip route 172.16.16.0 255.255.255.0 172.16.2.2

msk-arbat-gw1#sh ip route 
Codes: C - connected, S - static, I - IGRP, R - RIP, M - mobile, B - BGP
D - EIGRP, EX - EIGRP external, O - OSPF, IA - OSPF inter area
N1 - OSPF NSSA external type 1, N2 - OSPF NSSA external type 2
E1 - OSPF external type 1, E2 - OSPF external type 2, E - EGP
i - IS-IS, L1 - IS-IS level-1, L2 - IS-IS level-2, ia - IS-IS inter area
* - candidate default, U - per-user static route, o - ODR
P - periodic downloaded static route

Gateway of last resort is not set

172.16.0.0/16 is variably subnetted, 9 subnets, 2 masks
C 172.16.0.0/24 is directly connected, FastEthernet0/0.3
C 172.16.1.0/24 is directly connected, FastEthernet0/0.2
C 172.16.2.0/30 is directly connected, FastEthernet0/1.4
C 172.16.2.16/30 is directly connected, FastEthernet0/1.5
C 172.16.3.0/24 is directly connected, FastEthernet0/0.101
C 172.16.4.0/24 is directly connected, FastEthernet0/0.102
C 172.16.5.0/24 is directly connected, FastEthernet0/0.103
C 172.16.6.0/24 is directly connected, FastEthernet0/0.104
S 172.16.16.0/24 [1/0] via 172.16.2.2
```

Теперь пинг появляется:

```text
msk-arbat-gw1#ping 172.16.16.1

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 172.16.16.1, timeout is 2 seconds:
!!!!!
Success rate is 100 percent (5/5), round-trip min/avg/max = 4/10/24 ms
```

Вот, казалось бы оно — счастье, но проверим связь с компьютера:  
![](http://img-fotki.yandex.ru/get/5608/83739833.14/0_81adf_50ceeace_XL.jpg)

В чём дело?!  
Компьютер знает, куда отправлять пакет — на свой шлюз 172.16.3.1, маршрутизатор тоже знает — на хост 172.16.2.2. Пакет уходит туда, принимается spb-vsl-gw1, который знает, что пингуемый адрес 172.16.16.1 принадлежит ему. А обратно нужно отправить пакет на адрес 172.16.3.3, но в сеть 172.16.3.0 у него нет маршрута. А пакеты, сеть назначения которых неизвестна, просто дропятся — отбрасываются.

```text
spb-vsl-gw1#sh ip route 

Gateway of last resort is not set

172.16.0.0/16 is variably subnetted, 2 subnets, 2 masks
C 172.16.2.0/30 is directly connected, FastEthernet1/0.4
C 172.16.16.0/24 is directly connected, FastEthernet0/0
```

Но, почему же, спросите вы, с msk-arbat-gw1 до 172.16.16.1 пинг был? Какая разница 172.16.3.1 или 172.16.3.2? Всё просто.  
Из таблицы маршрутизации всем видно, что следующий хоп — 172.16.2.2, при этом адрес 172.16.2.1 из диапазона 172.16.2.0/30 принадлежит интерфейсу этого маршрутизатора, поэтому он и ставится в заголовок в качестве IP-адреса отправителя, а не 172.16.3.1. Пакет отправляется на spb-vsl-gw1, тот его принимает, передаёт данные приложению пинг, которое формирует echo-reply. Ответ инкапсулируется в IP-пакет, где в качестве адреса получателя фигурирует 172.16.2.1, а 172.16.2.0/30 — непосредственно подключенная к spb-vsl-gw1 сеть, поэтому без проблем пакет доставляется по назначению. То есть в сеть 172.16.2.0/30 маршрут известен, а в 172.16.3.0/24 нет.

Для решения этой проблемы мы можем прописать на spb-vsl-gw1 маршрут в сеть 172.16.3.0, но тогда придётся прописывать и для всех других сетей. Для всех сетей в Москве, потом в Кемерово, потом в других городах — очень большой объём настройки. Тут стоить заметить, что по сути у нас только один выход в мир — через Москву. Узел в Озерках — тупиковый, а других нет. То есть в основном все данные будут уходить в Москву, где большая часть подсетей и будет выход в интернет. Чем нам это может помочь? Есть такое понятие — маршрут по умолчанию, ещё он носит романтическое название шлюз — последней надежды. И второму есть объяснение. Когда маршрутизатор решает, куда отправить пакет, он просматривает всё таблицу маршрутизации и, если не находит нужного маршрута, пакет отбрасывается — это если у вас не настроен шлюз последней надежды, если же настроен, то сиротливые пакеты отправляются именно туда — просто не глядя, предоставляя право уже следующему хопу решать их дальнейшую судьбу. То есть если некуда отправить, то последняя надежда — маршрут по умолчанию.  
Настраивается он так:

```text
spb-vsl-gw1(config)#ip route 0.0.0.0 0.0.0.0 172.16.2.1
```

И теперь тадааам:

![](http://img-fotki.yandex.ru/get/6101/83739833.14/0_81add_91df3e72_XL.jpg)

В случае таких тупиковых областей довольно часто применяется именно шлюз последней надежды, чтобы уменьшить количество маршрутов в таблице и сложность настройки.

## Санкт-Петербург. Озерки

Теперь озаботимся Озерками. Здесь мы поставим L3-коммутатор. Допустим, связаны они у нас будут арендованным у провайдера волокном \(конечно, это идеализированная ситуация для маленькой компании, но можно же помечтать\). Использование коммутаторов третьего уровня весьма удобно в некоторых случаях. Во-первых, интервлан роутинг в этом случае делается аппаратно и не нагружает процессор, в отличие от маршрутизатора. Кроме того, один L3-коммутатор обойдётся вам значительно дешевле, чем L2-коммутатор и маршрутизатор по отдельности. Правда, при этом вы лишаетесь ряда функций, естественно. Поэтому при выборе решения будьте аккуратны.

Настроим маршрутизатор на Васильевском острове, согласно плану:

```text
spb-vsl-gw1(config)interface fa1/1
spb-vsl-gw1(config-if)#description Ozerki
spb-vsl-gw1(config-if)#ip address 172.16.2.5 255.255.255.252
```

Поскольку мы уже запланировали сеть для Озерков 172.16.17.0/24, то можем сразу прописать туда маршрут:

```text
spb-vsl-gw1(config)#ip route 172.16.17.0 255.255.255.0 172.16.2.6
```

В качестве некст хопа ставим адрес, который мы выделили для линковой сети на Озерках — 172.16.2.6

Теперь перенесёмся в сами Озерки:  
Подключим кабель в уже настроенный порт fa1/1 на стороне Васильевского острова и в 24-й порт 3560 в Озерках. По умолчанию все порты L3-коммутатора работают в режиме L2, то есть это обычные “свитчёвые” порты, на которых мы можем настроить вланы. Но любой из них мы можем перевести в L3-режим, сделав портом маршрутизатора. Тогда на нём мы сможем настроить IP-адрес:

```text
Switch(config)#hostname spb-ozerki-gw1
spb-ozerki-gw1(config)#interface fa0/24
spb-ozerki-gw1(config-if)#no switchport 
spb-ozerki-gw1(config-if)#ip address 172.16.2.6 255.255.255.252
```

Проверяем связь:

```text
spb-ozerki-gw1#ping 172.16.2.5

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 172.16.2.5, timeout is 2 seconds:
.!!!!
Success rate is 80 percent (4/5), round-trip min/avg/max = 1/18/61 ms
```

Настроим ещё локальную сеть. Напомним, что Cisco и другие производители и не только производители не рекомендуют использовать 1-й влан, поэтому, мы воспользуемся 2-м:

```text
spb-ozerki-gw1(config)#vlan 2
spb-ozerki-gw1(config-vlan)#name LAN
spb-ozerki-gw1(config-vlan)#exit
spb-ozerki-gw1(config)#interface vlan 2
spb-ozerki-gw1(config-if)#description LAN
spb-ozerki-gw1(config-if)#ip address 172.16.17.1 255.255.255.0
spb-ozerki-gw1(config)#interface fastEthernet 0/1
spb-ozerki-gw1(config-if)#description Pupkin
spb-ozerki-gw1(config-if)#switchport mode access 
spb-ozerki-gw1(config-if)#switchport access vlan 2
```

После этого все устройства во втором влане будут иметь шлюзом 172.16.17.1

![](http://img-fotki.yandex.ru/get/5607/83739833.14/0_81ade_2869e853_XL.jpg)

Чтобы коммутатор превратился в почти полноценный маршрутизатор, надо дать ещё одну команду:

```text
spb-ozerki-gw1(config)#ip routing
```

Таким образом мы включим возможность маршрутизации.

Никаких других маршрутов, кроме как по умолчанию нам тут не надо:

```text
spb-ozerki-gw1(config)#ip route 0.0.0.0 0.0.0.0 172.16.2.5
```

Связь до spb-vsl-gw1 есть:

```text
spb-ozerki-gw1#ping 172.16.16.1

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 172.16.16.1, timeout is 2 seconds:
!!!!!
Success rate is 100 percent (5/5), round-trip min/avg/max = 3/50/234 ms
```

А до Москвы нет:

```text
spb-ozerki-gw1#ping 172.16.3.1

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 172.16.3.1, timeout is 2 seconds:
.....
Success rate is 0 percent (0/5)
```

Опять же дело в отсутствии маршрута. Вообще удобный инструмент для нахождения примерного места расположения проблемы traceroute:

```text
spb-ozerki-gw1#traceroute 172.16.3.1
Type escape sequence to abort.
Tracing the route to 172.16.3.1

1 172.16.2.5 4 msec 2 msec 5 msec 
2 * * * 
3 * * * 
4 *
```

Как видите, что от spb-vsl-gw1 ответ приходит, а дальше глухо. Это означает, как правило, что или на хопе с адресом 172.16.2.5 не прописан маршрут в нужную сеть \(вспоминаем, что у нас настроен там маршрут по умолчанию, которого достаточно\) или на следующем нету маршрута обратно:

```text
msk-arbat-gw1#sh ip rou

Gateway of last resort is not set

172.16.0.0/16 is variably subnetted, 9 subnets, 2 masks
C 172.16.0.0/24 is directly connected, FastEthernet0/0.3
C 172.16.1.0/24 is directly connected, FastEthernet0/0.2
C 172.16.2.0/30 is directly connected, FastEthernet0/1.4
C 172.16.2.16/30 is directly connected, FastEthernet0/1.5
C 172.16.3.0/24 is directly connected, FastEthernet0/0.101
C 172.16.4.0/24 is directly connected, FastEthernet0/0.102
C 172.16.5.0/24 is directly connected, FastEthernet0/0.103
C 172.16.6.0/24 is directly connected, FastEthernet0/0.104
S 172.16.16.0/24 [1/0] via 172.16.2.2
```

Действительно маршрута в подсеть 172.16.17.0/24 нет. Мы можем прописать его, вы это уже умеете, а можем вспомнить, что целую подсеть 172.16.16.0/21 мы выделили под Питер, поэтому вместо того, чтобы по отдельности добавлять маршрут в каждую новую сеть, мы пропишем агрегированный маршрут:

```text
msk-arbat-gw1(config)#no ip route 172.16.16.0 255.255.255.0 172.16.2.2
msk-arbat-gw1(config)#ip route 172.16.16.0 255.255.248.0 172.16.2.2
```

Проверяем:

```text
msk-arbat-gw1#ping 172.16.17.1

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 172.16.17.1, timeout is 2 seconds:
!!!!!
Success rate is 100 percent (5/5), round-trip min/avg/max = 4/10/18 ms
```

Но странной неожиданностью для вас может стать то, что с spb-ozerki-gw1 вы не увидите Москву по-прежнему:

```text
spb-ozerki-gw1#ping 172.16.3.1

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 172.16.3.1, timeout is 2 seconds:
.....
Success rate is 0 percent (0/5)
```

Но при этом, если в качестве адреса-источника мы укажем 172.16.17.1:

```text
spb-ozerki-gw1#ping 
Protocol [ip]: 
Target IP address: 172.16.3.1
Repeat count [5]: 
Datagram size [100]: 
Timeout in seconds [2]: 
Extended commands [n]: y
Source address or interface: ping172.16.17.1
% Invalid source
Source address or interface: 172.16.17.1
Type of service [0]: 
Set DF bit in IP header? [no]: 
Validate reply data? [no]: 
Data pattern [0xABCD]: 
Loose, Strict, Record, Timestamp, Verbose[none]: 
Sweep range of sizes [n]: 
Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 172.16.3.1, timeout is 2 seconds:
Packet sent with a source address of 172.16.17.1
!!!!!
Success rate is 100 percent (5/5), round-trip min/avg/max = 5/9/14 ms
```

И даже с компьютера 172.16.17.26 связь есть:

![](http://img-fotki.yandex.ru/get/5608/83739833.14/0_819ee_c767041_XL.jpg)

Как же так? Ответ, вы не поверите, так же прост — проблемы с маршрутизацией.

Дело в том, что msk-arbat-gw1 о подсети 172.16.17.0/24 знает, а о 172.16.2.4/30 нет. А именно адрес 172.16.2.6 — адрес ближайшего к адресату интерфейса \(или интерфейса, с которого отправляется IP-пакет\) подставляет по умолчанию в качестве источника. Об этом забывать не нужно.

```text
msk-arbat-gw1(config)#ip route 172.16.2.4 255.255.255.252 172.16.2.2

spb-ozerki-gw1#ping 172.16.3.1

Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 172.16.3.1, timeout is 2 seconds:
!!!!!
Success rate is 100 percent (5/5), round-trip min/avg/max = 7/62/269 ms
```

Ещё интересный опыт: а что если адрес на маршрутизаторе на Васильевском острове маршрут в подсеть 172.16.3.0/24 пропишем на Озерки, а не в Москву? Ну чисто для интереса. Что произойдёт в этом случае?

```text
spb-vsl-gw1(config)#ip route 172.16.3.0 255.255.255.0 172.16.2.6
```

В РТ вы этого не увидите, почему-то, но в реальной жизни получится кольцо маршрутизации. Сети 172.16.3.0/24 и 172.16.16.0/21 не будут видеть друг друга:  
пакет идущий с spb-ozerki-gw1 в сеть 172.16.3.0 попадает в первую очередь на spb-vsl-gw1, где сказано: “172.16.3.0/24 ищите за 172.16.2.6”, а это снова spb-ozerki-gw1, где сказано: “172.16.3.0/24 ищите за 172.16.2.5” и так далее. Пакет будет шастать туда-обратно, пока не истечёт значение в поле TTL.  
Дело в том, что при прохождении каждого маршрутизатора поле TTL в IP-заголовке, изначально имеющее значение 255, уменьшается на 1. И если вдруг окажется, что это значение равно 0, то пакет _погибает_, точнее маршрутизатор, увидевший это, задропит его. Таким образом обеспечивается стабильность сети — в случае возникновения петли пакеты не будут жить бесконечно, нагружая канал до его полной утилизации. Кстати, в Ethernet такого механизма нет и если получается петля, то коммутатор только и будет делать, что плодить широковещательные запросы, полностью забивая канал — это называется широковещательный шторм \(эта проблема решается с помощью специальной технологии\протокола STP- об этом в следующем выпуске\).

В общем, если вы пускаете пинг из сети 172.16.17.0 на адрес 172.16.3.1, то ваш IP-пакет будет путешествовать между двумя маршрутизаторами, пока не истечёт срок его жизни, пройдя при этом по линку между Озерками и Васильевским островом 254 раза. Кстати, следствием из работы этого механизма является то, что не может существовать связная сеть, где между узлами больше 255 маршрутизаторов. Впрочем это и не очень актуальная потребность. Сейчас даже самый долгий трейс занимает пару-тройку десятков хопов.

## Кемерово. Красная горка

Рассмотрим последний небольшой пример — маршрутизатор на палочке \(router on a stick\). Название навеяно схемой подключения:  
![](http://img-fotki.yandex.ru/get/6100/83739833.14/0_819f3_c6ed276_XL.jpg)

Маршрутизатор связан с коммутатором лишь одним кабелем и по разным вланам внутри него передаётся трафик и локальной сети, и внешний. Делается это, как правило, для экономии средств \(на маршрутизаторе только один порт и не хочется покупать дополнительную плату\). Подключим следующим образом:  
![](http://img-fotki.yandex.ru/get/5607/83739833.14/0_819f7_e121a255_L.jpg)

Настройка коммутатора уже не должна для вас представлять проблем. На UpLink-интерфейсе настраиваем оговоренный с провайдером 5-й влан транком:

```text
Switch(config)#hostname kmr-gorka-sw1
kmr-gorka-sw1(config)#vlan 5
kmr-gorka-sw1(config-vlan)#name Moscow
kmr-gorka-sw1(config)#int fa0/24
kmr-gorka-sw1(config-if)#description Moscow
kmr-gorka-sw1(config-if)#switchport mode trunk 
kmr-gorka-sw1(config-if)#switchport trunk allowed vlan 5
```

В качестве влана для локальной сети выберем vlan 2 и это ничего, что он уже используется и в Москве и в Питере — если они не пересекаются и вы это можете контролировать, то номера могут совпадать. Тут каждый решает сам: вы можете везде использовать, например, 2-й влан, в качестве влана локальной сети или напротив разработать план, где номера вланов уникальны во всей сети.

```text
kmr-gorka-sw1(config)#vlan 2
kmr-gorka-sw1(config-vlan)#name LAN
kmr-gorka-sw1(config)#int fa0/1
kmr-gorka-sw1(config-if)#description syn_generalnogo
kmr-gorka-sw1(config-if)#switchport mode access 
kmr-gorka-sw1(config-if)#switchport access vlan 2
```

Транк в сторону маршрутизатора, где 5-ым вланом будут тегироваться кадры внешнего трафика, а 2-м — локального.

```text
kmr-gorka-sw1(config)#int fa0/23
kmr-gorka-sw1(config-if)#description kmr-gorka-gw1
kmr-gorka-sw1(config-if)#switchport mode trunk 
kmr-gorka-sw1(config-if)#switchport trunk allowed vlan 2,5
```

Настройка маршрутизатора:

```text
Router(config)#hostname kmr-gorka-gw1
kmr-gorka-gw1(config)#int fa0/0.5
kmr-gorka-gw1(config-subif)#description Moscow
kmr-gorka-gw1(config-subif)#encapsulation dot1Q 5
kmr-gorka-gw1(config-subif)#ip address 172.16.2.18 255.255.255.252
kmr-gorka-gw1(config)#int fa0/0
kmr-gorka-gw1(config-if)#no sh
kmr-gorka-gw1(config)#int fa0/0.2
kmr-gorka-gw1(config-subif)#description LAN
kmr-gorka-gw1(config-subif)#encapsulation dot1Q 2
kmr-gorka-gw1(config-subif)#ip address 172.16.24.1 255.255.255.0
```

Полагаем, что маршрутизацию здесь между Москвой и Кемерово вы теперь сможете настроить самостоятельно.

