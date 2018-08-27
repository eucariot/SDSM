# Полезные ссылки

* Лучшая книга по теории и философии QoS: [QOS-Enabled Networks: Tools and Foundations](https://www.amazon.com/QOS-Enabled-Networks-Foundations-Communications-Distributed/dp/1119109108/ref=sr_1_2?s=books&ie=UTF8&qid=1532948422&sr=1-2&keywords=QOS-Enabled+Networks%3A+Tools+and+Foundations). Некоторые отрывки из неё можно почитать [тут](http://what-when-how.com/category/qos-enabled-networks/), однако я бы рекомендовал читать её от и до, не размениваясь.
* На удивление обстоятельная и хорошо написанная книга про QoS от Huawei: [Special Edition QoS\(v6.0\)](http://support.huawei.com/enterprise/en/doc/EDOC1000079860). Очень плотно разбирается архитектура оборудования и работа PHB на разных платах.
* Очень подробное сравнение sr-TCM и tr-TCM от Айни: [Understanding Single-Rate and Dual-Rate Traffic Policing](http://blog.ine.com/2011/05/22/understanding-single-rate-and-dual-rate-traffic-policing/).
* Про VOQ: [What is VOQ and why you should care?](https://forums.juniper.net/t5/forums/recentpostspage/post-type/message/category-id/Blogs/user-id/101479)
* Про QoS в MPLS: [MPLS and Quality of Service](https://www.networkworld.com/article/2298533/lan-wan/mpls-and-quality-of-service.html?page=2).
* Относительно краткий бриф по QoS на примере Juniper: [Juniper CoS notes](https://www.saidvandeklundert.nl/qos.php).
* Практически весь QoS так или иначе ориентирован на специфику TCP и UDP. Не лишним будет досконально разобраться в них: [The TCP/IP Guide](http://www.tcpipguide.com/free/index.htm)
* Ну а для тех, кто не чувствует в себе силы одолеть весь этот труд, Лохматый Мамонт для вас написал отдельную заметку: [В поисках утерянного гигабита или немного про окна в TCP](http://linkmeup.ru/blog/300.html).
* На этой странице сложно, но подробно описано как работают механизмы группы FQ: [Queuing and Scheduling](https://intronetworks.cs.luc.edu/current/html/queuing.html). А если подняться на уровень выше, то откроется масштабный открытый документ, называющийся [An Introduction to Computer Networks](https://intronetworks.cs.luc.edu/current/html/index.html), вгоняющий краску, потому что настолько мощный Introdaction, что я там половину не знаю. Даже самому захотелось почитать.
* Про WFQ очень научно, но при должно интеллекте, коим, очевидно, я не обладаю, понятно и в цветах: [Weighted Fair Queueing: a packetized approximation for FFS/GP](http://www.mathcs.emory.edu/~cheung/Courses/558/Syllabus/11-Fairness/WFQ.html).
* Есть ещё механизм LFI, который я затрагивать не стал, потому что сложно и в наших реалиях стогигиабитных интерфейсов не очень актуально, однако ознакомиться может быть интересно: [Link Fragmentation and Interleaving](https://www.ccexpert.us/traffic-shaping-2/link-fragmentation-and-interleaving.html).

Ну и, конечно, набор RFC:

* [tools.ietf.org/html/rfc791](https://tools.ietf.org/html/rfc791) \(_INTERNET PROTOCOL_\)
* [tools.ietf.org/html/rfc1349](https://tools.ietf.org/html/rfc1349) \(_Type of Service in the Internet Protocol Suite_\)
* [tools.ietf.org/html/rfc1633](https://tools.ietf.org/html/rfc1633) \(_Integrated Services in the Internet Architecture: an Overview_\)
* [tools.ietf.org/html/rfc2474](https://tools.ietf.org/html/rfc2474) \(_Definition of the Differentiated Services Field \(DS Field\) in the IPv4 and IPv6 Headers_\)
* [tools.ietf.org/html/rfc2475](https://tools.ietf.org/html/rfc2475) \(_An Architecture for Differentiated Services_\)
* [tools.ietf.org/html/rfc2597](https://tools.ietf.org/html/rfc2597) \(_Assured Forwarding PHB Group_\)
* [tools.ietf.org/html/rfc2697](https://tools.ietf.org/html/rfc2697) \(_A Single Rate Three Color Marker_\)
* [tools.ietf.org/html/rfc2698](https://tools.ietf.org/html/rfc2698) \(_A Two Rate Three Color Marker_\)
* [tools.ietf.org/html/rfc3031](https://tools.ietf.org/html/rfc3031) \(_Multiprotocol Label Switching Architecture_\)
* [tools.ietf.org/html/rfc3168](https://tools.ietf.org/html/rfc3168) \(_The Addition of Explicit Congestion Notification \(ECN\) to IP_\)
* [tools.ietf.org/html/rfc3246](https://tools.ietf.org/html/rfc3246) \(_An Expedited Forwarding PHB \(Per-Hop Behavior\)_\)
* [tools.ietf.org/html/rfc3260](https://tools.ietf.org/html/rfc3260) \(_New Terminology and Clarifications for Diffserv_\)
* [tools.ietf.org/html/rfc3662](https://tools.ietf.org/html/rfc3662) \(_A Lower Effort Per-Domain Behavior \(PDB\) for Differentiated Services_\)
* [tools.ietf.org/html/rfc4594](https://tools.ietf.org/html/rfc4594) \(_Configuration Guidelines for DiffServ Service Classes_\)
* [tools.ietf.org/html/rfc5462](https://tools.ietf.org/html/rfc5462) \(_Multiprotocol Label Switching \(MPLS\) Label Stack Entry: «EXP» Field Renamed to «Traffic Class» Field_\)

