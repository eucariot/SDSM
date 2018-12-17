# Практика Полисинг и шейпинг

Схема та же:

![](../../.gitbook/assets/image-59.png)

[_Файл конфигурации._](https://docs.google.com/document/d/e/2PACX-1vTrtK-fnUH8KO8UjTlScnv4xT-5FAsp7mDITqtDjtFHDZXJYg4UPvQnhQ5B9JqydfNuY_1-Ho9_RjIH/pub)

Такую картину наблюдаем без применения ограничений:

![](../../.gitbook/assets/image-86.png)

Мы поступим следующим образом:

* На входном интерфейсе Linkmeup\_R2 \(e0/1\) настроим полисинг — это будет входной контроль. По договору мы даём 10 Мб/с.
* На выходном интерфейсе Linkmeup\_R4 \(e0/2\) настроим шейпинг на 20 Мб/с.

  Начнём с шейпера на **Linkmeup\_R4**.  
  Матчим всё:

```text
class-map match-all TRISOLARANS_ALL_CM
match any
```

Шейпим до 20Мб/с:

```text
policy-map TRISOLARANS_SHAPING
class TRISOLARANS_ALL_CM
shape average 20000000
```

Применяем на выходной интерфейс:

```text
interface Ethernet0/2
service-policy output TRISOLARANS_SHAPING
```

Всё, что должно покинуть \(output\) интерфейс Ethernet0/2, шейпим до 20 Мб/с.

[_Файл конфигурации шейпера._](https://docs.google.com/document/d/e/2PACX-1vQ0FLKJi6_dxwvmvIWKISVSZIurHrw896wEBuXVTbkoo677VFS0S5cZv6FCJrBqhmAsaDChoUvR4172/pub)

И вот результат:

![](../../.gitbook/assets/image-133.png)

Получается достаточно ровная линия общей пропускной способности и рваные графики по каждому отдельному потоку.

Дело в том, что ограничиваем мы шейпером именно общую полосу. Однако в зависимости от платформы отдельные потоки тоже могут шейпиться индивидуально, таким образом получая равные возможности.

Теперь настроим полисинг на Linkmeup\_R2.

К существующей политике добавим полисер.

```text
policy-map TRISOLARANS_ADMISSION_CONTROL
class TRISOLARANS_TCP_CM
 police cir 10000000 bc 1875000 conform-action transmit exceed-action drop
```

На интерфейс политика уже применена:

```text
interface Ethernet0/1
 service-policy input TRISOLARANS_ADMISSION_CONTROL
```

Здесь указываем среднюю разрешённую скорость CIR \(10Mб/с\) и разрешённый всплеск Bc \(1 875 000 байтов или около 14,6 МБ\).

Позже, [объясняя, как работает полисер](4-mekhanizmy-leaky-bucket-i-token-bucket/1-algoritm-token-bucket.md), я расскажу, что за CIR да Bc и как эти величины определять.

[_Файл конфигурации полисера._](https://docs.google.com/document/d/e/2PACX-1vTl81fiPO4MFeznoyoCGOF_rHbt7p7jUS0WosHgPVNObZo_WtMwThneBdu1LUUG9A0OFxBtmKOYXOUE/pub)

Такая картина наблюдается при полисинге. Сразу видно резкие изменения уровня скорости:

![](../../.gitbook/assets/image-13.png)

А вот такая любопытная картина получается, если мы сделаем слишком маленьким допустимый размер всплеска, например, 10 000 байтов.

```text
police cir 10000000 bc 10000 conform-action transmit exceed-action drop
```

![](../../.gitbook/assets/image-83.png)

Общая скорость сразу упала до примерно 2Мб/с.

Будьте аккуратнее с настройкой всплесков:\)

[_Таблица тестов._](https://drive.google.com/file/d/1YwKgZTynOpMJ__IapR-qzsRmh6BsJNKf/view?usp=sharing)

