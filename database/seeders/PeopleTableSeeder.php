<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        $param = [
            'name' => 'taro',
            'mail' => 'taro@yamada.jp',
            'age' => 12,

        ];
        DB::table('people')->insert($param);
        // 2
        $param = [
            'name' => 'hanako',
            'mail' => 'hanako@shimada.com',
            'age' => 35,

        ];
        DB::table('people')->insert($param);
        // 3
        $param = [
            'name' => 'jiro',
            'mail' => 'jiro@yokoyama.tv',
            'age' => 48,

        ];
        DB::table('people')->insert($param);
        
        // 4
        $param = [
            'name' => 'kirishima',
            'mail' => 'kirishima@kuro.net',
            'age' => 53,

        ];
        DB::table('people')->insert($param);
        
        // 5
        $param = [
            'name' => 'goro',
            'mail' => 'goro@lalala.co.jp',
            'age' => 26,

        ];
        DB::table('people')->insert($param);
    }
}
