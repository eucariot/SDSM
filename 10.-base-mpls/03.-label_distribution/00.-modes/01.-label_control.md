**Ordered Control против Independent Control**

_**Во-вторых**_, LSR может дожидаться, когда со стороны Egress LER придёт метка данного FEC, прежде чем рассказывать вышестоящим соседям. А может разослать метки для FEC, как только узнал о нём.

Первый режим называется _**Ordered Control**_

![](https://github.com/eucariot/SDSM/tree/7b345502febe9fd2568a2f2a3ba95b9749b5840f/habrastorage.org/files/36f/ea5/c7e/36fea5c7edcb49679ded58494d19d604.gif)

Гарантирует, что к моменту передачи данных весь путь вплоть до выходного LER будет построен.

Второй режим — _**Independent Control**_.

![](https://github.com/eucariot/SDSM/tree/7b345502febe9fd2568a2f2a3ba95b9749b5840f/habrastorage.org/files/08d/b3d/af5/08db3daf5031411a9e2b6fcc1407fe16.gif)

То есть метки передаются неупорядоченно. Удобен тем, что трафик можно начинать передавать ещё до того, как весь путь построен. Этим же и опасен.
