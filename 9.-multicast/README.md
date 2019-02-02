# 9. Мультикаст

## Сети для самых маленьких. Часть девятая. Мультикаст

Наш умозрительный провайдер linkmeup взрослеет и обрастает по-тихоньку всеми услугами обычных операторов связи. Теперь мы доросли до IPTV.  
Отсюда вытекает необходимость настройки мультикастовой маршрутизации и в первую очередь понимание того, что вообще такое мультикаст.  
Это первое отклонение от привычных нам принципов работы IP-сетей. Всё-таки парадигма многоадресной рассылки в корне отличается от тёплого лампового юникаста.  
Можно даже сказать, это в некоторой степени бросает вызов гибкости вашего разума в понимании новых подходов.

В этой статье сосредоточимся на следующем:

* [Общее понимание Multicast](https://github.com/eucariot/SDSM/tree/3980ebc949c706312c92a0770d22501121795c27/9.-multicast/9.-multicast.md#Multicast_Basics)
* [Протокол IGMP](https://github.com/eucariot/SDSM/tree/3980ebc949c706312c92a0770d22501121795c27/9.-multicast/9.-multicast.md#IGMP)
* [Протокол PIM](https://github.com/eucariot/SDSM/tree/3980ebc949c706312c92a0770d22501121795c27/9.-multicast/9.-multicast.md#PIM)
* [PIM Dense Mode](https://github.com/eucariot/SDSM/tree/3980ebc949c706312c92a0770d22501121795c27/9.-multicast/9.-multicast.md#PIM-DM)
* [Pim Sparse Mode](https://github.com/eucariot/SDSM/tree/3980ebc949c706312c92a0770d22501121795c27/9.-multicast/9.-multicast.md#PIM-SM)
* [SPT Switchover — переключение RPT-SPT](https://github.com/eucariot/SDSM/tree/3980ebc949c706312c92a0770d22501121795c27/9.-multicast/9.-multicast.md#SPT_Switchover)
* [DR, Assert, Forwarder](https://github.com/eucariot/SDSM/tree/3980ebc949c706312c92a0770d22501121795c27/9.-multicast/9.-multicast.md#DR_Assert_Forwarder)
* [Автоматический выбор RP](https://github.com/eucariot/SDSM/tree/3980ebc949c706312c92a0770d22501121795c27/9.-multicast/9.-multicast.md#Bootstrap)
* [SSM](https://github.com/eucariot/SDSM/tree/3980ebc949c706312c92a0770d22501121795c27/9.-multicast/9.-multicast.md#SSM)
* [BIDIR PIM](https://github.com/eucariot/SDSM/tree/3980ebc949c706312c92a0770d22501121795c27/9.-multicast/9.-multicast.md#BIDIR_PIM)
* [Мультикаст на канальном уровне](https://github.com/eucariot/SDSM/tree/3980ebc949c706312c92a0770d22501121795c27/9.-multicast/9.-multicast.md#L2_Multicast)
* [IGMP Snooping](https://github.com/eucariot/SDSM/tree/3980ebc949c706312c92a0770d22501121795c27/9.-multicast/9.-multicast.md#IGMP_Snooping)
* [MVR](https://github.com/eucariot/SDSM/tree/3980ebc949c706312c92a0770d22501121795c27/9.-multicast/9.-multicast.md#MVR)

[![&#x41C;&#x443;&#x43B;&#x44C;&#x442;&#x438;&#x43A;&#x430;&#x441;&#x442;](https://img-fotki.yandex.ru/get/9810/83739833.39/0_de148_8fc00820_XL.jpg)](https://img-fotki.yandex.ru/get/9810/83739833.39/0_de148_8fc00820_orig.jpg)

[Традиционный видеоурок](https://www.youtube.com/embed/uYnC6yU6Apo)

> На заре моего становления, как инженера, тема мультикаста меня неимоверно пугала, и я связываю это с психотравмой моего первого опыта с ним.  
> «_Так, Марат, срочно, до полудня нужно пробросить видеопоток до нашего нового здания в центре города — провайдер отдаст его нам тут на втором этаже_» — услышал я одним чудесным утром. Всё, что я тогда знал о мультикасте, так это то, что отправитель один, получателей много, ну и, кажется, протокол IGMP там как-то задействован.  
>   
> В итоге до полудня мы пытались всё это дело запустить — я пробросил самый обычный VLAN от точки входа до точки выхода. Но сигнал был нестабильным — картинка замерзала, разваливалась, прерывалась. Я в панике пытался разобраться, что вообще можно сделать с IGMP, тыркался, тыркался, включал мультикаст роутинг, IGMP Snooping, проверял по тысяче раз задержки и потери — ничего не помогало. А потом вдруг всё заработало. Само собой, стабильно, безотказно.  
>   
> Это послужило мне прививкой против мультикаста, и долгое время я не проявлял к нему никакого интереса.  
>   
> Уже гораздо позже я пришёл в к следующему правилу:  
> [![keep kalm and trust me](http://img-fotki.yandex.ru/get/9825/83739833.39/0_dd502_10ea996f_M.png)](http://img-fotki.yandex.ru/get/9825/83739833.39/0_dd502_10ea996f_orig.png)  
>   
> И теперь с высоты оттраблшученных кейсов я понимаю, что там не могло быть никаких проблем с настройкой сетевой части — глючило конечное оборудование.

Сохраняйте спокойствие и доверьтесь мне. После этой статьи такие вещи вас пугать не будут.

