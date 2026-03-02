<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Chapter;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data1 = [
            [
                'name' => 'Настройка роутера OpenWRT',
                'annotation' => 'Полное руководство по базовой настройке роутера с прошивкой OpenWRT для начинающих.',
            ],
            [
                'name' => 'Настройка VPN на роутере',
                'annotation' => 'Как поднять собственный VPN-сервер и настроить его на домашнем роутере.',
            ],
            [
                'name' => 'Создание Mesh-сети дома',
                'annotation' => 'Объединяем несколько роутеров в единую бесшовную сеть для покрытия всего дома.',
            ],
            [
                'name' => 'Wi-Fi 6 vs Wi-Fi 5',
                'annotation' => 'Сравниваем стандарты беспроводной связи и разбираемся, стоит ли обновляться.',
            ],
            [
                'name' => 'Настройка DHCP-сервера',
                'annotation' => 'Разбираемся в том, как работают IP-адреса, маски подсети и шлюзы.',
            ],
            [
                'name' => 'Основы IP-адресации',
                'annotation' => 'Как правильно настроить автоматическую раздачу IP-адресов в сети.',
            ],
        ];

        $data2 = [
            'annotation' => 'Полное руководство по базовой настройке роутера с прошивкой OpenWRT для начинающих.',
            'text' => '
                    <section class="article-section">
                        <h2>Что такое OpenWRT?</h2>
                        <p>OpenWRT — это свободная операционная система на базе Linux для роутеров и встраиваемых устройств. В отличие от заводских прошивок, она даёт полный контроль над устройством и позволяет настроить буквально всё — от простого Wi-Fi до сложных VPN-сетей и систем мониторинга.</p>
                        <p>Если ты устал от ограничений заводской прошивки и хочешь выжать максимум из своего роутера — OpenWRT твой выбор. Но будь готов: это не "_next-next-finish_" установка. Придётся немного покопаться в настройках. Но не переживай — я проведу тебя через весь процесс!</p>
                    </section>
                    <section class="article-section">
                        <h2>Установка прошивки</h2>
                        <p>Перед началом важно понять: прошивка роутера — процесс ответственный. Если что-то пойдёт не так, ты можешь получить "кирпич" вместо роутера. Поэтому внимательно проверь совместимость своего устройства на официальном сайте OpenWRT.</p>
                        <p>Для установки тебе понадобится:</p>
                        <ul>
                            <li>Роутер из списка поддерживаемых устройств</li>
                            <li>Файл прошивки для твоей модели</li>
                            <li>Кабель Ethernet</li>
                            <li>Немного терпения</li>
                        </ul>
                        <p>Скачай прошивку с официального сайта, зайди в веб-интерфейс заводской прошивки и найди раздел обновления. Выбери файл OpenWRT и нажми «Обновить». Жди завершения процесса — не отключай питание!</p>
                    </section>
                    <section class="article-section">
                        <h2>Первоначальная настройка</h2>
                        <p>После установки OpenWRT роутер будет доступен по адресу 192.168.1.1. Подключись к нему кабелем и открой этот адрес в браузере. По умолчанию пароля нет — сразу установи свой!</p>
                        <p>Для начала обновим список пакетов:</p>
                        <pre><code>opkg update</code></pre>
                        <p>Теперь установим веб-интерфейс LuCI (если он не установлен):</p>
                        <pre><code>opkg install luci</code></pre>
                        <p>И запустим веб-сервер:</p>
                        <pre><code>/etc/init.d/uhttpd start<br>/etc/init.d/uhttpd enable</code></pre>
                        <p>Теперь можно заходить в веб-интерфейс и настраивать всё через графику. Но я покажу и консольные команды — они дают больше контроля.</p>
                    </section>
                    <section class="article-section">
                        <h2>Настройка Wi-Fi</h2>
                        <p>Давай настроим беспроводную сеть. Сначала посмотрим, какие интерфейсы доступны:</p>
                        <pre><code>iw list</code></pre>
                        <p>Обычно Wi-Fi интерфейс называется wlan0. Настроим его через конфиг:</p>
                        <pre><code>uci set wireless.@wifi-device[0].disabled=\'0\'<br>uci set wireless.@wifi-iface[0].ssid=\'MyAwesomeNetwork\'<br>uci set wireless.@wifi-iface[0].encryption=\'psk2\'<br>uci set wireless.@wifi-iface[0].key=\'SuperSecretPassword123\'<br>uci commit wireless<br>wifi reload</code></pre>
                        <p>Теперь у тебя есть Wi-Fi сеть с нормальным названием и защитой WPA2. Можешь подключаться и проверять!</p>
                    </section>
                    <section class="article-section">
                        <h2>Настройка LAN</h2>
                        <p>По умолчанию LAN работает на 192.168.1.1/24. Если тебе нужно изменить подсеть, сделай это так:</p>
                        <pre><code>uci set network.lan.ipaddr=\'192.168.10.1\'<br>uci set network.lan.netmask=\'255.255.255.0\'<br>uci commit network<br>/etc/init.d/network restart</code></pre>
                        <p>После перезапуска сети роутер будет доступен по новому адресу. Не забудь переподключиться!</p>
                    </section>
                    <section class="article-section">
                        <h2>Настройка подключения к интернету</h2>
                        <p>Для большинства провайдеров достаточно простого DHCP на WAN-порту:</p>
                        <pre><code>uci set network.wan.proto=\'dhcp\'<br>uci commit network<br>/etc/init.d/network restart</code></pre>
                        <p>Если у тебя PPPoE (Ростелеком и др.), настрой так:</p>
                        <pre><code>uci set network.wan.proto=\'pppoe\'<br>uci set network.wan.username=\'твой_логин\'<br>uci set network.wan.password=\'твой_пароль\'<br>uci commit network<br>/etc/init.d/network restart</code></pre>
                        <p>Проверь подключение:</p>
                        <pre><code>ping 8.8.8.8</code></pre>
                    </section>
                    <section class="article-section">
                        <h2>Безопасность</h2>
                        <p>Открой доступ к SSH только из локальной сети и смени стандартный порт:</p>
                        <pre><code>uci set dropbear.@dropbear[0].Port=\'2222\'<br>uci set dropbear.@dropbear[0].Interface=\'lan\'<br>uci commit dropbear<br>/etc/init.d/dropbear restart</code></pre>
                        <p>Также отключи доступ к веб-интерфейсу из WAN:</p>
                        <pre><code>uci set uhttpd.main.listen_http=\'192.168.1.1:80\'<br>uci set uhttpd.main.listen_https=\'192.168.1.1:443\'<br>uci commit uhttpd<br>/etc/init.d/uhttpd restart</code></pre>
                        <p>И не забудь про фаервол — проверь правила:</p>
                        <pre><code>iptables -L -v</code></pre>
                    </section>
                    <section class="article-section">
                        <h2>Установка пакетов</h2>
                        <p>OpenWRT использует свой пакетный менеджер opkg. Вот полезные пакеты:</p>
                        <pre><code># Мониторинг сети<br>opkg install ntopng<br><br># AdBlock<br>opkg install adblock<br><br># VPN клиент<br>opkg install openvpn-openssl<br><br># Файловый сервер<br>opkg install samba4-server<br><br># DLNA сервер<br>opkg install minidlna</code></pre>
                        <p>Установи то, что нужно тебе. Но помни: чем больше пакетов, тем меньше свободного места на роутере.</p>
                    </section>
                    <section class="article-section">
                        <h2>Видео-инструкция</h2>
                        <p>Если что-то осталось непонятным, посмотри это видео — там всё показано наглядно:</p>
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Видео-инструкция по настройке OpenWRT" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </section>
                    <section class="article-section">
                        <h2>Заключение</h2>
                        <p>Поздравляю! Теперь у тебя есть полностью настроенный роутер с OpenWRT. Это только начало — возможности прошивки практически безграничны. Можешь настраивать VPN, создавать гостевые сети, поднимать серверы и многое другое.</p>
                        <p>Если возникнут вопросы — не стесняйся спрашивать в комментариях или писать мне в соцсетях. Удачи в изучении сетевых технологий!</p>
                    </section>
            ',
            'active' => 1,
        ];

        $chapters = Chapter::all();

        foreach ($chapters as $chapter) {
            foreach ($data1 as $k => $item1) {
                $item = $data2;
                $item['image'] = 'article'.($k + 1).'.svg';
                $item = array_merge($item, $item1);
                $item['chapter_id'] = $chapter->id;

                Article::query()->create($item);
            }
        }
    }
}
