<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_events')->insert([
            ['name' => 'ENTER'],
            ['name' => 'EXIT'],
            ['name' => 'ENTER_ATTEMPT'],
            ['name' => 'CREATE'],
            ['name' => 'READ'],
            ['name' => 'UPDATE'],
            ['name' => 'DELETE'],
        ]);
    }
}
