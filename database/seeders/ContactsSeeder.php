<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['icon' => 'email.svg', 'address' => 'mailto:info@xavierfox.tech', 'active' => 1],
            ['icon' => 'telegram.svg', 'address' => 'https://t.me/intomadNES', 'active' => 1],
        ];

        foreach ($data as $item) {
            Contact::query()->create($item);
        }
    }
}
