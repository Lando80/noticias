<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NoticiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Noticia::create([
            "name" => "oMagrelinho",
            "email" => "teste@email.com.am",
            "password" => "1212123"
        ]);
    }
}
