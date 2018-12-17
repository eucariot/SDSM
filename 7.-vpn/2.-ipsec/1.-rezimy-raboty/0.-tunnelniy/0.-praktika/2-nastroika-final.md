# Настройка. Завершение


Но сколько бы вы после ни смотрели **show crypto session** или **show crypto isakmp sa**, вы увидите только _Down_. Туннель никак не поднимается.  
Счётчики **show crypto ipsec sa**. Так же по нулям.

> R1\#sh crypto session  
> Crypto session current status  
>   
> Interface: FastEthernet0/0  
> **Session status: DOWN**  
> Peer: 200.0.0.1 port 500  
> IPSEC FLOW: permit ip host 10.0.0.0 host 10.1.1.0  
> Active SAs: 0, origin: crypto map  
>   
> R1\#sh crypto isakmp sa  
> dst src state conn-id slot status

Дело в том, что вам необходимо пустить в него трафик. В прямом смысле, например так:

> R1\#ping 10.1.1.0 source 10.0.0.0  
> Type escape sequence to abort.  
> Sending 5, 100-byte ICMP Echos to 10.1.1.0, timeout is 2 seconds:  
> Packet sent with a source address of 10.0.0.0  
> .!!!  
> Success rate is 80 percent \(4/5\), round-trip min/avg/max = 60/94/160 ms

И как только вы это сделали, вас ждёт успех:

> R1\#sh crypto session  
> Crypto session current status  
>   
> Interface: FastEthernet0/0  
> Session status: UP-ACTIVE  
> Peer: 200.0.0.1 port 500  
> IKE SA: local 100.0.0.1/500 remote 200.0.0.1/500 Active  
> IPSEC FLOW: permit ip host 10.0.0.0 host 10.1.1.0  
> Active SAs: 2, origin: crypto map  
>   
> R1\#sh crypto isakmp sa  
> dst src state conn-id slot status  
> 200.0.0.1 100.0.0.1 QM\_IDLE 1 0 ACTIVE

[Полная конфигурация маршрутизаторов](https://docs.google.com/document/d/1cFIc6teN1UScC4pfn1zuMWlcfp6maCbgiyUcmHyEDws/pub).

