<?php
require_once("header.php");
?>
    <main class="main">
    <h3>Таблица элементов</h3>
    <!-- Определим основную таблицу-контейнер размером 4x4, в которой каждая ячейка будет представлять
     собой по существу вложенную таблицу для создания структуры для отдельного химического элемента. -->
    <table class="table-main">
        <!--**************************** Первый ряд таблицы-контейнера ****************************-->
        <tr>
            <!--*************************** Оформление элемента Водород ****************************-->
            <td>
                <!-- Создадим в ячейке для элемента блочный элемент div и через класс определим в CSS
                    для него фиксированные размеры 100x70 px. Можно подумать, что это довольно странное
                    решение, я тоже так думаю, но всему виной условие задачи о ссылке на Википедию для элемента.
                    Возможно, внедрение такого div и избыточно, но нет времени думать - надо делать! -->
                <div class="table-main-div pink-element">
                    <!-- Расположим в имеющемся div элемент ссылки <a>. На тело данной ссылки должна быть отображена
                        вложенная таблица представляющая отдельный химический элемент. Так как стандарт
                        HTML5 запрещает вложение в элемент ссылки <a> что-либо кроме фразового контента,
                        превратим данную ссылку в блочный элемент через правило display: block в CSS.
                        Также явно зададим линейные размеры нашей блочной ссылки как 100% от ее родителя,
                        чтобы она покрывала весь div уровнем выше, и не вылезало никаких графических артефактов.
                        Понятия не имею можно ли сделать проще, но я смог придумать только такой способ, чтобы
                        корректно внедрить внутрь строкового ссылочного элемента явно не фразовый контент. -->
                    <a class="a-block" href="https://ru.wikipedia.org/wiki/%D0%92%D0%BE%D0%B4%D0%BE%D1%80%D0%BE%D0%B4">
                        <!-- Определим структуру вложенный таблицы для представления отдельного химического элемента -->
                        <!-- Такая же структура копипастой распространяется на все остальные элементы, за исключением
                            последних скандия и титана, чье оформление зеркально симметрично относительно вертикали. -->
                        <table class="table-element">
                            <tr>
                                <!-- Ячейка обозначающая символ химического элемента -->
                                <td class="table-symbol text-left" rowspan="2">
                                    H
                                </td>
                                <!-- Ячейка обозначающая порядковый номер химического элемента -->
                                <td class="table-number text-right">
                                    1
                                </td>
                            </tr>
                            <tr>
                                <!-- Ячейка обозначающая атомную массу химического элемента -->
                                <td class="table-mass text-right">
                                    1,00797
                                </td>
                            </tr>
                            <tr>
                                <!-- Ячейка обозначающая наименование химического элемента -->
                                <td class="table-name" colspan="2">Водород</td>
                            </tr>
                        </table>
                    </a>
                </div>
            </td>
            <td>
                <div class="table-main-div"></div>
            </td>
            <td>
                <div class="table-main-div"></div>
            </td>
            <td>
                <div class="table-main-div"></div>
            </td>
        </tr>
        <!--**************************** Второй ряд таблицы-контейнера ****************************-->
        <tr>
            <td>
                <div class="table-main-div pink-element">
                    <a class="a-block" href="https://ru.wikipedia.org/wiki/%D0%9B%D0%B8%D1%82%D0%B8%D0%B9">
                        <table class="table-element">
                            <tr>
                                <td class="table-symbol text-left" rowspan="2">
                                    Li
                                </td>
                                <td class="table-number text-right">
                                    3
                                </td>
                            </tr>
                            <tr>
                                <td class="table-mass text-right">
                                    6,939
                                </td>
                            </tr>
                            <tr>
                                <td class="table-name text-left" colspan="2">Литий</td>
                            </tr>
                        </table>
                    </a>
                </div>
            </td>
            <td>
                <div class="table-main-div pink-element">
                    <a class="a-block" href="https://ru.wikipedia.org/wiki/%D0%91%D0%B5%D1%80%D0%B8%D0%BB%D0%BB%D0%B8%D0%B9">
                        <table class="table-element">
                            <tr>
                                <td class="table-symbol text-left" rowspan="2">
                                    Be
                                </td>
                                <td class="table-number text-right">
                                    4
                                </td>
                            </tr>
                            <tr>
                                <td class="table-mass text-right">
                                    9,0122
                                </td>
                            </tr>
                            <tr>
                                <td class="table-name text-left" colspan="2">Бериллий</td>
                            </tr>
                        </table>
                    </a>
                </div>
            </td>
            <td>
                <div class="table-main-div yellow-element">
                    <a class="a-block" href="https://ru.wikipedia.org/wiki/%D0%91%D0%BE%D1%80_(%D1%8D%D0%BB%D0%B5%D0%BC%D0%B5%D0%BD%D1%82)">
                        <table class="table-element">
                            <tr>
                                <td class="table-symbol text-left" rowspan="2">
                                    B
                                </td>
                                <td class="table-number text-right">
                                    5
                                </td>
                            </tr>
                            <tr>
                                <td class="table-mass text-right">
                                    10,811
                                </td>
                            </tr>
                            <tr>
                                <td class="table-name text-left" colspan="2">Бор</td>
                            </tr>
                        </table>
                    </a>
                </div>
            </td>
            <td>
                <div class="table-main-div yellow-element">
                    <a class="a-block" href="https://ru.wikipedia.org/wiki/%D0%A3%D0%B3%D0%BB%D0%B5%D1%80%D0%BE%D0%B4">
                        <table class="table-element">
                            <tr>
                                <td class="table-symbol text-left" rowspan="2">
                                    C
                                </td>
                                <td class="table-number text-right">
                                    6
                                </td>
                            </tr>
                            <tr>
                                <td class="table-mass text-right">
                                    6,939
                                </td>
                            </tr>
                            <tr>
                                <td class="table-name text-left" colspan="2">Углерод</td>
                            </tr>
                        </table>
                    </a>
                </div>
            </td>
        </tr>
        <!--**************************** Третий ряд таблицы-контейнера ****************************-->
        <tr>
            <td>
                <div class="table-main-div pink-element">
                    <a class="a-block" href="https://ru.wikipedia.org/wiki/%D0%9D%D0%B0%D1%82%D1%80%D0%B8%D0%B9">
                        <table class="table-element">
                            <tr>
                                <td class="table-symbol text-left" rowspan="2">
                                    Na
                                </td>
                                <td class="table-number text-right">
                                    11
                                </td>
                            </tr>
                            <tr>
                                <td class="table-mass text-right">
                                    22,9898
                                </td>
                            </tr>
                            <tr>
                                <td class="table-name text-left" colspan="2">Натрий</td>
                            </tr>
                        </table>
                    </a>
                </div>
            </td>
            <td>
                <div class="table-main-div pink-element">
                    <a class="a-block" href="https://ru.wikipedia.org/wiki/%D0%9C%D0%B0%D0%B3%D0%BD%D0%B8%D0%B9">
                        <table class="table-element">
                            <tr>
                                <td class="table-symbol text-left" rowspan="2">
                                    Mg
                                </td>
                                <td class="table-number text-right">
                                    12
                                </td>
                            </tr>
                            <tr>
                                <td class="table-mass text-right">
                                    24,312
                                </td>
                            </tr>
                            <tr>
                                <td class="table-name text-left" colspan="2">Магний</td>
                            </tr>
                        </table>
                    </a>
                </div>
            </td>
            <td>
                <div class="table-main-div yellow-element ">
                    <a class="a-block" href="https://ru.wikipedia.org/wiki/%D0%90%D0%BB%D1%8E%D0%BC%D0%B8%D0%BD%D0%B8%D0%B9">
                        <table class="table-element">
                            <tr>
                                <td class="table-symbol text-left" rowspan="2">
                                    Al
                                </td>
                                <td class="table-number text-right">
                                    13
                                </td>
                            </tr>
                            <tr>
                                <td class="table-mass text-right">
                                    26,9815
                                </td>
                            </tr>
                            <tr>
                                <td class="table-name text-left" colspan="2">Алюминий</td>
                            </tr>
                        </table>
                    </a>
                </div>
            </td>
            <td>
                <div class="table-main-div yellow-element">
                    <a class="a-block" href="https://ru.wikipedia.org/wiki/%D0%9A%D1%80%D0%B5%D0%BC%D0%BD%D0%B8%D0%B9">
                        <table class="table-element">
                            <tr>
                                <td class="table-symbol text-left" rowspan="2">
                                    Si
                                </td>
                                <td class="table-number text-right">
                                    14
                                </td>
                            </tr>
                            <tr>
                                <td class="table-mass text-right">
                                    28,086
                                </td>
                            </tr>
                            <tr>
                                <td class="table-name text-left" colspan="2">Кремний</td>
                            </tr>
                        </table>
                    </a>
                </div>
            </td>
        </tr>
        <!--**************************** Четвертый ряд таблицы-контейнера ****************************-->
        <tr>
            <td>
                <div class="table-main-div pink-element ">
                    <a class="a-block" href="https://ru.wikipedia.org/wiki/%D0%9A%D0%B0%D0%BB%D0%B8%D0%B9">
                        <table class="table-element">
                            <tr>
                                <td class="table-symbol text-left" rowspan="2">
                                    K
                                </td>
                                <td class="table-number text-right">
                                    19
                                </td>
                            </tr>
                            <tr>
                                <td class="table-mass text-right">
                                    39,102
                                </td>
                            </tr>
                            <tr>
                                <td class="table-name text-left" colspan="2">Калий</td>
                            </tr>
                        </table>
                    </a>
                </div>
            </td>
            <td>
                <div class="table-main-div pink-element">
                    <a class="a-block" href="https://ru.wikipedia.org/wiki/%D0%9A%D0%B0%D0%BB%D1%8C%D1%86%D0%B8%D0%B9">
                        <table class="table-element">
                            <tr>
                                <td class="table-symbol text-left" rowspan="2">
                                    Ca
                                </td>
                                <td class="table-number text-right">
                                    20
                                </td>
                            </tr>
                            <tr>
                                <td class="table-mass text-right">
                                    40,08
                                </td>
                            </tr>
                            <tr>
                                <td class="table-table-name text-left" colspan="2">Кальций</td>
                            </tr>
                        </table>
                    </a>
                </div>
            </td>
            <td>
                <div class="table-main-div blue-element">
                    <a class="a-block" href="https://ru.wikipedia.org/wiki/%D0%A1%D0%BA%D0%B0%D0%BD%D0%B4%D0%B8%D0%B9">
                        <table class="table-element">
                            <tr>
                                <td class="table-number text-left">
                                    21
                                </td>
                                <td class="table-symbol text-right" rowspan="2">
                                    Sc
                                </td>
                            </tr>
                            <tr>
                                <td class="table-mass text-left">
                                    44,956
                                </td>
                            </tr>
                            <tr>
                                <td class="table-name text-right" colspan="2">Скандий</td>
                            </tr>
                        </table>
                    </a>
                </div>
            </td>
            <td>
                <div class="table-main-div blue-element">
                    <a class="a-block" href="https://ru.wikipedia.org/wiki/%D0%A2%D0%B8%D1%82%D0%B0%D0%BD">
                        <table class="table-element">
                            <tr>
                                <td class="table-number text-left">
                                    22
                                </td>
                                <td class="table-symbol text-right" rowspan="2">
                                    Ti
                                </td>
                            </tr>
                            <tr>
                                <td class="table-mass text-left">
                                    47,90
                                </td>
                            </tr>
                            <tr>
                                <td class="table-name text-right" colspan="2">Титан</td>
                            </tr>
                        </table>
                    </a>
                </div>
            </td>
        </tr>
    </table>
    </main>
    <?php
        include_once("footer.php");