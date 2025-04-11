<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Development team users
        $users = [
            [
                'name' => 'Necati ERSUNGUR',
                'email' => 'necati.ersungur@futurecode.com.tr',
            ],
            [
                'name' => 'Ufuk MERT',
                'email' => 'ufuk.mert@futurecode.com.tr',
            ],
            [
                'name' => 'Zeynep Ece GÜLTEKİN',
                'email' => 'zeynep.gultekin@futurecode.com.tr',
            ],
            [
                'name' => 'Ubeydullah YILMAZ',
                'email' => 'ubeydullah.yilmaz@futurecode.com.tr',
            ],
            [
                'name' => 'İsmail URAS',
                'email' => 'ismail.uras@futurecode.com.tr',
            ],
            [
                'name' => 'Elif Nisa ERYİĞİT',
                'email' => 'elif.eryigit@futurecode.com.tr',
            ],
        ];

        foreach ($users as $user) {
            User::factory()
                ->create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => '123456', // Default password for all users
                ]);
        }
    }
}
