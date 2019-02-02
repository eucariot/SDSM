# Бонусы

PBRВ режиме глобальной конфигурации.  
Добавляем маршрут по умолчанию:

```text
ip route 0.0.0.0 0.0.0.0 10.0.1.1
```

В списке доступа отфильтровываем трафик из сети 192.168.2.0/24

```text
access-list 101 permit ip 192.168.2.0 0.0.0.255 any
```

Создаём карту маршрутов, где обозначаем, что если пакет из сети 192.168.2.0/24, то для него назначить next-hop 10.0.2.1 \(вместо 10.0.1.1\)

```text
route-map CLIENT permit 5
match ip address 101
set ip next-hop 10.0.2.1
```

Применяем карту на интерфейс:

```text
ip policy route-map CLIENT
```

Это лишь одно из применений мощного инструмента Policy-Based Routing, который, к сожалению, ни в каком виде не реализован в РТ.

rate-limit

На том же примере ограничим скорость для сети 192.168.1.0/24 до 1.5 Мб/с, а для 192.168.2.0/24 до 64 кб/с.  
На 10.0.1.1 можно выполнить следующие команды:

```text
Router(config)# access-list 100 permit ip 192.168.1.0 0.0.0.255 any
Router(config)# access-list 101 permit ip 192.168.2.0 0.0.0.255 any
Router(config)# interface fa0/0
Router(config-if)# rate-limit output access-group 100 1544000 64000 64000 conform-action transmit exceed-action drop
Router(config-if)# rate-limit output access-group 101 64000 16000 16000 conform-action transmit exceed-action drop
```

