# Маршрут типа 2 \(MAC/IP Advertisement Route\)

Теперь запустим пинг между CE1 и CE2:

```text
RZN-CE1-SW1#ping 10.0.0.2
Type escape sequence to abort.
Sending 5, 100-byte ICMP Echos to 10.0.0.2, timeout is 2 seconds:
.!!!!
Success rate is 80 percent (4/5), round-trip min/avg/max = 7/8/11 ms
```

Одни пакет потерялся, так как CE1 сделал ARP запрос на резолв адреса 10.0.0.2. Теперь посмотрим, появились ли адреса в MAC-таблице:

```text
bormoglotx@RZN-PE-1> show evpn instance RZN-VPN-1 brief
                            Intfs       IRB intfs         MH      MAC addresses
Instance                    Total   Up  Total   Up  Nbrs  ESIs    Local  Remote
RZN-VPN-1                       1    1      0    0     2     0        1       1
```

Появились сразу два MAC-адреса: один локальный для PE1 \(адрес CE1\) и один MAC, полученный от PE2 \(адрес CE2\):

```text
bormoglotx@RZN-PE-1> show route table RZN-VPN-1.evpn.0

RZN-VPN-1.evpn.0: 5 destinations, 5 routes (5 active, 0 holddown, 0 hidden)
+ = Active Route, - = Last Active, * = Both

2:62.0.0.1:1::777::aa:bb:cc:00:06:00/304
                   *[EVPN/170] 00:05:23
                      Indirect
2:62.0.0.2:1::777::aa:bb:cc:00:07:00/304
                   *[BGP/170] 00:05:23, localpref 100, from 62.0.0.255
                      AS path: I, validation-state: unverified
                    > to 10.62.0.1 via ge-0/0/0.0, Push 299808
```

Теперь у нас в таблице два новых маршрута \(всего в таблице маршрутов 5, маршруты типа 3 не показаны для сокращения вывода\). Маршруты имеют тип 2 — MAC/IP Advertisement route. Данный маршрут имеет следующий вид:  
![](https://habrastorage.org/files/85b/c9e/6a3/85bc9e6a3ddf41d8ae82b1643bafaf1e.jpg)  
**RD** — Route Distinguisher, куда же без него, в нашем случае равен :62.0.0.2:1.  
**Ethernet Segment Identifier** — идентификатор **ESI**, о нем поговорим позже. JunOS показывает это значение только при detail или extensive выводах, у нас в маршруте он равен нулю: ESI: 00:00:00:00:00:00:00:00:00:00.  
**Ethernet Tag ID** — номер влана: 777.  
**MAC Address Length** — длина MAC-адреса, по сути всегда 48 бит, и JunOS данное значение не выводит.  
**MAC Address** — сам MAC-адрес: aa:bb:cc:00:07:00.  
**IP Address Length** — длина IP-адреса, для IPv4 равна 32 битам, и для IPv6 — 128. Данное поле опционально и может не содержать никаких значений \(все нули\). JunOS данное значение не выводит.  
**IP Address** — сам адрес, в выводе ниже он не представлен. Поле заполняется опционально.  
**MPLS Label1\|2** — непосредственно сама метка, JunOS ее показывает только при detail или extensive выводе.

```text
2:62.0.0.2:1::777::aa:bb:cc:00:07:00/304 (1 entry, 1 announced)
                *BGP Preference: 170/-101
                Route Distinguisher: 62.0.0.2:1
                Next hop type: Indirect
                Address: 0x95c9f90
                Next-hop reference count: 4
                Source: 62.0.0.255
                Protocol next hop: 62.0.0.2
                Indirect next hop: 0x2 no-forward INH Session ID: 0x0
                State: Secondary Active Int Ext
                Local AS: 6262 Peer AS: 6262
                Age: 26 Metric2: 1
                Validation State: unverified
                Task: BGP_6262.62.0.0.255+179
                Announcement bits (1): 0-RZN-VPN-1-evpn
                AS path: I (Originator)
                Cluster list: 62.0.0.255
                Originator ID: 62.0.0.2
                Communities: target:6262:777
                Import Accepted
                Route Label: 300272
                ESI: 00:00:00:00:00:00:00:00:00:00
                Localpref: 100
                Router ID: 62.0.0.255
                Primary Routing Table bgp.evpn.0
```

Как я и написал ранее, EVPN использует MAC-адреса как роутинговые адреса. Из анонса от PE2, PE1 теперь знает, что, чтобы добраться до MAC-адреса aa:bb:cc:00:07:00 во влане 777 \(обращаю внимание, что именно в 777 влане, так как один и тот же MAC-адрес может быть в разных вланах, и это будут разные маршруты\), необходимо навесить на пакет две метки: 300272 \(VPN\) и транспортную метку до 62.0.0.2.

> Примечание: помимо всем известных полей Route Distinguisher, Protocol next hop и т д, мы видим поле ESI, которое в данном анонсе выставлено в нули. Это поле очень важно при использовании multihomed сайтов, и к нему мы вернемся чуть позже, в данном сценарии оно не играет роли.

Как и L3VPN, EVPN умеет генерировать метки per-mac, per-next-hop и per-instance:

* **per-mac** — на каждый мак адрес генерируется отдельная метка. Как вы понимаете данный вид распределения меток слишком расточителен;
* **per-next-hop** — наверно точнее будет сказать per-CE или per-AC, то есть одна и та же метка генерируется только для MAC-адресов, находящихся за одним и тем же Attachment Circuit \(то есть если к одному PE маршрутизатору в одном routing-instance подключено два CE маршрутизатора, то для MAC-адресов, изученных от CE1, PE маршрутизатор будет генерировать одну метку, а для MAC-адресов, изученных от CE2 — другую\)
* **per-instance** — одна метка генерируется на весь routing-instance, то есть у всех маршрутов будет одна и та же метка. В JunOS вы можете увидеть данную метку при просмотре EVPN instance в режиме extensive.

