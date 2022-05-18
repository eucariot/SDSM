# Механизм работы протокола

Великолепно! Но что происходит за кулисами?  
А там, ребята, удивительные вещи:

Когда вы запускаете ping 10.1.1.0, что делает маршрутизатор?  
1\) Формирует IP-пакет::

![](http://img-fotki.yandex.ru/get/5631/83739833.23/0_abb47_3fd25a7a_L.jpg)

2\) Смотрит таблицу маршрутизации

> R1\#sh ip route 10.1.1.0  
> Routing entry for 10.1.1.0/32  
> Known via «static», distance 1, metric 0  
> Routing Descriptor Blocks:
>
> * **10.2.2.2**
>
>   Route metric is 0, traffic share count is 1

Далее рекурсивно смотрит, где адрес 10.2.2.2:

> R1\#sh ip rou 10.2.2.2  
> Routing entry for 10.2.2.0/30  
> Known via «connected», distance 0, metric 0 \(connected, via interface\)  
> Routing Descriptor Blocks:
>
> * **directly connected, via Tunnel0**
>
>   Route metric is 0, traffic share count is 1

Такссс, Tunnel 0:

> R1\#sh int tun 0  
> Tunnel0 is up, line protocol is up  
> Hardware is Tunnel  
> Internet address is 10.2.2.1/30  
> MTU 1514 bytes, BW 9 Kbit, DLY 500000 usec,  
> reliability 255/255, txload 1/255, rxload 1/255  
> Encapsulation TUNNEL, loopback not set  
> Keepalive not set  
> **Tunnel source 100.0.0.1, destination 200.0.0.1**

3\) Понимая, что это GRE-туннель, добавляет к пакету заголовок GRE:

![](http://img-fotki.yandex.ru/get/6424/83739833.23/0_abb48_253de2d4_L.jpg)

А сверху новый заголовок IР. В качестве отправителя будет значиться адрес tunnel source, а в качестве получателя – tunnel destination.

![](http://img-fotki.yandex.ru/get/4123/83739833.23/0_abb49_d7ff2766_XL.jpg)

4\) Новоиспечённый пакет отправляется в дивный мир по дефолтному маршруту:

> R1\#sh ip route  
> Gateway of last resort is 100.0.0.2 to network 0.0.0.0

5\) Не забываем про заголовок Ethernet, при отправке провайдеру он также должен быть сформирован.  
Поскольку GRE-туннель – виртуальный интерфейс 3-го уровня, он не обладает собственным MAC-адресом \(как и Loopback, например\). В конечном итоге кадр уйдёт с физического интерфейса FastEthernet0/0:

> R1\#sh ip route 100.0.0.2  
> Routing entry for 100.0.0.0/30  
> Known via «connected», distance 0, metric 0 \(connected, via interface\)  
> Routing Descriptor Blocks:
>
> * **directly connected, via FastEthernet0/0**
>
>   Route metric is 0, traffic share count is 1

Соответственно его адрес он и укажет в качестве Source MAC

> R1\#sh int  
> FastEthernet0/0 is up, line protocol is up  
> Hardware is Gt96k FE, address is **c000.25a0.0000** \(bia c000.25a0.0000\)  
> Internet address is 100.0.0.1/30

Destination по традиции берётся из ARP-кэша или получается с помощью ARP-запроса от адреса 100.0.0.2:

> R1\#show arp  
> Protocol Address Age \(min\) Hardware Addr Type Interface  
> Internet 100.0.0.1 – c000.25a0.0000 ARPA FastEthernet0/0  
> Internet 100.0.0.2 71 **c001.25a0.0000** ARPA FastEthernet0/0

![](http://img-fotki.yandex.ru/get/5643/83739833.23/0_abb4a_2d02088f_XL.jpg)

6\) И в таком виде новый IP-пакет передаётся в интернет. А поскольку каждый маршрутизатор не раздербанивает пакет, а принимает решение на основе первого же заголовка IP, то никто в Интернете не будет знать о том, что где-то там внутри кроются ваши приватные адреса 10.1.1.0 и 10.0.0.0.

![](http://img-fotki.yandex.ru/get/6431/83739833.23/0_abb6c_7c6d809_XL.jpg)

7\) И наконец пребывает в точку назначения.  
R3 обнаруживает, что адрес назначения принадлежит ему самому, снимает заголовок IP и что он под ним находит? GRE-заголовок.

Он проверяет, что у него действительно есть такой GRE-туннель, снимает заголовок GRE, и дальше это уже самый обычный IP-пакет, с которым нужно распорядиться согласно записям в таблице маршрутизации.

В данном случае передать на обработку интерфейсу Loopback 0

> R3\#sh ip route 10.1.1.0  
> Routing entry for 10.1.1.0/32  
> Known via «connected», distance 0, metric 0 \(connected, via interface\)  
> Routing Descriptor Blocks:
>
> * **directly connected, via Loopback0**
>
>   Route metric is 0, traffic share count is 1

Вот такие нехитрые манипуляции.  
Пока пакет в локальной сети он выглядит так:  
![](http://img-fotki.yandex.ru/get/5626/83739833.23/0_abb50_f9426ec_L.jpg)  
и обрабатывается на основе приватных адресов.  
Как только попадает в публичную сеть, GRE вешает на него дополнительный IP-заголовок:  
![](http://img-fotki.yandex.ru/get/5631/83739833.23/0_abb51_cf550c05_XL.jpg)  
и пакет обрабатывается на основе публичных адресов.

Вот как выглядит пакет в Интернете:  
![](http://img-fotki.yandex.ru/get/6439/83739833.23/0_abb6d_4ff1a9fe_XL.jpg)  
1 – изначальные данные  
2 – первый IP-заголовок \(внутренний\)  
3 – заголовок GRE \(с указанием, что внутри лежат данные протокола IP\)  
4 – новый заголовок IP \(внешний, с туннельными адресами\)

Рядовой обмен ICMP-сообщениями может при детальном рассмотрении выглядеть и [так.](http://blog.ine.com/wp-content/uploads/2012/08/DETAILED.ICMP_.ECHO_.and_.REPLY_.over_.OTV_.pcap_.png)

[Полная конфигурация маршрутизаторов для GRE](https://docs.google.com/document/d/17ah5yg5n5vO-zyM_ALHZ1kKZ5u4fJ-xDXZPKtnlJQZ0/pub).
