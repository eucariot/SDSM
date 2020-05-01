
<!doctype html>

<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="ru"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="ru"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="ru"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="ru"> <!--<![endif]-->

<head>
    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Buffers / linkmeup</title>

    <meta name="description" content="Эта статья едва ли для широкого круга читателей, но будет небезынтересна тем, кто хотел бы знать, сколько максимум пакет может">
    <meta name="keywords" content="сети для самых маленьких">
    <meta property="og:image" content="/templates/skin/synio/images/logo200.jpg" />

    <link rel='stylesheet' type='text/css' href='https://linkmeup.ru/templates/cache/synio/15c517f533eb1443bb67eed43a3afb87.css' />


    <link href='//fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

    <link href="https://linkmeup.ru/templates/skin/synio/images/favicon.ico?v1" rel="shortcut icon" />
    <link rel="search" type="application/opensearchdescription+xml" href="https://linkmeup.ru/search/opensearch/" title="linkmeup" />

            <link rel="alternate" type="application/rss+xml" href="https://linkmeup.ru/rss/comments/537/" title="Buffers">
    
    
    

    <script type="text/javascript">
        var DIR_WEB_ROOT            = 'https://linkmeup.ru';
        var DIR_STATIC_SKIN         = 'https://linkmeup.ru/templates/skin/synio';
        var DIR_ROOT_ENGINE_LIB     = 'https://linkmeup.ru/engine/lib';
        var LIVESTREET_SECURITY_KEY = 'f817799f01ea5e36885aa32b1b1483e9';
        var SESSION_ID              = '9qbkbjvd208htcdvsgq5slmb07';
        var BLOG_USE_TINYMCE        = '';

        var TINYMCE_LANG = 'en';
                    TINYMCE_LANG = 'ru';
        
        var aRouter = new Array();
                    aRouter['error'] = 'https://linkmeup.ru/error/';
                    aRouter['profile'] = 'https://linkmeup.ru/profile/';
                    aRouter['my'] = 'https://linkmeup.ru/my/';
                    aRouter['blog'] = 'https://linkmeup.ru/blog/';
                    aRouter['personal_blog'] = 'https://linkmeup.ru/personal_blog/';
                    aRouter['index'] = 'https://linkmeup.ru/index/';
                    aRouter['topics'] = 'https://linkmeup.ru/topics/';
                    aRouter['podcasts'] = 'https://linkmeup.ru/podcasts/';
                    aRouter['challenges'] = 'https://linkmeup.ru/challenges/';
                    aRouter['sdsm'] = 'https://linkmeup.ru/sdsm/';
                    aRouter['adsm'] = 'https://linkmeup.ru/adsm/';
                    aRouter['answers'] = 'https://linkmeup.ru/answers/';
                    aRouter['topic'] = 'https://linkmeup.ru/topic/';
                    aRouter['login'] = 'https://linkmeup.ru/login/';
                    aRouter['people'] = 'https://linkmeup.ru/people/';
                    aRouter['settings'] = 'https://linkmeup.ru/settings/';
                    aRouter['tag'] = 'https://linkmeup.ru/tag/';
                    aRouter['talk'] = 'https://linkmeup.ru/talk/';
                    aRouter['comments'] = 'https://linkmeup.ru/comments/';
                    aRouter['rss'] = 'https://linkmeup.ru/rss/';
                    aRouter['link'] = 'https://linkmeup.ru/link/';
                    aRouter['question'] = 'https://linkmeup.ru/question/';
                    aRouter['blogs'] = 'https://linkmeup.ru/blogs/';
                    aRouter['search'] = 'https://linkmeup.ru/search/';
                    aRouter['admin'] = 'https://linkmeup.ru/admin/';
                    aRouter['ajax'] = 'https://linkmeup.ru/ajax/';
                    aRouter['feed'] = 'https://linkmeup.ru/feed/';
                    aRouter['stream'] = 'https://linkmeup.ru/stream/';
                    aRouter['photoset'] = 'https://linkmeup.ru/photoset/';
                    aRouter['subscribe'] = 'https://linkmeup.ru/subscribe/';
                    aRouter['page'] = 'https://linkmeup.ru/page/';
                    aRouter['profiler'] = 'https://linkmeup.ru/profiler/';
                    aRouter['autoopenid_login'] = 'https://linkmeup.ru/autoopenid_login/';
            </script>


    <script type='text/javascript' src='https://linkmeup.ru/templates/cache/synio/44c7030e7109fffd0c2609dcfc20f983.js'></script>
<!--[if lt IE 9]><script type='text/javascript' src='https://linkmeup.ru/engine/lib/external/html5shiv.js'></script><![endif]-->
<script type='text/javascript' src='//yandex.st/share/share.js'></script>



    <script type="text/javascript">
        var tinyMCE = false;
        ls.lang.load({"blog_join":"\u0427\u0438\u0442\u0430\u0442\u044c","blog_leave":"\u041d\u0435 \u0447\u0438\u0442\u0430\u0442\u044c"});
        ls.registry.set('comment_max_tree',5);
        ls.registry.set('block_stream_show_tip',false);
    </script>


            <style>
            #container {
                min-width: 800px;
                max-width: 1600px;
            }
        </style>
    

    

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-33409862-1']);
        _gaq.push(['_trackPageview']);

        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
</head>



    
                




<body class=" ls-user-role-user ls-user-role-admin width-fixed">
    

            <div class="modal modal-write" id="modal_write">
    <header class="modal-header">
        <a href="#" class="close jqmClose"></a>
    </header>
    
    <div class="modal-content"><ul class="write-list"><li class="write-item-type-draft"><a href="https://linkmeup.ru/topic/saved/" class="write-item-image"></a><a href="https://linkmeup.ru/topic/saved/" class="write-item-link">34 черновика</a></li><li class="write-item-type-topic"><a href="https://linkmeup.ru/topic/add" class="write-item-image"></a><a href="https://linkmeup.ru/topic/add" class="write-item-link">Топик</a></li></ul></div>
</div>
    
            <div id="favourite-form-tags" class="modal">
        <header class="modal-header">
            <h3>Добавить свои теги</h3>
            <a href="#" class="close jqmClose"></a>
        </header>
        
        
        <form onsubmit="return ls.favourite.saveTags(this);" class="modal-content">
            <input type="hidden" name="target_type" value="" id="favourite-form-tags-target-type">
            <input type="hidden" name="target_id" value="" id="favourite-form-tags-target-id">

            <p><input type="text" name="tags" value="" id="favourite-form-tags-tags" class="autocomplete-tags-sep input-text input-width-full"></p>
            <button type="submit"  name="" class="button button-primary" />Сохранить</button>
            <button type="submit"  name="" class="button jqmClose" />Отмена</button>
        </form>
    </div>

    

    <div id="container" class="">
        

        ﻿<nav id="nav" style="margin-bottom: 35px;">
    ﻿<ul class="nav nav-menu">
    <li id="httpsSiteVersionLink">
        <a href="https://linkmeup.ru">https://-версия</a>
    </li>
    <script language="javascript">
        if ( location.protocol == "https:" ){
        jQuery("#httpsSiteVersionLink").hide();
        }
    </script>
    <li >
        <a href="/">Всё</a>
    </li>

    <li >
        <a href="/sdsm/">СДСМ</a>
    </li>

    <li >
        <a href="/adsm/">АДСМ</a>
    </li>

    <li >
        <a href="/podcasts/">Подкасты</a>
    </li>
    <li >
        <a href="/page/about/">Эбаут</a>
    </li>
    <li>
        <a href="/page/donate/"><!-- <img src="/templates/skin/synio/images/yandexmoney.png"></img>&nbsp; -->Поддержать проект</a>
    </li>
</ul>


    <div class="search-header">
            <div class="dropdown-user" id="dropdown-user">
            <a href="#" id="dropdown-user-trigger" class="username link-dotted" onclick="return false;">admin</a>
            
            <ul class="dropdown-user-menu" id="dropdown-user-menu" style="display: none">
                <li class="item-stat">
                    <span class="strength" title="Сила"><i class="icon-synio-star-green"></i> 22.60</span>
                    <span class="rating " title="Рейтинг"><i class="icon-synio-rating"></i> 9.46</span>
                    
                </li>
                
                <li class="item-messages">
                    <a href="https://linkmeup.ru/talk/" id="new_messages">
                        <i class="item-icon"></i>
                        Сообщения
                                            </a>
                </li>
                <li class="item-favourite"><i class="item-icon"></i><a href="https://linkmeup.ru/profile/admin/favourites/topics/">Избранное</a></li> 
                <li class="item-profile"><i class="item-icon"></i><a href="https://linkmeup.ru/profile/admin/">Мой профиль</a></li>
                <li class="item-settings"><i class="item-icon"></i><a href="https://linkmeup.ru/settings/profile/">Настройки</a></li>
                <li class="item-create"><i class="item-icon"></i><a href="https://linkmeup.ru/topic/add/">Создать</a></li>              
                <li class="item-signout"><i class="item-icon"></i><a href="https://linkmeup.ru/login/exit/?security_ls_key=f817799f01ea5e36885aa32b1b1483e9">Выход</a></li>
            </ul>
        </div>
        </div>
    <!--
    <div style="float:right; margin-right: 20px">
        <a id="modal_write_show" class="button button-write center" href="/page/donate/">
            <img src="/uploads/images/yandexmoney.png">
            Поддержать проект
        </a>
    </div>
    -->
    <div class="search-header" style="margin-right:5px">
        <a href="https://www.patreon.com/linkmeup"><img src="/uploads/images/sn/Patreon.png" width="25" title="Поддержать linkmeup на Patreon"></a>
    </div>
    <div class="search-header" style="margin-right:5px">
        <a href="https://www.facebook.com/linkmeup.sdsm"><img src="/uploads/images/sn/Facebook.png" title="linkmeup на Facebook"></a>
    </div>
    <div class="search-header" style="margin-right:5px">
        <a href="https://telegram.me/linkmeup_podcast"><img src="/uploads/images/sn/Telegram.png" title="linkmeup в Телеграме" wi></a>
    </div>
    <div class="search-header" style="margin-right:5px">
        <a href="//vk.com/linkmeup"><img src="/uploads/images/sn/VK.png" title="linkmeup в вк"></a>
    </div>
    <div class="search-header" style="margin-right:5px">
        <a href="mailto:info@linkmeup.ru"><img src="/uploads/images/sn/Email.png" title="Написать авторам"></a>
    </div>
    <div class="search-header" style="margin-right:5px">
        <a href="/rss"><img src="/uploads/images/sn/RSS.png" title="RSS linkmeup"></a>
    </div>
    
    <div class="search-header" style="margin-right:5px">
        <div class="search-header-show" id="search-header-show"><i class="icon-synio-search"></i> <a href="#" class="link-dotted">Найти</a></div>
        
        <form class="search-header-form" id="search-header-form" action="https://linkmeup.ru/search/topics/" style="display: none">
            <input type="text" placeholder="Поиск" maxlength="255" name="q" class="input-text">
            <input type="submit" value="" title="Найти" class="input-submit">
        </form>
    </div>
    
    
    <div>
        <br>
        <table style="width: 100%">
            <tr>
                <td align="left">
                    <a href="https://linkmeup.ru">
                        <img src="/uploads/images/logo_small.png" style="margin-left: 20px;">
                    </a>
                </td>
                <td align="left">
                <a href="https://linkmeup.ru">
                        <img src="/uploads/images/linkmeup.png">
                    </a>
                </td>

                <td align="right" width="100%">
                    <a href="https://linkmeup.gitbook.io/sdsm/">
                    <div style="margin: 0 20px 5px 0;">
                        <img src="/uploads/images/linkmeup_gitbook.png" width="100" alt="СДС на gitbook" title="Контрибьютить сюда">
                        </a>
                    </div>
                    </a>
                <td align="right" width="100%">
                    <a href="//miran.ru">
                    <div style="margin: 0 20px 5px 0;">
                        <img src="/uploads/images/miran_logo.png" width="100" alt="МИРАН - наш друг" title="МИРАН - наш друг">
                        </a>
                    </div>
                    </a>
                </td>
                    <td align="center" width="100%">
                    <a href="//linkmeup.ru/blog/231.html">
                    <div style="margin: 0 20px 5px 0;">
                        <img src="/uploads/images/komfortel.png" width="100" alt="Комфортел - наш друг" title="Комфортел - наш друг">
                        </a>
                    </div>
                    </a>
                </td>
                <td align="right" width="1%">
                    <p style="width: 300px; text-align: left; color: #555; font-size: 13px; margin-right: -30px; line-height: 130%"><a href="https://comfortel.pro" target="blank">Комфортел</a>, +1 в карму!<br><a href="https://miran.ru">Миран</a>, спасибо за хостинг!
                    </p>
                </td>
            </tr>
        </table>
    </div>
</nav>

        <div style="clear:both"></div>

        <div id="wrapper" class="no-sidebar">
            
            <div id="content" role="main"  >
                
                    

    

                


        

<article class="topic topic-type-topic js-topic">
    <header class="topic-header">
        <h1 class="topic-title word-wrap">
                            Buffers
                        
               
                <i class="icon-synio-topic-draft" title="топик находится в черновиках"></i>
                        
                    </h1>
        
        
        
                    <ul class="topic-actions">                                 
                                    <li class="edit"><i class="icon-synio-actions-edit"></i><a href="https://linkmeup.ru/topic/edit/537/" title="Редактировать" class="actions-edit">Редактировать</a></li>
                                
                                    <li class="delete"><i class="icon-synio-actions-delete"></i><a href="https://linkmeup.ru/topic/delete/537/?security_ls_key=f817799f01ea5e36885aa32b1b1483e9" title="Удалить" onclick="return confirm('Вы действительно хотите удалить топик?');" class="actions-delete">Удалить</a></li>
                            </ul>
            </header>
   
   
<div class="topic-content text">
    
    
            Эта статья едва ли для широкого круга читателей, но будет небезынтересна тем, кто хотел бы знать, сколько максимум пакет может полежать где-нибудь в сети, добираясь от точки А к точке Б, и как выбрать коммутатор так, чтобы через месяц от него не тянуло протухшими пакетами.<br/>
Для примера — на некоторых современных коммутаторах буферы по 4 гигабайта — спокойно можно четвёртый сезон Рика и Морти сохранить. Или вообще собрать кластер распределённого хранилища из коммутаторов. <br/>
<br/>
Не обошлось и без того, чтобы взглянуть по-новому на путь пакета, на архитекутуру чипов и процесс производства.<br/>
<br/>
В этой статье будет запредельно много сленга, англицизмов и слов на английском, потому что переводить их на русский неблагодарно, а порой и кощунственно. <br/>
<br/>
<a href="https://fs.linkmeup.ru/images/articles/buffers/kdpv_buffers.jpg" target="_blank" rel="nofollow"><img src="https://fs.linkmeup.ru/images/articles/buffers/kdpv_buffers_s.jpg" width="800" alt="Network Boobs" title="Network Buffers"/></a><br/>
<br/>
Но знаете, какая мысль действительно не даёт мне покоя всю дорогу? Как вся эта сложнейшая конструкция: миллиарды транзисторов, размером около десятка нанометров, напечатанных на пластине размером с большую печеньку, которая полдюжиной тысяч ног припаяна к многослойной плате, напичканной мириадами других микрочипов, сопротивлений и конденсаторов и являющейся частью многоюнитовой модульной коробки, управляемой операционной системой, состоящей из сотен прошивок для разных чипов, инструкций по работе с ними, реализаций стандартизированных и проприетарных протоколов и механизмов поддержания жизнедеятельности многочисленных вентиляторов, блоков питания, линейных карт, фабрик коммутации, интерфейсов, процессоров, памяти — вообще хоть как-то работает, а тем более работает настолько стабильно в течение многих лет.<br/>
<br/>
Настоятельно рекомендую ознакомиться с <a href="https://linkmeup.ru/blog/312.html" rel="nofollow">14-м выпуском СДСМ</a> перед тем, как приступить к чтению.<br/>
<hr/><br/>
<br/>
<h1>Содержание</h1><br/>
<ul><li><b><a href="#TERMINOLOGY" rel="nofollow">Терминология</a></b></li><li><b><a href="#DEVICE_ARCHITECTURE" rel="nofollow">Архитектура сетевого устройства</a></b></li><li><b><a href="#CHIPSET_TYPES" rel="nofollow">Типы чипов</a></b><br/>
<ul><li><a href="#TRADEOFFS" rel="nofollow">Компромиссы: скорость, функциональность, гибкость, цена</a></li><li><a href="#CPU" rel="nofollow">CPU</a></li><li><a href="#ASIC" rel="nofollow">ASIC</a></li><li><a href="#FPGA" rel="nofollow">FPGA</a></li><li><a href="#NP" rel="nofollow">NP</a></li><li><a href="#PROGRAMMABLE_ASIC" rel="nofollow">Programmable ASIC</a></li><li><a href="#DC_CHIPS" rel="nofollow">Чипы для датацентровых коммутаторов</a></li></ul></li><li><b><a href="#ASIC_ARCHITECTURE" rel="nofollow">Архитектура ASIC</a></b><br/>
<ul><li><a href="#PHYSICAL_ARCHITECTURE" rel="nofollow">Физическое устройство</a></li><ul><li><i><a href="#SERDES" rel="nofollow">SerDes</a></i></li><li><i><a href="#PHY" rel="nofollow">PHY, Silicon Photonics</a></i></li></ul><li><a href="#LOGICAL_ARCHITECTURE" rel="nofollow">Логическое устройство</a><br/>
<ul><li><i><a href="#PREINGRESS_ANGINE" rel="nofollow">Pre-Ingress processing</a></i></li><li><i><a href="#PARSER" rel="nofollow">Parser</a></i></li><li><i><a href="#IMOCHACTION" rel="nofollow">Ingress Match-Action</a></i></li><li><i><a href="#TM" rel="nofollow">Traffic Manager + MMU</a></i></li><li><i><a href="#EMOCHACTION" rel="nofollow">Egress Match-Action</a></i></li><li><i><a href="#DEPARSER" rel="nofollow">Deparser</a></i></li></ul></li><li><a href="#PIPELINE" rel="nofollow">Pipeline</a></li><li><a href="#PROGRAMMABLE_PIPELINE" rel="nofollow">Programmable Pipeline</a></li></ul></li><li><b><a href="#BUFERA" rel="nofollow">Память и буферы</a></b><br/>
<ul><li><a href="#SFVSCT" rel="nofollow">Store-n-Forward vs Cut-Through</a></li><li><a href="#CONGESTIONS" rel="nofollow">Перегрузки: причины и места</a><br/>
<ul><li><i><a href="#CONGESTION_REASONS" rel="nofollow">Причины перегрузок</a></i></li><li><i><a href="#CONGESTION_POINTS" rel="nofollow">Места образования перегрузок</a></i></li></ul></li><li><a href="#BUFFER_ARCHITECTURE" rel="nofollow">Архитектура памяти</a><br/>
<ul><li><i><a href="#CROSSBAR" rel="nofollow">Crossbar</a></i></li><li><i><a href="#SHARED_BUFFER" rel="nofollow">Shared Buffers</a></i></li><ul><li><i><a href="#DEDICATED" rel="nofollow">Dedicated + Shared buffers</a></i></li><li><i><a href="#HEADROOM" rel="nofollow">Headroom buffers</a></i></li><li><i><a href="#ADMISSION_CONTROL" rel="nofollow">Admission Control</a></i></li><li><i><a href="#ALPHA" rel="nofollow">Alpha</a></i></li></ul><li><i><a href="#OQ" rel="nofollow">Output queuing </a></i></li><li><i><a href="#IQ" rel="nofollow">Input queuing </a></i></li><li><i><a href="#CIOQ" rel="nofollow">Combined Input and Output queuing </a></i></li><li><i><a href="#VOQ" rel="nofollow">Virtual Output Queueing</a></i></li></ul></li><li><a href="#SHALLOW_VS_DIPPER" rel="nofollow">Shallow vs Deep buffers</a><br/>
<ul><li><i><a href="#HYBRID_BUFFERING" rel="nofollow">Hybrid Buffering</a></i></li><li><i><a href="#TRUE_EVIL" rel="nofollow">Большие буферы — это зло?</a></i></li></ul></li></ul></li><li><b><a href="#LLLL" rel="nofollow">Lossless Low-Latency сети</a></b></li><li><b><a href="#CHIPS_AND_DALES" rel="nofollow">Существующие чипы</a></b><br/>
<ul><li><a href="#MERCHANT_SILICON" rel="nofollow">Commodity/Merchant</a></li><li><a href="#CUSTOM_SILICON" rel="nofollow">Custom</a></li><li><a href="#MERCHANTS_VS_CUSTOMERS" rel="nofollow">Merchant vs Custom</a></li></ul></li><li><b><a href="#LINKS" rel="nofollow">Полезные ссылки</a></b></li></ul><br/>
TL;DR<br/>
<a name="cut" rel="nofollow"></a> <br/>
<br/>
<hr/><br/>
<a name="TERMINOLOGY" rel="nofollow"></a><br/>
<h1>Терминология</h1><br/>
Задача этого параграфа не объять все непонятные слова, употребляемые в статье, а лишь внести некую ясность в неразбериху русско-английских терминов.<br/>
<b>Чип коммутации</b>, <b>сетевой процессор</b>, <b>(Packet) Forwarding Engine</b>, <b>PFE</b> — микросхема, способная коммутировать пакет из входа в нужный выход с нужным набором заголовков.<br/>
<b>Pins</b>, <b>пины</b>, <b>ножки</b> — металлические контакты на микросхеме для соединения с основанием.<br/>
<b>Data Path</b> — путь внутри устройства (или чипа), по которому передвигается пользовательский трафик.<br/>
<b>Lookup</b> или <b>лукап</b> или <b>поиск</b> — поиск адресата в таблицах (FIB, LFIB, ARP Adjacencies, IPv6 ND Table итд.)<br/>
<b>Pipeline</b> или <b>конвейер</b> — набор действий, которые происходят с пакетом по мере его продвижения от входа в чип до выхода из него.<br/>
<b>Single-chip</b>, <b>одночиповый</b> — устройство, внутри которого только один чип.<br/>
<b>Fixed</b>, <b>фиксированный</b>, <b>pizza-box</b> — немодульный коммутатор. Обычно внутри него нет фабрик коммутации. Часто эти термины используются как синоним Single-chip, хотя это не совсем верно — внутри может стоять два (back-to-back) чипа или даже больше.<br/>
<b>Сериализация/Десериализация</b> — процесс перевода данных из параллельного низкоскоростного интерфейса (МГц) в<br/>
последовательный высокоскоростной (ГГц) и наоборот. Например, из чипа в интерфейс или из чипа в фабрику.<br/>
<b>Память</b> — физическая микросхема для хранения.<br/>
<b>Буфер</b> — некий участок памяти, выделенный для хранения пакетов. <i>Здесь и далее в производных словах, таких как «буферов», ударение на «У»</i>.<br/>
<b>Очередь</b> — абстракция над буфером, позволяющая <b>виртуально</b> выстраивать пакеты в упорядоченную очередь. Фактически в памяти они, конечно, хранятся «как попало».<br/>
<b>OCB</b> — On-Chip Buffer — память, встроенная в чип.<br/>
<b>Programmable ASIC</b> — ASIC, логику работы которого можно изменить путём перепрошивки.<br/>
<b>Programmable Pipeline</b> — чип с возможностью для сторонних компаний программировать конкретные части ASIC в ограниченных пределах с помощью предоставляемого вендором компилятора.<br/>
<br/>
<hr/><br/>
<br/>
<a name="DEVICE_ARCHITECTURE" rel="nofollow"></a><br/>
<h1>Архитектура сетевых устройств</h1><br/>
Итак, что такое сетевое устройство?<br/>
Будь то коммутатор, маршрутизатор, файрвол, балансировщик, программный или аппаратный, его задача — доставить пакет со входа на правильный выход, и состоит оно из следующих частей:<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/device_architecture.svg" width="800"/><br/>
<br/>
Электрический или оптический сигнал, попадая на устройство через входной физический порт, восстанавливается до потока битов, из него вычленяются отдельные Ethernet-кадры, далее на основе заголовков (Ethernet, IP, MPLS итд) (или иногда содержимого) принимается решение о том, в какой выходной порт этот пакет должен быть далее отправлен и с каким набором заголовков. На своём пути от входного к выходному порту пакет ещё проходит через модуль Traffic Manager, где с ним могут происходить следующие вещи: буферизация, полисинг, шейпинг, обработка по приоритетам.<br/>
Это путь самого пакета.<br/>
<br/>
И отдельно от пути пакета — Control Plane Module, который отвечает за то, чтобы путь вообще появился. Это всяческие протоколы маршрутизации, обмена меток и прочее.<br/>
<br/>
Это компоненты, которые присутствуют всегда и во всех сетевых устройствах.<br/>
<br/>
Реализация же этих функций уже зависит от того, о чём именно мы говорим.<br/>
Например, на обычном x86 всю работу, кроме PHY могут взять на себя CPU и оперативка. <br/>
Более типично, что функции канального уровня заберёт на себя NIC — Ethernet, проверка контрольных сумм.<br/>
А можно в компьютер доставить SmartNIC'и, которые аппаратно могут делать, например, туннелирование.<br/>
Но мы не будем сегодня про программные реализации сетевых функций. Поговорим о старых добрых материальных коробках, которым всё равно никуда никогда не деться.<br/>
<br/>
<hr/><br/>
Вообще об этом я уже <a href="https://linkmeup.ru/blog/312.html" rel="nofollow">писал</a>, поэтому повторяться не буду. Точнее буду, но не сильно. Точнее сильно, но я добавлю здесь ещё смысла.<br/>
<br/>
Обычно на каждый блок задач выделяется специализированный чип.<br/>
Так, всем Control Plane'ом занимается всё тот же CPU+память.<br/>
Организация взаимодействия со средой передачи и преобразование битов в сигнал и наоборот — специальные чипы PHY. Почти всегда они реализуются на ASIC.<br/>
Разбор заголовков и поиск пути — Packet Forwarding Engine. Это может быть ASIC, Network Processor, реже FPGA и даже CPU. К ним в помощь идёт или обычная память RAM или специальная CAM/TCAM для хранения таблиц лукапа.<br/>
Traffic Manager — если вынесен отдельно, то опять же — узкоспециализированные ASIC'и и плюс к ним память. Но может быть встроенным в чип коммутации.<br/>
<br/>
Один из вариантов реализации (single-chip устройство):<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/device_architecture_variant.svg" width="800"/><br/>
<br/>
В этой статье сосредоточимся на PFE и TM, которые и могут вносить вариативные задержки в доставку, потому что могут хранить пакеты.<br/>
<br/>
<hr/><br/>
<br/>
<a name="CHIPSET_TYPES" rel="nofollow"></a><br/>
<h1>Типов-Чипов</h1><br/>
Было очень страшно начинать эту статью, потому что чипов чудовищное многообразие и простого короткого ответа на вопрос, какой выбрать — нет. Речь и про типы, и про изготовителей, и про серии, и про характеристики.<br/>
Ниже я попытаюсь разложить все эти штуки на составляющие детали.<br/>
<br/>
А начнём с типов чипов. Дальнейшая часть этой главы в некоторой степени повторит материал упомянутой выше <a href="https://linkmeup.ru/blog/312.html#CHIPS" rel="nofollow">статьи из цикла СДСМ</a>.<br/>
<br/>
<a name="TRADEOFFS" rel="nofollow"></a><br/>
<h2>Компромиссы: скорость, функциональность, гибкость, цена</h2><br/>
В IT всё есть компромисс. Всегда приходится чем-то жертвовать во благо другого.<br/>
<br/>
Вот классический цискин треугольник про компромиссы:<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/tradeoffs.png" width="600"/><br/>
<i>Здесь не хватает ещё NP и Programmable ASIC. <a href="https://www.ciscolive.com/c/dam/r/ciscolive/us/docs/2016/pdf/BRKARC-3467.pdf" target="_blank" rel="nofollow">Источник</a>.</i><br/>
<br/>
Вендоры всегда балансируют в периметре этого треугольника. <br/>
<br/>
Нельзя сделать CPU, проворачивающий через себя 25 Тб/с.<br/>
Нельзя сделать универсальный ASIC — зачастую они могут быть аппаратно ограничены по функциям (например, <b>или</b> VXLAN Lookup <b>или</b> IP).<br/>
Нельзя сделать дешёвый FPGA.<br/>
<br/>
Кроме того при таком количестве портов, сегодня вступают в игру энергопотребление, место в стойке, тепловыделение и, конечно, цена. <br/>
<hr/><br/>
Итак, на сегодняшний день существуют следующие типы чипов, которые могут быть использованы в качестве пакетных процессоров:<br/>
<br/>
<a name="CPU" rel="nofollow"></a><br/>
<h2>CPU</h2><br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/chip_cpu.png" width="500"/><br/>
<br/>
<ul><li>Неограниченная гибкость</li><li>Неограниченная функциональность</li><li>Приемлемая цена</li><li>Полный провал по производительности</li></ul><br/>
Идея в том, что всё управляется кодом. Инструкции записываются в оперативную память. Для обработки каждого пакета потребуется сходить много раз из CPU в RAM.<br/>
С другой стороны для изменения логики работы достаточно переписать программу. Обновления CPU не требуется.<br/>
<br/>
Область применения: домашние и SOHO маршрутизаторы, устройства уровня доступа, файрволы, DPI итд. <br/>
Например, абсолютно все рутеры Mikrotik используют CPU для маршрутизации пакетов.<br/>
Иными словами CPU годится там, где не гонимся за ультраскоростями, а важен широкий набор функций и невысокая цена.<br/>
<blockquote>Впрочем, не без исключений: бывают, что и большие штуки коммутируют в CPU.<br/>
</blockquote><br/>
<b>Важное замечание</b>: CPU является необходимой частью любого сетевого устройства, потому что берёт на себя задачи Control Plane. А это автоматически означает, что ему придётся работать с протокольным трафиком: OSPF, BGP, LDP, LLDP итд. Кроме того, есть exception трафик — когда у пакета TTL истёк или когда у него стоит бит Router Alert. Ещё CPU нужно самому генерировать трафик тех же протоколов — Self-generated.<br/>
Можно ли считать это участием в коммутации? Скорее да, чем нет.<br/>
<br/>
<h5>Программная маршрутизация на CPU</h5>Для последнего десятилетия характерна тенденция к маршрутизации в софте. Для всех сетевых функций предлагаются программные альтернативы. Отсюда и DMA, DPDK, VPP, SR-IOV, которые и правда позволяют творить невиданные прежде вещи. <br/>
Более того, современные CPU обладают дополнительными блоками инструкций. У Intel это <b>SSE</b> — <a href="https://ru.wikipedia.org/wiki/SSE" rel="nofollow">Streaming SIMD Extensions</a>, позволяющие значительно ускорить обработку трафика.<br/>
Тут обычные CPU уже заходят в зону NP (Network Processor) — процессоров, которые можно программировать на языках высокого уровня вроде C, и обладающих большим набором спец. инструкций для работы с сетевым трафиком.<br/>
Одним из узких мест современных процессоров ещё является шина доступа — PCIe. В один процессор сейчас более-менее можно загнать 100 с небольшим Гбит/с.<br/>
<br/>
Но как бы производители программных решений ни продвигали идею, что «все можно сделать в софте», однако скорости выше 500 Гбит/с пока что можно достигать только с помощью специализированных асиков.<br/>
<br/>
И давайте ещё прикинем.<br/>
Выдержка с сайта про VPP:<br/>
<blockquote>Recent testing of FD.io release 17.04 shows impressive gains in performance on Intel’s newest platform when switching and routing layer 2⁄3 traffic. With the prior generation Intel® Xeon® Processor E7-8890v3, FD.io testing showed aggregate forwarding rate of 480 Gbps (200 Mpps) for 4-Socket machine (using 4 of E7-8890v3 CPU configuration); however, the same FD.io tests run on two 2-Socket blades (e.g. a modern 2RU server) with the new Intel® Xeon® Platinum 8168 CPUs (using four of 8168 CPUs in two by two-socket configuration), within the same power budget, show increase of forwarding rate to 948 Gbps (400 Mpps) benefiting from the PCIe bandwidth increase of the new CPUs, and the overall decrease in cycles-per-packet due to CPU micro-architecture improvements.<br/>
</blockquote><br/>
Xeon E7-8890v3: Рекомендуемая цена $7174.<br/>
4 проца по 18 ядер = 72 ядра = 480 Gbps (200 Mpps)<br/>
$28696 только за процы<br/>
<br/>
Xeon Platinum 8168. Рекомендуемая цена% $5890.<br/>
2 проца по 24 ядра = 48 ядер = 948 Gbps (400 Mpps)<br/>
$11780 только за процы<br/>
<br/>
Без обвязки. А ещё кушать электричества он будет как голодный шакал. Не самый дешёвый получится рутер. Зато гибкий.<br/>
<br/>
<a name="ASIC" rel="nofollow"></a><br/>
<h2>ASIC</h2><br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/chip_asic.png" width="500"/><br/>
<br/>
<ul><li>Околонулевая гибкость</li><li>Ограниченная функциональность</li><li>Низкая цена</li><li>Ультравысокая производительность</li></ul><br/>
Идея в том, что инструкции закодированы аппаратно в виде транзисторов. <br/>
Сначала очень долго пишется код, реализующий логику, на специальном языке программирования, вроде Verilog, далее он преобразуется в интегральную схему, отлаживается, проверяется и отправляется в тираж. После этого поменять что-то в логике чипа можно, только произведя новый чип.<br/>
Каждый пакет обрабатывается, просто прогоняясь по конвейеру из транзисторов, совершающих заранее определённые действия. Это называется Pipeline.<br/>
<br/>
Область применения: почти любые коммутаторы и многие маршрутизаторы.<br/>
<blockquote>Впрочем, не без исключений: Juniper в своей линейке маршрутизаторов MX многие годы использует <a href="https://habr.com/post/307696/" target="_blank" rel="nofollow">ASIC Trio</a>.<br/>
<br/>
Вообще по книге об MX: PFE это блок ASIC'ов:<br/>
PFEs are made of several ASICs, which may be grouped into four categories:<br/>
<ul><li>Routing ASICs: LU or XL Chips. LU stands for Lookup Unit and XL is a more powerful (X) version.</li><li>Forwarding ASICs: MQ or XM Chips. MQ stands for Memory and Queuing, and XM is a more powerful (X) version.</li><li>Enhanced Class of Service (CoS) ASICs: QX or XQ Chips. Again, XQ is a more powerful version.</li><li>Interface Adaptation ASICs: IX (only on certain low-speed GE MICs) and XF (only on MPC3E) </li></ul></blockquote><br/>
Речь здесь о классических ASIC — <b>Applicaton Specific</b> Integrated Circuit — статических кусках кремния с аппаратной логикой.<br/>
Последние лет 10 в области сетевых микросхем произошёл сдвиг в направлении программируемых ASIC'ов, о которых <a href="#PROGRAMMABLE_ASIC" rel="nofollow">чуть ниже</a>.<br/>
<br/>
<a name="FPGA" rel="nofollow"></a><br/>
<h2>FPGA</h2><br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/chips_fpga.png" width="500"/><br/>
<br/>
Русский термин — ПЛИС — Программируемая Логическая Интегральная Схема.<br/>
<ul><li>Вполне удовлетворительная гибкость</li><li>Вполне удовлетворительная функциональность</li><li>Цена успешного полёта Апполона до Луны и обратно</li><li>Отличная производительность</li></ul><br/>
В отличие от ASIC'ов, где на транзисторах реализованы сами функциональные блоки, в FPGA транзисторами реализуются базовые строительные блоки — регистры, память, LUTы. Из которых потом <b>можно</b> создавать нужные функциональные блоки.<br/>
Что это даёт?<br/>
А то, что FPGA полностью программируемый — логику работы блоков, из которых он состоит, можно поменять. Для этого потребуется обновить прошивку чипа, что менее удобно, чем с CPU, но гораздо удобнее, чем ASIC.<br/>
Так, если поддержка какой-то функции (условный Geneve) не была заложена изначально, её всегда можно добавить потом новой прошивкой.<br/>
<br/>
Однако за такую программируемость приходится дорого платить.<br/>
<br/>
Область применения: POC или низкоскоростные решения для энтерпрайз-сегмента. <br/>
<br/>
<blockquote>Впрочем, не без исключений: собеседовался я как-то раз в контору, в которой модульную коробку для операторов собирали полностью на FPGA, включая фабрику.<br/>
<br/>
У этого даже есть основания: задолго до появления Programmable ASIC'ов на FPGA можно было делать любую обработку пакетов. И даже через несколько лет после производства плисину легко перепрошить и получить поддержку новой функции.<br/>
Автору неизвестны вендоры, которые бы на ПЛИС сделали PFE на скорости более 100 Гбит/с, по всей видимости, потому что частная компания не обладает для этого достаточным капиталом.<br/>
Но для рынка энтерпрайз такие решения могут <a href="https://www.ethernitynet.com/products/socs/network-co-processors/" target="_blank" rel="nofollow">вполне</a> <a href="https://www.arrivetechnologies.com/ipcorecarrierethernet" target="_blank" rel="nofollow">подойти</a>.<br/>
<br/>
Однако, я слышал, что в процессе разработки ASIC возможен такой подход, когда сначала разрабатывается FPGA, программируется нужным образом, тестируется, а потом с неё делают слепок для производства ASIC. Но пруфов нет.<br/>
</blockquote><br/>
<a name="NP" rel="nofollow"></a><br/>
<h2>NP — Network Processor</h2><br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/chip_np.png" width="500"/><br/>
<br/>
<ul><li>Отличная гибкость</li><li>Отличная функциональность</li><li>Цена весьма высокая</li><li>Производительность весьма высокая</li></ul><br/>
NP или <b>NPU</b> — Network Processor Unit.<br/>
<br/>
Идея в том, что это почти CPU, который однако заточен под сетевые задачи и изготавливается специально под них.<br/>
Он, как и CPU, обычно состоит из нескольких ядер, каждое из которых отвечает за свой сегмент. Для изменения логики так же достаточно переписать код приложения.<br/>
NP позволяет делать более сложные штуки — например выполнять циклы (чего лишены ASIC и FPGA), делать NAT, почти любые инкапсуляции, пушить и попать условно произвольное число меток итд.<br/>
Долгое время NP позиционировался, как серебряная пуля для всех сетевых приложений.<br/>
Но производительность уступает ASIC'ам и FPGA.<br/>
<br/>
Большим преимуществом является то, что писать программы для NP можно на С. Это значительно ускоряет процесс, кроме того, где-то можно переиспользовать код.<br/>
<br/>
Область применения: маршрутизаторы агрегации и ядра. <br/>
<blockquote>Впрочем, не без исключений: например Smart-NIC Netronome в начале своего пути <a href="https://www.netronome.com/timeline/" target="_blank" rel="nofollow">испльзовал Intel IXP</a>.<br/>
</blockquote><br/>
<a name="PROGRAMMABLE_ASIC" rel="nofollow"></a><br/>
<h2>Programmable ASIC</h2><br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/chip_programmable_asic.png" width="500"/><br/>
<br/>
<ul><li>Приемлемая гибкость</li><li>Ограниченная функциональность</li><li>Низкая цена</li><li>Ультравысокая производительность.</li></ul><br/>
А вот это уже настоящая серебряная пуля последнего десятилетия.<br/>
«Почему бы нам не взять ASIC и сделать его немножечко программируемым?» — таким вопросом, видимо, задались разработчики и выдали замечательную вещь, которую циска в своём треугольнике поместила в самую середину, хотя это и не совсем так, потому что производительность программируемого ASIC'а такая же, как и у обычного. Им удалось вырваться из 2D.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/programmable_asic.png" width="600"/><br/>
<br/>
Область применения: коммутаторы, маршрутизаторы. <br/>
Большинство датацентровых коммутаторов и некоторые маршрутизаторы уровня границы ДЦ работают на программируемых асиках.<br/>
<hr/><br/>
<br/>
<a name="DC_CHIPS" rel="nofollow"></a><br/>
<h2>Чипы для датацентровых коммутаторов</h2><br/>
Чтобы упростить себе жизнь, я продолжу далее разговор только об ASIC'ах под датацентровые коммутаторы, не пытаясь обнять Джабба Хатта.<br/>
<br/>
До недавних пор на этой ниве пахал только Broadcom со своей оружейной палатой: Tomahawk и Trident — и израильскими городами: Qumran, Jericho итд.<br/>
Выбор — особо не разбежишься — ну или разрабатывать своё (как делают Huawei, Juniper и Cisco)<br/>
<br/>
Сегодня конкуренцию ему пытаются составить Mellanox со своими собственными чипами Spectrum (ныне уже Nvidia), Innovium Teralynx, Barefoot Tophino (ныне Intel). Своим появлением эти компании раскачивают рынок и провоцируют среди вендоров тренд на переход от внутренних разработок к готовым чипам их производства.<br/>
<br/>
Мы в конце <a href="#CHIPS_AND_DALES" rel="nofollow">статьи</a> взглянем на их модельные ряды, но пока давайте обсудим, чем же чипы характеризуются и могут отличаться друг от друга.<br/>
<br/>
А для этого надо понять, какие они задачи решают.<br/>
<hr/><br/>
<br/>
В <a href="https://linkmeup.ru/blog/480.html" rel="nofollow">датацентровых сетях</a> есть три основных типа устройств:<br/>
<b>Spine</b> — сравнительно простая железка, требующая самый минимум функций — её задача просто молотить трафик. Очень много и очень быстро. Зачастую это просто IP-маршрутизация. Но бывают и топологии, в которых Spine играет чуть более важную роль (VXLAN anycast gateway). Но обычная практика — держать конфигурацию спайнов максимально простой. <br/>
<b>Leaf</b> — чуть более требователен к функциям. Может терминировать на себе VXLAN или другие оверлеи. Здесь могут реализовываться политики QoS и ACL. Зато не нужна такая большая пропускная способность, как для спайнов. Кроме того, в некоторых сценариях (VXLAN) leaf знает о сервисах за подключенными машинами (клиентских сетях, контейнерах), соответственно, ему нужно больше ресурсов FIB для хранения этой инфорации.<br/>
<b>Edge-leaf</b> — это устройства границы сети ДЦ и здесь уже фантазия ограничивается только свободой мысли сетевых архитекторов — MPLS, RSVP-TE, Segment Routing, всевозможные VPN'ы. При этом наименее требовательны к производительности.<br/>
<br/>
На каждом устройстве, соответственно, разные требования к возможностям чипов — как по пропускной способности, так и по набору функций и по количеству ресурсов для хранения чего-либо.<br/>
<br/>
И надо сказать, вендоры чипов и железа добились тут поразительных успехов. <br/>
Типичный спайн сегодня — это 64-128 100GE портов на 2-4 юнита с энергопотреблением около 400 Вт. И ценой порядка пары десятков тысяч долларов.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/nexus3k.png" width="800"/><br/>
<br/>
Производителям чипов приходится нелегко не только из-за попыток найти золотую середину, но и из-за возрастающих скоростей передачи данных и конкуренции.<br/>
Средняя скорость аплинков с торов сегодня 200-800 Гб/с. Чтобы собрать минимально рабочую сеть ДЦ, нужны спайны с пропускной способностью 3,2 Тб/с.<br/>
<br/>
Всё более и более производительные чипы нужно выпускать уже примерно каждые полтора-два года.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/timeline.png" width="800"/><br/>
<i>Актуализированная мной картинка из <a href="https://youtu.be/Ti3t9OAZL3g?t=2496" rel="nofollow">видео PP</a>.</i><br/>
<br/>
Конкурирующие производители чипов идут ноздря в ноздрю — почти одновременно у всех (Broadcom, Mellanox, Innovium, Barefoot) выходят микросхемы с почти идентичными характеристиками, а вслед за ними и коммутаторы с ними.<br/>
<br/>
Ещё одним компромиссным вопросом является размер буфера, но об этом мы поговорим <a href="#BUFERA" rel="nofollow">попозже</a>.<br/>
<br/>
Помимо скорости и обязательных функций по маршрутизации и оверлеям, есть ещё много менее заметных вещей, которые ожидают потребители. <br/>
Мы про них говорить сегодня не будем, но не упомянуть было бы ошибкой.<br/>
<br/>
Это, например, <b>телеметрия</b> в реальном времени: наблюдать за утилизацией буферов, видеть бёрсты, дампы отброшенных пакетов, профиль трафика по размерам и типам пакетов.<br/>
Кроме того, сегодня набирает популярность <b>INT</b> — <a href="https://www.opencompute.org/files/INT-In-Band-Network-Telemetry-A-Powerful-Analytics-Framework-for-your-Data-Center-OCP-Final3.pdf" rel="nofollow">Inband Network Telemetry</a>.<br/>
<br/>
Для многих незаметно, но уже почти жизненно важно, начинает работать <b>динамическая балансировка трафика</b>: чип отслеживает потоки (flows) и дробит их на флоулеты (flowlets) — короткие куски трафика одного потока, разделённые между собой паузой в несколько миллисекунд. Эти флоулеты он может динамически распределять по разным путям (ECMP или членам LAG), чтобы обеспечить более равномерную балансировку. Особенно важно это для Elephant Flows, оккупирующих один интерфейс.<br/>
<br/>
Пользователям всё чаще хочется иметь возможность <b>управлять распределением буфера</b>, ну а <b>перераспределение</b> ресурсов FIB — это уже функциональность, отсутствие которой будет вызывать вопросы. <br/>
<br/>
В условиях датацентров <a href="https://linkmeup.ru/blog/482.html" target="_blank" rel="nofollow">ECMP и балансировка силами сети</a> — это воздух, вендорам нужно обеспечить нужное количество как <b>ECMP-групп</b>, так и общее <b>количество Next-hop'ов</b>.<br/>
<br/>
Поэтому нет одного чипа или тем более SoC, решающего сразу все задачи. <br/>
Под каждую роль разработаны свои чипы. Одни из них ориентированы на пропускную способность, другие на широкую функциональность, третьи на низкие задержки. <br/>
<br/>
Посочувствуем же бедным вендорам и будем выбирать долларом.<br/>
<hr/><br/>
<br/>
<a name="ASIC_ARCHITECTURE" rel="nofollow"></a><br/>
<h1>Архитектура сетевых ASIC</h1><br/>
Сначала мы взглянем на физиологию чипа — из каких компонентов он состоит.<br/>
А далее разберёмся что с пакетом в этих компонентах происходит.<br/>
<br/>
<a name="PHYSICAL_ARCHITECTURE" rel="nofollow"></a><br/>
<h2>Физическое устройство</h2><br/>
Итак, для успешной коммутации пакета нужны следующие блоки: <br/>
<ul><li>Парсер заголовков (Parser)</li><li>Лукап (Match): FIB/LFIB, Nexthop-группы, ARP Adjacencies, IPv6 ND Tables, ACL итд</li><li>Блоки преобразований (Action)</li><li>Блок управления памятью (TM/MMU)</li><li>Сборщик пакета (Deparser)</li><li>SerDes</li><li>Память для буферизации пакетов</li><li>Блок, реализующий MAC</li><li>Чип PHY</li><li>Физические порты/трансиверы</li></ul><br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/device_architecture_full.svg" width="800"/><br/>
Крупными мазками: оптический или электрический сигнал попадает на порт (<b>Rx</b>), тот его передаёт на <b>PHY</b>. Модуль PHY реализует функции физического уровня и передаёт биты на входные пины PFE, где сигнал блоками <b>SerDes</b> преобразуется в удобоваримый для чипа вид. Блок <b>MAC</b> из потока битов восстанавливает Ethernet-кадр и передаёт его <b>парсеру</b>. Парсер отделяет необходимые ему заголовки и передаёт их на анализ следующему блоку <b>Match/Action</b>. Тот их исследует и применяет нужные действия — отправить на правильный порт, на CPU, энкапсулировать, дропнуть итд. Тело пакета всё это время хранилось в <b>буферах</b>, управляемых <b>MMU</b>, и теперь пришло время <b>Traffic Manager'у</b> проводить все обряды QoS. И потом процесс раскручивается в обратную сторону. Снова <b>Match/Action</b>. Потом собрать пакет с новыми заголовками (<b>Deparser</b>), преобразовать кадр в поток битов (<b>MAC</b>), сериализовать (<b>SerDes</b>), осуществить действия физического уровня (<b>PHY</b>) и передать через выходной порт (<b>Tx</b>) в среду.<br/>
<hr/><br/>
<br/>
В простейшем случае вообще почти все блоки являются частью одного монолитного кристалла кремния. То есть они — продукт одного процесса печати на вафле.<br/>
<br/>
Отдельные, составляющие чип компоненты, реализующие законченный набор функций, называются <a href="https://ru.wikipedia.org/wiki/IP-cores" target="_blank" rel="nofollow">IP-core</a> (не тот, что ты мог подумать, сетевой инженер!). То есть SerDes, MAC, TM — это всё отдельные IP-core. Зачастую они производятся сторонними компаниями, специализирующимися конкретно на данных компонентах, а потом встраиваются в микросхему. Особенно это касается SerDes — сложнейшей детали, в которую вендоры сетевых чипов не готовы вкладывать силы R&D. Один из крупных производителей SerDes — <a href="https://www.inphi.com/products/optical-phy/" target="_blank" rel="nofollow">Inphi</a>.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/rosetta.png" width="500"/><br/>
<i>Монолитный чип Rosetta. <a href="https://fuse.wikichip.org/news/3293/inside-rosetta-the-engine-behind-crays-slingshot-exascale-era-interconnect/" target="_blank" rel="nofollow">Источник</a>.</i><br/>
<br/>
Все свои чипы Broadcom позиционирует как монолитные:<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/trindent4_monolitic.png" width="300"/><br/>
<i><a href="https://www.broadcom.com/products/ethernet-connectivity/switching/strataxgs/bcm56880-series" target="_blank" rel="nofollow">Источник</a>.</i><br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/monolitic_asic.png" width="800"/><br/>
<i><a href="http://www.trex.fi/2017/Ralf-Korschner-The-March-of-Merchant-Silicon.pdf" target="_blank" rel="nofollow">Источник</a>.</i><br/>
<br/>
Другой распространённый вариант: в одном чипе сочетать несколько разных кусочков с интерконнектом между ними.<br/>
Так, например, <a href="#SHALLOW_VS_DIPPER" rel="nofollow">off-chip память HBM</a> коммерческого производства выносится за пределы кристалла сетевого ASIC:<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/monolit_asic.png" width="400"/><br/>
<br/>
Под крышкой одного производительного чипа могут быть собраны несколько, так называемых, менее производительных чиплетов (chiplet), которые, объединённые в фабрику, дают бо́льшую пропускную способность:<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/chiplets.png" width="400"/><br/>
<br/>
Для <a href="#CUSTOM_SILICON" rel="nofollow">кастомных решений</a> рядовая практика — вообще все ресурсы выносить за пределы сетевого ASIC'а:<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/off_chip_resources.png" width="800"/><br/>
<br/>
В случае Juniper, кстати, их Trio — это не один ASIC — это их набор, каждый из которого реализует свои функции.<br/>
<br/>
Но как бы ни был устроен сам чип, ему нужно общаться с миром. <br/>
И поэтому на животике у него есть несколько тысяч пинов:<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/pins.png" width="400"/><br/>
<br/>
Одни пины нужны для того, чтобы подключить к чипу интерфейсы.<br/>
Другие — чтобы подключиться к внешней памяти (CAM/TCAM/RAM), если она есть.<br/>
Третьи — к фабрике коммутации, если коробка модульная.<br/>
<br/>
Два пина образуют <a href="https://linkmeup.ru/blog/401.html#DIFFPAIRS" rel="nofollow">дифференциальную пару</a> для передачи данных в одном направлении. То есть две пары пинов нужны для полнодуплексной передачи.<br/>
<br/>
Вот так оно потом выглядит в программах для проектирования (для случая на порядок более простой микросхемы):<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/designing_card.png" width="700"/><br/>
<i><a href="https://linkmeup.ru/blog/401.html" rel="nofollow">Источник</a>.</i><br/>
<br/>
Теперь пришло время разобраться с тем, что же такое загадочный SerDes. Нет, это не ножки на микросхеме.<br/>
<hr/><br/>
<a name="SERDES" rel="nofollow"></a><br/>
<h3>SerDes</h3><br/>
Если коротко — то это блоки (<a href="https://ru.wikipedia.org/wiki/IP-cores" target="_blank" rel="nofollow">IP-core</a>) сетевого ASIC'а, которые позволяют получить сигнал с пинов и, наоборот, передать его туда.<br/>
<br/>
Теперь с этимологией. Аналогично «модему» и «кодеку», ставшим уже такими родными в кириллическом написании, SerDes составлен из двух слов: <b>Serializer-Deserializer</b>. Так чего же он сериализует и десериализует?<br/>
<br/>
Всё дело в скорости работы сетевых чипов. Независимо от их типа (ASIC, NP, CPU) — их частота находится в пределах сотен Мгц — единиц 1Ггц. А частота передачи данных с порта 10Гб/с — 10 Ггц (100 Гбит/с = 4х25ГГц). Соответственно, каким-то образом нужно понизить частоту внутри чипа. И как раз это достигается тем, что сигнал из пары вводных пинов распараллеливается на множество внутренних линий — десериализуется.<br/>
В обратную сторону — сигнал с нескольких линий нужно сериализовать в пару пинов.<br/>
<br/>
Блоки SerDes всегда являются составными частями кристалла сетевого чипа.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/serdeses.jpg" width="400"/><br/>
<i><a href="https://www.design-reuse.com/news/44362/esilicon-7nm-ip-networking-platform.html" target="_blank" rel="nofollow">Источник</a>.</i><br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/serdes_inside.png" width="500"/><br/>
<i><a href="http://www.trex.fi/2017/Ralf-Korschner-The-March-of-Merchant-Silicon.pdf" target="_blank" rel="nofollow">Источник</a>.</i><br/>
<br/>
Один SerDes — это 4 пина на пузике асика — два для Tx, два для Rx.<br/>
Скорость одного SerDes'а — величина скачкообразно растущая с годами. Наиболее распространённые сегодня — это 10Гб/с и 28Гб/с. Но в скором будущем датацентровый масс-маркет начнут заполонять устройства с 56Гб/с SerDes и даже со 112Гб/с.<br/>
<br/>
Выглядит довольно сложным. Для чего же вообще устраивать эту сериальную вакханалию, а не сделать просто пинов по числу реальных линий в чипе?<br/>
<br/>
<h4>Зачем?</h4>Ну, давайте прикинем, спайн-коммутатор с 64х100Гб/с портами несёт под кожухом ASIC ёмкостью 6,4 Тб/с.<br/>
Если каждые 4 пина чипа могут обеспечить 28Гб/с в полном дуплексе, значит, на нём должно быть 64*4*4=1024 пинов.<br/>
Это уже как минимум 32х32 пинов на 40 см^2. И они там сидят довольно плотненько. Легко ли будет кратно нарастить их количество?<br/>
<br/>
Однако проблема не только и не столько с количеством пинов.<br/>
Тенденция к серийным интерфейсам намечается <a href="https://www.design-reuse.com/articles/10541/multi-gigabit-serdes-the-cornerstone-of-high-speed-serial-interconnects.html" target="_blank" rel="nofollow">уже давно</a>.<br/>
На смену переферийным параллельным портам пришли серийные (USB на смену параллельному)<br/>
На смену IDE — SATA (Serial ATA)<br/>
На смену SCSI — SAS (Serial SCSI)<br/>
На смену PCI — PCI Express<br/>
<br/>
Это жжж неспроста. Ведь казалось бы, чем больше проводов, тем больше данных можно передать за единицу времени?<br/>
На самом деле нет — при параллельной передаче с повышением скорости всё острее и острее встают вопросы синхронизации между этими самым проводами. Схемотехники даже связанные дорожки на платах <a href="https://linkmeup.ru/blog/401.html#DIFFPAIRS" target="_blank" rel="nofollow">проектируют так</a>, чтобы они были максимально одинаковой длины.<br/>
В какой-то момент задача усложнилась настолько, что дальнейшее развитие пошло по увеличению полосы пропускания обычной дифф-пары вместо параллелизма. В частности для 100Гб/с другого варианта просто не существует. <br/>
<br/>
<h4>Модуляция</h4>То, каким образом множество параллельных сигналов укладывается в один, зависит от метода модуляции.<br/>
Для SerDes с пропускной сопособностью 10Гб/с и 28Гб/с используется <b>NRZ</b> — <a href="https://en.wikipedia.org/wiki/Non-return-to-zero" target="_blank" rel="nofollow">Non-Return-to-Zero</a>. <br/>
С ним же <a href="https://www.nextplatform.com/micro-site-content/taking-closer-look-rambus-56-gbps-multi-protocol-serdes-phy/" target="_blank" rel="nofollow">добились</a> и 56Гб/с. Но всё же стандартом <i>de facto</i> для 56Гб/с и <i>de iure</i> для 112Гб/с является <b>PAM4</b> — <a href="https://blogs.cisco.com/sp/pam4-for-400g-optical-interfaces-and-beyond-part-1" target="_blank" rel="nofollow">4 -level Pulse Amplitude Modulation</a>.<br/>
Есть и <a href="http://www.ieee802.org/3/ad_hoc/ngrates/public/17_05/sun_nea_01a_0517.pdf" target="_blank" rel="nofollow">ленивые пессимистичные взгляды</a> в сторону PAM8.<br/>
<br/>
Итого, учитывая современные реалии (NRZ), для того, чтобы запитать данными интерфейс 100Гб/с нужно подвести к нему 4 SerDes'а по 28Гб/с (или 16 дорожек). Отсюда и берётся «лейновость» 100Ж-портов: 4 лейна — это 4 канала по 28Гб/с.<br/>
<br/>
И это то, что позволяет 1х100Ж порт разбить на 4х25Ж с помощью гидры.<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/breakout.png" width="500"/><br/>
<br/>
В случае PAM4 для 100Ж нужно только 2 SerDes'а по 56Гб/с, то есть два лейна.<br/>
<br/>
<h4>GearBox'ы</h4>Сложности с переходом на новые методы модуляции заключаются в том, что устройства на разных сторонах должны использовать одинаковые, либо нужно ставить дополнительные конвертеры. То есть просто подключить сотками коммутатор с PAM4 к NRZ не получится.<br/>
<br/>
Но когда индустрия бросала своих участников, не предлагая им решений? Для того, чтобы устройства с разными модуляциями могли взаимодействовать друг с другом, изобрели коробки передач, которые из малого количество высокоскоростных линий делают много помедленнее и наоборот.<br/>
Так, в новейшие коммутаторы, выпускаемые сегодня, <a href="https://www.marketwatch.com/press-release/broadcoms-industry-leading-pam-4-phy-shipments-surpass-1-million-ports-2018-09-20" target="_blank" rel="nofollow">ставят дополнительные чипы</a>, чтобы их можно было использовать в сети с более старым оборудованием.<br/>
<br/>
Использование гирбоксов также упростит вендорам и переход на 400G — не придётся менять ASIC — достаточно заменить/убрать гирбокс.<br/>
<hr/><br/>
<br/>
<a name="PHY" rel="nofollow"></a><br/>
<h3>PHY</h3><br/>
Этот зверь тоже по-своему интересен.<br/>
Его задачи незамысловаты:<br/>
<ul><li>Конвертация сигнала между средами (оптика-медь), если это нужно</li><li>Восстановление битов из сигналов и наоборот</li><li>Коррекция ошибок</li><li>Синхронизация</li><li>И другие задачи физического уровня.</li></ul><br/>
<i>Если хочется знать больше, и не пугают забористые тексты со страшными картинками: <a href="https://www.intel.com/content/dam/www/public/us/en/documents/white-papers/phy-interface-pci-express-sata-usb30-architectures-3-1.pdf" target="_blank" rel="nofollow">PHY Interface for PCI Express, SATA, USB 3.1, DisplayPort, and Converged IO Architectures</a>.</i><br/>
<br/>
Что действительно любопытно и достойно обсуждения — так это его расположение.<br/>
Если порт медный — RJ45, то чип PHY — это ASIC, установленный на плате.<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/phy.png" width="400"/><br/>
<br/>
Если порт оптический, то в подавляющем большинстве случаев эти функции возьмёт на себя DSP PHY, встроенный в трансивер (та самая штука, называемая нами модулем и вставляемая в дырку в коммутаторе).<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/dsp_phy.png" width="500"/><br/>
<i><a href="https://www.inphi.com/products/optical-phy/" target="_blank" rel="nofollow">Источник</a>.</i><br/>
<a name="SILICON_PHOTONICS" rel="nofollow"></a><br/>
Однако тенденции последних лет — это <b>Silicon Photonics</b>. <br/>
<br/>
Самый производительный коммерческий чип сегодня выдаёт 25,6 Тб/с. Это серьёзнейший инженерный вызов разработчиками. И нет никаких оснований полагать, что гиперскейлеры и экзаскейлеры умерят свои аппетиты и решат остановиться на этом. Скорость будет расти.<br/>
Чип PHY находится на трансиверах, а SerDes — на кристалле сетевой микросехмы. Сигнал между ними идёт по электропроводящей среде — по металлической дорожке. С увеличением скоростей растёт и конструктивная сложность и потребляемое электричество. Рано или поздно (скорее, рано) мы во что-нибудь упрёмся.<br/>
<br/>
В случае silicon photonics микросхема PHY переносится внутрь самого чипа коммутации. В кристалл «встраиваются» фотонные порты, позволяющие осуществлять коммуникации между чипами на скорости света через оптическую среду. <br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/sip.jpg" width="600"/><br/>
<i><a href="https://seekingalpha.com/article/4276568-important-development-of-this-century" target="_blank" rel="nofollow">Источник</a>.</i><br/>
<br/>
Идея не новая, и только ожидавшая своего времени, а именно, когда технологии достигнут нужного уровня зрелости.<br/>
Проблема была в том, что материалы и процессы, используемые для производства фотонных чипов, были фундаментально несовместимы с процессом производства кремниевых чипов — <a href="https://ru.wikipedia.org/wiki/%D0%9A%D0%9C%D0%9E%D0%9F" target="_blank" rel="nofollow">CMOS</a>.<br/>
<br/>
Из возможных альтернативных решений: установка на плату отдельного чипа, преобразующего электрический сигнал в оптический, или его установка внутрь сетевого чипа, но не на сам кристалл (всё ещё требует конвертации среды).<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/sip_options.jpg" width="500"/><br/>
<br/>
Но эта технологическая плотина смыта упорными разработками в этом направлении, и в скором будущем микроэлектронику ждут большие изменения. <br/>
<br/>
Весьма <a href="https://seekingalpha.com/article/4276568-important-development-of-this-century" target="_blank" rel="nofollow">занимательная статья</a> с историей вопроса и сегодняшними реалиями.<br/>
<br/>
<blockquote>Кстати, был у нас в <a href="https://linkmeup.ru/blog/164.html" rel="nofollow">гостях Compass EOS</a>, которые разработали co-packaged optics ещё до того, как это стало модным. Но, увы, они настолько опередили своё время, что оказались в тот момент никому не нужны. И постигла их ужасающе печальная судьба быть купленным не то Ростелекомом, не то Роснано. Впрочем, возможно, история звучала совсем иначе :).<br/>
</blockquote><br/>
<blockquote>И прямо во время написания этой статьи 5-го марта 2х20 Intel <a href="https://newsroom.intel.com/news/intel-demonstrates-industry-first-co-packaged-optics-ethernet-switch/" target="_blank" rel="nofollow">опубликовал в своём блоге новость</a> о том, что они продемонстрировали первый свитч, в котором им удалось интегрировать свой интеловский silicon photonics в барефутовский Tofino2.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/intel_sp.jpg" width="600"/><br/>
<i><a href="https://newsroom.intel.com/news/intel-demonstrates-industry-first-co-packaged-optics-ethernet-switch/" target="_blank" rel="nofollow">Источник</a>.</i><br/>
</blockquote><hr/><br/>
<br/>
Теперь от вещей мирских к тому, сколько кругов пакет проходит в чипе.<br/>
<br/>
<a name="LOGICAL_ARCHITECTURE" rel="nofollow"></a><br/>
<h2>Логическое устройство</h2><br/>
Типичный сетевой ASIC представляет из себя конвейер, по которому пакет передаётся от входного интерфейса к выходному, а по пути с ним случаются приключения. Английский термин для этого — Pipeline.<br/>
<br/>
Хотя с виду и не скажешь:<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/broadcom_chipset.png" width="600"/><br/>
<br/>
В самом общем виде Pipeline выглядит так:<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/pipeline.png" width="800"/><br/>
<i><a href="https://platformlab.stanford.edu/Seminar%20Talks/programming_line_rate_switches.pdf" target="_blank" rel="nofollow">Источник</a></i>.<br/>
<br/>
Пакет проходит через все стадии как минимум один раз, но для реализации сложных действий, вроде дополнительной инкапсуляции (VXLAN), может отправиться повторно.<br/>
<br/>
<a name="PARSER" rel="nofollow"></a><br/>
<h3>Parser</h3><br/>
Сначала на вход попадает пакет с неизвестным набором заголовков.<br/>
Парсер разбирает все заголовки, отделяя их от собственно данных. <br/>
Если это L2-коммутатор, то его заинтересует только заголовки Ethernet и VLAN.<br/>
Если это MPLS-коммутатор, он заглянет в MPLS заголовки.<br/>
Для L3 соответственно IPv4 и IPv6.<br/>
Если это VXLAN-терминатор, ему понадобится UDP и собственно заголовок VXLAN.<br/>
Для целей ECMP и ACL, парсер заглянет в UDP/TCP.<br/>
<br/>
Строго говоря, на какие заголовки и какие поля в них надо смотреть, определяет фантазия разработчика.<br/>
Сколько заголовков забрать? Как правило парсер вынимает фиксированное для чипа значение байтов от пакета и разделывает уже их. И это значение является одним из <a href="https://fs.linkmeup.ru/images/articles/buffers/crazyencap.jpg" target="_blank" rel="nofollow">ограничений чипа</a>.<br/>
<br/>
Почему парсинг заголовков задача нетривиальная рассказывается в совместном исследовании Стэнфорда и Майкрософта: <a href="http://klamath.stanford.edu/~nickm/papers/ancs48-gibb.pdf" target="_blank" rel="nofollow">Design Principles for Packet Parsers</a>.<br/>
<br/>
<a name="PREINGRESS_ANGINE" rel="nofollow"></a><br/>
<h3>Pre-Ingress processing</h3><br/>
Иногда логически выделяют этот блок, который совершает действия, не являющиеся ни парсингом, ни как таковым лукапом — он кладет пакет в нужный VRF, ставит внутренний Traffic Class итд.<br/>
<br/>
<a name="IMOCHACTION" rel="nofollow"></a><br/>
<h3>Ingress Match-Action</h3><br/>
Когда парсер, разобрался с чем он имеет дело, он передаёт заголовки дальше — в модули Match-Action.<br/>
Здесь происходит lookup. Для L2 поищем MAC'и, для L3 — прошерстим FIB, для MPLS — просмотрим в LFIB.<br/>
И здесь же принимается решение, что с пакетом делать дальше: доложить CPU, пропустить/дропнуть, побалансировать, в какой порт отправить, какие заголовки навесить, с каким приоритетом внутри чипа обработать, полисить ли/шейпить ли его итд.<br/>
<br/>
Собственно действие записано в той же таблице, в которой происходит lookup.<br/>
<br/>
Это если коротко. <br/>
А если чуть подлиннее, то:<br/>
<br/>
<h4>L2 short pipeline</h4>Приходящий L2-пакет всегда ассоциируется с VLAN. Тег VLAN проверяется через <b>VLAN Lookup Table</b>.<br/>
Если VLAN lookup успешен, просматриваются таблицы: <b>VLAN STP</b>, <b>VLAN Port Bitmap</b>, <b>Port Filtering Mode</b> (PFM).<br/>
Если же тег неверный, то пакет сбрасывается (или нет).<br/>
После пакет проходит стандартную обработку: запомнить SRC MAC, посмотреть в таблице DST MAC, — но при этом могут быть применены дополнительные флаги, например, отправить на CPU unknown sender. <br/>
<br/>
<h4>L3 short pipeline</h4>Если DST MAC является MAC'ом самого устройства, то процессинг передается в L3 модуль.<br/>
Следующий шаг — Destination Lookup. Сначала используется <b>L3 Table Lookup</b>, в этой таблице как правило directly attached хосты. <br/>
Если адрес найден, то выдается index в <b>L3 Interface Table</b>, в котором выходной порт, MAC, VLAN.<br/>
Если же в L3 table не найден адрес, то делается LPM поиск (Longest Prefix Match). Результат такого поиска — index в L3 Table Lookup таблице, который должен использоваться для форвардинга. После удачного поиска, чип поменяет SA/DA/VID пакета (L2), посчитает FCS, поменяет TTL и IP checksum. <br/>
<br/>
<a name="TM" rel="nofollow"></a><br/>
<h3>Traffic Manager + MMU</h3><br/>
В этом блоке происходят следующие операции:<br/>
<ul><li>Постановка пакетов в очередь</li><li>Их хранение (буферизация)</li><li>Контроль перегрузок</li><li>Диспетчеризация </li><li>Репликация</li></ul><br/>
Он состоит из двух частей — MMU и TM. Первый отвечает за управление памятью и буферами, второй — за QoS и мультикаст.<br/>
<br/>
<b>MMU</b> — Memory Management Unit — компонент чипа, который управляет физической памятью. <br/>
Одна из его функций аналогична MMU (блоку управления памятью) обычного компьютера — доступ приложений к физической памяти и её защита.<br/>
Но список его обязанностей гораздо шире, поскольку заточен он на работу именно с пакетами. Он отслеживает как память распределяется между интерфейсами и насколько она занята в каждый момент времени, можно ли поместить пакет в буфер, если да, то в какой, как разбить его на более мелкие ячейки, ну и, конечно, как его оттуда забрать.<br/>
<br/>
<b>TM</b> — Traffic Manager — решает более высокоуровневые задачи — выделение очередей, помещение в них трафика, диспетчеризация, шейпинг, полисинг, управление перегрузками. В общем, всё, что относится к QoS, а так же к мультикасту.<br/>
<blockquote>С мультикастом история, право, интересная (как всегда). Репликацией мультикастовых пакетов занимается блок TM. В модульных устройствах это происходит в два этапа: сначала на входном чипе создаётся столько копий, сколько выходных чипов должны получить этот пакет, а затем на выходных чипах ещё столько копий, сколько портов на этой плате должны его получить. Делается это для того, чтобы лишними копиями не загружать фабрику.<br/>
Любопытный момент с буферизацией и контролем перегрузок: входной чип должен учитывать занятость выходного порта, прежде, чем отправлять пакет, потому что именно входная плата управляет <a href="#VOQ" rel="nofollow">VOQ</a>. Поскольку Traffic Manager оперирует не самими пакетами, а по сути информацией о них, то ему необязательно делать сразу копий по числу выходных портов, а достаточно записать об этом информацию в VOQ.<br/>
</blockquote><br/>
<br/>
MMU — это не совсем часть TM — это, скорее, два взаимодействующих друг с другом блока.<br/>
<br/>
Память и буферизация на сетевых устройствах — это настолько масштабная тема, что ей я посвятил отдельную статью, которая выйдет на nag.ru прямо следом за этой. В ней мы разберёмся с устройством и архитектурой памяти, видами и расположением буферов, арбитражем и поднимем самый горячий вопрос современности — что лучше: большие и маленькие буферы.<br/>
<br/>
В разговорах о буферах связка TM+MMU — одни из важнейших блоков ASIC'а (или внешний чип), поэтому к ним мы ещё вернёмся <a href="#BUFERA" rel="nofollow">ниже</a>.<br/>
<br/>
<a name="EMOCHACTION" rel="nofollow"></a><br/>
<h3>Egress Match-Action</h3><br/>
Далее над заголовками пакетов могут быть совершены дополнительные акты — например, выходной ACL, туннельные инкапсуляции, сбор статистики итд.<br/>
<br/>
<a name="DEPARSER" rel="nofollow"></a><br/>
<h3>Deparser</h3><br/>
К этому моменту на основе результатов обработки в блоках Match-Action сформирован список новых заголовков, и он может воссоединиться с телом пакета. <br/>
Сам пакет теперь готов в последний путь внутри этого чипа, чтобы выйти через выходной интерфейс.<br/>
<br/>
Кроме того, здесь может собираться дополнительная статистика о длине пакетов и сообщаться блоку TM и зеркалироваться исходящий трафик.<br/>
<br/>
Вышеуказанные стадии могут быть выполнены в пределах одного чипа, а могут быть и разнесены на разные.<br/>
Так, в случае single-chip-коробки — все они скомпонованы в один кусочек силикона, площадью с фотку на документы.<br/>
На модульных коробках Parser и Ingress Match-Action — это входной чип коммутации, Egress Match-Action и Deparser — выходной, TM стоит отдельно между чипом коммутации и фабрикой, и может быть разделён на Ingress и Egress. Кроме того в модульных устройствах могут существовать ещё и отдельные чипы Fabric Interface, которые разбивают пакеты на ячейки одного размера и отправляют в фабрику.<br/>
<br/>
<hr/><br/>
<br/>
<a name="PIPELINE" rel="nofollow"></a><br/>
<h2>Pipeline</h2><br/>
Пайплайном называется весь процесс доставки пакета от парсера до депарсера. <br/>
Что хорошо — можно делать несколько Match-Action подряд, например, отлукапив сначала Ethernet, потом IP, потом ещё и TCP для <a href="https://linkmeup.ru/blog/482.html" rel="nofollow">ECMP</a>.<br/>
<br/>
Что плохо — число этих действий строго ограничено — ASIC вещь достаточно детерминированная. <br/>
Это ведёт к тому, что некоторые вещи становятся аппаратно невозможны. К примеру, на старых Trident'ах нельзя было сделать и VXLAN и IP lookup последовательно для одного пакета. Или в другой ситуации коробка у меня не могла снять метку, сделать рекурсивный IP-lookup и навесить две новые метки.<br/>
<br/>
Однако у таких трудностей есть как минимум три решения:<br/>
1) Второй чип. Тогда можно и разнести невозможные прежде операции на два этапа. И история знает такие решения.<br/>
2) Рециркуляция. Многие чипы позволяют закольцевать выход чипа на вход и прогнать пакет дважды. Тогда на второй итерации ему можно задать уже другой набор Match-Action. Но за это придётся заплатить — удвоенной задержкой и уменьшенной полосой пропускания чипа. А ещё можно упереться и в пропускную способность самого рециркулятора.<br/>
3) Купить другой чип… Другой коммутатор… Поменять работу…<br/>
<br/>
<a name="PROGRAMMABLE_PIPELINE" rel="nofollow"></a><br/>
<h2>Programmable Pipeline</h2><br/>
В большинстве современных коммутаторов конвейер обработки пакетов запечён производителем в софт (если не в кремний) — он фиксирован и может быть изменён только вендором чипсета.<br/>
<blockquote>Не путать с Programmable ASIC. Программируемые микросхемы — уже давно реальность. Многие сетевые чипы — это ASIC с возможность программирования. Но эта возможность есть только у производителя микросхемы.<br/>
Порграммируемый конвейер же — это возможность изменять логику работы чипа в определённых пределах, которую предоставляет производитель микросхемы покупателям.<br/>
</blockquote><br/>
Не так давно появился Barefoot Tofino, у которого полностью программируемый Pipeline — с ним можно задавать совершенно любые условия для парсера, поля для Match и действия для Action — хоть калькулятор пишите, или распределённое хранилище на кластере коммутаторов.<br/>
<br/>
На сегодняшний день выпускать сетевую микросхему на рынок без возможности программирования Pipeline'а, становиться плохим тоном.<br/>
Так, последние чипы Broadcom тоже уже <a href="https://www.broadcom.com/blog/trident4-and-jericho2-offer-programmability-at-scale" target="_blank" rel="nofollow">программируемы</a>.<br/>
<br/>
Не то чтобы теперь каждый домовой оператор кинется переписывать себе пайплайны, нанимая студентов для разработки под <a href="https://www.hotchips.org/wp-content/uploads/hc_archives/hc29/HC29.20-Tutorials-Pub/HC29.20.1-P4-Soft-Net-Pub/HC29.21.100-P4-Tutorial.pdf" rel="nofollow">P4</a> или <a href="https://nplang.org/" target="_blank" rel="nofollow">NPL</a>, но это возможность, которая позволяет вендорам железа и крупным потребителям вроде гугла быть гораздо более гибкими. <br/>
Так, например, если в вашей сети все линки p2p, то зачем вам Ethernet? тратить на него такты ASIC'а ещё — просто выкидываем его.<br/>
<br/>
Правда «можно всё запрограммировать» превращается в наших реалиях «придётся всё запрограммировать». На сегодняшний день готовых конструктивных блоков, вроде парсинга Ethernet, IP, подсчёта статистики итд — не существует — всё с нуля.<br/>
Если не использовать вендорские бинари, то весь Pipeline <b>придётся</b> написать самому. А если использовать, то ничего за пределами SDK не запрограммируешь.<br/>
<br/>
Но на большинстве современных коммутаторов всё ещё фиксированный конвейер, который выглядит примерно так:<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/single_pipeline_block.png" width="800"/><br/>
<br/>
<b>Дальнейшее чтиво:</b><br/>
Cisco всё ещё делает классную документацию, а презентации с Cisco Live — кладезь технических сокровищ. Например, они рассказывают о бродкомовских чипах больше, чем сам Бродком (если, конечно, вы не подписали NDA кровью): <a href="https://people.ucsc.edu/~warner/Bufs/BRKDCN-3734.pdf" rel="nofollow">Cisco Nexus 3000 Switch Architecture</a><br/>
<br/>
Вот у P4 есть неплохое описание конвейера и его программируемости: <a href="https://www.hotchips.org/wp-content/uploads/hc_archives/hc29/HC29.20-Tutorials-Pub/HC29.20.1-P4-Soft-Net-Pub/HC29.21.100-P4-Tutorial.pdf" rel="nofollow">P4 Tutorial, Hot Chips 2017</a>.<br/>
<br/>
Более фундаментальное и низкоуровневое описание <b>RMT</b> — Reconfigurable Match Tables, необходимых для возможности программирования: Forwarding Metamorphosis: <a href="https://www2.cs.duke.edu/courses/fall19/compsci514/papers/rmt-sigcomm2013.pdf" target="_blank" rel="nofollow">Fast Programmable Match-Action Processing in Hardware for SDN</a>.<br/>
<hr/><br/>
<br/>
<a name="BUFERA" rel="nofollow"></a><br/>
<h1>Память и буферы</h1><br/>
Ну вот мы и добрались до ниточки, с которой клубок начал распутываться.<br/>
<br/>
<blockquote><i>Да, не удивляйтесь — впереди ещё две третьих статьи, и я всё оставшееся место посвящу только буферам — ради них ведь всё и затевалось.</i><br/>
</blockquote><br/>
Всё, что было выше, касалось заголовков пакетов — они отделялись и подвергались алгоритмическим экзекуциям в пайплайне.<br/>
А где же прохлаждались их тела всё это время?<br/>
<br/>
В сетевых чипсетах есть встроенная память (<b>on chip-OCB</b>) как раз для хранения тел. Её размер в силу физических ограничений очень мал (до 100Мб), но для большинства задач — это разумный компромисс.<br/>
Лишь в редких сценариях этого не хватает и добавляется объёмная внешняя память — <b>off-chip</b>.<br/>
<blockquote>Вообще про компромиссы мало-много памяти поговорим <a href="#SHALLOW_VS_DIPPER" rel="nofollow">отдельно</a>.<br/>
</blockquote><br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/buffer_memory.png" width="500"/><br/>
<br/>
Таким образом на входе в чип парсер отделяет заголовки от тел, первые отдаёт на анализ в блок Match-Action, вторые — складывает в буфер.<br/>
На выходе новые заголовки пришивают к извлечённым обратно телам и отправляют на выход.<br/>
Будучи неоднократно обвинённым при рецензировании этой статьи, чувстую необходимость ещё раз повторить это: внутри чипа коммутации заголовки отделяются от тела пакета. В то время, как изначальные заголовки анализируются, помогают сделать лукап, уничтожаются, формируются новые, тело находится в одном месте физической памяти, не перемещаясь. Даже в тот момент, когда Traffic Manager выстраивает пакеты в очередь согласно их приоритетам, производит их диспетчеризацию и Congestion Avoidance, фактически он работает со внутренними временными заголовками, не двигая пакеты по памяти. <br/>
<br/>
Управляет доступом к физической памяти <b>MMU — Memory Management Unit</b>. Он довольно похож на MMU в компьютерах (по сути является <a href="https://en.wikipedia.org/wiki/Memory_management_unit" rel="nofollow">им</a>). Программа обращается к указателю, чтобы извлечь данные из памяти, MMU транслирует это в реальный адрес ячейки и возвращает данные. <br/>
<br/>
MMU занимается размещением пакетов в буферах, их извлечением или отбрасыванием. Он же контролирует разделение памяти на области (dedicated, shared, headroom, voq) и их загрузку.<br/>
<br/>
За более верхнеуровневое управление очередями и перегрузками отвечает блок <b>TM — Traffic Manager</b>.<br/>
<br/>
Есть два подхода к размещению тел в буферах: <b>Store-and-Forward</b> и <b>Cut-Through</b>.<br/>
<hr/><br/>
<br/>
<a name="SFVSCT" rel="nofollow"></a><br/>
<h2>Store-and-Forward vs Cut-Through</h2><br/>
<b>SF — Store and Forward</b> предполагает, что чип сначала получает полностью пакет, сохраняет в буфере, а уже потом занимается вивисекцией.<br/>
После анализа заголовков пакет помещается в правильную выходную очередь.<br/>
Исторически это первый метод коммутации. Его преимущество в том, что он может, получив пакет целиком, проверить контрольную сумму и выбросить побитые.<br/>
<br/>
<b>CT — Cut-Through</b>, напротив, сразу после получения первых нескольких десятков байтов пакета, позволяющих принять решение о его судьбе, отправляет его в выходную очередь, не дожидаясь его полной доставки.<br/>
Это позволяет сэкономить до нескольких микросекунд на обработке пакета внутри коробки, ценою, однако, отсутствия проверки целостности — ведь FCS-то в конце. Эта задача перекладывается на протоколы более высокого уровня (или на следующий хоп).<br/>
<br/>
Такой режим используется для приложений, требующих ультра-коротких задержек.<br/>
<br/>
<blockquote>К слову на сегодняшний день для коммутаторов 2-го уровня время обработки в пределах устройства порядка 200нс, 3-го — 250нс.<br/>
<br/>
Для коммутаторов 1-го уровня (фактически патч-панель) это время — около 5 нс.<br/>
</blockquote><br/>
Многие производители сегодня по умолчанию устанавливают режим Cut-Through, поскольку ошибки на Ethernet сегодня явление сравнительно нечастое, а приложение обычно само может обнаружить проблему и запросить переотправку (или не запрашивать, кстати).<br/>
<br/>
<b>Дальнейшее чтение</b>:<br/>
Весьма глубокий подкоп под режимы коммутации от циски: <a href="https://www.cisco.com/c/en/us/products/collateral/switches/nexus-5020-switch/white_paper_c11-465436.html" rel="nofollow">Cisco Nexus 5000 Series Switches</a><br/>
<hr/><br/>
<br/>
<a name="CONGESTIONS" rel="nofollow"></a><br/>
<h2>Перегрузки: причины и места</h2><br/>
Буфер нужен на сетевом устройстве не только для того, чтобы похранить тело пакета, пока его заголовки перевариваются в кишках чипа.<br/>
Как минимум нужно сгладить поток пакетов до скорости выходного интерфейса. Грубо говоря, пока один пакет сериализуется для передачи в интерфейс, второму нужно где-то подождать.<br/>
Для этой задачи обычно хватит совсем небольшой FIFO очереди. <br/>
Другая важнейшая сетевая задача — перегрузки (congestion). Если в один интерфейс одновременно сваливается много пакетов, их тоже нужно сохранить.<br/>
<br/>
Причём перегрузки — это наша повседневная легитимная реальность, а не что-то крайне редкое, что нужно перетерпеть и станет попроще.<br/>
Во времена коммутации каналов такой проблемы не стояло — для любой общающейся пары всегда было зарезервировано строго необходимое количество ресурсов.<br/>
Сегодня совершенно законно на порт может прийти больше трафика, чем тот готов сиюминутно пропустить.<br/>
<hr/><br/>
<br/>
<a name="CONGESTION_REASONS" rel="nofollow"></a><br/>
<h3>Причины перегрузок</h3><br/>
Самая простая — из высокоскоростного интерфейса трафик должен слиться в более низкоскоростной — из <b>10G в 1</b>, например.<br/>
Другая причина, очень распространённая в сетях крупных ДЦ, особенно в тех, где развёрнуты кластеры Map-Reduce — это <b>Incast</b>. Это ситуация, в которой одна машина отправляет запрос на десятки/сотни/тысячи, а те все разом начинают отвечать, и пакеты стопорятся на узком интерфейсе в сторону машины-инициатора.<br/>
Более общий случай — трафик с нескольких входящих портов должен влиться в один исходящий — <b>Backpressure</b>.<br/>
Прочие типы всплесков трафика, которые ещё называют бёрстовыми или просто бёрстами (<b>Bursts</b>).<br/>
<br/>
Поэтому однозначно нужно побольше памяти для буферизации. Но фактически это место, где пакеты обрастают задержкой.<br/>
Так на заре 1G буферизация вызывала массу головной боли у трейдеров, чьи приложения получали свой бесценный трафик с задержкой и джиттером.<br/>
<br/>
И поэтому тут уже недостаточно везде FIFO. Это задача, во благо которой трудится <a href="https://linkmeup.ru/blog/365.html" rel="nofollow">QoS</a>.<br/>
<br/>
Если случилась конгестия, то нужно иметь возможность требовательный к задержкам трафик, пропустить первым, чувствительный к потерям — не дропнуть, а наименее ценным пожертвовать. <br/>
Ещё нужно уметь пополисить и пошейпить. <br/>
<br/>
Но в каком месте располагать эту память и где реализовывать QoS?<br/>
<hr/><br/>
<br/>
<a name="CONGESTION_POINTS" rel="nofollow"></a><br/>
<h3>Места возникновения перегрузок</h3><br/>
Их по большому счёту 4: <br/>
<ol><li><b>на входном чипе</b> — если со стороны интерфейсов на него поступает больше, чем он способен обработать.</li><li><b>на фабрике коммутации</b> (если коробка модульная) — если линейные карты пытаются отправить на фабрику больше, чем она способна обработать.</li><li><b>на выходной линейной карте</b>, если фабрика пытается передать на линейную карту больше, чем её чип способен обработать</li><li><b>на выходном интерфейсе</b> — если чип шлёт в интерфейс больше, чем тот способен сериализовать.</li></ol><br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/congestion_points.svg" width="600"/><br/>
<br/>
Но никто не хочет бороться с перегрузками в четырёх местах.<br/>
Поэтому обычно<br/>
А) Чип делают такой производительности, чтобы он смог обработать весь трафик, даже если тот начал одновременно поступать со всех портов на этой линейной карте. Поэтому для устройства со 128 портами 100Гб/с используется чип с производительностью 12,8Тб/с.<br/>
Очевидно бывают и исключения. Тогда или имеем непредсказуемые потери, или (чаще) невозможность использовать часть портов.<br/>
Б) Фабрику так же делают без переподписки, чтобы она могла провернуть весь трафик, который пытаются в неё передать все линейные карты, даже если они делают это одновременно на полной скорости. Таким образом не нужно буферизировать трафик и перед отправкой на фабрику.<br/>
В) Управление перегрузками на выходном чипе и выходном интерфейсе сводят в одно место.<br/>
<br/>
<blockquote>На самом деле фабрика без передподиски (или неблокируемая) — это та ещё спекуляция, к которой нередко прибегают маркетологи. <br/>
Для некоторых сценариев, например, <a href="#CIOQ" rel="nofollow">CIOQ</a> даже со speedup фабрики в пару раз от необходимого есть строгие результаты, показывающие, при каких условиях она будет неблокируемой.<br/>
Можно почитать у достопочтенных выпускников MIT и Стэнфорда: <a href="http://yuba.stanford.edu/~nickm/papers/CSL-TR-97-738.pdf" target="_blank" rel="nofollow">On the speedup required for combined input and output queued switching</a>.<br/>
</blockquote><br/>
<hr/><br/>
<br/>
<a name="BUFFER_ARCHITECTURE" rel="nofollow"></a><br/>
<h2>Архитектура буферов</h2><br/>
И вот тут на сцену выходит TM — Traffic Manager, который реализует функции QoS (и некоторые другие).<br/>
Он может быть частью чипа коммутации, а может быть отдельной микросхемой — для нас сейчас важно то, что он заправляет буферами.<br/>
<br/>
Буфер — это с некоторыми оговорками обычная память, используемая в компьютерах. В ней в определённой ячейке хранится пакет, который чип может извлечь, обратившись по адресу. <br/>
<br/>
Любой сетевой ASIC или NP обладает некоторым объёмом встроенной (on-chip) памяти (порядка десятков МБ).<br/>
Так называемые Deep-Buffer свитчи имеют ещё внешнюю (off-chip) память, исчисляемую уже гигабайтами.<br/>
И той и другой управляет модуль чипа — MMU.<br/>
<br/>
В целом для нас пока местонахождение не имеет значения — взглянем на это <a href="#SHALLOW_VS_DIPPER" rel="nofollow">попозже</a>. Важно то, как имеющейся памятью чип распоряжается, а именно, где и какие очереди он создаёт и какие <a href="https://en.wikipedia.org/wiki/Active_queue_management" target="_blank" rel="nofollow">AQM</a> использует. <br/>
<br/>
И тут практикуют:<br/>
<br/>
<ul><li><a href="#CROSSBAR" rel="nofollow">Crossbar</a></li><li><a href="#SHARED_BUFFER" rel="nofollow">Shared Buffer</a></li><li><a href="#OQ" rel="nofollow">Output Queuing</a></li><li><a href="#IQ" rel="nofollow">Input Queueing</a></li><li><a href="#CIOQ" rel="nofollow">Combined Input and Output Queueing</a></li><li><a href="#VOQ" rel="nofollow">Virtual Output Queueing</a></li></ul><hr/><br/>
<br/>
<a name="CROSSBAR" rel="nofollow"></a><br/>
<h3>Crossbar</h3><br/>
Идея в том, чтобы для каждой пары (входной интерфейс — выходной интерфейс) выделить аппаратный буфер.<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/crossbar.png" width="500"/><br/>
<br/>
Это, скорее, умозрительный эксперимент, потому что в плане сложности, стоимости реализации и эффективности это проигрышный вариант.<br/>
<hr/><br/>
<br/>
<a name="SHARED_BUFFER" rel="nofollow"></a><br/>
<h3>Shared Buffer</h3><br/>
По числу существующих в мире коробок этот вариант, однозначно, на первом месте. <br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/shared_buffer.png" width="500"/><br/>
<br/>
Используется Shared Buffer на немодульных устройствах без фабрики коммутации, в которых установлен один чип (обычно, но может быть больше).<br/>
<br/>
Аппаратно — это память (обычно SRAM), встроенная прямо в чип — она так и называется <b>on-chip</b> (OCB). Много туда не засунешь, поэтому объём до 100 МБ.<br/>
Зачастую это единственная память, которая в одночиповых устройствах используется для буферизации.<br/>
Пусть, однако, эта кажущаяся простота не вводит вас в заблуждение — для того, чтобы в десятки мегабайтов поместить трафик сотни портов 100Гб/с, да ещё и обеспечить отсутствие потерь, за ними должны скрываться годы разработок и нетривиальная архитектура.<br/>
А так оно и есть — я чуть ниже неглубоко вас окуну.<br/>
<br/>
Итак, есть соблазн эту память взять и просто равномерно разделить между всеми портами. Такой статический дизайн имеет право на жизнь, но сводит на нет возможность динамически абсорбировать всплески трафика.<br/>
<br/>
Гораздо более привлекательным выглядит следующий вариант:<br/>
<br/>
<a name="DEDICATED" rel="nofollow"></a><br/>
<h4>Dedicated + Shared</h4>Из доступной памяти каждому порту выделяется определённая небольшая часть — это <b>Dedicated Buffer</b>. За каждым портом кусочек памяти законодательно закреплён и не может быть использован другими портами. То есть при любых обстоятельствах у порта будет свой защищённый кусочек. Минимальный размер Dedicated Buffer где-то настраивается, где-то нет. Но лучше без основательного понимания в дефолты не лезть.<br/>
Доля каждого порта в абсолютных цифрах очень маленькая — порядка единиц кБ.<br/>
Гарантируемый минимум выделяется для хранения как входящих пакетов, так и выходящих.<br/>
<br/>
Остальная часть памяти как раз общая — <b>Shared Buffer</b> — может быть использована любым портом по мере необходимости. Из неё динамически выделяются куски для тех интерфейсов, которые испытывают перегрузку. <br/>
Например, если чип пытается на один из интерфейсов передать больше трафика, чем тот способен отправлять в единицу времени, то эти пакеты сначала заполняют выделенный для этого порта буфер, а когда он заканчивается, автоматически начинают складываться в динамически выделенный буфер из общей памяти. Как только все пакеты обработаны, память освобождается.<br/>
Под общий буфер может быть отдано 100% той памяти, что осталась после вычитания из неё выделенных для портов кусочков (Dedicated). Но она так же может быть перераспределена — за счёт общего буфера можно увеличить выделенные. Так, если выделить 80% под Shared, то оставшиеся 20% равномерно распределятся по Dedicated.<br/>
<br/>
Наличие Shared Buffer'а решает огромную проблему, позволяя сглаживать всплески трафика, когда перегрузку испытывает один или несколько интерфейсов.<br/>
<br/>
Однако вместе с тем за общую память начинаются соревноваться разные порты одновременно. И серьёзная перегрузка на одном порту может вызвать потери на другом, которому нужно было всего лишь несколько килобайтов общей памяти, чтобы не дропнуть пакет.<br/>
Одним из способов облегчить эту ситуацию является увеличение выделенных буферов за счёт уменьшения общего.<br/>
Но это всегда зона компромиссных решений — сокращая размер общей памяти, мы уменьшаем и объёмы всплесков, которые чип может сгладить.<br/>
Кроме того <a href="#LLLL" rel="nofollow">Lossless трафик</a> требует к себе ещё более щепетильного отношения.<br/>
<br/>
Поэтому зачастую, помимо Dedicated и Shared буферов, резервируют ещё <b>Headroom buffers</b>.<br/>
<br/>
<a name="HEADROOM" rel="nofollow"></a><br/>
<h4>Headroom buffers</h4>Это последний способ сохранить пакеты, когда даже общий буфер уже забит. Естественно, он тоже отрезается от общей памяти, поэтому на первый взгляд выглядит не очень логичным откусить от общей памяти кусок, назвать его по-другому и сказать, мол, мы всё оптимизировали.<br/>
На самом деле Headroom буферы решают довольно специфическую задачу — помочь lossless приложениям с <b>PFC</b> — <a href="https://www.juniper.net/documentation/en_US/junos/topics/concept/cos-qfx-series-congestion-notification-understanding.html#jd0e554" target="_blank" rel="nofollow">Priority-based Flow Control</a>.<br/>
<br/>
PFC — это механизм Ethernet Pause, который умеет притормаживать не всю отправку, а только по конкретным приоритетам Ethernet CoS.<br/>
Например, два приложения на отправителе: RoCE и репликация БД. Первое — чувствительная к задержкам и потерям вещь, второе — массивные данные.<br/>
Коммутатор, заметив заполнение общего буфера, отправляет Pause для более низкого приоритета, тем самым притормаживая репликацию, но не RoCE.<br/>
Задача буфера Headroom здесь в том, чтобы сохранить те пакеты приоритетной очереди, что сейчас в кабеле, пока Pause летит к отправителю с просьбой притормозить.<br/>
То есть пакеты репликации начнут дропаться, когда заполнится общий буфер, а пакеты RoCE будут складываться в Headroom. <br/>
<blockquote>Помимо lossless headroom бывает и headroom для обычного трафика, чтобы помочь сохранить более приоритетный. Но это на домашнее задание.<br/>
</blockquote><br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/buffer_types.svg" width="800"/><br/>
<br/>
При наступлении перегрузки буферы будут задействованы в следующем порядке.<br/>
Для входящего best-effort трафика:<br/>
<ol><li>Dedicated buffers</li><li>Shared buffers</li></ol><br/>
Для входящего lossless трафика:<br/>
<ol><li>Dedicated buffers</li><li>Shared buffers</li><li>Lossless headroom buffers</li></ol><br/>
Для всего исходящего трафика:<br/>
<ol><li>Dedicated buffers</li><li>Shared buffers</li></ol><br/>
Разумеется, описанное выше лишь частный пример, и от вендора к вендору ситуация может различаться (разительно).<br/>
<br/>
Например бродкомовские чипы (как минимум Trident и Tomahawk) имеют внутреннее разделение памяти по группам портов. Общая память делится на порт-группы по 4-8 портов, которые имеют свой собственный кусочек общего буфера. Порты из одной группы, соответственно буферизируют пакеты только в своём кусочке памяти и не могут занимать другие. Это тоже один из способов снизить влияние перегруженных портов друг на друга. Такой подход иногда называют <b>Segregated Buffer</b>.<br/>
<br/>
<a name="ADMISSION_CONTROL" rel="nofollow"></a><br/>
<h4>Admission Control</h4>Admission Control — входной контроль — механизм, который следит за тем, можно ли пакет записывать в буфер. Он не является специфичным для Shared-буферов, просто в рамках статьи — это лучшее место, чтобы о нём рассказать.<br/>
<br/>
Формально Admission Control делится на Ingress и Egress.<br/>
Задача <b>Ingress Admission Control</b> — во-первых, вообще убедиться, что в буфере есть место, а, во-вторых, обеспечить справедливое использование памяти.<br/>
Это означает, что у каждого порта и очереди всегда должен быть гарантированный минимальный буфер. А ещё несколько входных портов не оккупируют целиком весь буфер, записывая в него всё новые и новые пакеты.<br/>
<br/>
Задача <b>Egress Admission Control</b> — помочь чипу абсорбировать всплески, не допустив того, чтобы один или несколько выходных портов забили целиком весь буфер, получая всё новые и новые пакеты с кучи входных портов.<br/>
<br/>
В случае Shared Buffer оба механизма срабатывают в момент первичного помещения пакета в буфер. То есть никакой двойной буферизации и проверки не происходит. <br/>
<br/>
Как именно понять, сколько буфера занято конкретным портом/очередью и главное, сколько ещё можно ему выдать?<br/>
Это может быть статический порог, одинаковый для всех портов, а может быть и динамически меняющийся, регулируемый параметром <b>Alpha</b>.<br/>
<br/>
<a name="ALPHA" rel="nofollow"></a><br/>
<h4>Alpha</h4>Итак, почти во всех современных чипах память распределяется динамически на основе информации о том, сколько общей памяти вообще свободно и сколько ещё можно выделить для данного порта/очереди.<br/>
<br/>
На самом деле минимальной единицей аккаунтинга является не порт/очередь, а регион (в терминологии Мелланокс). Регион — это кортеж: <i>(входной порт, Priority Group на входном порту, выходной порт, Traffic Class на выходном порту)</i>.<br/>
<br/>
Каждому региону назначается динамический порог, сколько памяти он может под себя подмять. При его превышении, очевидно, пакеты начинают дропаться, чтобы не влиять на другие регионы.<br/>
Этот порог вычисляется по формуле, множителями которой являются объём свободной на данный момент памяти и параметр <b>alpha</b>, специфичный для региона и настраиваемый:<br/>
<pre class="prettyprint"><code>Threshold [Bytes] = alpha * free_buffer [Bytes]</code></pre><br/>
<br/>
Его значение варьируется от 1/128 до примерно 8 с шагом х2. Чем больше эта цифра, тем больший объём свободной памяти доступен региону.<br/>
Например, если на коммутаторе 32 региона, то: <br/>
при alpha=1/64 каждому региону будет доступна 1/64 часть свободной памяти, и даже при максимальной утилизации они все смогут использовать только половину буфера.<br/>
при alpha=1/32 вся память равномерно распределится между регионами, ни один из них не сможет влиять на другие, а при полной утилизации 100% памяти будет занято.<br/>
при alpha=1/16 каждый регион может претендовать на больший объём памяти. И если все регионы разом начнут потреблять место, то им всем не хватит, потому что памяти потребовалось бы 200%. То есть это своего рода переподписка, позволяющая сглаживать всплески.<br/>
<i>Предполагаем тут, что значение alpha одинаково для всех регионов, хотя оно может быть настроено отдельно для каждого.</i><br/>
<br/>
При получении каждого пакета, механизм Admission Control вычисляет актуальный порог для региона, которому принадлежит пакет. Если порог меньше размера пакета, тот отбрасывается.<br/>
Если же больше, то он помещается в буфер и уже не будет отброшен никогда, даже если регион исчерпал все лимиты. Объём свободной памяти уменьшается на размер пакета.<br/>
Это происходит для каждого приходящего на чип пакета.<br/>
<hr/><br/>
<br/>
Написанное выше об Admission Control и Alpha может быть справедливо не только для Shared Buffers, но и для других архитектур, например, VoQ.<br/>
<br/>
<b>Дальнейшее чтиво:</b><br/>
<ul><li>Если в жизни не хватает страданий: <a href="https://montazeri.iut.ac.ir/sites/montazeri.iut.ac.ir/files/file_pubwdet/32083_0.pdf" target="_blank" rel="nofollow">Design and Implementation of a Shared Memory Switch Fabric</a></li><li><a href="https://community.mellanox.com/s/article/understanding-the-alpha-parameter-in-the-buffer-configuration-of-mellanox-spectrum-switches" target="_blank" rel="nofollow">Understanding the Alpha Parameter in the Buffer Configuration of Mellanox Spectrum Switches</a></li><li>Programming Guide'ы коммерческих микросхем (NDA кровью, помним, да?).</li></ul><hr/><br/>
<br/>
Crossbar и Shared Buffer — это архитектуры, которые могут использоваться для устройств фиксированной конфигурации, но не подходят для модульных.<br/>
Взглянем же теперь на них.<br/>
<br/>
Дело в том, что они состоят из нескольких линейных карт, каждая из которых несёт как минимум один самостоятельный чип коммутации.<br/>
И этот чип, будь то ASIC, NP или даже CPU не может в своей внутренней памяти динамически выделять буферы для тысяч очередей выходных интерфейсов — кишка тонка. <br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/modular_chassis.svg" width="800"/><br/>
<br/>
Далее поговорим про архитектуры памяти для модульных шасси:<br/>
<ul><li><a href="#OQ" rel="nofollow">Output Queueing</a></li><li><a href="#IQ" rel="nofollow">Input Queueing</a></li><li><a href="#CIOQ" rel="nofollow">Combined Input and Output Queueing</a></li><li><a href="#VOQ" rel="nofollow">Virtual Output Queueing</a></li></ul><br/>
<a name="OQ" rel="nofollow"></a><br/>
<h3>Output Queueing</h3><br/>
Наиболее логичным кажется буферизировать пакеты как можно ближе к месту возможного затора — около выходных интерфейсов.<br/>
Кому как не выходному чипу знать о здоровье своих подопечных интерфейсов, обслуживать по несколько QoS очередей для каждого и бороться с перегрузками?<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/oq.png" width="500"/><br/>
<br/>
И это правда так.<br/>
Но есть одна фундаментальная проблема — в случае перегрузок пакеты будут приходить на Egress PFE, чтобы умирать. Они проделают весь огромный путь от входного интерфейса через фабрику коммутации до выходного буфера через фабрику для того, чтобы узнать, что мест нет и быть печально дропнутыми.<br/>
Это бессмысленная и бесполезная утилизация полосы пропускания фабрики.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/drop.svg" width="800"/><br/>
<br/>
И вот уже вырисовывается следующая логичная мысль — выбросить пакет нужно как можно раньше.<br/>
Как было бы здорово, если бы мы могли это сделать на входной плате.<br/>
<hr/><br/>
<br/>
<a name="IQ" rel="nofollow"></a><br/>
<h3>Input Queuing</h3><br/>
Более удачным вариантом оказывается буферизировать пакеты на входной плате после лукапа, когда уже становится понятно, куда пакет слать. Если выходной интерфейс заведомо занят, то и смысла гнать камикадзе на фабрику нет.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/iq.png" width="500"/><br/>
<br/>
Постойте! Как же входной чип узнает, что выходной интерфейс не занят? <br/>
<br/>
С точки зрения Data Plane никакой обратной связи, от выходного чипа входному, очевидно, нет. Распространение между ними информации, необходимой для лукапа (некстхопы, интерфейсы, заголовки) производится средствами медленного Control Plane — тоже не подойдёт. <br/>
Так вот для сигнализации такой информации между линейными платами появляется арбитр. У разных вендоров он может быть реализован по-разному, но суть его в следующем — входной чип регулярно запрашивает у выходного разрешение на отправку нового блока данных. И пока он его не получит — держит пакеты в своём буфере, не отправляя их в фабрику.<br/>
Соответственно выходной чип, получив такой запрос, смотрит на утилизацию выходного интерфейса и решает, готов ли он принять пакет. Если да — отправляет разрешение (<b>Grant</b>).<br/>
Это на первый взгляд контринтуитивное поведение — каковы же накладные расходы на такой арбитраж, насколько это увеличивает задержки, если на отправку пакета данных нужно дождаться RTT в пределах коробки — пока запрос улетит на выходной чип, пока тот обработает, пока ответ вернётся назад.<br/>
Тут для меня начинается область магического искусства, но вендоры эту революцию успели совершить и есть масса платформ, на которых арбитр прекрасно со своей задачей справляется. <br/>
Хотя обычно он применяется не для Input Queueing в описанном виде.<br/>
Дело в том, что эффективность Input Queueing не очень высокая — очень часто придётся ждать, пока интерфейс освободится. Эх, прям вспоминается старый добрый Ethernet CSMA/CD.<br/>
<hr/><br/>
<br/>
<a name="CIOQ" rel="nofollow"></a><br/>
<h3>Combined Input and Output Queueing</h3><br/>
Гораздо выгоднее в этом плане разрешить буферизацию и на выходе.<br/>
Тогда арбитр будет проверять не занятость интерфейса, а степень заполненности выходного буфера — вероятность, что в нём есть место, гораздо выше.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/cioq.png" width="700"/><br/>
<br/>
Но такие вещи не даются даром. Очевидно, это и увеличенная цена из-за необходимости реализовывать дважды буферизацию, и увеличенные задержки — даже в отсутствие заторов этот процесс не бесплатный по времени.<br/>
<br/>
Кроме того, для обеспечения QoS придётся хоть какой-то минимум его функций реализовывать в двух местах, что опять же скажется на цене продукта<br/>
<br/>
Но у CIOQ (как и у IQ) есть фундаментальный недостаток, заставивший в своё время немало поломать голову лучшим умам — <b>Head of Line Blocking</b>. <br/>
<br/>
Представьте себе ситуацию: однополосная дорога, перекрёсток, машине нужно повернуть налево, сквозь встречный поток. Она останавливается, и ждёт, когда появится окно для поворота. А за ней стоит 17 машин, которым нужно проехать прямо. Им не мешает встречный поток, но им мешает машина, которая хочет повернуть налево.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/hlob.png" width="500"/><br/>
<i><a href="https://www.cisco.com/c/dam/global/hr_hr/assets/ciscoconnect/2013/pdfs/Anatomy_of_Core_Network_Elements_Josef_Ungerman.pdf" target="_blank" rel="nofollow">Источник</a>.</i><br/>
<br/>
Этот избитый пример иллюстрирует ситуацию HoLB. Входной буфер — один на всех. И если всего лишь один выходной интерфейс начинает испытывать затор, он блокирует полностью очередь отправки на выходном чипе, поскольку один пакет в начале этой очереди не получает разрешение на отправку на фабрику. <br/>
<br/>
Трагическая история, как в реальной жизни, так и на сетевом оборудовании.<br/>
<hr/><br/>
<br/>
<a name="VOQ" rel="nofollow"></a><br/>
<h3>Virtual Output Queueing</h3><br/>
Как можно исправить эту дорожную ситуацию? Например, сделав три полосы — одна налево, другая прямо, третья направо.<br/>
<br/>
Ровно то же самое сделали разработчики сетевого оборудования.<br/>
Они взяли входной буфер побольше и подробили его на множество очередей.<br/>
Для каждого выходного интерфейса они создали по 8 очередей на каждом чипе коммутации. То есть перенесли все задачи по обеспечению QoS на входной чип. На выходном же при этом остаётся самая базовая FIFO очередь, в которой никогда не будет заторов, потому что их контроль взял себя входной чип.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/voq.png" width="500"/><br/>
<br/>
Если взять грубо коробку со 100 интерфейсами, то на каждой плате в буферах нужно будет выделить 800 очередей. <br/>
Если в коробке всего 10 линейных карт, то общее число очередей на ней будет 100*8*10 = 8000.<br/>
<br/>
Однако V в VOQ означает виртуальный, не потому, что они как бы выходные, но на самом деле находятся на входных платах, а потому что Output Queue для каждого выходного интерфейса распределён между всеми линейными картами. То есть сумма 10и физических очередей для одного интерфейса на 10 чипах составляет 1 виртуальную. <br/>
Собственно из-за распределённого характера этой виртуальной очереди от арбитра и здесь избавиться не получится — разным входным чипам всё же нужно знать, состояние выходной очереди. Поэтому даже несмотря на то, что выходная очередь — это FIFO, выходной чип всё ещё должен давать добро на отправку трафика. <br/>
<br/>
Кстати, что касается трафика, который должен вернуться в интерфейс той же карты, на которую он пришёл изначально, то здесь никаких исключений — он томится в VOQ, пока чип не даст добро переложить его в выходную очередь. С тем только отличием, что пакет не будет отправляться на фабрику. Поэтому перед лицом перегрузок все равны.<br/>
<br/>
На сегодняшний день подавляющее большинство модульных сетевых устройств используют архитектуру VOQ.<br/>
<br/>
<b>Дальнейшее чтиво: </b><br/>
<ul><li><a href="https://people.ucsc.edu/~warner/Bufs/Buffering-WP_August_2017.pdf" target="_blank" rel="nofollow">An Update on Router Buffering</a><br/>
</li><li><a href="https://forums.juniper.net/t5/forums/recentpostspage/post-type/message/category-id/Blogs/user-id/101479" target="_blank" rel="nofollow">What is VOQ and why you should care?</a><br/>
</li><li><a href="https://archive.nanog.org/sites/default/files/wednesday_tutorial_szarecki_packet-buffering.pdf" target="_blank" rel="nofollow">Strategies of packet buffering inside Routers</a><br/>
</li><li><a href="https://www.juniper.net/documentation/en_US/junos/topics/concept/cos-qfx-series-voq-understanding.html" target="_blank" rel="nofollow">Understanding CoS Virtual Output Queues (VOQs) on QFX10000 Switches</a><br/>
</li><li><a href="https://books.google.ru/books?id=kzstoFdvZ2sC&pg=PR8&lpg=PR8&dq=shared+memory+vs+voq&source=bl&ots=mTy-1ifsRK&sig=ACfU3U0DHx37_i_oDKvDJTEh72g6pSW-Ng&hl=ru&sa=X&ved=2ahUKEwjnx9el0LPnAhWHAhAIHUF6CeIQ6AEwCHoECAgQAQ#v=onepage&q=shared%20memory%20vs%20voq&f=false" target="_blank" rel="nofollow">High Performance Switches and Routers</a> — если у вас есть лишних 14 к₽.<br/>
</li></ul><br/>
<br/>
<hr/><br/>
<br/>
<a name="SHALLOW_VS_DIPPER" rel="nofollow"></a><br/>
<h2>Shallow vs Deep Buffers</h2><br/>
Буферы — это то место, где пакеты можно похранить, вкачав в них смертельную порцию задержки.<br/>
Как сказали в <a href="https://www.youtube.com/watch?v=Ti3t9OAZL3g" rel="nofollow">видео Packet Pushers</a> — буферы — это религия. Хотя, скорее всего, неортодоксальная, а возможно даже секта.<br/>
<br/>
Чуть позже мы поговорим о том, что такое хорошо, а что такое плохо. А пока посмотрим на реализации. <br/>
<br/>
<b>Shallow</b> — неглубокие — это буферы размером до 100МБ. Обычно это встроенная в кристалл <b>on-chip</b> память — <b>OCB</b> — On-Chip Buffer.<br/>
<b>Deep</b> — счёт уже идёт на гигабайты. Обычно <b>off-chip</b> и подключается к чипу по отдельной шине.<br/>
И нет ничего посередине.<br/>
<br/>
За последние лет десять производительность чипов выросла на порядки, трафика они теперь перемалывают терабиты в секунду вместо единиц гигабит. А размер памяти не то что не поспевает за этим ростом, он фактически почти стоит на месте. <br/>
Давайте грубо прикинем: если для гигабитного порта буфер размером 16 мегабайт мог абсорбировать всплеск трафика длительностью примерно 100 мс, то для 100Гб/с — всего лишь 1мс. И это только один порт, фактически же плотность портов тоже растёт и максимальная комплектация для одночипового устройства сегодня — 64 порта 400Гб/с — или 25,6 Тб/с полосы пропускания. <br/>
Используя только 64 МБ буфер, такой чип сможет хранить трафик 0.000005 c или 5 мкс.<br/>
<br/>
Такие буферы порой даже называют <a href="https://conferences.sigcomm.org/events/apnet2017/papers/bcc-bai.pdf" rel="nofollow">Extremely shallow buffers</a>. <br/>
<br/>
Их воистину миниатюрный объём обусловлен в первую очередь тем, что они в прямом смысле встроены в чип. Такая память является составной частью микросхемы, и каждый дополнительный мегабайт, разумеется, будет обходиться в лишнюю тысячу долларов, больший размер и тепловыделение. Для справки Broadcom Trident 4 содержит 21 миллиард транзисторов, изготовленных по 7нм техпроцессу на нескольких квадратных сантиметрах.<br/>
Логично вытекающим следствием является скорость работы с этой памятью — она должна соответствовать производительности чипа.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/trident4_memory.png" width="400"/><br/>
<br/>
Очевидно, что не для всех задач такие маленькие буферы подходят. В частности модульные коробки с VOQ явно не могут позволить себе дробить 64 Мб на несколько тысяч очередей (на самом деле <a href="#HYBRID_BUFFERING" rel="nofollow">могут</a>).<br/>
<br/>
Поэтому рынок предлагает решения с большой внешней памятью (Deep Buffers), размер которой начинается от 1ГБ (обычно от 4ГБ).<br/>
Согласно <a href="https://people.ucsc.edu/~warner/buffer.html" target="_blank" rel="nofollow">этой таблице</a> существуют коммутаторы (Arista 7280QR-C48) с фантастическими 32-хгигабайтовыми буферами — это уже все сезоны Рика и Морти в неплохом качестве. Но это уже история про VOQ — всё-таки это память не одного чипа. На моём первом ПК такого объёма был жёсткий диск. <br/>
<br/>
Как такая память реализована зависит уже от чипа и коробки.<br/>
Например, Broadcom <b>Jericho+</b> сгружает пакеты во внешнюю память в размере 4ГБ. Это обычная широко известная <b>GDDR5</b>, использующаяся в видеокартах.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/jericho_deep_beffers.png" width="500"/><br/>
<i><a href="https://xrdocs.io/ncs5500/blogs/2018-05-07-ncs-5500-buffering-architecture/" target="_blank" rel="nofollow">Источник</a></i>.<br/>
<br/>
<b>Jericho2</b> несёт на борту новейшую память <b>HBM2</b> — High Bandwidth Memory — размером 8ГБ.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/jericho2_deep_beffers.png" width="400"/><br/>
<i><a href="https://www.broadcom.com/products/ethernet-connectivity/switching/stratadnx/bcm88690" target="_blank" rel="nofollow">Источник</a></i>.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/chipset_die.png" width="800"/><br/>
<br/>
А вот и фото Jericho2:<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/hbm_photo.png" width="400"/><br/>
<i><a href="https://people.ucsc.edu/~warner/Bufs/CSG-DNX-Switching-J2%20Feb%2016%202018.pdf" rel="nofollow">Источник</a>.</i><br/>
<br/>
Juniper QFX10000 использует чип <b>Q5</b> собственного производства с внешней памятью — <b>HMC</b> — Hybrid Memory Cube — в размере 4ГБ. HMC — это коммерческая память производства Micron, от которой ныне отказались в пользу HBM и GDDR6.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/juniper_hmc.png" width="500"/><br/>
<i><a href="https://forums.juniper.net/t5/Enterprise-Cloud-and/Not-all-deep-buffer-switches-are-created-equal/ba-p/318393" target="_blank" rel="nofollow">Источник</a></i>.<br/>
<br/>
Фото чипа ZX EXPRESS:<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/zx_asic.png" width="500"/><br/>
<i><a href="https://senetsy.ru/upload/juniper-summit-2019/New_in_Routing_and_%20Switching_Andrey_Pinaev_Juniper.pdf" target="_blank" rel="nofollow">Источник</a>.</i><br/>
<br/>
А вот так выглядит сетевой процессор Cisco с внешней памятью:<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/cisco_npu.jpg" width="400"/><br/>
<i><a href="https://servernews.ru/958639" target="_blank" rel="nofollow">Источник</a></i>.<br/>
<br/>
Перечислять можно и дальше.<br/>
Что здесь важно отметить, что внешняя память тоже не даётся бесплатно. Во-первых, цена таких решений значительно выше. Во-вторых, пропускная способность обычно ниже. И основное ограничение — канал между чипом коммутации и чипом памяти. Для производимых массово чипов, вроде GDDR5 полоса не превышает 900ГБ в режиме half-duplex. Но это чип, явно не заточенный под задачи сетевых сервисов.<br/>
<br/>
Кастомный джуниперовский HMC <a href="https://forums.juniper.net/t5/Enterprise-Cloud-and/Not-all-deep-buffer-switches-are-created-equal/ba-p/318393" rel="nofollow">обещает</a> 1,25 Тб/с в обоих направлениях.<br/>
<br/>
Если верить <a href="https://en.wikipedia.org/wiki/High_Bandwidth_Memory#HBM2" rel="nofollow">вики</a>, то HBM 2-го поколения, используемый в последнем чипе Broadcom Jericho2, выдаёт порядка 2Тб/с.<br/>
<br/>
Но это всё ещё далеко от реальной производительности сетевого ASIC. Фактически шины до этой внешней памяти является узким местом, которое и определяет производительность чипа.<br/>
<hr/><br/>
<br/>
<a name="HYBRID_BUFFERING" rel="nofollow"></a><br/>
<h3>Hybrid Buffering</h3><br/>
Поэтому почти все вендоры сегодня практикуют <b>гибридную буферизацию</b>, или, если хотите — динамическую. В нормальных условиях используется только on-chip память, предоставляющая line-rate производительность. А в случае перегрузки пакеты автоматически начинают буферизироваться во внешней памяти.<br/>
Это позволяет уменьшить стандартные задержки, энергопотребление и в большинстве случаев вписаться в ограниченную полосу пропускания до памяти.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/hybrid_buffering.png" width="800"/><br/>
<i><a href="https://people.ucsc.edu/~warner/Bufs/CSG-DNX-Switching-J2%20Feb%2016%202018.pdf" target="_blank" rel="nofollow">Источник</a></i>.<br/>
<br/>
<blockquote>Данный параграф отменяет сказанное выше о том, что on-chip памяти не хватит для VOQ. Фактически в случае гибридной буферизации она всё же дробится на тысячи очередей очень маленькой длины, чтобы обеспечить VOQ. Просто в нормальных условиях этой длины хватает, чтобы пропускать трафик мимо внешней памяти. <br/>
При этом в первую очередь начнёт офлоадиться на внешнюю память массивный трафик, идущий в низкоприоритетных очередях, а требовательный к задержками будет по-прежнему пролетать фаст-пасом.<br/>
</blockquote><br/>
<hr/><br/>
<br/>
<a name="TRUE_EVIL" rel="nofollow"></a><br/>
<h3>Большие буферы — добро или зло?</h3><br/>
В целом это довольно старая дилемма. Подольше похранить или пораньше дропнуть?<br/>
<br/>
Конечно, всем приложениям хочется lossless low-latency сеть. Даже жирному некрасивому торренту. Но так не бывает и кем-то нужно жертвовать.<br/>
И мы долгое время живём с инертной мыслью, что часть приложений могут потерпеть задержки, а вот терять трафик совсем не хочется. Не в малой степени этому способствовало и то, что потери — это измеримая характеристика с более или менее понятными границами — потерь быть не должно. А что задержка? Вроде можно чётко сказать, что единицы миллисекунд — это хорошо, а секунды — это плохо. А между ними — зона спекуляций. Как оценить влияние вариаций задержки для рядового TCP-трафика?<br/>
Поэтому и спрос на устройства с большими буферами есть — никто не хочет терять трафик.<br/>
<br/>
А теперь я выскажу не самое популярное мнение — потери — это хорошо. <br/>
Так уж вышло, что один из транспортных протоколов, фиксирует перегрузки, опираясь на потери. <br/>
Дроп в очереди на сетевом устройстве означает, что на нём случился затор — это он не по своему капризу. И будет совсем не лишним, если отправители немного приуменьшат свои congestion window.<br/>
Именно так и работают все классические (и не очень) реализации TCP Congestion Control. <br/>
Соответственно на устройствах с глубокими буферами во время заторов пакеты будут долго копиться, не отбрасываясь. Когда они всё-таки дойдут до получателя и тот их ACKнет, отправитель не только не снизит скорость, но может даже её увеличить, если у него сейчас режим Slow Start или Congestion Avoidance. <br/>
Можно взглянуть и дальше: растущая очередь взвинчивает RTT, что соответственно влечёт за собой увеличение RTO таймеров на отправителях, тем самым замедляя обнаружение потерь. <br/>
То есть сеть лишается своего практически единственного инструмента управления перегрузками.<br/>
И таким образом архитекторы, пытающиеся решить вопрос заторов на сети путём увеличения буферов, усугубляют ситуацию ещё больше.<br/>
<br/>
Ситуация, описанная выше, называется <b>bufferbloat</b> — распухание буфера.<br/>
Википедия иронично замечает:<br/>
<blockquote>Проект <a href="http://www.bufferbloat.net" rel="nofollow">www.bufferbloat.net</a> иронично определил этот термин, как «ухудшение производительности Интернета, вызванное предыдущими попытками её улучшения»<br/>
</blockquote><br/>
Отбросы — санитары сети. Ко всеобщему удивлению, уменьшение очереди до одного пакета зачастую может кардинально улучшить ситуацию, особенно в условиях датацентра (только не сочтите это за дельный совет).<br/>
<br/>
<blockquote>Справедливости ради следует заметить, что современные реализации TCP — BBR2, TIMELY ориентируются не только и не столько на потери, сколько на RTT и <a href="https://en.wikipedia.org/wiki/Bandwidth-delay_product" target="_blank" rel="nofollow">BDP</a>.<br/>
Гугловый QUIC — надстройку над UDP — следует отнести сюда же. <br/>
</blockquote><br/>
Внутри фабрики датацентра RTT ультракороткий — зачастую меньше 1 мс. Это позволяет среагировать на потерю очень быстро и купировать перегрузку в её зачатке.<br/>
Собственно поэтому практически все ASIC'и для датацентровых коммутаторов имеют только крохотную on-chip память.<br/>
Хотя и появилась в последние годы тенденция к глубоких буферам и тут.<br/>
И этому даже находится <a href="https://forums.juniper.net/t5/Enterprise-Cloud-and/Not-all-deep-buffer-switches-are-created-equal/ba-p/318393" target="_blank" rel="nofollow">объяснение</a>.<br/>
<hr/><br/>
<br/>
Особая история на границе датацентра (или на устройствах доступа в сети провайдера или на магистральных сетях).<br/>
<b>Во-первых</b>, это места, которые обычно заведомо строятся с переподпиской, поскольку WAN-линки дорогие, что автоматически означает, что ситуации, в которых трафика приходит больше, чем способен переварить интерфейс, ожидаемы. А значит нужна возможность пакеты хранить и обрабатывать их в соответствии с приоритетами. Большие буферы позволяют сгладить всплески.<br/>
<b>Во-вторых</b>, обычно приложения настолько чувствительные к задержкам, никто не будет пытаться растягивать на этот сегмент. Например, RoCE или распределённое хранилище. Для чуть менее чувствительных, таких как телефония, в больших буферах выделяется приоритетная очередь. <br/>
<b>В-третьих</b>, тут задержки на устройстве всё ещё делают основной вклад в общее время доставки, но уже не настолько драматический.<br/>
<br/>
Итак, устройства с большим объёмом памяти годятся в места где заложена переподписка или могут появиться заторы.<br/>
<br/>
Что стоит отметить, так это то, что в датацентрах тоже есть ситуации, в которых 16-64 МБ буферов может не хватить, даже несмотря на отсутствие переподписки.<br/>
Два типичных примера — это обработка Big Data и Storage. <br/>
<br/>
<b>Анализ Big Data</b>. Кластера Map-Reduce — это сотни и тысячи машин, которые перемалывают параллельно огромные массивы данных по заданию Master-узла, заканчивают примерно одинаково и все разом начинают возвращать ответы на Master-узел. Ситуация называется <a href="http://citeseerx.ist.psu.edu/viewdoc/download?doi=10.1.1.447.1375&rep=rep1&type=pdf" rel="nofollow">Incast</a>. Длится она порядка нескольких десятков миллисекунд и потом исчезает. <br/>
On-chip память неспособна вместить эти данные — значит будет много дропов, значит ретрансмиты, значит общее снижение производительности.<br/>
<br/>
<b>Storage</b>. Это штука крайне чувствительная к потерям и тоже гоняющая массивные объёмы данных. В случае хранилки тоже лучше не терять ничего. Но обычно она при этом и к задержкам предъявляет строгие требования, поэтому такие приложения обсудим <a href="#LLLL" rel="nofollow">пониже</a>.<br/>
<br/>
Однако при этом крайне редко они единственные потребители сети в датацентрах, другим приложениям нужна низкая задержка.<br/>
<br/>
Впрочем, это легко решается выделением очередей QoS с ограничением максимальной доступной глубины. И весь вопрос заключается тогда только в том, готова ли компания заплатить за глубокие буферы, возможно, не использовать их и поддерживать конфигурацию QoS. <br/>
<br/>
Но в любой ситуации лучше следовать правилу: <a href="https://www.nextplatform.com/2019/07/23/the-switch-router-war-is-over-and-hyperscalers-won/" rel="nofollow">use shallow ASIC buffers when you can and use deep buffers when you must</a>.<br/>
<br/>
<b>Критика глубоких буферов</b>: <br/>
<br/>
<ul><li><a href="https://packetpushers.net/aristas-big-buffer-b-s/" target="_blank" rel="nofollow">Arista’s Big Buffer B.S.</a><br/>
</li><li><a href="https://people.ucsc.edu/~warner/Bufs/incast.html" target="_blank" rel="nofollow">Incast</a><br/>
</li><li><a href="http://miercom.com/pdf/reports/20160210.pdf" target="_blank" rel="nofollow">Speeding Applications in Data Center Networks. The Interaction of Buffer Size and TCP Protocol Handling and its Impact on Data-Mining and Large Enterprise IT Traffic Flows</a><br/>
</li></ul><hr/><br/>
Кстати, показательная таблица типичных задержек:<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/latencies.png" width="630"/><br/>
<i><a href="https://people.ucsc.edu/~warner/Bufs/Buffering-WP_August_2017.pdf" target="_blank" rel="nofollow">Источник</a></i>.<br/>
<br/>
<hr/><br/>
<br/>
<a name="LLLL" rel="nofollow"></a><br/>
<h1>Low-latency lossless сети</h1><br/>
С развитием RoCE, RDMA, nVME over Fabric к сети стали появляться другие, неслыханные доселе требования: и каждый пакет ценен и времени терять нельзя. Одновременно. И хуже того, мы хотим по максимуму утилизировать имеющиеся линки, чтобы они не простаивали.<br/>
И все требования оправданы — осуждать их мы здесь не будем.<br/>
<br/>
Так что же можно сделать? На самом деле, как я уже говорил выше, условия сети датацентра хороши тем, что информация о перегрузке очень быстро доносится до отправителей. Поэтому и реакция на потерянный пакет не заставит себя долго ждать.<br/>
<br/>
Но что если нам не отбрасывать пакет, а каким-то другим способом сообщить отправителю, что нужно замедлиться? <br/>
Здесь есть несколько конкурирующих подходов.<br/>
<br/>
ECN-Based<br/>
Bandwidth-Delay Product Based<br/>
RTT-BASED<br/>
<br/>
<h2>ECN-Based</h2><br/>
Транзитное устройство, говтовящееся испытать перегрузку, явным образом сообщает отправителям о том, что нужно охладить свою страсть.<br/>
<br/>
Прозорливые инженеры заложили в IP целых 8 бит под QoS, и только 6 мы задействовали под DSCP, а 2 бита были зарезервированы для целей <b>ECN — Explicit Congestion Notification</b>.<br/>
<br/>
Надолго забытый механизм сегодня извлекают из ящика стола, сдувают с него пыль, и вставляют в шкатулку, на которой нацарапано или <a href="https://tools.ietf.org/html/rfc8257" target="_blank" rel="nofollow">DCTCP</a><br/>
<br/>
Транзитное устройство при заполнении буфера больше, чем до определённого порога, выставляет в заголовках IP обрабатываемых пакетов бит CE (Congestion Encountered) и отправляет пакет дальше.<br/>
Получатель, увидев в пришедшем пакете этот флаг, сообщает отправителю о перегрузке и о том, что нужно снизить скорость.<br/>
<br/>
Классический TCP может обнаружить только уже существующую перегрузку, а DCTCP, используя ECN, узнаёт о том, что она только приближается, и пробует её избежать. <br/>
<br/>
Есть и другие реализации TCP, поддерживающие ECN, например, HTCP.<br/>
<br/>
Нюанс с ECN-based Congestion Control механизмами в том, что до поры до времени они ничего не знают о надвигающейся перегрузке, а потом должен пройти ещё целый RTT, чтобы отправитель узнал, что какое-то транзитное устройство к ней близко. К тому времени, как отправители начнут снижать скорость, перегрузка уже может или рассосаться или наоборот дойти до уровня, когда начнутся дропы. <br/>
<br/>
<h2>Bandwidth-Delay Product Based</h2><br/>
Другие реализации замеряют эффективную полосу сети совместно с RTT, то есть сколько можно ещё напихать в трубу до того, как это создаст затор и увеличит задержку.<br/>
<br/>
Примерами таких протоколов являются <a href="https://habr.com/ru/post/322430/" target="_blank" rel="nofollow">BBR</a> и <a href="https://www.hamilton.ie/net/draft-leith-tcp-htcp-00.txt" target="_blank" rel="nofollow">H-TCP</a>.<br/>
<br/>
<h2>RTT-BASED</h2><br/>
В конце концов есть элегантные механизмы, которые замеряют время прохода трафика туда-обратно.<br/>
Идея провальная для MAN/WAN-сегментов, и, честно говоря, при попытке программной вычисления RTT тоже.<br/>
TIMELY от Google с аппаратным offload'ом вычисления RTT один из наиболее удачных примеров.<br/>
<br/>
На самом деле, если бы не видео с прекрасной девушкой, рассказывающей про технические детали TIMELY, не знаю даже стал ли бы я упоминать про него. Наслаждайтесь, но берегите уши: <a href="https://dl.acm.org/action/downloadSupplement?doi=10.1145%2F2829988.2787510&file=p537-mittal.webm&download=true" target="_blank" rel="nofollow">TIMELY: RTT-based Congestion Control for the Datacenter</a>.<br/>
<hr/><br/>
<br/>
<a name="CHIPS_AND_DALES" rel="nofollow"></a><br/>
<h1>Существующие чипы</h1><br/>
До начала этого разговора следует сказать о разделении: <br/>
<br/>
<ul><li><b>Custom/In house Silicon</b>. Это то, с чего всё начиналось — чипы, разработанные внутри R&D вендоров сетевых устройств: Cisco, Juniper итд. Используются они только внутри своего же оборудования и не продаются наружу.</li><li><b>Commodity/Merchant Silicon</b>. Чипы широкого производства. Можно их назвать рыночными или коммерческими. Это чипы, производимые сторонними компаниями: Broadcom, Innovium, Barefoot, Marvell итд.</li></ul><hr/><br/>
<br/>
<a name="MERCHANT_SILICON" rel="nofollow"></a><br/>
<h2>Commodity/Merchant Silicon</h2><br/>
Многие утверждают, что за рыночными чипами будущее (если уже не настоящее). Поэтому давайте с ними и познакомимся сначала.<br/>
<br/>
<a name="BROADCOM" rel="nofollow"></a><br/>
<h3>Broadcom</h3><br/>
Broadcom делает уйму разных чипов уже тыщу лет.<br/>
Исторически он был одним из первых вендоров, кто начал производство высокоскоростных ASIC для сетевых устройств.<br/>
В 2010-м году они выпустили свой чип Trident 64х10G, а в 2020 они начнут поставлять 64х400G.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/broadcom_series.png" width="800"/><br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/broadcom_chipsets.png" width="800"/><br/>
<br/>
Все сетевые ASIC Broadcom принадлежат двум семействам: StrataXGS и Strata DNX.<br/>
<br/>
<b>StrataXGS</b> — shallow-buffer чипы преимущественно для датацентровых коммутаторов. Названы в честь ракет.<br/>
Это семейство делится на:<br/>
Многофункциональные: Trident, Trident2, Trident2+, Trident3, Trident4, Maverick.<br/>
Высокоскоростные: Tomahawk, Tomahawk+, Tomahawk2, Tomahawk3, Tomahawk4. <br/>
<br/>
<b>Strata DNX</b> — чипы с глубокими буферами, рассчитанные на маршрутизаторы, модульные коммутаторы. Скорости при этом из всех семейств наиболее низкие. Названы в честь израильских городов: Arad, Qumran, Jericho, Jericho+, Jericho2.<br/>
<br/>
По назначению, грубо говоря, делятся они примерно так:<br/>
Trident'ы на роль ToR'ов, где нужно немного интеллекта: EVPN, VXLAN, пожирнее FIB, побольше ACL.<br/>
Tomahawk'и на роль Spine'ов — быстро перекладывать много пакетиков из одного интерфейса в другой.<br/>
Jericho — граница датацентра, где выход во внешний мир и DCI. Обычно тут не требуются сверхвысокие скорости, потому что основной трафик — это East-West в пределах ДЦ. Зато что здесь требуется, так это весь стек сетевых технологий, большие таблицы и глубокие буферы. VXLAN, MPLS, SR, L3VPN, различные Option'ы и всё прочее, что уже основательно забылось после <a href="https://linkmeup.ru/sdsm" rel="nofollow">СДСМ</a>.<br/>
<br/>
<img src="https://fs.linkmeup.ru/images/articles/buffers/jericho2.png" width="500"/><br/>
<br/>
Но если уйти за пределы ДЦ в любую сторону — в энтерпрайз, в провайдинг, в операторов, то Broadcom свои Трезубцы позиционирует уже как универсальные чипы, которые везде и на любом уровне сети сгодятся.<br/>
<br/>
Почти два часа видео весьма технического склада:<br/>
<ul><li><a href="https://www.youtube.com/watch?v=t_fwyKs1wJ0&" target="_blank" rel="nofollow">Introduction to Broadcom's Switch Portfolio</a><br/>
</li><li><a href="https://www.youtube.com/watch?v=2HvxxK39BXM" target="_blank" rel="nofollow">Broadcom Trident4: Disrupting the Enterprise Data Center & Campus</a><br/>
</li><li><a href="https://www.youtube.com/watch?v=B-COGMbaUg4" target="_blank" rel="nofollow">Broadcom Tomahawk4: Industry's Highest Bandwidth Chip</a><br/>
</li><li><a href="https://www.youtube.com/watch?v=JUgyaSoErlQ" target="_blank" rel="nofollow">Jericho2: Driving Merchant Silicon Revolution</a><br/>
</li><li><i>Хотел бы я, пожалуй, быть таким седовласым дедком, бегущим по лезвию современных технологий.</i><br/>
</li></ul><br/>
Кстати, будут у нас в гостях!<br/>
<br/>
<a name="MELLANOX" rel="nofollow"></a><br/>
<h3>Mellanox</h3><br/>
Долгое время Broadcom был единоличным властелином всех сердец датацентровых коммутаторов, что позволяло ему диктовать правила игры.<br/>
Пока в 2013-м году известный производитель Inifinband-коммутаторов Mellanox не выпустил свой чип <b>Spectrum</b> и Ethernet-коммутаторы на его основе. Чип обладал производительностью 3.2 Тб/с и мог обслуживать 32 100Гб порта или 64 порта меньшей скорости.<br/>
Это было внезапно.<br/>
<br/>
На сегодняшний день у них продаются свитчи на чипе <b>Spectrum 2</b> с мощностью 6,4 Тб/с.<br/>
<br/>
Оба чипа shallow-buffer, расcчитаны на коммутаторы уровней Leaf и Spine — высокая скорость, низкая задержка, не самая богатая функциональность.<br/>
<br/>
Ходят слухи о разработке <b>Spectrum 3</b>, от которого ожидается 12,8 Тб/с, что позволит Mellanox'у <i>почти</i> догнать Broadcom.<br/>
<br/>
Относить ли Mellanox к числу производителей рыночных ASIC'ов — вопрос в целом дискуссионный, но все делают именно так.<br/>
Увы (а может и нет), они делает чипы только для своих коммутаторов, и не продают их наружу.<br/>
<br/>
В их пользу говорит то, что Mellanox — это whitebox-коммутаторы, на которое можно устанавливать сторонние операционные системы. И тем самым он участвует в конкурентной борьбе и способствует снижению цен, гонке скоростей и открытости технологий. Мимими.<br/>
И кроме того, это так называемая Fabricless компания, которая не имеет заводов, а заказывает изготовление чипов на стороне.<br/>
<br/>
К слову, в 2019-м Мелланокс был куплен Nvidia.<br/>
Кстати, <a href="https://linkmeup.ru/blog/405.html" rel="nofollow">были у нас в гостях</a>.<br/>
<br/>
<a name="BAREFOOT" rel="nofollow"></a><br/>
<h3>Barefoot</h3><br/>
Совсем молодой игрок на рынке коммерческих ASIC'ов. В 2013-м появился, в 2016-м вышел из тени с чипом Tofino с пропускной способностью 6,5 Тб/с.<br/>
Сегодня они готовы продавать уже Tofino 2 — 12,8Тб/с<br/>
<br/>
Чип трудится на коммутаторах Cisco Nexus 3464C, Nexus 34180YC и Arista 7170.<br/>
Чипы так же shallow-buffer и рассчитаны на спайны и лифы.<br/>
<br/>
Однако сегодня нельзя просто выйти на рынок и сказать «я лучше Бродкома, купите меня». Нужно что-то предложить.<br/>
Barefoot предлагает <a href="#PROGRAMMABLE_PIPELINE" rel="nofollow">программируемый Pipeline</a>. Это позволяет, используя специальный язык программирования P4, полностью определять, что будет происходить с пакетом в коммутаторе. Можно написать свою логику без оглядки на существующие стандарты — выбросить Ethernet вообще, заглядывать на любую глубину заголовков, выискивать какие угодно флаги итд. Грубо говоря: если 4 бита со сдвигом от начала пакета в 16 бит равны 0110, то нужно поменять 8 бит со сдвигом 32 бита на 01001001 и отправить в интерфейс 100GE1/0.<br/>
<br/>
Эта гибкость позволяет как вендорам, так и (теоретически) конечным клиентам встраивать в ASIC свою логику, а не довольствоваться встроенными правилами. <br/>
Впрочем programmable pipeline — это уже совсем <a href="https://www.hotchips.org/wp-content/uploads/hc_archives/hc29/HC29.20-Tutorials-Pub/HC29.20.1-P4-Soft-Net-Pub/HC29.21.100-P4-Tutorial.pdf" rel="nofollow">другая история</a>. <br/>
<br/>
Но сегодня программируемым конвейером хвастаются со сцен своих маркетинговых конференций уже почти все.<br/>
<br/>
К слову, в 2019-м Барефут был куплен Intel'ом.<br/>
Кстати, <a href="https://linkmeup.ru/blog/452.html" rel="nofollow">были у нас в гостях</a>.<br/>
<br/>
<a name="MARVELL" rel="nofollow"></a><br/>
<h3>Marvell</h3><br/>
Если загуглите в Яндексе «Marvell switch ASICs», то не так уж много ссылок вас проведут туда, где вам будут рады. Marvell определённо делает интегральные микросхемы, и даже вполне определённо делает <a href="https://www.marvell.com/products/switching/prestera-px.html" target="_blank" rel="nofollow">сетевые интегральные микросхемы</a>, но назвать его фаворитом этой гонки язык не поворачивается. <br/>
<br/>
У них есть три сетевых ASIC'а, вполне конкурентоспособных по заявленным функциям и мощностям:<br/>
<ul><li>Prestera CX — 12.8 Тб/с, обещают программируемый Pipeline.</li><li>Prestera PX — по всей видимости, что-то около 1 Тб/с на роль тора.</li><li>Falcon — 12.8 Тб/с — видел несколько упоминаний о нём, но даже на самом сайте Marvell'а информации о нём нет.</li></ul><br/>
Пожалуй, из последних предложений вы можете сделать закономерный вывод, что больше про Marvell я ничего не знаю.<br/>
<br/>
<a name="INNOVIUM" rel="nofollow"></a><br/>
<h3>Innovium</h3><br/>
У Innovium, основанного выходцами из Intel и Broadcom, есть два сетевых чипа: Teralynx 5 и Teralynx 7, обещающих знакомые скорости: 6.4 и 12.8 Тб/с.<br/>
Они установлены в паре цискиных коробок: <a href="https://www.cisco.com/c/en/us/td/docs/switches/datacenter/nexus3400s/sw/922/programmability/guide/b-cisco-nexus-3400-s-nx-os-programmability-guide-922/b-cisco-nexus-3400-s-nx-os-programmability-guide-92z_chapter_0100011.html" target="_blank" rel="nofollow">Nexus 3408 и 3432D</a>.<br/>
<br/>
<a name="OTHER_VENDORS" rel="nofollow"></a><br/>
<h3>Другие</h3><br/>
Есть и другие игроки, не снискавшие успеха среди гиперскейлеров.<br/>
<br/>
Один из примеров — это <b>Cavium</b>. Приходилось слышать? Это вендор, купленный не так давно Marvell'ом и производящий NP для энтерпрайз-маршрутизаторов и (!!) базовых станций.<br/>
<br/>
Буквально в феврале, кстати, появилась крайне любопытная новость: <a href="https://www.servethehome.com/ubiquiti-unifi-usw-leaf-overview-not-review-48x-25gbe-6x-100gbe-switch/" rel="nofollow">Ubiquiti UniFi USW-Leaf Overview 48x 25GbE and 6x 100GbE Switch</a>.<br/>
Современный Leaf-коммутатор с 30ГБ SSD за $2000.<br/>
Немного пораскрутив публикацию, я обнаружил, что внутри сокрыт некий Taurus, разработанный <b>Nephos</b> — дочерней компанией MediaTek. И у них даже вполне любопытное <a href="http://www.nephosinc.com/nps/products/" rel="nofollow">портфолио</a>.<br/>
С такой ценой, возможно, появляется новый игрок на рынке.<br/>
<br/>
Для полноты картины приведу так же парочку малоизвестных компаний, которые производят низкоскоростные чипы коммутации на FPGA:<br/>
<ul><li><a href="https://www.ethernitynet.com/products/socs/network-co-processors/" target="_blank" rel="nofollow">Ethernity Networks</a></li><li><a href="https://www.arrivetechnologies.com/ipcorecarrierethernet" target="_blank" rel="nofollow">Arrive Technologies</a></li></ul><br/>
Нашлось, кстати, тут место и для отечественных разработок.<br/>
Например, вот такого малыша вместе с отладочным комплектом можно приобрести себе для доморощенного L2-коммутатора:<br/>
<ul><li><a href="https://ic.milandr.ru/products/interfeysnye_mikroskhemy/ethernet/1923kkh028" target="_blank" rel="nofollow">Миландр 1923КХ028</a>.</li></ul><br/>
<hr/><br/>
<br/>
<a name="CUSTOM_SILICON" rel="nofollow"></a><br/>
<h2>Custom silicon</h2><br/>
Настало время поговорить про вендоров сетевого оборудования, которые всё ещё в состоянии содержать свой гигантский штат R&D.<br/>
Но именно с них когда-то всё и начиналось, рыночных чипов не было, а каждый производитель разрабатывал и изготавливал свои сетевые процессоры и ASIC'и.<br/>
И это сложно сегодня, потому что когда другие могут сосредоточиться только на аппаратной обвязке вокруг чипа и софте, другим приходится выделять ресурсы на фундаментальные разработки. Стоит отдать дань уважения вендорам за это.<br/>
<blockquote>Занимательный факт. Во время санкционной войны лета 2019 у Huawei был невоображаемый сценарий вылететь с рынка — американская компания Broadcom заморозила поставку ASIC'ов для их линейки CloudEngine.<br/>
Всё, конечно, завершилось хорошо.<br/>
Но почти одновременно с этим вышел модульный коммутатор CE16800 на чипах собственного производства, и обещали пицца-боксы. <br/>
Ясное дело, что занимались они этой разработкой уже довольно давно, наверно, лет 5.<br/>
Однако сей факт намекает на то, что, возможно, не так уж и плоха идея вкладываться в разработку своих чипов.<br/>
</blockquote><br/>
Очевидно, что и у них не по одному типу ASIC'ов, развивающихся планомерно и интегрирующихся во все новые устройства — они делятся по сериям железок, по их ролям. Не забываем и о том, насколько большие компании любят поглощения.<br/>
<br/>
Я не собираюсь здесь погружаться в детали, перечисляя все их виды и возможности. Пройдёмся только поверхностно по наиболее известным из них.<br/>
<br/>
<a name="ZHDUNIPER" rel="nofollow"></a><br/>
<h3>Juniper</h3><br/>
В первую очередь это, конечно, легендарный <b><a href="https://www.juniper.net/us/en/local/pdf/whitepapers/2000331-en.pdf" target="_blank" rel="nofollow">ASIC Trio</a></b>, который бьётся внутри всех маршрутизаторов MX и коммутаторов EX.<br/>
Марат Бабаян в своё время написал <a href="https://habr.com/ru/post/307696/" target="_blank" rel="nofollow">прекрасную статью</a> о его работе.<br/>
<br/>
Внутри их магистральных коробок — <b>ASIC Express</b> (ZX, TRITON).<br/>
А датацентровые коммутаторы, вроде QFX 10000, заряжены чипом <b>Q5</b>.<br/>
<br/>
<a name="AHUWEI" rel="nofollow"></a><br/>
<h3>Huawei</h3><br/>
У этих ребят тоже давняя история разработки своих чипов.<br/>
Когда-то начиналось с интеловских асиков, потом были эксперименты с чипом Marvell, а потом масть пошла. И новые поколения сетевых процессоров стали появляться один за другим.<br/>
Они отличаются от поколения к поколению, от класса к классу, от серии к серии.<br/>
Но для внешней людей их объединили в две линейки: <br/>
<ul><li><b>Ascend</b> для датацентров</li><li><b>Solar</b> для провайдеров и операторов</li></ul><br/>
<a name="SISCO" rel="nofollow"></a><br/>
<h3>Cisco</h3><br/>
Можно сказать, что новейшие линейки программируемых чипов это:<br/>
<ul><li><b>Cisco Silicon One</b>, установленный в линейку <a href="https://www.cisco.com/c/en/us/products/routers/8000-series-routers/index.html#~services" target="_blank" rel="nofollow">Cisco 8000</a>.</li><li><b>UADP</b> — Unified Access Data Plane — программируемый ASIC для каталист и некоторых нексусов</li><li><b>QFP</b> — Quantum Flow Processor — для ASR и ESP</li></ul><br/>
А в глубине веков начинается такой, зоопарк, что я просто кину несколько, даже не пытаясь докопаться до глубин:<br/>
<ul><li>Sasquatch, Strider — каталисты 29хх и 3ххх</li><li>K1, K2, K5, K10 — каталисты 4000 и 4500</li><li>EARL1&gt;EARL8 — ещё разнообразные каталисты и Nexus 7000</li><li>Monticello — Nexus 3548</li><li>Big Sur — Nexus 6000</li><li>F3 — Nexus 7000/7700</li><li>nPower X1 — сетевой процессор для NCS.</li></ul><br/>
<a href="https://www.ciscolive.com/c/dam/r/ciscolive/us/docs/2016/pdf/BRKARC-3467.pdf" target="_blank" rel="nofollow">Замечательные слайды</a>, кстати, о производстве цискиных чипов и их устройстве.<br/>
<br/>
И <a href="https://people.ucsc.edu/~warner/Bufs/BRKDCN-3734.pdf" target="_blank" rel="nofollow">слайды</a> про использование рыночных чипов в нексусах и их (чипов) архитектуру.<br/>
<br/>
<a name="OURS" rel="nofollow"></a><br/>
<h3>Отечественная микроэлектроника</h3><br/>
Похвастаться терабитами, увы не можем, но вот есть 88Гб/с L3-коммутатор от «Цифровых решений» с поддержкой 1Гб/с, 10 Гб/с портов на собственном FPGA: <a href="https://dsol.ru/telecommunication/switches/" target="_blank" rel="nofollow">Феникс-1/10G</a>.<br/>
Обещали на базе этого FPGA потом выпустить ASIC, но чем история закончилась неизвестно.<br/>
<br/>
<hr/><br/>
<a name="MERCHANTS_VS_CUSTOMERS" rel="nofollow"></a><br/>
<h2>Merchant vs Custom</h2><br/>
Несмотря на всё вышеперечисленное, вендоры, конечно же, используют рыночные чипы. Те же Nexus (3xxx) или NCS5500 используют бродкомовские, инновиумские и барефутовские чипы.<br/>
Juniper QFX5xxx и Huawei Cloud Engine — бродкомовские.<br/>
<br/>
<h3>За</h3><br/>
Что заставляет их использовать рыночные вместо собственных?<br/>
Ну тупо проще взять готовенькое, впаять в плату и продать. Пресловутый Time To Market — хотя и с оговорками.<br/>
Экономия ресурсов на разработке такой сложной штуки, как микросхема по технологии 7нм с производительностью 25,6 Тб/с.<br/>
Компания, которая сосредоточена на разработке только чипов, развивает их гораздо быстрее как в плане производительности, так и функциональности.<br/>
Кто-то уже постарался и собрал информацию о том, какие функции нужны клиентам и все их реализовал<br/>
<br/>
<h3>Против</h3><br/>
В таком случае, что вендоров заставляет делать свои чипы, раз всё так хорошо?<br/>
<br/>
А вот и оговорки с TTM — внести изменения в свой ASIC и выпустить следующую исправленную версию — проще и быстрее, чем запускать бюрократический маховик большой сторонней компании. <br/>
<br/>
Кроме того до недавних пор не существовало программируемых рыночных чипов — вендору нужно было полагаться на фиксированный пайплайн или весьма урезанный SDK, предоставляемый поставщиком.<br/>
И производители сетевого оборудования сами начали учиться это делать, чтобы новые функции внедрять не перепаиванием асиков, а релизом новой версии софта.<br/>
<br/>
Кроме того, едва ли бродком возьмётся за реализацию проприетарных протоколов или других функций, которые нужны одному покупателю — это же массовый рынок.<br/>
<br/>
Никуда не спрятать вопрос безопасности. Тут своё родное — знаешь каждую закладочку.<br/>
<br/>
Не всегда может устроить реализация QoS на рыночных чипах. На своих можно замутить любые мутки.<br/>
<br/>
Свой SDK — свои разработчики, которые его поправят. Чужой SDK — чужие баги, давайте сдавать, решать, тестировать — времени требуется значительно больше.<br/>
<br/>
В общем, хорошо, что мы находимся сейчас в ситуации высококонкурентного рынка, и мы каждые полтора-два года можем получать ещё более мощные коммутаторы по ещё более низким ценам. <br/>
<br/>
<hr/><br/>
Ну а если вдруг вам надоели все эти наши Клозы и масс-маркет-силиконы, и душа просит чего-то совсем экзотического, то вот почитайте, как строятся <a href="https://fuse.wikichip.org/news/3293/inside-rosetta-the-engine-behind-crays-slingshot-exascale-era-interconnect/" target="_blank" rel="nofollow">суперкомпьютеры для High Performance Computing'а</a>.<br/>
<br/>
<hr/><br/>
<br/>
<a name="LINKS" rel="nofollow"></a><br/>
<h1>Полезные ссылки</h1><br/>
В этот раз хоть под кат убирай. Но, поверьте, я оставил тут только самые хорошие источники, прочитанные лично моими глазами и отобранные лично моими руками.<br/>
<br/>
<ul><li><b>Архитектура сетевых устройств</b><br/>
<ul><li><a href="https://www.cisco.com/c/dam/global/hr_hr/assets/ciscoconnect/2013/pdfs/Anatomy_of_Core_Network_Elements_Josef_Ungerman.pdf" target="_blank" rel="nofollow">Anatomy of Internet Routers</a><br/>
</li><li><a href="https://people.ucsc.edu/~warner/Bufs/BRKDCN-3734.pdf" target="_blank" rel="nofollow">Cisco Nexus 3000 Switch Architecture</a><br/>
</li><li><a href="https://habr.com/ru/post/307696/" target="_blank" rel="nofollow">Juniper Hardware Architecture</a><br/>
</li><li><a href="https://www.amazon.com/Hardware-Defined-Networking-Brian-Petersen/dp/B075LY9CNM" target="_blank" rel="nofollow">Hardware Defined Networking</a><br/>
</li><li><a href="https://linkmeup.ru/blog/401.html" target="_blank" rel="nofollow">Как сделать коммутатор?</a><br/>
</li><li><a href="https://linkmeup.ru/blog/312.html" target="_blank" rel="nofollow">Сети для самых маленьких. Часть четырнадцатая. Путь пакета</a><br/>
</li></ul></li><li><b>Архитектура ASIC</b><br/>
<ul><li><a href="https://www.youtube.com/watch?v=Ti3t9OAZL3g" target="_blank" rel="nofollow">Packet Pushers. Understanding ASICs For Network Engineers (Pete Lumbis)</a><br/>
</li><li><a href="https://www.ciscolive.com/c/dam/r/ciscolive/us/docs/2016/pdf/BRKARC-3467.pdf" target="_blank" rel="nofollow">Cisco Enterprise ASICs</a><br/>
</li><li><a href="https://people.ucsc.edu/~warner/Bufs/CSG-DNX-Switching-J2%20Feb%2016%202018.pdf" target="_blank" rel="nofollow">Broadcom Ships Jericho2</a><br/>
</li><li><a href="https://www.nextplatform.com/2019/12/12/broadcom-launches-another-tomahawk-into-the-datacenter/" target="_blank" rel="nofollow">Broadcom Launches Another Tomahawk Into The Datacenter</a><br/>
</li><li><a href="https://platformlab.stanford.edu/Seminar%20Talks/programming_line_rate_switches.pdf" target="_blank" rel="nofollow">Programmable Pipeline</a><br/>
</li><li><a href="https://seekingalpha.com/article/4276568-important-development-of-this-century" target="_blank" rel="nofollow">The Most Important Development Of This Century</a><br/>
</li></ul></li><li><b>Программируемость</b><br/>
<ul><li><a href="http://klamath.stanford.edu/~nickm/papers/ancs48-gibb.pdf" target="_blank" rel="nofollow">Design Principles for Packet Parsers</a>.<br/>
</li><li><a href="https://www2.cs.duke.edu/courses/fall19/compsci514/papers/rmt-sigcomm2013.pdf" target="_blank" rel="nofollow">Fast Programmable Match-Action Processing in Hardware for SDN</a><br/>
</li><li><a href="https://www.hotchips.org/wp-content/uploads/hc_archives/hc29/HC29.20-Tutorials-Pub/HC29.20.1-P4-Soft-Net-Pub/HC29.21.100-P4-Tutorial.pdf" rel="nofollow">P4 Tutorial, Hot Chips 2017</a><br/>
</li></ul></li><li><b>Архитектура памяти</b><br/>
<ul><li><a href="https://people.ucsc.edu/~warner/buffer.html" target="_blank" rel="nofollow">Packet Buffers</a>. Отсюда по ссылкам разворачиваются разнообразные материалы очень глубоко<br/>
</li><li><a href="https://people.ucsc.edu/~warner/Bufs/Buffering-WP_August_2017.pdf" target="_blank" rel="nofollow">An Update on Router Buffering</a><br/>
</li><li><a href="https://xrdocs.io/ncs5500/blogs/2018-05-07-ncs-5500-buffering-architecture/" target="_blank" rel="nofollow">NCS 5500 Buffering Architecture</a><br/>
</li><li><a href="https://www.cisco.com/c/en/us/products/collateral/switches/nexus-5020-switch/white_paper_c11-465436.html" target="_blank" rel="nofollow">Cisco Nexus 5000 Series Switches</a>. Cut-through and Store-and-Forward<br/>
</li><li><a href="https://www.juniper.net/documentation/en_US/junos/topics/concept/cos-qfx-series-congestion-notification-understanding.html#jd0e554" target="_blank" rel="nofollow">Understanding CoS Flow Control (Ethernet PAUSE and PFC)</a><br/>
</li><li><a href="https://github.com/Mellanox/mlxsw/wiki/Quality-of-Service" target="_blank" rel="nofollow">Quality of Service</a>. Headroom buffers<br/>
</li></ul></li><li><b>Реализации очередей</b><br/>
<ul><li><a href="https://archive.nanog.org/sites/default/files/wednesday_tutorial_szarecki_packet-buffering.pdf" target="_blank" rel="nofollow">Strategies of packet buffering inside Routers</a><br/>
</li><li><a href="https://www.juniper.net/documentation/en_US/junos/topics/concept/cos-qfx-series-voq-understanding.html" target="_blank" rel="nofollow">Understanding CoS Virtual Output Queues (VOQs) on QFX10000 Switches</a><br/>
</li><li><a href="https://forums.juniper.net/t5/forums/recentpostspage/post-type/message/category-id/Blogs/user-id/101479" target="_blank" rel="nofollow">What is VOQ and why you should care?</a><br/>
</li></ul></li><li><b>Deep Buffers</b><br/>
<ul><li><a href="https://forums.juniper.net/t5/Enterprise-Cloud-and/Not-all-deep-buffer-switches-are-created-equal/ba-p/318393" target="_blank" rel="nofollow">Not all deep buffer switches are created equal</a><br/>
</li><li><a href="https://packetpushers.net/aristas-big-buffer-b-s/" target="_blank" rel="nofollow">Arista’s Big Buffer B.S.</a><br/>
</li><li><a href="http://miercom.com/pdf/reports/20160210.pdf" target="_blank" rel="nofollow">Speeding Applications in Data Center Networks. The Interaction of Buffer Size and TCP Protocol Handling and its Impact on Data-Mining and Large Enterprise IT Traffic Flows</a><br/>
</li></ul></li><li><a href="https://tools.ietf.org/html/rfc8257" target="_blank" rel="nofollow">Data Center TCP (DCTCP): TCP Congestion Control for Data Centers</a><br/>
</li><li><a href="https://support.huawei.com/enterprise/en/doc/EDOC1100086962" target="_blank" rel="nofollow">Understanding Microburst</a><br/>
</li><li>Ну и немного мотивационных видео от Broadcom<br/>
<ul><li><a href="https://www.youtube.com/watch?v=t_fwyKs1wJ0&" target="_blank" rel="nofollow">Introduction to Broadcom's Switch Portfolio</a><br/>
</li><br/>
<li><a href="https://www.youtube.com/watch?v=2HvxxK39BXM" target="_blank" rel="nofollow">Broadcom Trident4: Disrupting the Enterprise Data Center & Campus</a><br/>
</li><li><a href="https://www.youtube.com/watch?v=B-COGMbaUg4" target="_blank" rel="nofollow">Broadcom Tomahawk4: Industry's Highest Bandwidth Chip</a><br/>
</li><li><a href="https://www.youtube.com/watch?v=JUgyaSoErlQ" target="_blank" rel="nofollow">Jericho2: Driving Merchant Silicon Revolution</a><br/>
</li></ul></li></ul><hr/><br/>
<br/>
<h1>Заключение</h1><br/>
Что ещё сказать после ста двадцати трёх тысяч символов? Только то, что многое из того, что вы прочитали в этот раз — частные случаи, которые могут быть (и будут) несправедливых в других ситуациях.<br/>
Как только сетевой инженер смещает свой фокус со стандартизированных протоколов в область обработки пакетов, он падает в пропасть бесконечных компромиссов, где нет универсальных ответов, нет RFC, нет исчерпывающих мануалов. И чем <a href="https://pikabu.ru/story/naskolko_gluboka_yeta_peshchera_7041398" target="_blank" rel="nofollow">глубже</a> он падает, тем страшнее становится разнообразие деталей и нюансов.<br/>
<br/>
Эта статья планировалась небольшой заметкой о буферах — хотелось копнуть неглубокую ямку и выяснить, чем отличаются Shallow Buffer от Deep. Всё началось с небольшой <a href="https://people.ucsc.edu/~warner/buffer.html" target="_blank" rel="nofollow">странички</a>, подбивающей информацию о размерах буферов. А потом ссылочка за ссылочкой и размотался клубок. Стало понятно, что без разбора типов чипов не обойтись, дальше пришлось углубиться в архитектуру. Здесь бы и тормознуть, но верёвка уже оборвалась. <br/>
<hr/><br/>
<br/>
<h1>Спасибы</h1><br/>
<ul><li>Андрею Глазкову (glazgoo) за рецензию и дельные замечания о коммерческих чипах</li><li>Михаилу Соколову (insektazz) за ликбез по устройству чипов, SerDes и Silicon Photonics</li><li>Александру Клименко (v0lk) за обнаружение точек роста в вопросах Pipeline'ов</li><li>Александру Азимову (mitradir) за комментарии о Lossless Ethernet</li><li>Дмитрию Афанасьеву (fl0w) за дополнения ко всем частям статьи</li><li>Артёму Чернобаю за КДПВ</li></ul><br/>
<blockquote>Особо благодарных просим задержаться и пройти на <a href="https://www.patreon.com/linkmeup?ty=h" target="_blank" rel="nofollow">Патреон</a>.<br/>
<a href="https://www.patreon.com/linkmeup?ty=h" target="_blank" rel="nofollow"><img src="https://fs.linkmeup.ru/images/patreon.jpg" width="400"/></a><br/>
</blockquote>
        
    
</div> 


                

    <footer class="topic-footer">
        <ul class="topic-tags js-favourite-insert-after-form js-favourite-tags-topic-537">
            <li><i class="icon-synio-tags"></i></li>
            
            <li><a rel="tag" href="https://linkmeup.ru/tag/%D1%81%D0%B5%D1%82%D0%B8%20%D0%B4%D0%BB%D1%8F%20%D1%81%D0%B0%D0%BC%D1%8B%D1%85%20%D0%BC%D0%B0%D0%BB%D0%B5%D0%BD%D1%8C%D0%BA%D0%B8%D1%85/">сети для самых маленьких</a></li><li class="topic-tags-edit js-favourite-tag-edit" style="display:none;"><a href="#" onclick="return ls.favourite.showEditTags(537,'topic',this);" class="link-dotted">изменить свои теги</a></li>     </ul>
        
        
        <div class="topic-share" id="topic_share_537">
            
                <div class="yashare-auto-init" data-yashareTitle="Buffers" data-yashareLink="https://linkmeup.ru/blog/537.html" data-yashareL10n="ru" data-yashareType="button" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj,gplus"></div>
            
            <div class="arrow"></div>
            <div class="close" onclick="jQuery('#topic_share_537').slideToggle(); return false;"></div>
        </div>


        <ul class="topic-info">
            
            <li class="topic-info-date">
                <time datetime="2020-02-18T01:00:19+03:00" title="18 февраля 2020, 01:00">
                    18 февраля 2020, 01:00
                </time>
            </li>
            <li class="topic-info-share" data-topic-id="537" onclick="jQuery('#topic_share_537').slideToggle(); return false;"><i class="icon-synio-share-blue" title="Поделиться"></i></li>
            
            <li class="topic-info-favourite" onclick="return ls.favourite.toggle(537,$('#fav_topic_537'),'topic');">
                <i id="fav_topic_537" class="favourite "></i>
                <span class="favourite-count" id="fav_count_topic_537"></span>
            </li>
        
            

                                                    
            <li class="topic-info-vote">
                <div id="vote_area_topic_537" class="vote-topic
                                                                                                                                                                                                                        vote-count-zero
                                                                                                                                                                                                                
                                                                                                                                        
                                                                                                                                            not-voted
                                                                                                                                        
                                                                                                                                            vote-nobuttons
                                                                                                                                        
                                                                    
                                                                    js-infobox-vote-topic">
                    <div class="vote-item vote-down" onclick="return ls.vote.vote(537,this,-1,'topic');"><span><i></i></span></div>
                    <div class="vote-item vote-count" title="всего проголосовало: 0">
                        <span id="vote_total_topic_537">
                                                            0
                                                    </span>
                    </div>
                    <div class="vote-item vote-up" onclick="return ls.vote.vote(537,this,1,'topic');"><span><i></i></span></div>
                                            <div id="vote-info-topic-537" style="display: none;">
                            <ul class="vote-topic-info">
                                <li><i class="icon-synio-vote-info-up"></i> 0</li>
                                <li><i class="icon-synio-vote-info-down"></i> 0</li>
                                <li><i class="icon-synio-vote-info-zero"></i> 0</li>
                                
                            </ul>
                        </div>
                                    </div>
            </li>
                        <li class="topic-info-date">
                                                            <div class="viewcount_icon"></div>
                                                        0
            </li>   
        </ul>

        
                    
            </footer>
</article> <!-- /.topic -->






<div class="comments" id="comments">
    <header class="comments-header">
        <h3><span id="count-comments">0</span> комментариев</h3>
        
                    <div class="subscribe">
                <input checked="checked" type="checkbox" id="comment_subscribe" class="input-checkbox" onchange="ls.subscribe.toggle('topic_new_comment','537','',this.checked);">
                <label for="comment_subscribe">подписаться на новые комментарии</label>
            </div>
            
        <a name="comments"></a>
    </header>

        </div>              
    
    




    
                <div class="modal modal-image-upload" id="window_upload_img">
    <header class="modal-header">
        <h3>Вставка изображения</h3>
        <a href="#" class="close jqmClose"></a>
    </header>
    
    <div class="modal-content">
        <ul class="nav nav-pills nav-pills-tabs">
            <li class="active js-block-upload-img-item" data-type="pc"><a href="#">С компьютера</a></li>
            <li class="js-block-upload-img-item" data-type="link"><a href="#">Из интернета</a></li>
        </ul>
    
        <form method="POST" action="" enctype="multipart/form-data" id="block_upload_img_content_pc" onsubmit="return false;" class="tab-content js-block-upload-img-content" data-type="pc">
            <p><label for="img_file">Файл:</label>
            <input type="file" name="img_file" id="img_file" value="" class="input-text input-width-full" /></p>
            
            
            
            <p>
                <label for="form-image-align">Выравнивание:</label>
                <select name="align" id="form-image-align" class="input-width-full">
                    <option value="">нет</option>
                    <option value="left">слева</option>
                    <option value="right">справа</option>
                    <option value="center">по центру</option>
                </select>
            </p>
            
            <p><label for="form-image-title">Описание:</label>
            <input type="text" name="title" id="form-image-title" value="" class="input-text input-width-full" /></p>
            
            
            
            <button type="submit"  class="button button-primary" onclick="ls.ajaxUploadImg('block_upload_img_content_pc','form_comment_text');">Загрузить</button>
            <button type="submit"  class="button jqmClose">Отмена</button>
        </form>
        
        
        <form method="POST" action="" enctype="multipart/form-data" id="block_upload_img_content_link" onsubmit="return false;" style="display: none;" class="tab-content js-block-upload-img-content" data-type="link">
            <p><label for="img_file">Ссылка на изображение:</label>
            <input type="text" name="img_url" id="img_url" value="http://" class="input-text input-width-full" /></p>

            <p>
                <label for="form-image-url-align">Выравнивание:</label>
                <select name="align" id="form-image-url-align" class="input-width-full">
                    <option value="">нет</option>
                    <option value="left">слева</option>
                    <option value="right">справа</option>
                    <option value="center">по центру</option>
                </select>
            </p>

            <p><label for="form-image-url-title">Описание:</label>
                <input type="text" name="title" id="form-image-url-title" value="" class="input-text input-width-full" /></p>

            

            <button type="submit"  class="button button-primary" onclick="ls.topic.insertImageToEditor(jQuery('#img_url').val(),jQuery('#form-image-url-align').val(),jQuery('#form-image-url-title').val());">Вставить как ссылку</button>
            или
            <button type="submit"  class="button button-primary" onclick="ls.ajaxUploadImg('block_upload_img_content_link','form_comment_text');">Загрузить</button>
            <button type="submit"  class="button jqmClose">Отмена</button>
        </form>
    </div>
</div>
    

        <script type="text/javascript">
        jQuery(function($){
            ls.lang.load({"panel_b":"\u0436\u0438\u0440\u043d\u044b\u0439","panel_i":"\u043a\u0443\u0440\u0441\u0438\u0432","panel_u":"\u043f\u043e\u0434\u0447\u0435\u0440\u043a\u043d\u0443\u0442\u044b\u0439","panel_s":"\u0437\u0430\u0447\u0435\u0440\u043a\u043d\u0443\u0442\u044b\u0439","panel_url":"\u0432\u0441\u0442\u0430\u0432\u0438\u0442\u044c \u0441\u0441\u044b\u043b\u043a\u0443","panel_url_promt":"\u0412\u0432\u0435\u0434\u0438\u0442\u0435 \u0441\u0441\u044b\u043b\u043a\u0443","panel_code":"\u043a\u043e\u0434","panel_video":"\u0432\u0438\u0434\u0435\u043e","panel_image":"\u0438\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435","panel_cut":"\u043a\u0430\u0442","panel_quote":"\u0446\u0438\u0442\u0438\u0440\u043e\u0432\u0430\u0442\u044c","panel_list":"\u0421\u043f\u0438\u0441\u043e\u043a","panel_list_ul":"UL LI","panel_list_ol":"OL LI","panel_title":"\u0417\u0430\u0433\u043e\u043b\u043e\u0432\u043e\u043a","panel_clear_tags":"\u043e\u0447\u0438\u0441\u0442\u0438\u0442\u044c \u043e\u0442 \u0442\u0435\u0433\u043e\u0432","panel_video_promt":"\u0412\u0432\u0435\u0434\u0438\u0442\u0435 \u0441\u0441\u044b\u043b\u043a\u0443 \u043d\u0430 \u0432\u0438\u0434\u0435\u043e","panel_list_li":"\u043f\u0443\u043d\u043a\u0442 \u0441\u043f\u0438\u0441\u043a\u0430","panel_image_promt":"\u0412\u0432\u0435\u0434\u0438\u0442\u0435 \u0441\u0441\u044b\u043b\u043a\u0443 \u043d\u0430 \u0438\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435","panel_user":"\u0432\u0441\u0442\u0430\u0432\u0438\u0442\u044c \u043f\u043e\u043b\u044c\u0437\u043e\u0432\u0430\u0442\u0435\u043b\u044f","panel_user_promt":"\u0412\u0432\u0435\u0434\u0438\u0442\u0435 \u043b\u043e\u0433\u0438\u043d \u043f\u043e\u043b\u044c\u0437\u043e\u0432\u0430\u0442\u0435\u043b\u044f"});
            // Подключаем редактор
            $('.markitup-editor').markItUp(ls.settings.getMarkitupComment());
        });
    </script>

    
        <h4 class="reply-header" id="comment_id_0">
            <a href="#" class="link-dotted" onclick="ls.comments.toggleCommentForm(0); return false;">Оставить комментарий</a>
        </h4>
        
        
        <div id="reply" class="reply">      
            <form method="post" id="form_comment" onsubmit="return false;" enctype="multipart/form-data">
                
                
                <textarea name="comment_text" id="form_comment_text" class="mce-editor markitup-editor input-width-full"></textarea>
                
                
                
                <button type="submit"  name="submit_comment" 
                        id="comment-button-submit" 
                        onclick="ls.comments.add('form_comment',537,'topic'); return false;" 
                        class="button button-primary">добавить</button>
                <button type="button" onclick="ls.comments.preview();" class="button">предпросмотр</button>
                
                <input type="hidden" name="reply" value="0" id="form_comment_reply" />
                <input type="hidden" name="cmt_target_id" value="537" />
            </form>
        </div>
        





            
        </div> <!-- /content -->
    </div> <!-- /wrapper -->


    
    <footer id="footer">
        
        
        
        
        
        
        
    
        
        
        
    </footer>
</div> <!-- /container -->

<aside class="toolbar" id="toolbar">
    

                                <section class="toolbar-admin">
    <a href="https://linkmeup.ru/admin/" title="Админка">
        <i></i>
    </a>
</section>

                                                <section class="toolbar-update" id="update" style="">
        <a href="#" class="update-comments" id="update-comments" onclick="ls.comments.load(537,'topic'); return false;"><i></i></a>
        <a href="#" class="new-comments" id="new_comments_counter" style="display: none;" title="Число новых комментариев" onclick="ls.comments.goToNextComment(); return false;"></a>

        <input type="hidden" id="comment_last_id" value="0" />
        <input type="hidden" id="comment_use_paging" value="" />
    </section>

                                        <section class="toolbar-scrollup" id="toolbar_scrollup">
    <a href="#" onclick="return ls.toolbar.up.goUp();" title="Вверх"><i></i></a>
</section>
            
</aside>

<p align="center">
    Profiler: Off | 
    <a href="https://linkmeup.ru/profiler/">Profiler reports</a>
</p>    <div class="stat-performance">
        
        <table>
            <tr>
                <td>
                    <h4>MySql</h4>
                    query: <strong>12</strong><br />
                    time: <strong>0,004</strong>
                </td>
                <td>
                    <h4>Cache</h4>
                    query: <strong>54</strong><br />
                    &mdash; set: <strong>9</strong><br />
                    &mdash; get: <strong>27</strong><br />
                    time: <strong>0,08496</strong>
                </td>
                <td>
                    <h4>PHP</h4>    
                    time load modules: <strong>0,011</strong><br />
                    full time: <strong>0,13</strong>
                </td>
                
            </tr>
        </table>
        
    </div>


<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter17963245 = new Ya.Metrika({ id:17963245, enableAll: true });
        } catch(e) { }
    });
    
    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/17963245" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>
