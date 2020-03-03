<?php

class TindakanSeeder extends Seeder
{

    private $table = 'tindakan';

    public function run()
    {
        $tindakan = array(
            [
                'kode' => 'TIN-1',
                'nama' => 'OPERASI-JANTUNG'
            ],
            [
                'kode' => 'TIN-2',
                'nama' => 'OPERASI-PARU-PARU'
            ],
            [
                'kode' => 'TIN-3',
                'nama' => 'OPERASI-SARAF'
            ],
            [
                'kode' => 'TIN-4',
                'nama' => 'OPERASI-BEDAH'
            ],
            [
                'kode' => 'TIN-5',
                'nama' => 'OPERASI-BEDAH-RINGAN'
            ],
        );

        echo "seeding tindakan list";

        foreach ($tindakan as $key => $value) {
            echo ".";
            $data = array(
                'kode' => $value['kode'],
                'nama' => $value['nama'],
                'harga' => $this->faker->numberBetween($min = 10000, $max = 1000000),
                'created_at' => $this->faker->date($format = 'Y-m-d'),
                'updated_at' => $this->faker->date($format = 'Y-m-d'),
            );
            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
