# 10. Базовый MPLS

## Сети для самых маленьких. Часть десятая. Базовый MPLS

Сеть нашей воображаемой компании linkmeup растёт. У неё есть уже магистральные линии в различных городах, клиентская база и отличный штат инженеров, выросших на цикле СДСМ.  
Но всё им мало. Услуги ШПД — это хорошо и нужно, но есть ещё огромный потенциальный рынок корпоративных клиентов, которым нужен VPN.  
Думали ребята над этим, ломали голову и пришли к выводу, что никак тут не обойтись без MPLS.

Если мультикаст был первой темой, которая требовала некоторого перестроения понимания IP-сетей, то, изучая MPLS, вам точно придётся забыть почти всё, что вы знали раньше — это особенный мир со своими правилами.

![](../.gitbook/assets/10.-base-mpls/10_img_1.jpg)


Сегодня в выпуске:

* [Что такое MPLS](10.-base-mpls.md#ABOUT_MPLS)
* [Передача трафика в сети MPLS](10.-base-mpls.md#FORWARDING)
* [Терминология](10.-base-mpls.md#GLOSSARY)
* [Распространение меток](10.-base-mpls.md#LABEL_DISTRIBUTION)
  * [Методы распространение меток](10.-base-mpls.md#MODES)
    * [DU против DoD](10.-base-mpls.md#DU_DOD)
    * [Ordered Control против Independent Control](10.-base-mpls.md#LABEL_CONTROL)
    * [Liberal Label Retention Mode против Conservative Label Retention Mode](10.-base-mpls.md#RETENTION_MODE)
    * [PHP](10.-base-mpls.md#PHP)
  * [Протоколы распространения меток](10.-base-mpls.md#PROTOCOLS)
    * [LDP](10.-base-mpls.md#LDP)
      * [Практика](10.-base-mpls.md#LDP_PRACTICE)
    * [Применение чистого MPLS в связке с BGP](10.-base-mpls.md#MPLS-BGP)
    * [RSVP-TE](10.-base-mpls.md#RSVP-TE)
      * [Практика](10.-base-mpls.md#RSVP_PRACTICE)
* [ВиО](10.-base-mpls.md#FAQ)
* [Полезные ссылки](10.-base-mpls.md#USEFUL)

А начнём мы с вопроса: «Что не так с IP?»

[_Традиционное видео_](https://www.youtube.com/embed/hZyfM4UZDac)
