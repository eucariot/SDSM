# Маршрут по умолчанию

Теперь самое время проверить доступ в интернет. Из Москвы он прекрасно себе работает, а вот если проверить, например из Петербурга \(помним, что мы удалили все статические маршруты\):

```text
PC>ping linkmeup.ru

Pinging 192.0.2.2 with 32 bytes of data:

Reply from 172.16.2.5: Destination host unreachable.
Reply from 172.16.2.5: Destination host unreachable.
Reply from 172.16.2.5: Destination host unreachable.
Reply from 172.16.2.5: Destination host unreachable.

Ping statistics for 192.0.2.2:
Packets: Sent = 4, Received = 0, Lost = 4 (100% loss),
```

Это связано с тем, что ни spb-ozerki-gw1, ни spb-vsl-gw1, ни кто-либо другой в нашей сети не знает о маршруте по умолчанию, кроме msk-arbat-gw1, на котором он настроен статически.  
Чтобы исправить эту ситуацию, нам достаточно дать одну команду в Москве:

```text
msk-arbat-gw1(config)#router ospf 1 
msk-arbat-gw1(config-router)#default-information originate
```

После этого по сети лавинно распространяется информация о том, где находится шлюз последней надежды.

Интернет теперь доступен:

```text
PC>tracert linkmeup.ru

Tracing route to 192.0.2.2 over a maximum of 30 hops: 

1 3 ms 3 ms 3 ms 172.16.17.1
2 4 ms 5 ms 12 ms 172.16.2.5
3 14 ms 20 ms 9 ms 172.16.2.1
4 17 ms 17 ms 19 ms 198.51.100.1
5 22 ms 23 ms 19 ms 192.0.2.2

Trace complete.
```

