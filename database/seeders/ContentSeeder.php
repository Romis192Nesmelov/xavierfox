<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::query()->create([
            'image' => 'creator.png',
            'head' => 'О проекте',
            'text' => '<p><strong class="text-red">Xavier Fox Communications</strong> — это информационный портал, посвящённый миру информационных технологий. Мы создаём качественный контент для IT-специалистов, системных администраторов и всех, кто интересуется технологиями.</p><p>Наша миссия — делать сложные технические темы доступными и понятными. Мы публикуем подробные руководства, практические советы и актуальные обзоры, основанные на реальном опыте.</p><p>На сайте вы найдёте материалы по настройке сетевого оборудования, администрированию Linux и Windows, а также обзоры полезного софта.</p>'
        ]);
    }
}
