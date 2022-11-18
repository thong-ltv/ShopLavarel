<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateColorsProduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            ['name'=>'đen', 'english_color'=>'black'],
            ['name'=>'trắng', 'english_color'=>'while'],
            ['name'=>'vàng', 'english_color'=>'yellow'],
            ['name'=>'đỏ', 'english_color'=>'red'],
            ['name'=>'cam', 'english_color'=>'orange'],
            ['name'=>'xanh lá', 'english_color'=>'green'],
            ['name'=>'tím', 'english_color'=>'brown'],
            ['name'=>'xám', 'english_color'=>'gray'],
        ]);
    }
}
