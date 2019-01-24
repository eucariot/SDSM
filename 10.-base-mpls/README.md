# 10. Базовый MPLS

## Сети для самых маленьких. Часть десятая. Базовый MPLS

Сеть нашей воображаемой компании linkmeup растёт. У неё есть уже магистральные линии в различных городах, клиентская база и отличный штат инженеров, выросших на цикле СДСМ.  
Но всё им мало. Услуги ШПД — это хорошо и нужно, но есть ещё огромный потенциальный рынок корпоративных клиентов, которым нужен VPN.  
Думали ребята над этим, ломали голову и пришли к выводу, что никак тут не обойтись без MPLS.

Если мультикаст был первой темой, которая требовала некоторого перестроения понимания IP-сетей, то, изучая MPLS, вам точно придётся забыть почти всё, что вы знали раньше — это особенный мир со своими правилами.

![](../.gitbook/assets/10.-base-mpls/10_img_1.jpg)

Сегодня в выпуске:

* [Что такое MPLS](00.-about_mpls.md)
* [Передача трафика в сети MPLS](01.-forwarding.md)
* [Терминология](02.-glossary.md)
* [Распространение меток](03.-label_distribution/README.md)
  * [Методы распространение меток](03.-label_distribution/00.-modes/README.md)
    * [DU против DoD](03.-label_distribution/00.-modes/00.-du_dod.md)
    * [Ordered Control против Independent Control](03.-label_distribution/00.-modes/01.-label_control.md)
    * [Liberal Label Retention Mode против Conservative Label Retention Mode](03.-label_distribution/00.-modes/02.-retention_mode.md)
    * [PHP](03.-label_distribution/00.-modes/03.-php.md)
  * [Протоколы распространения меток](03.-label_distribution/01.-protocols/README.md)
    * [LDP](03.-label_distribution/01.-protocols/00.-ldp/README.md)
      * [Практика](03.-label_distribution/01.-protocols/00.-ldp/00.-ldp_practice.md)
    * [Применение чистого MPLS в связке с BGP](03.-label_distribution/01.-protocols/01.-mpls_bgp.md)
    * [RSVP-TE](03.-label_distribution/01.-protocols/02.-rsvp-te/README.md)
      * [Практика](03.-label_distribution/01.-protocols/02.-rsvp-te/00.-rsvp_practice.md)
* [ВиО](04.-faq.md)
* [Полезные ссылки](05.-useful.md)

А начнём мы с вопроса: «Что не так с IP?»

[_Традиционное видео_](https://youtu.be/hZyfM4UZDac)
