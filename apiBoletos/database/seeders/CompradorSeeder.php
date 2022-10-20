<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('compradors')->insert([
        	[
	        	'identificacion' => '1007895957',
	        	'nombres' => 'Enmanuel',
	        	'apellidos' => 'Tavera',
                'email' => 'emmanuel302001@gmail.com'
            ]
        ]);
    }
}
