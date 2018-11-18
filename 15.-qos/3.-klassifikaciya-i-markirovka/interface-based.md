# Interface-based

Это наиболее простой способ классифицировать пакеты в лоб. Всё, что насыпалось в указанный интерфейс, помечается определённым классом.

В большинстве случае такой гранулярности не хватает. Поэтому Interface-based классификация не сказать, что часто встречается в чистом виде.

## **Практика по Interface-based классификации**

Схема та же:

![](../../.gitbook/assets/image-140.png)

Настройка политик QoS в оборудовании большинства вендоров делится на этапы.

1. Сначала определяется классификатор:

   ```text
   class-map match-all TRISOLARANS_INTERFACE_CM
   match input-interface Ethernet0/2
   ```

   Всё, что приходит на интерфейс Ethernet0/2.

2. Далее создаётся политика, где связываются классификатор и необходимое действие.

   ```text
   policy-map TRISOLARANS_REMARK
   class TRISOLARANS_INTERFACE_CM
   set ip dscp cs7
   ```

   Если пакет удовлетворяет классификатору TRISOLARANS\_INTERFACE\_CM, записать в поле DSCP значение CS7.

3. И последним шагом применить политику на интерфейс:

   ```text
   interface Ethernet0/2
   service-policy input TRISOLARANS_REMARK
   ```

   > Здесь немного избыточен классификатор, который проверят что пакет пришёл на интерфейс e0/2, куда мы потом и применяем политику. Можно было бы написать match any:
   >
   > ```text
   > class-map match-all TRISOLARANS_INTERFACE_CM
   > match any
   > ```
   >
   > Однако политика на самом деле может быть применена на vlanif или на выходной интерфейс, поэтому можно.

{% hint style="warning" %}
Здесь я забегаю вперёд, используя непонятные CS7, а далее EF, AF. [Ниже](rekomendacii-ietf-kategorii-trafika-klassy-servisa-i-modeli-povedeniya.md) можно прочитать про эти аббревиатуры и принятые договорённости. Пока же достаточно знать, что это разные классы с разным уровнем сервиса.
{% endhint %}

Пускаем обычный пинг на 172.16.2.2 \(Trisolaran2\) с Trisolaran1:

![](../../.gitbook/assets/image-203.png)

И в дампе между Linkmeup\_R1 и Linkmeup\_R2 увидим следующее:

![](../../.gitbook/assets/image-79.png)

[_pcapng_](https://yadi.sk/d/h2D-6_WR3ZHWyG)

[_Файл конфигурации Interface-Based классификации_](https://docs.google.com/document/d/e/2PACX-1vSoH4VY5HIuVDeWCk2F7_3xTGMmXcyunODWK9_BHCcCfyoAipQZS4pej-tKNcH_6UOQYeQomDqQ6Jlx/pub)

