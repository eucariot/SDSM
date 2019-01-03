# Практика RR

Для примера предположим, что в нашей сети в качестве RR будет выступать R1.  
Вот конфигурация самого простого случая RR — одинокого, без кластера.  

**R1**  

```text
router bgp 64500
network 100.0.0.0 mask 255.255.254.0
neighbor AS64500 peer-group
neighbor AS64500 remote-as 64500
neighbor AS64500 update-source Loopback0
neighbor AS64500 route-reflector-client
neighbor AS64500 Next-Hop-self
neighbor 2.2.2.2 peer-group AS64500
neighbor 3.3.3.3 peer-group AS64500
neighbor 4.4.4.4 peer-group AS64500
neighbor 101.0.0.1 remote-as 64501
```

**R2**  

```text
router bgp 64500
network 100.0.0.0 mask 255.255.254.0
neighbor 1.1.1.1 remote-as 64500
neighbor 1.1.1.1 update-source Loopback0
neighbor 1.1.1.1 Next-Hop-self
neighbor 102.0.0.1 remote-as 64502
```

**R3**  

```text
router bgp 64500
network 100.0.0.0 mask 255.255.254.0
neighbor 1.1.1.1 remote-as 64500
neighbor 1.1.1.1 update-source Loopback0
neighbor 1.1.1.1 Next-Hop-self
```

**R4**  

```text
router bgp 64500
network 100.0.0.0 mask 255.255.254.0
neighbor 1.1.1.1 remote-as 64500
neighbor 1.1.1.1 update-source Loopback0
neighbor 1.1.1.1 Next-Hop-self
neighbor 100.0.0.6 remote-as 64504
```

Обратите внимание на команду "**neighbor AS64500 route-reflector-client**", добавившуюся в настройку R1 и то, что конфигурация BGP на всех других устройствах полностью идентична, за исключением внешних соседей (102.0.0.1 для R2 и 100.0.0.6 для R4).  

В общем-то внешне ничего не поменяется. R4, например, всё будет видеть точно также, за исключением количества соседей:  

![](http://img-fotki.yandex.ru/get/9355/83739833.2f/0_c70ba_e4ae5372_XL.png)  

Обратите внимание на то, что Route Reflector не меняет Next-Hop отражённых маршрутов на свой, несмотря на наличие параметра _Next-Hop-self_.  

На самом Route Reflector'е отличие будет выглядеть так:  

![](http://img-fotki.yandex.ru/get/9323/83739833.2f/0_c70bb_247e7307_XL.png)  

Если смотреть по конкретным маршрутам:  

![](http://img-fotki.yandex.ru/get/6717/83739833.2f/0_c70bc_79d6da08_L.png)  

Здесь видно полную подсеть, количество путей до неё, какой из них лучший, в какую таблицу он добавлен, куда передаётся (update-group 2 — как раз наш кластер).  
Далее перечисляются все эти пути, содержащие такие важные параметры, как AS-Path, Next-Hop, Origin итд, а также информацию о том, что например, первый маршрут был получен от RR-клиента.  

Эту информацию можно успешно использовать для траблшутинга. Вот так, например выглядит её вывод, когда не настроен Next-Hop-self:  

![](http://img-fotki.yandex.ru/get/9112/83739833.2f/0_c70bd_c6003183_L.png)  

[Конфигурация устройств](https://docs.google.com/document/d/1LUf-RSx62_QUN5KNARufwSDz8duq1D9fCRa6u6pZlPk/pub).  
