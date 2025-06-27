<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoaTableSeeder extends Seeder
{
    public function run()
    {
        DB::table("pessoa")->insert([
            [
                "nm_pessoa" => "Geovana Silva",
                "nm_email" => "geovana@gmail.com",
            ],
            [
                "nm_pessoa" => "Kayo Almeida Medvedchikoff",
                "nm_email" => "kayoalmeida35@gmail.com",
            ],
        ]);
    }
}
