<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = array(
            "‘En Boqeq",
            "Arad",
            "Ashdod",
            "Ashkelon",
            "Beersheba",
            "Dimona",
            "Eilat",
            "Lehavim",
            "Midreshet Ben-Gurion",
            "Mitzpe Ramon",
            "Netivot",
            "Ofaqim",
            "Qiryat Gat",
            "Rahat",
            "Sederot",
            "Yeroẖam"
        );

        $data = [];
        foreach ($cities as $name) {
            $data[] = [
                'name' => $name,
            ];
        }
        DB::table('cities')->insert($data);
    }
}
