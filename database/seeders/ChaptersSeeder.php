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
            ['icon' => 'routers.svg', 'slug' => 'routers', 'name' => 'Роутеры', 'description' => 'Настройка, оптимизация и обзоры сетевого оборудования', 'active' => 1],
            ['icon' => 'linux.svg', 'slug' => 'linux', 'name' => 'Linux', 'description' => 'Команды, скрипты, администрирование и тюнинг системы', 'active' => 1],
            ['icon' => 'windows.svg', 'slug' => 'windows', 'name' => 'Windows', 'description' => 'Оптимизация, безопасность и продвинутые настройки ОС', 'active' => 1],
            ['icon' => 'soft.svg', 'slug' => 'soft', 'name' => 'Софт', 'description' => 'Обзоры программ, лайфхаки и автоматизация workflow', 'active' => 1]
        ];

        foreach ($data as $item) {
            Chapter::query()->create($item);
        }
    }
}
