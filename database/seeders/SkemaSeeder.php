<?php

namespace Database\Seeders;

use App\Models\SkemaModel;
use Illuminate\Database\Seeder;

class SkemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataSkema = [
            [
                'nama_skema' => 'Okupasi Mekanik Heating, Ventilation Dan Air Condition (HVAC)',
            ],
            [
                'nama_skema' => 'Klaster Pelaksanaan Instalasi AC',
            ],
            [
                'nama_skema' => 'Klaster Perawatan Mesin Pendingin / AC',
            ],
            [
                'nama_skema' => 'Okupasi Teknisi Lemari Pendingin',
            ],
            [
                'nama_skema' => 'Okupasi Teknisi Refrigerasi Domestik',
            ],
        ];

        foreach ($dataSkema as $row) {
            SkemaModel::create($row);
        }
    }
}
