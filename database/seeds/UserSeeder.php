<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin1',
                'email' => 'admin1@corp.local',
                'password' => \Illuminate\Support\Facades\Hash::make('11111111', [
                    'memory' => 1024,
                    'time' => 2,
                    'threads' => 2,
                ]),
                'created_at' => now(),
            ],
            [
                'name' => 'admin2',
                'email' => 'admin2@corp.local',
                'password' => \Illuminate\Support\Facades\Hash::make('11111111', [
                    'memory' => 1024,
                    'time' => 2,
                    'threads' => 2,
                ]),
                'created_at' => now(),
            ],
            [
                'name' => 'user1',
                'email' => 'user1@corp.local',
                'password' => \Illuminate\Support\Facades\Hash::make('22222222', [
                    'memory' => 1024,
                    'time' => 2,
                    'threads' => 2,
                ]),
                'created_at' => now(),
            ],
            [
                'name' => 'user2',
                'email' => 'user2@corp.local',
                'password' => \Illuminate\Support\Facades\Hash::make('22222222', [
                    'memory' => 1024,
                    'time' => 2,
                    'threads' => 2,
                ]),
                'created_at' => now(),
            ],
        ]);
    }
}
