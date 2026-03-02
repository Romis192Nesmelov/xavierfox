<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Seeder;

class ChaptersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Сетевая инфраструктура', 'description' => 'Здесь собраны статьи о сетевом оборудовании, роутерах, настройках сетей и всём, что связано с соединением устройств между собой. От простых домашних сетей до сложных конфигураций — найдётся всё!', 'active' => 1],
            ['name' => 'Linux', 'description' => 'Команды, скрипты, администрирование и тюнинг системы', 'active' => 1],
            ['name' => 'Windows', 'description' => 'Оптимизация, безопасность и продвинутые настройки ОС', 'active' => 1],
            ['name' => 'Софт', 'description' => 'Обзоры программ, лайфхаки и автоматизация workflow', 'active' => 1]
        ];

        foreach ($data as $item) {
            Chapter::query()->create($item);
        }
    }
}
