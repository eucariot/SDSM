# Сети для самых матёрых. Микровыпуск №8. EVPN Multihoming

В рамках серии СДСМ публикуем вторую статью [Марата Бабаяна][1] о EVPN.  
\==================================================================  
  
![](https://habrastorage.org/web/023/f0c/ec9/023f0cec93074a319320b89b4fdd78bb.jpg)  
  
В статье, посвященной EVPN я затронул тему multihoming-га. Многих эта тема заинтересовала и поэтому в продолжении предыдущей статьи сегодня мы рассмотрим что же такое EVPN multihoming и как он работает.  
  
EVPN multihoming работает в двух режимах: Single-Active и Active-Active. Мы сегодня в основном остановимся на более сложном и интересном варианте: Active-Active, так как Single-Active по сути очень упрощенная версия Active-Active.  
  
Данная статья рассчитана на тех, кто уже имеет общие знания о EVPN: основные принципы работы, отличия от VPLS и т д. В противном случае понять содержание статьи будет сложно.  

> Примечание: Лабораторный стенд я собрал в EVE-NG с использованием vMX: как P-маршрутизатор и свичи запущены vMX версии 14.1, как PE-маршрутизаторы vMX 16.1, как конечные хосту 5 Linux-машин. В отличии от прошлой лабы, которую я собирал на ноутбуке, данная лаба слишком требовательна к ресурсам. Дело в том, что vMX 16.1 работает на двух виртуальных машинах и требует в общей сложности 4 CPU и 8Гб RAM. В итоге для представленной в статье лабы необходимо порядка 35Гб RAM на сервере, Но хочу заметить что в рабочем состоянии вся лаба занимала чуть больше 23Gb RAM (это надо иметь ввиду, если вдруг захотите поднять данную лабу дома).

Мы будем рассмотрим вот такую топологию:  
  
![](https://habrastorage.org/web/f23/a32/b5d/f23a32b5db884e789ba27c903253d67c.jpg)  
В конфигурации я буду использовать vlan-aware метод, то есть через виртуальный свич, так как данный метод наиболее гибок и интересен, во всяком случае для меня. На каждом PE-маршрутизаторе создано по три EVPN инстанса (сокращенно EVI — EVPN Instance), конфигурация которых на всех трех РЕ-ках примерно одинакова — различия лишь в RD, RT и номерах вланов. Два других инстанса добавлены только чтобы продемонстрировать некоторые особенности EVPN Multihoming наглядно.  
  
Конфигурация EVPN инстансов имеет такой вид:  
  

```
bormoglotx@RZN-PE-1> show configuration routing-instances vSwitch-eVPN-1 
instance-type virtual-switch;
interface ae3.777;
route-distinguisher 62.0.0.1:1;
vrf-target target:42000:1;
protocols {
evpn {
extended-vlan-list 777;
}
}
bridge-domains {
BRIDGE-777 {
vlan-id 777;
}
}
```

  
Ничего сложного: инстанс с типом виртуальный свич, RT, RD и всего лишь один бридж-домен с vlan-id 777. Этот же влан указан в расширенном списке вланов протокола evpn. Для тестирования нам ничего больше и не надо.  
  
Теперь перейдем к конфигурации интерфейсов. На RZN-PE-3 все просто и банально:  
  

```
bormoglotx@RZN-PE-3> show configuration interfaces ae0 
description "RZN-SW-3 | ae0";
flexible-vlan-tagging;
encapsulation flexible-ethernet-services;
aggregated-ether-options {
lacp {
active;
periodic fast;
}
}
unit 777 {
description eVPN-1;
encapsulation vlan-bridge;
family bridge {
interface-mode trunk;
vlan-id-list 777;
}
}
```

  
Простой агрегат, работающий как транковый интерфейс, в котором разрешен только 777 влан.  
  
А вот на PE1 и PE2 конфиг несколько отличается от PE3, так как данные PE-ки являются multihomed к RZN-SW-1:  
  

```
bormoglotx@RZN-PE-1> show configuration interfaces ae3 
description "RZN-SW-1 | ge-0/0/0 | ae3<<>>ae0 ";
flexible-vlan-tagging;
mtu 1600;
encapsulation flexible-ethernet-services;
esi {
00:00:00:00:00:00:00:00:00:01;
all-active;
}
aggregated-ether-options {
lacp {
active;
periodic fast;
system-id 02:00:00:00:00:01;
}
}
unit 777 {
description eVPN-1;
encapsulation vlan-bridge;
family bridge {
interface-mode trunk;
vlan-id-list 777;
}
}

```

  
Тут нам интересен появившийся идентификатор ESI. Напомню для тех кто забыл (или не знал) — данный идентификатор необходимо назначить вручную (при использовании MC-LAG может генерироваться автоматически), причем у всех интерфейсов, подключенных к одному и тому же сегменту этот идентификатор должен быть одинаковым.  

> Примечание: для какой цели тут указан system-id будет описано в конце статьи

В нашем случае я выбрал простой идентификатор 00:00:00:00:00:00:00:00:00:01, так как его значение не играет для нас большой роли, главное чтобы оно было отлично от зарезервированных значений (все нули и все единицы) и не пересекалось со значением уже сконфигурированных значений ESI в других сегментах. То есть грубо говоря ESI должен быть уникален для всей сети, где запускается EVPN. Для non-multihoming сегментов данный идентификатор не играет вообще никакой роли и автоматически выставляется в 0-ль. Естественно, даже для non-multihoming PE-маршрутизаторов можно ручкамии задать ненулевое значение ESI на линках, и это всего навсего повлечет за собой генерацию лишних маршрутов — то есть по сути проблем как таковых и не будет. А вот если это заданное ручками значение ESI совпадает со значением уже сконфигурированного ESI на другом или других стыках то у вас начнутся проблемы.  
  
В EVPN существует 5 типов маршрутов (тип 5 я прошлый раз не рассматривал, но я постараюсь затронуть эту тему в статье о EVPN/VxLAN):  
  
Тип 2 — это MAC/IP маршрут. Данный маршрут указывает PE-маршрутизатору куда и с какой меткой отправлять юникастовые пакеты на конкретный мак-адрес, указанный в маршруте. По сути аналогичен анонсу vpnv4 префикса в L3VPN. Маршрут может также содержать и ip адрес хоста.  
  
Тип 3 — это Inclusive Multicast маршрут. Данный маршрут указывает PE-маршрутизатору куда и с какой меткой отправлять BUM трафик.  
  
Тип 1 и 4 — основные маршруты, предоставляющие нам функционал EVPN Multihoming. Их мы рассмотрим далее.  
  
Итак, в 0-вой момент времени, как только мы запустили EVPN, маршрутизаторы начинают рассылать друг другу маршруты типа 3, что бы можно было обмениваться BUM трафиком. Это справедливо для сценария без multihoming-га. Так как в нашем сегменте два маршрутизатора смотрят в один и тот же сегмент, то у нас появляются маршруты типа 1 и 4. Зачем нам маршрут типа 3 вы уже должны знать, поэтому далее мы заострим внимание на маршрутах типа 1 и 4.  
  
Как я написал выше — мы только что запустили EVPN и пока что никакого обмена трафиком между хостами не было, о чем говорит нам отсутствие MAC-адресов в таблице форвардинга инстанса vSwitch-eVPN-1:  
  

```
bormoglotx@RZN-PE-1> show evpn instance vSwitch-eVPN-1 brief 
Intfs IRB intfs MH MAC addresses
Instance Total Up Total Up Nbrs ESIs Local Remote
vSwitch-eVPN-1 1 1 0 0 2 1 0 0
```

  
В представленном выводе видно, что у нас есть multihomed сегмент. Чтобы узнать информацию об этом сегменте мы рассмотрим extensive вывод предыдущей команды:  
  

```
bormoglotx@RZN-PE-1> show evpn instance vSwitch-eVPN-1 extensive 
Instance: vSwitch-eVPN-1
Route Distinguisher: 62.0.0.1:1
Per-instance MAC route label: 299792
Per-instance multicast route label: 299776
MAC database status Local Remote
MAC advertisements: 0 0
MAC+IP advertisements: 0 0
Default gateway MAC advertisements: 0 0
Number of local interfaces: 1 (1 up)
Interface name ESI Mode Status
ae3.777 00:00:00:00:00:00:00:00:00:01 all-active Up 
Number of IRB interfaces: 0 (0 up)
Number of bridge domains: 1
VLAN Domain ID Intfs / up IRB intf Mode MAC sync IM route label
777 1 1 Extended Enabled 299776 
Number of neighbors: 2
62.0.0.2
Received routes
MAC address advertisement: 0
MAC+IP address advertisement: 0
Inclusive multicast: 1
Ethernet auto-discovery: 2
62.0.0.3
Received routes
MAC address advertisement: 0
MAC+IP address advertisement: 0
Inclusive multicast: 1
Ethernet auto-discovery: 0
Number of ethernet segments: 1
ESI: 00:00:00:00:00:00:00:00:00:01
Status: Resolved by IFL ae3.777
Local interface: ae3.777, Status: Up/Forwarding
Number of remote PEs connected: 1
Remote PE MAC label Aliasing label Mode
62.0.0.2 300208 300208 all-active 
Designated forwarder: 62.0.0.2
Backup forwarder: 62.0.0.1
Last designated forwarder update: May 07 06:59:19
Advertised MAC label: 300112
Advertised aliasing label: 300112
Advertised split horizon label: 302752
```

  
Данный вывод дает нам полную информацию по нашему EVPN инстансу. Часть полей вам должна быть уже понятна. Согласно данному выводу у нас есть ESI 00:00:00:00:00:00:00:00:00:01, который работает в режиме Active-Active:  
  

```
Number of local interfaces: 1 (1 up)
Interface name ESI Mode Status
ae3.777 00:00:00:00:00:00:00:00:00:01 all-active Up 
```

  
Далее в выводе представлена информация по каждому PE-маршрутизатору, участвующему в данном EVPN домене:  
  

```
Number of neighbors: 2
62.0.0.2
Received routes
MAC address advertisement: 0
MAC+IP address advertisement: 0
Inclusive multicast: 1
Ethernet auto-discovery: 2
```

  
Судя по информации выше от RZN-PE-2 мы получаем один маршрут типа 3 и два маршрута типа 1.Правда это не совсем так. Помимо этих маршрутов, RZN-PE-2 отдает нам еще один маршрут типа 4, но почему он тут не показан, увидим позже.  
  
А вот от RZN-PE-3 на данный момент мы получаем только один маршрут типа 3 и все:  
  

```
62.0.0.3
Received routes
MAC address advertisement: 0
MAC+IP address advertisement: 0
Inclusive multicast: 1
Ethernet auto-discovery: 0
```

  
Это и логично, так как данный PE-маршрутизатор не является multihomed и пока все что нам от него надо знать — это маршрут типа 3. Дальше по мере изучения маков данный маршрутизатор начнет рассылать анонсы типа 2, но пока что никаких маков он не изучил. Если бы у нас были бы сконфигурены дефолтные шлюзы, то появились бы еще маршруты типа 2 (в завизимости от количества irb интерфейсов, добавленных в инстанс).  
  
Помимо описанной выше информации по нашему EVI в выводе указано, что для сегмента с ESI 00:00:00:00:00:00:00:00:00:01 выбран Designated forwarder и указана Aliasing label:  
  

```
Number of ethernet segments: 1
ESI: 00:00:00:00:00:00:00:00:00:01
Status: Resolved by IFL ae3.777
Local interface: ae3.777, Status: Up/Forwarding
Number of remote PEs connected: 1
Remote PE MAC label Aliasing label Mode
62.0.0.2 300208 300208 all-active 
Designated forwarder: 62.0.0.2
Backup forwarder: 62.0.0.1
```

  
В данный момент многое из выводов не понятно. Для понимания принципов работы EVPN Multihoming нам надо разобраться как минимум со следующими вопросам:  
  
1\. Зачем Multihomed PE-маршрутизатор начинает анонсировать дополнительные маршруты типа 1 и 4, каково их назначение;  
2\. Что такое DF и как происходят его выборы;  
3\. Почему маршрутов типа 1 аж два.  
4\. Что такое Aliasing label в выводе выше.  
  
Но эти и некоторые другие вопросы я постараюсь ответить дальше.  
  

### Проблемы Multihoming-га.

  
Для начала давайте обозначим, какие проблемы у нас возникнут если мы будем включим Multihoming в Active-Active режиме. Естественно самой острой проблемой будут петли (ну или циклы, кому как нравится), так как EVPN — это все же является L2VPN-ом. По сути, если победить эту проблему — то технология уже будет лучше того же VPLS, который в All-Active режиме вообще не умеет работать. Еще одной немаловажной проблемой будет балансировка трафика, так как не все multihomed PE маршрутизаторы будут изучать маки от клиента. Другие проблемы менее критичны, точнее скажем так — другие проблемы хоть и есть, но их наличие не делает технологию нежизнеспособной.  
  
Давайте рассмотрим, как эти проблемы решены в EVPN.  
  
Борьба с петлями имеет целый комплекс мер. Первое естественно split horizon — кадр, полученный от других PE маршрутизаторов (то есть из ядра) не отправляется снова в ядро. Но естественно этого недостаточно, так как основное место сети, где может возникнуть петля — это подключение multihomed CE коммутатора к нескольким PE-маршрутизаторам. Для устранения петель в этом сегменте используются Designated Forwarder и Split Horizon Label, Но обо всем по порядку.  
  

### Что такое DF и зачем он нужен?

  
Первый сценарий возникновения петли: представим, что удаленный PE маршрутизатор получает от CE BUM трафик (например банальный arp запрос) и рассылает его всем остальным PE-кам (предположим это PE3). Так как два PE маршрутизатора (PE1 и PE2) смотрят в один и тот же сегмент и они оба получают BUM трафик от PE3, то получится, что в этот сегмент прилетят две копии трафика, которые далее начнут петлять по все сети, включая и ядро:  
  
![](https://habrastorage.org/web/bcf/b02/ac6/bcfb02ac64a6445a936cda4e2cf262cd.gif)  
  
Для борьбы с данным явлением в EVPN для каждого multihomed-сегмента выбирается Designated Forwarder — узел, который ответственный за форвардинг BUM трафика в сторону конкретного сегмента в конкретном влане. Все остальные маршрутизаторы, сколько бы их не было в сегменте, не имею права отправлять BUM трафик в сторону CE маршрутизатора/коммутатора (в данном ESI в данном влане).  
  
Алгоритм выбора DF:  
  
1\. Сначала все PE маршрутизаторы должны понять, сколько еще маршрутизаторов подключено к указанному сегменту и какие у них адреса (лупбеки);  
  
2\. По истечении таймера (по умолчанию 3 секунды) формируется список всех PE маршрутизаторов, участвующих в выборе DF, начиная с наименьшего адреса и заканчивая наибольшим. Список адресов нумеруется с 0-ля;  
  
3\. По формуле V mod N = i высчитывается DF для данного сегмента и влана;  
  
4\. Маршрутизатор, выбранный DF-ом разблокриует передачу BUM трафика в сторону CE, а все остальные non-DF маршрутизаторы продолжают блокировать BUM трафика в сторону CE маршрутизатора/коммутатора в данном сегменте в данном влане.  
  
В теории все просто, но давайте по порядку.  
  
Сначала ответим на вопрос, как маршрутизаторы понимают, кто еще имеет линк в этом же сегмент (и есть ли такие маршрутизаторы вообще)? Для этого и существует маршрут типа 4. Посмотрим на данный маршрут:  
  

```
bormoglotx@RZN-PE-1> show route table vSwitch-eVPN-1.evpn.0 match-prefix *4:6* 

vSwitch-eVPN-1.evpn.0: 9 destinations, 9 routes (9 active, 0 holddown, 0 hidden)
```

  
В таблице маршрутизации нашего EVPN инстанса таких маршрутов нет. Дело в том, что в данную таблицу попадают только те маршруты, расширенное community которых соответствует импорту, сконфигурированному в инстансе. Например для vSwitch-eVPN-1 равно:  
  

```
bormoglotx@RZN-PE-1> show configuration routing-instances vSwitch-eVPN-1 vrf-target 
target:42000:1;
```

  
Получается что у маршрута типа 4 какое то другое, отличное от сконфигурированного на импорт community. Это происходит из-за того, что маршруты в evpn могут генерироваться двумя способами — per-EVI и per-ESI.  
  
**per-EVI** — этот маршрут сгенерирован определенным инстансом  
  
**per-ESI** — этот маршрут сгенерирован не каким-то определенным инстансом, а маршрутизатором для всех инсатнсов имеющих линк в данном ESI. Один и тот же сегмент может быть включен в несколько evpn инстанций (к примеру в инстанс EVPN1 добавлен интерфейс ae3.777, а в EVPN2 — ae3.778, хоть это и разные юниты, но ESI конфигурится на весь интерфейс целиком, а значит у данных интерфейсов будет один и тот же ESI, хоть и находятся они в разных EVI).  
  
Маршруты, генерируемые per-EVI должны иметь нативные RT и RD инстанса, из которого эти маршруты анонсируются (либо какие то ещё RT, если они дополнительно навешиваются экспортной политикой — то есть добавляются вручную администраторами). Маршруты типа 2 и 3 всегда генерируются per-EVI, а значит всегда имеют в составе маршрута нативную RD и RT инстанса, из которого данные маршруты анонсируются. А вот для маршрутов, генерируемых per-ESI все несколько сложнее и зависит от типа маршрута.  
  
Но продолжим разбираться с маршрутом типа 4.  
  
Данный маршрут всегда генерируется per-ESI. RD у данного маршрута будет сгенерировано автоматически маршрутизатором из router-id (если указан) или адреса лупбека (так как ни к одной из EVPN инстанций данный маршрут собственно и не относится). RT также не указывается в ручную, а генерируется из ESI и только те маршрутизаторы, имеющие один и тот же ESI импортируют данный маршрут. Именно поэтому в выводе, рассмотренном раннее в начале статьи не мы не видим, что multihomed сосед анонсирует нам маршрут типа 4.  

> Примечание: вообще то не совсем так, так как для RT берется только часть битов ESI и импортировать данный маршрут будут все PE-ки, имеющие одинаковые биты ESI, используемые для генерации RT.

> Примечание: JunOS генерирует RD для маршрутов per-ESI используя нулевое значение во второй части RD: 62.0.0.1:**0**.

Так где же искать наш маршрут типа 4? В JunOS существуют несколько таблиц маршрутизации. Маршруты EVPN сначала попадают в таблицу bgp.evpn.0 и из нее уже импортируются в какие то другие таблицы маршрутизации (secondary tables). Поэтому данный маршрут можно найти в таблице bgp.evpn.0, из которой он экспортируется в таблицу \_\_default\_evpn\_\_.evpn.0:  
  

```
bormoglotx@RZN-PE-1> show route table __default_evpn__.evpn.0 match-prefix *4:6* 

__default_evpn__.evpn.0: 3 destinations, 3 routes (3 active, 0 holddown, 0 hidden)
+ = Active Route, - = Last Active, * = Both

4:62.0.0.1:0::01:62.0.0.1/304 ES 
*[EVPN/170] 02:57:15
Indirect
4:62.0.0.2:0::01:62.0.0.2/304 ES 
*[BGP/170] 02:57:16, localpref 100, from 62.0.0.100
AS path: I, validation-state: unverified
> to 10.0.0.1 via ae0.1
```

  
Как я и сказал, RD сгенерировано маршрутизатором автоматически: 62.0.0.1:0 в маршруте от RZN-PE-1 (next-hop indirect, так как маршрут локален для данного маршрутиатора) и 62.0.0.2:0 в маршруте от RZN-PE-2. Маршрута от RZN-PE-3 нет, так как данный PE-маршрутизатор не является multihomed. Более того, так как на PE-3 нет такого ESI, то эти маршруты данный маршрутизатор не импортирует, хотя рефлектор добросовестно их ему отдает:  
  

```
bormoglotx@RZN-PE-3> show route table __default_evpn__.evpn.0 
bormoglotx@RZN-PE-3> 
```

  

```
bormoglotx@RZN-P-1> show route advertising-protocol bgp 62.0.0.3 | match 4:62 
4:62.0.0.1:0::01:62.0.0.1/304 
4:62.0.0.2:0::01:62.0.0.2/304 
```

  
Теперь разберем данный маршрут подробнее:  
  

```
bormoglotx@RZN-PE-1> show route table __default_evpn__.evpn.0 match-prefix *4:6* next-hop 62.0.0.2 detail 

__default_evpn__.evpn.0: 3 destinations, 3 routes (3 active, 0 holddown, 0 hidden)
4:62.0.0.2:0::01:62.0.0.2/304 ES (1 entry, 1 announced)
*BGP Preference: 170/-101
Route Distinguisher: 62.0.0.2:0
Next hop type: Indirect, Next hop index: 0
Address: 0xb1e55f0
Next-hop reference count: 20
Source: 62.0.0.100
Protocol next hop: 62.0.0.2
Indirect next hop: 0x2 no-forward INH Session ID: 0x0
State: Secondary Active Int Ext
Local AS: 42000.62 Peer AS: 42000.62
Age: 2:58:04 Metric2: 1 
Validation State: unverified 
Task: BGP_42000.62.62.0.0.100
Announcement bits (1): 0-__default_evpn__-evpn 
AS path: I (Originator)
Cluster list: 62.0.0.100
Originator ID: 62.0.0.2
Communities: es-import-target:0-0-0-0-0-0
Import Accepted
Localpref: 100
Router ID: 62.0.0.100
Primary Routing Table bgp.evpn.0
```

  
Особо ничего криминального — большая часть полей свойственна BGP маршруту. Но вот в строке community мы обычно привыкли видеть например domain-id, origin или target community. Тут же совсем другие community.  
  
Это специально зарезервированное для EVPN community. Как я и писал выше данный маршрут генерируется исключительно per-ESI и получить его должны только те PE-маршрутизаторы, которым этот маршрут нужен. А нужен он только тем PE-кам, которые имеют линк в том же ESI, что и отправитель маршрута. Поэтому community данного маршрута генерируется на основании ESI и имеет вид es-import-target:0-0-0-0-0-0.  
  
![](https://habrastorage.org/web/ff0/ce2/74b/ff0ce274b0584ab9a6325e670b40c92b.gif)  
  
В нашем случае все нули, и я специально взял такое ESI, чтобы показать, что это community может содержать только нули во второй своей части (первая часть зарезервирована и равна 0x06 (type) и 0х02 (sub type), кому интересно читаем [RFC][2]) и это никак не скажется на работоспособность EVPN. В итоге в нашей лабораторной сети только RZN-PE-1 и RZN-PE-2 импортируют данный маршрут.  
  
А где же сам ESI спросите вы? Идентификатор указан непосредственно в самом маршруте: 4:62.0.0.2:0::**01**:62.0.0.2/304 ES, просто пустые октеты (нули) опускаются (подобно ipv6). И как не трудно догадаться если два маршрутизатора будут иметь линки в в разных сегментах, но их идентификаторы будут равны **00**:00:00:00:00:00:00:00:00:**01** у первого и **10**:00:00:00:00:00:00:00:00:**01** у второго, то маршруты будут импортированы обоими маршрутизаторами. По community происходит только первоначальная фильтрация — сам же маршрут будет использован только если ESI, указанный в маршруте совпадает с ESI на самом маршрутизаторе, который этот маршрут получил, иначе — маршрут будет отброшен.  
  
Как только маршрутизатор понимает, что он является multihomed (понимает он это по ненулевому значению ESI в конфигурации интерфейсов), он начинает отправлять маршрут типа 4, чтобы все соседние маршрутизаторы знали о его присутствии в сети.  
  
После того, как маршруты разлетелись по сети, RZN-PE-1 и RZN-PE-2 узнают, что они подключены к одному и тому же ESI. Оба маршрутизатора ждут в течении 3 секунд (по дефолту) маршрутов типа 4 от остальных PE-маршрутизаторов, после чего, на основании полученных от соседей маршрутов типа 4 составляют список всех подключенных к данному сегменту узлов, причем на всех узлах данный список будет одинаков, в нашем случае такой:  

> 62.0.0.1 i=0  
> 62.0.0.2 i=1

После этого маршрутизаторы начинают высчитывать, кто будет DF по формуле V mod N = i, где V — номер влана, а N количество PE маршрутизаторов в сегменте. Тот PE маршрутизатор, номер которого будет результатом вычисления и становится DF данного сегмента в данном влане. Как вы понимаете, для каждого влана будет свой DF — получается некая балансировка BUM трафика.  
  
![](https://habrastorage.org/web/791/91d/cfa/79191dcfa6f847b6ba3fd7e44046a83b.gif)  
  
В лаборатории сконфигурено три EVPN инстанса, каждому инстансу соответствует один влан, я использовал вланы 777, 778 и 779. Так как multihomed PE-ек у нас 2, то количество узлов равно 2. Получаем, что в данном сегменте DF-ом для вланов 777 и 779 будет выбран RZN-PE-2, а для 778 — RZN-PE-1, что легко проверить:  
  

```
bormoglotx@RZN-PE-1> show configuration routing-instances | display set | match interface 
set routing-instances vSwitch-eVPN-1 interface ae3.777
set routing-instances vSwitch-eVPN-2 interface ae3.778
set routing-instances vSwitch-eVPN-3 interface ae3.779
```

  

```
bormoglotx@RZN-PE-1> show configuration interfaces ae3 | display set | match vlan-id 
set interfaces ae3 unit 777 family bridge vlan-id-list 777
set interfaces ae3 unit 778 family bridge vlan-id-list 778
set interfaces ae3 unit 779 family bridge vlan-id-list 779
```

  

```
bormoglotx@RZN-PE-1> show evpn instance vSwitch-eVPN-1 designated-forwarder 
Instance: vSwitch-eVPN-1
Number of ethernet segments: 1
ESI: 00:00:00:00:00:00:00:00:00:01
Designated forwarder: 62.0.0.2
```

  

```
bormoglotx@RZN-PE-1> show evpn instance vSwitch-eVPN-2 designated-forwarder 
Instance: vSwitch-eVPN-2
Number of ethernet segments: 1
ESI: 00:00:00:00:00:00:00:00:00:01
Designated forwarder: 62.0.0.1
```

  

```
bormoglotx@RZN-PE-1> show evpn instance vSwitch-eVPN-3 designated-forwarder 
Instance: vSwitch-eVPN-3
Number of ethernet segments: 1
ESI: 00:00:00:00:00:00:00:00:00:01
Designated forwarder: 62.0.0.2
```

  
Данная схема имеет свои плюсы и минусы. Самый очевидный минус — это сам механизм выбора DF. Как только в сегменте появляется новый маршрутизатор, имеющий линк в сторону ESI X или происходит падение/восстановление линка на маршрутизаторе в сторону ESI X, то для данного сегмента происходит пересчет DF. Причем самой плохой ситуацией будет пропадание линка в сторону ESI X на DF маршрутизаторе. Так как остальные маршрутизаторы блокируют передачу BUM трафика в сторону CE устройства, то на время детектирования падения DF и высчитывание нового DF BUM трафик будет дропаться всеми PE-маршрутизаторами сегмента, так как в данный момент времени они все будут non-DF. Но в сейчас есть драфт [RFC][3], который описывает новую процедуру выбора DF. Но пока что все работает так, как описано.  
  
Стоит упомянуть, что выбор DF для vlan-aware и vlan-bundle методов немного различаются. Так как виртуальный свич может терминировать несколько бридж-доменов, то выбор DF в этом случае происходит не для каждого влана отдельно, а для всех вланов сразу, а в расчетах используется наименьший сконфигурированный номер влана. Для примера добавим в виртульный свич вланы 30,778 и 779. Нетрудно подсчитать, что если взять за основу наименьший номер влана — 30, то DF-ом для сего данного сегмента будет PE1 — 62.0.0.1:  
  

```
bormoglotx@RZN-PE-1> show evpn instance vSwitch-eVPN-1 extensive | match "domain|extended|forwarder" 
Number of bridge domains: 4
VLAN Domain ID Intfs / up IRB intf Mode MAC sync IM route label
30 1 1 Extended Enabled 300384 
777 1 1 irb.1 Extended Enabled 300384 
778 1 1 Extended Enabled 300384 
779 1 1 Extended Enabled 300384 
Designated forwarder: 62.0.0.1
Backup forwarder: 62.0.0.2
Last designated forwarder update: May 24 08:12:13
```

  
А теперь удалим 30-й влан. Теперь наименьший номер влана это 777, то есть теперь DF-ом должен стать PE2 — 62.0.0.2:  
  

```
bormoglotx@RZN-PE-1> show evpn instance vSwitch-eVPN-1 extensive | match "domain|extended|forwarder" 
Number of bridge domains: 4
VLAN Domain ID Intfs / up IRB intf Mode MAC sync IM route label
777 1 1 irb.1 Extended Enabled 300384 
778 1 1 Extended Enabled 300384 
779 1 1 Extended Enabled 300384 
Designated forwarder: 62.0.0.2
Backup forwarder: 62.0.0.1
Last designated forwarder update: May 24 08:14:52
```

  

> Примечание: в выводах выше, да и в литературе встречается понятие Backup forwarder или Backup Designated forwarder (BDF). BDF это просто еще одно название non-DF маршрутизатора. В EVPN нет бекапного форвардера (как например в OSPF DR и BDR) — DF только один, все остальные non-DF или BDF. В случае появления в сегменте еще одного маршрутизатора или при падении одного из маршрутизаторов сегмента происходят перевыборы DF.

Теперь мы выяснили зачем нужен маршрут типа 4 и как он выглядит.  
  
Но выбрав DF мы победили только один тип петель. Но петля может все равно возникнуть если CE маршрутизатор начнет отправлять трафик сторону non-DF маршрутизатора. Для примера, если RZN-PE-1, является non-DF получит BUM трафик от RZN-SW-1 то мы получим петлю, так как: RZN-PE-1, получив BUM трафик от CE, отправит этот трафик в сторону других PE-шек, включая RZN-PE-2. RZN-PE-2, являясь DF для данного сегмента, без зазрения совести отправляет трафик обратно в сторону RZN-SW-1, откуда он и пришел. В итоге получилась петля:  
  
![](https://habrastorage.org/web/597/734/252/5977342527b54fcd92d0692f24290189.gif)  
  
И пока петлю не разорвать трафик так и будет летать туда-сюда.  
  
Чтобы этого избежать нам понадобится маршрут типа 1, так же сгенерированный per-ESI.  
  
Но в отличии от маршрутов типа 4, в маршрутах типа 1, сгенерированных хоть per-ESI, хоть per-EVI указывается нативное community инстанса или нескольких инстансов, которым данный маршрут интересен (а почему, мы узнаем чуть позже):  
  

```
bormoglotx@RZN-PE-1> show route table vSwitch-eVPN-1.evpn.0 match-prefix *1:6* 

vSwitch-eVPN-1.evpn.0: 9 destinations, 9 routes (9 active, 0 holddown, 0 hidden)
+ = Active Route, - = Last Active, * = Both

1:62.0.0.1:1::01::0/304 AD/EVI 
*[EVPN/170] 1d 00:09:01
Indirect
1:62.0.0.2:0::01::FFFF:FFFF/304 AD/ESI 
*[BGP/170] 03:20:10, localpref 100, from 62.0.0.100
AS path: I, validation-state: unverified
> to 10.0.0.1 via ae0.1
1:62.0.0.2:1::01::0/304 AD/EVI 
*[BGP/170] 1d 00:09:01, localpref 100, from 62.0.0.100
AS path: I, validation-state: unverified
> to 10.0.0.1 via ae0.1
```

  

### Зачем нужен маршрут типа 1 per-ESI?

  
Маршрут типа 1 имеет несколько функций.  
  
Сгенерированный per-ESI маршрут типа 1 несет в себе расширенное community в котором указана mpls метка, называемая split horizon label:  
  

```
bormoglotx@RZN-PE-1> show route table vSwitch-eVPN-1.evpn.0 match-prefix *FFFF* detail 

vSwitch-eVPN-1.evpn.0: 9 destinations, 9 routes (9 active, 0 holddown, 0 hidden)
1:62.0.0.2:0::01::FFFF:FFFF/304 AD/ESI (1 entry, 1 announced)
*BGP Preference: 170/-101
Route Distinguisher: 62.0.0.2:0
Next hop type: Indirect, Next hop index: 0
Address: 0xb1e55f0
Next-hop reference count: 20
Source: 62.0.0.100
Protocol next hop: 62.0.0.2
Indirect next hop: 0x2 no-forward INH Session ID: 0x0
State: Secondary Active Int Ext
Local AS: 42000.62 Peer AS: 42000.62
Age: 3:20:48 Metric2: 1 
Validation State: unverified 
Task: BGP_42000.62.62.0.0.100
Announcement bits (1): 0-vSwitch-eVPN-1-evpn 
AS path: I (Originator)
Cluster list: 62.0.0.100
Originator ID: 62.0.0.2
Communities: target:42000:1 target:42000:2 target:42000:3 esi-label:all-active (label 302656)
Import Accepted
Localpref: 100
Router ID: 62.0.0.100
Primary Routing Table bgp.evpn.0
```

  
Метка указана в строке:  
  

```
Communities: target:42000:1 target:42000:2 target:42000:3 esi-label:all-active (label 302656)
```

  
Как это нам поможет победить описанную выше петлю? Теперь, non-DF маршрутизатор, отправляя BUM трафик в сторону DF-маршрутизатора, будет добавлять в стек меток дополнительную метку, указанную в данном community. То есть получается такая картина: PE маршрутизатор получил BUM трафик из сегмента с ESI X, для которого он является non-DF маршрутизатором. Теперь он должен переслать этот трафик все остальным PE-кам в EVPN домене, включая и другие PE-маршрутизаторы, имеющие линк в ESI X. Всем PE-маршрутизаторам трафик отправляется как обычно — с использованием IM метки, а вот маршрутизатору, который является DF-ом для сегмента ESI X, маршрутизатор сначала навешивает Split horizon метку и только потом IM метку. Это будет указывать DF маршрутизатору на то, что данный пакет пришел из ESI X и обратно в этот сегмент его отправлять не надо. Логично, что эту метку надо добавлять только в том случае, если пакет отправляется в сторону DF маршрутизатора, так как non-DF маршрутизаторы и так этот трафик не отправят в сегмент ESI X.  
  
![](https://habrastorage.org/web/527/daf/e53/527dafe534d9444783636a93ae111390.gif)  
  
Со стороны DF маршрутизатора это выглядит так:  
  
Если маршрутизатор получил пакет с IM меткой и S=1 (то есть дно меток а занчит данная метка — последняя в стеке), то маршрутизатор рассылает пакет всем подключенным к нему CE-коммутаторам/маршрутизаторам в данном EVPN инстансе.  
  
Если же маршрутизатор получил пакет с IM меткой и S=0 (то есть данная метка — не последняя в стеке), то верхняя метка снимается и делается второй mpls lookup. Делая второй lookup маршрутизатор видит Split Horizon метку с S=1. Исходя из этого маршрутизатор флудит пакет в сторону всех CE маршрутизаторов/коммутаторов, за исключением того, который находится в том же сегменте, из которого трафик и получен.  
  
Возникает вопрос, почему данный маршрут генерируется per-ESI, но в отличии от маршрута типа 4 имеет нативное community инстанса (или как в нашем случае нескольких инстансов)? Дело в том, что данный маршрут несет в себе не только split horizon label. Если вы обратите внимание на community esi-label:**all-active** (label 302656), то увидите, что указан тип сегмента all-active или single-active. Эта информация необходима другим PE-кам, чтобы понимать — а можно ли балансировать трафик по PE-кам или нет (но об этом чуть позже) и как использовать Aliasing label.  
  
Еще одна важная функция данного маршрута — обеспечение быстрой сходимости. К примеру у нас отвалился линк в сторону CE устройства, логично что все этот линк отвалился для всех инстансов, в которые он был добавлен. А значит надо отменять все маршруты, которые которые анонсированы PE-кой для данного сегмента, то есть маршрутизатор должен начать отправлять withdraw сообщения, отменяя анонсированные MAC/IP маршруты из всех инстансов, которые имели имели линк в сторону данного ESI, так как теперь эти маршруты не действительны. А если таких маршрутов несколько тысяч? Поэтому вместо отправки кучи withdraw сообщений маршрутизатор отменяется маршрут типа 1, что заставляет все остальные PE маршрутизаторы понять, что через данный PE маршрутизатор больше этот сегмент не доступен. Это называется MAC Mass Withdraw. Маршутизатору проще быстро обработать одно сообщение вместо тысячи, что ествественно сокращает время сходимости, особенно если MAC-адресов за отвалившимся интерфейсом несколько тысяц.  
  
![](https://habrastorage.org/web/f9d/632/24d/f9d63224d1a54ef0b55abac32a1f83a5.gif)  
  
Теперь думаю понятно, почему у данного маршрута именно нативное(-ые) community — в нашем сценарии PE3 не имеет ESI 00:00:00:00:00:00:00:00:00:01 и если community генерировать, как для маршрута типа 4, то PE-3 этот маршрут просто отбросит, проверив его community.  
  
Примечание: если вы заметили в маршруте типа 1, сгенерированного per-ESI, указываются вместо тега все единицы: 1:62.0.0.2:0::01::**FFFF:FFFF**/304 AD/ESI. Это не прихоть Juniper, тут все согласно RFC — в маршруте типа 1, если он сгенерирован per-ESI в поле tag-id должно быть указано максимально возможное значение (под это поле выделено 32-бита), а mpls метка выставляется в 0.  
  
Таким образом EVPN позволяет избежать петель и обеспечили возможность быстрой сходимости. Но если вы вспомните в начале в выводе мы видели, что соседний маршрутизатор анонсировал нам 2 маршрути типа 1. Что за второй маршрут? Так получилось, что маршрут типа 1 может генерироваться еще и per-EVI.  
  

### Зачем нам маршрут типа 1, сгенерированный per-EVI?

  

```
bormoglotx@RZN-PE-1> show route table vSwitch-eVPN-1.evpn.0 match-prefix *01::0* 

vSwitch-eVPN-1.evpn.0: 8 destinations, 8 routes (8 active, 0 holddown, 0 hidden)
+ = Active Route, - = Last Active, * = Both

1:62.0.0.1:1::01::0/304 AD/EVI 
*[EVPN/170] 1d 00:20:59
Indirect
1:62.0.0.2:1::01::0/304 AD/EVI 
*[BGP/170] 1d 00:20:59, localpref 100, from 62.0.0.100
AS path: I, validation-state: unverified
> to 10.0.0.1 via ae0.1
```

  
Данный маршрут используется для анонсирования aliasing label:  
  

```
bormoglotx@RZN-PE-1> show route table vSwitch-eVPN-1.evpn.0 match-prefix *01::0* detail next-hop 62.0.0.2 

vSwitch-eVPN-1.evpn.0: 8 destinations, 8 routes (8 active, 0 holddown, 0 hidden)
1:62.0.0.2:1::01::0/304 AD/EVI (1 entry, 1 announced)
*BGP Preference: 170/-101
Route Distinguisher: 62.0.0.2:1
Next hop type: Indirect, Next hop index: 0
Address: 0xb1e55f0
Next-hop reference count: 20
Source: 62.0.0.100
Protocol next hop: 62.0.0.2
Indirect next hop: 0x2 no-forward INH Session ID: 0x0
State: Secondary Active Int Ext
Local AS: 42000.62 Peer AS: 42000.62
Age: 1d 0:20:26 Metric2: 1 
Validation State: unverified 
Task: BGP_42000.62.62.0.0.100
Announcement bits (1): 0-vSwitch-eVPN-1-evpn 
AS path: I (Originator)
Cluster list: 62.0.0.100
Originator ID: 62.0.0.2
Communities: target:42000:1
Import Accepted
Route Label: 300208
Localpref: 100
Router ID: 62.0.0.100
Primary Routing Table bgp.evpn.0
```

  
Route Label: 300208 — это aliasing метка, которая наравне с сервичной меткой, указанной в маршруте типа 2 может использоваться для форвардинга трафика. Зачем же эта метка нам нужна, если у нас и так есть сервисная метка из маршрута типа 2? Дело в том, что это все таки EVPN предоставляет сервис L2VPN — то есть подключается к нам клиент к провадеркому оборудованию не как к маршрутизатору, а как к свичу. И если вы вспомните, что PE-маршрутизатор от клиента изучает MAC-адреса через data plane. То есть теоретически возможна ситуация, когда multihomed CE будет отправлять пакеты только в сторону одного из PE-маршрутизаторов (причины могут быть разные — начиная от багов самого оборудования и заканчивая алгоритмом балансировки). А значит только один маршрутизатор изучит MAC адрес от CE маршрутизатора/коммутатора и отправит анонс MAC/IP:  
  
Если посмотреть таблицы форвардинга, то видно, что часть MAC-ов на RZN-PE-2 (он является DF в данный момент для 777 влана), изучены через data plane (обратите внимание на указанные стрелками адреса):  
  

```
bormoglotx@RZN-PE-2> show bridge mac-table 

MAC flags (S -static MAC, D -dynamic MAC, L -locally learned, C -Control MAC
O -OVSDB MAC, SE -Statistics enabled, NM -Non configured MAC, R -Remote PE MAC)

Routing instance : vSwitch-eVPN-1
Bridging domain : BRIDGE-777, VLAN : 777
MAC MAC Logical NH RTR
addresssss flags interface Index ID
00:05:86:71:87:c0 DC 1048585 1048585 
00:05:86:71:87:f0 D ae3.777 
00:50:79:66:68:0c D ae3.777 <<<<<<<<<<<<<< 
00:50:79:66:68:0d D ae3.777 <<<<<<<<<<<<<< 
00:50:79:66:68:0e D ae3.777
```

  
В то время указанные выше MAC-и на RZN-PE-1 изучены не через data plane:  
  

```
bormoglotx@RZN-PE-1> show bridge mac-table 

MAC flags (S -static MAC, D -dynamic MAC, L -locally learned, C -Control MAC
O -OVSDB MAC, SE -Statistics enabled, NM -Non configured MAC, R -Remote PE MAC)

Routing instance : vSwitch-eVPN-1
Bridging domain : BRIDGE-777, VLAN : 777
MAC MAC Logical NH RTR
addresssss flags interface Index ID
00:05:86:71:87:c0 DC 1048586 1048586 
00:05:86:71:87:f0 D ae3.777 
00:50:79:66:68:0c DRC ae3.777 <<<<<<<<<<<<<<
00:50:79:66:68:0d DRC ae3.777 <<<<<<<<<<<<<< 
00:50:79:66:68:0e D ae3.777 
```

  
Что у нас получается? Получилась ситуация, когда только RZN-PE-2 изучил MAC адрес какого то хоста за RZN-SW-1 и отправил MAC/IP маршрут, содержащий данный мак ( в нашем случае даже два таких маршрута). Если мы посмотрим таблицу форвардинга на RZN-PE-3, то увидим в ней все эти маки, изученные через control plane:  
  

```
bormoglotx@RZN-PE-3> show bridge mac-table 

MAC flags (S -static MAC, D -dynamic MAC, L -locally learned, C -Control MAC
O -OVSDB MAC, SE -Statistics enabled, NM -Non configured MAC, R -Remote PE MAC)

Routing instance : vSwitch-eVPN-1
Bridging domain : BRIDGE-777, VLAN : 777
MAC MAC Logical NH RTR
addresssss flags interface Index ID
00:05:86:71:87:c0 D ae0.777 
00:05:86:71:87:f0 DC 1048580 1048580 
00:50:79:66:68:0c DC 1048580 1048580 <<<<<<<<<<<<<<
00:50:79:66:68:0d DC 1048580 1048580 <<<<<<<<<<<<<<
00:50:79:66:68:0e DC 1048580 1048580 
```

  
Но вот если посмотреть что мы получаем на RZN-PE-3, то будет ясно, что маршруты с RZN-PE-1 и RZN-PE-2 приходят ассиметрично. Вот маршруты, анонсированные с RZN-PE-1:  
  

```
bormoglotx@RZN-PE-3> show route table vSwitch-eVPN-1.evpn.0 match-prefix *2:6* next-hop 62.0.0.1 

vSwitch-eVPN-1.evpn.0: 14 destinations, 14 routes (14 active, 0 holddown, 0 hidden)
+ = Active Route, - = Last Active, * = Both

2:62.0.0.1:1::777::00:05:86:71:87:f0/304 MAC/IP 
*[BGP/170] 00:07:34, localpref 100, from 62.0.0.100
AS path: I, validation-state: unverified
> to 10.0.3.0 via ae3.0, Push 299824
2:62.0.0.1:1::777::00:50:79:66:68:0e/304 MAC/IP 
*[BGP/170] 00:01:25, localpref 100, from 62.0.0.100
AS path: I, validation-state: unverified
> to 10.0.3.0 via ae3.0, Push 299824
```

  
А вот маршруты, анонсированные RZN-PE-2:  
  

```
bormoglotx@RZN-PE-3> show route table vSwitch-eVPN-1.evpn.0 match-prefix *2:6* next-hop 62.0.0.2 

vSwitch-eVPN-1.evpn.0: 14 destinations, 14 routes (14 active, 0 holddown, 0 hidden)
+ = Active Route, - = Last Active, * = Both

2:62.0.0.2:1::777::00:05:86:71:87:f0/304 MAC/IP 
*[BGP/170] 00:07:36, localpref 100, from 62.0.0.100
AS path: I, validation-state: unverified
> to 10.0.3.0 via ae3.0, Push 299840 
2:62.0.0.2:1::777::00:50:79:66:68:0c/304 MAC/IP <<<<<<<<<<<<<<
*[BGP/170] 00:01:32, localpref 100, from 62.0.0.100
AS path: I, validation-state: unverified
> to 10.0.3.0 via ae3.0, Push 299840
2:62.0.0.2:1::777::00:50:79:66:68:0d/304 MAC/IP <<<<<<<<<<<<<<
*[BGP/170] 00:01:36, localpref 100, from 62.0.0.100
AS path: I, validation-state: unverified
> to 10.0.3.0 via ae3.0, Push 299840
2:62.0.0.2:1::777::00:50:79:66:68:0e/304 MAC/IP 
*[BGP/170] 00:01:27, localpref 100, from 62.0.0.100
AS path: I, validation-state: unverified
> to 10.0.3.0 via ae3.0, Push 299840
```

  
Как видите, два мака видны только через RZN-PE-2. Если для RZN-PE-3 тут нет ничего криминального, то вот RZN-PE-1 тоже получает маршрут от RZN-PE-2 с этим MAC. Получается, что RZN-PE-1 должен отправлять трафик в сторону этих хостов через RZN-PE-2. Но было бы глупо думать, что разработчики EVPN опустили бы такую простую и банальную ошибку. В маршруте типа 2 (MAC/IP) содержится идентификатор ESI, к которому относится данный MAC-адрес. RZN-PE-1, получает маршрут типа 2, видит, что MAC виден через сегмент, к которому он непосредственно подключен. Поэтому RZN-PE-1 ставит next-hop-ом тоннель в сторону RZN-PE-2, а физический линк в сторону ESI:  
  

```
bormoglotx@RZN-PE-1> show bridge mac-table 

MAC flags (S -static MAC, D -dynamic MAC, L -locally learned, C -Control MAC
O -OVSDB MAC, SE -Statistics enabled, NM -Non configured MAC, R -Remote PE MAC)

Routing instance : vSwitch-eVPN-1
Bridging domain : BRIDGE-777, VLAN : 777
MAC MAC Logical NH RTR
addresssss flags interface Index ID
00:05:86:71:87:c0 DC 1048586 1048586 
00:05:86:71:87:f0 D ae3.777 
00:50:79:66:68:0c DRC ae3.777 <<<<<<<<<<<<<<
00:50:79:66:68:0d DRC ae3.777 <<<<<<<<<<<<<< 
00:50:79:66:68:0e D ae3.777 
```

  
В таблице форвардинга видно, что MAC адрес виден через логический интерфейс ae3.777, а флаг говорит, о том, что мак изучен динамически через control plane от удаленной PE-ки. В итоге, хоть RZN-PE-1 и не изучил данный MAC адрес через data plane, но отправлять трафик в сторону RZN-SW-1 он будет по прямому линку.  
  
Но появляется другой вопрос — если на RZN-PE-3 данный MAC виден только через RZN-PE-2, так как RZN-PE-1 не анонсировал маршрути MAC/IP с заданным MAC адресом, то почему вдруг RZN-PE-3 станет отправлять пакеты на данный мак адрес через RZN-PE-1? Вот тут сцену выходит aliasing label.  
  
RZN-PE-3 знает (из маршрута типа 1, сгенерированного per-ESI), что RZN-PE-1 и RZN-PE-2 подключены к одному и тому же сегменту и работают в режиме Active-Active. В таком случае в целях балансировки, RZN-PE-3 может использовать aliasing label, которая будет выполнять роль сервисной метки. В итоге RZN-PE-3 может отправлять трафик, предназначенный для хоста за RZN- SW-1 через RZN-PE-2, используя метку, указанную в маршруте типа 2, а также через RZN-PE-1, используя aliasing label вместо сервисной метки, которая указана в маршруте типа 1.  
  
![](https://habrastorage.org/web/0b7/5c6/5f0/0b75c65f01d94855864dc24fc0fc736d.gif)  
  
Aliacing label указывается для каждого multihomed соседа в каждом инстансе, что видно на RZN-PE-3:  
  

```
bormoglotx@RZN-PE-3> show evpn instance vSwitch-eVPN-1 extensive | find "ESI: " 
ESI: 00:00:00:00:00:00:00:00:00:01
Status: Resolved by NH 1048580
Number of remote PEs connected: 2
Remote PE MAC label Aliasing label Mode
62.0.0.1 300112 300112 all-active 
62.0.0.2 300208 300208 all-active
```

  

```
bormoglotx@RZN-PE-3> show evpn instance vSwitch-eVPN-2 extensive | find "ESI: " 
ESI: 00:00:00:00:00:00:00:00:00:01
Status: Resolved by NH 1048583
Number of remote PEs connected: 2
Remote PE MAC label Aliasing label Mode
62.0.0.1 0 302240 all-active 
62.0.0.2 0 302272 all-active 
```

  

```
bormoglotx@RZN-PE-3> show evpn instance vSwitch-eVPN-3 extensive | find "ESI: " 
ESI: 00:00:00:00:00:00:00:00:00:01
Status: Resolved by NH 1048588
Number of remote PEs connected: 2
Remote PE MAC label Aliasing label Mode
62.0.0.2 0 302624 all-active 
62.0.0.1 0 302560 all-active 
```

  
В таблице mpls.0 данная метка так и помечается Ingress-Aliasing:  
  

```
bormoglotx@RZN-PE-1> show route table mpls.0 label 302560 

mpls.0: 32 destinations, 33 routes (32 active, 0 holddown, 0 hidden)
+ = Active Route, - = Last Active, * = Both

302560 *[EVPN/7] 03:49:28, routing-instance vSwitch-eVPN-3, route-type Ingress-Aliasing
to table vSwitch-eVPN-3.evpn-mac.0
```

  
Хочу заметить, что оборудование Juniper генерирует метку для мак адреса в MAC/IP маршруте per-EVI (то есть одна на весь инстанс). И самое интересное то, что aliasing label будет точно такой же как и mac-label. Это видно из представленного ниже вывода:  
  

```
bormoglotx@RZN-PE-3> show evpn instance vSwitch-eVPN-1 extensive | find "ESI: " 
ESI: 00:00:00:00:00:00:00:00:00:01
Status: Resolved by NH 1048580
Number of remote PEs connected: 2
Remote PE MAC label Aliasing label Mode
62.0.0.1 300112 300112 all-active 
62.0.0.2 300208 300208 all-active 

```

  
Как видите, MAC label = Aliasing label. То, что JunOS генерирует метку для MAC адресов per-EVI доказывает следующий вывод:  
  

```
bormoglotx@RZN-PE-3> show route table vSwitch-eVPN-1.evpn.0 next-hop 62.0.0.1 match-prefix *2:6* detail | match label 
Route Label: 300112
Route Label: 300112
Route Label: 300112
Route Label: 300112
```

  
С RZN-PE-1 анонсируется четыре маршрута типа 2, и у всех одна и та же метка. Но тогда возникает вопрос, а зачем нам вообще анонсировать aliasing label, если она равна mac label? Дело в том, что это свойственно оборудованию Juniper, другие вендоры — Cisco, Brocade, Huawei или ALu — могут иметь другое видение на данный вопрос и генерировать метки по другому.  
  
Давайте прикинем, возможны ли какие нибудь проблемы при использовании aliasing метки? Рассмотрим такую ситуацию. Маршрутизатор RZN-PE-3 получил маршруты типа 1 per-EVI от RZN-PE-1 и RZN-PE-2, и теперь знает aliasing метку до обоих маршрутизаторов. А вот маршрутов типа 1 per-ESI на RZN-PE-3 еще нет. Получается, что если RZN-PE-3 начнет балансировать трафик с использованием aliasing метки, то может получится ситуация, когда например multihomed маршрутизаторы будут работать в режиме Single-Active и часть трафика, отправленная на пассивный узел, будет просто дропаться. То есть теоретически RZN-PE-3 может начать балансировать трафик, а фактически не знает можно ли это делать или нет. Как быть? Поведение маршрутизатора в такой ситуации четко регламентировано RFC — пока маршрутизатор не получит маршрут типа 1, сгенерированный per-ESI с указанием режима работы multihoming-а, он не должен отправлять трафик в данный сегмент с использованием aliasing метки, полученной в маршруте типа 1 per-EVI.  
  
Данная метка может анонсироваться и в Single-Active сценарии. В этом случае она используется не для балансировки трафика по multihomed PE-кам, а для установки в таблицу форвардинга бекапного пути, который автоматически станет активен при падении основного плеча.  
  

### А нужен ли нам MC-LAG в EVPN?

  
Мы рассматривали схему с подключением multihomed CE к PE-кам с использованием LAG. Причем для PE-маршрутизаторов это просто один физический интерфейс, добавленный в бадл, а вот со стороны CE- один LAG, в который добавлены интерфейсы в сторону обоих PE-шек, то есть получается некая эмуляция MC-LAG, во всяком случае CE маршрутизатор/коммутатор будет думать, что подключен к одному и тому же узлу провайдера и балансирует трафик по обоим членам бандла. С точки зрения конфигурации это выглядит так:  
  
Со стороны RZN-SW-1 настраиваем один LAG интерфейс:  
  

```
bormoglotx@RZN-SW-1> show configuration interfaces ae0 
description "LAG to RZN-PE-1/2 | ae0<<>>ae3";
flexible-vlan-tagging;
mtu 1600;
encapsulation flexible-ethernet-services;
aggregated-ether-options {
lacp {
active;
periodic fast;
```

  
В него добавляются линки в сторону обоих PE-маршрутизаторов:  
  

```
bormoglotx@RZN-SW-1> show configuration interfaces ge-0/0/0 
description "RZN-PE-1 | ae1<<>>ae3";
gigether-options {
802.3ad ae0;
}

bormoglotx@RZN-SW-1> show configuration interfaces ge-0/0/1 
description "RZN-PE-2 | ae2<<>>ae3";
gigether-options {
802.3ad ae0;
}
```

  
Со стороны PE-маршрутизаторов в таком сценарии должен по идее настраиваться MC-LAG, но с EVPN/MPLS мы обойдемся без этого. На PE-ках собираем LAG в сторону CE и указываем один и тот же system-id, чтобы MAC адрес PE-шек в сторону CE был одинаковым (иначе CE коммутатор будет детектировать MAC-флаппинг):  
  

```
bormoglotx@RZN-PE-1> show configuration interfaces ae3 
description "RZN-SW-1 | ge-0/0/0 | ae3<<>>ae0 ";
flexible-vlan-tagging;
mtu 1600;
encapsulation flexible-ethernet-services;
esi {
00:00:00:00:00:00:00:00:00:01;
all-active;
}
aggregated-ether-options {
lacp {
active;
periodic fast;
system-id 02:00:00:00:00:01;
```

  

```
bormoglotx@RZN-PE-2> show configuration interfaces ae3 
description "RZN-SW-1 | ae3<<>>ae0 | MC-LAG with RZN-PE-2";
flexible-vlan-tagging;
mtu 1600;
encapsulation flexible-ethernet-services;
esi {
00:00:00:00:00:00:00:00:00:01;
all-active;
}
aggregated-ether-options {
lacp {
active;
periodic fast;
system-id 02:00:00:00:00:01;
```

  
Теперь, можно проверить состояние бандла.  
  
Со стороны RZN-SW-1:  
  

```
bormoglotx@RZN-SW-1> show lacp interfaces ae0 
Aggregated interface: ae0
LACP state: Role Exp Def Dist Col Syn Aggr Timeout Activity
ge-0/0/0 Actor No No Yes Yes Yes Yes Fast Active
ge-0/0/0 Partner No No Yes Yes Yes Yes Fast Active
ge-0/0/1 Actor No No Yes Yes Yes Yes Fast Active
ge-0/0/1 Partner No No Yes Yes Yes Yes Fast Active
LACP protocol: Receive State Transmit State Mux State 
ge-0/0/0 Current Fast periodic Collecting distributing
ge-0/0/1 Current Fast periodic Collecting distributing
```

  
Со стороны PE маршрутизаторов:  
  

```
bormoglotx@RZN-PE-1> show lacp interfaces ae3 
Aggregated interface: ae3
LACP state: Role Exp Def Dist Col Syn Aggr Timeout Activity
ge-0/0/4 Actor No No Yes Yes Yes Yes Fast Active
ge-0/0/4 Partner No No Yes Yes Yes Yes Fast Active
LACP protocol: Receive State Transmit State Mux State 
ge-0/0/4 Current Fast periodic Collecting distributing
```

  

```
bormoglotx@RZN-PE-2> show lacp interfaces ae3 
Aggregated interface: ae3
LACP state: Role Exp Def Dist Col Syn Aggr Timeout Activity
ge-0/0/4 Actor No No Yes Yes Yes Yes Fast Active
ge-0/0/4 Partner No No Yes Yes Yes Yes Fast Active
LACP protocol: Receive State Transmit State Mux State 
ge-0/0/4 Current Fast periodic Collecting distributing
```

  
Возможен вариант, когда со стороны PE-маршрутизаторов будут просто физические интерфейсы, а вот со стороны CE — простой статический LAG (без LACP).  
  
Ну и второй вариант подключения — через стандартный MC-LAG со всем вытекающими (ICCP, ICL). Сложно не согласиться, что первый вариан на много проще второго. И применять EVPN/MPLS и MC-LAG лично я смысла не вижу, особенно при условии, что MC-LAG в All-Active режиме еще и требует ICL, кроме случаев, когда MC-LAG жизненно необходим или уже сконфигурен для других сервисов (не ломать же его теперь).  
  
К плюсам EVPN с MC-LAG можно отнести то, что помимо EVPN на данном стыке можно реализовать и другие сервисы с резервированием (ну к примеру VPLS с бекап сайтом или L2CKT с бекапным нейбором — ведь не все железо поддерживает EVPN). А вот из минусов можно выделить то, что обычно MC-LAG ограничен 2-мя нейборами (EVPN multihoming поддерживает больше 2-х PE-шек в режиме Active-Active); необходимость в линке между PE-ками, проприетарность самой технологии (имеется в виду MC-LAG) ну и наверно можно добавить как минус увеличение конфигурации.  
  
В итоге получается, что в EVPN заложен полный функционал multihoming, который позволяет обойти ограничения VPLS. Единственной проблемой все же в EVPN Active-Active multihoming будет проблема с шейпингом трафика от клиента. Если клиент купил полосу в 100Mbps и вы выставите на интерфейсах по 50Mbos, то при нормальной работе вы получите суммарно нужную полосу, а вот как только одно из плеч отвалится, клиент уже будет в праве на вас жаловаться, так как вы ему зарезали скорость в два раза. Но хотя часто ли клиенты просят L2VPN multihoming с Active-Active?  
Наверно это все, что я хотел рассказать в данной статье, не раздув ее до гигантских размеров.  
  
Спасибо за внимание.

[1]: https://habrahabr.ru/users/Bormoglotx/
[2]: https://tools.ietf.org/html/rfc7153
[3]: https://tools.ietf.org/html/draft-ietf-bess-evpn-df-election-02#section-3