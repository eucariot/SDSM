# Настройка на обратной стороне

С обратной стороны нужно произвести симметричную настройку.  
Поэтому просто применяем следующую конфигурацию на R3:

```text
crypto isakmp policy 1
encr aes
authentication pre-share
crypto isakmp key CISCO address 100.0.0.1
!
!
crypto ipsec transform-set AES128-SHA esp-aes esp-sha-hmac 
! 
crypto map MAP1 10 ipsec-isakmp 
set peer 100.0.0.1
set transform-set AES128-SHA 
match address 101

interface FastEthernet0/1
crypto map MAP1

access-list 101 permit ip host 10.1.1.0 host 10.0.0.0
```

Вот и всё.

