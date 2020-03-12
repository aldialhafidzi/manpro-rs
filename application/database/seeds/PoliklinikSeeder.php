<?php

class PoliklinikSeeder extends Seeder
{

    private $table = 'poliklinik';

    public function run()
    {
        $poliklinik = array(
            [
                'nama' => 'KEBIDANAN',
                'kode' => 'POL-101',
                'lokasi' => 'Jl. Raya Banjaran No.1'
            ],
            [
                'nama' => 'ANAK/PEDIATRIK',
                'kode' => 'POL-102',
                'lokasi' => 'Jl. Raya Banjaran No.1'
            ],
            [
                'nama' => 'TUMBUH KEMBANG',
                'kode' => 'POL-103',
                'lokasi' => 'Jl. Raya Banjaran No.1'
            ],
            [
                'nama' => 'BEDAH-UMUM',
                'kode' => 'POL-104',
                'lokasi' => 'Jl. Raya Banjaran No.2'
            ],
            [
                'nama' => 'BEDAH-PENCERNAAN',
                'kode' => 'POL-105',
                'lokasi' => 'Jl. Raya Banjaran No.2'
            ],
            [
                'nama' => 'BEDAH-PLASTIK',
                'kode' => 'POL-106',
                'lokasi' => 'Jl. Raya Banjaran No.2'
            ],
            [
                'nama' => 'BEDAH-ORTOPEDI',
                'kode' => 'POL-107',
                'lokasi' => 'Jl. Raya Banjaran No.5'
            ],
            [
                'nama' => 'BEDAH-ONKOLOGI',
                'kode' => 'POL-108',
                'lokasi' => 'Jl. Raya Banjaran No.5'
            ],
            [
                'nama' => 'BEDAH-SARAF',
                'kode' => 'POL-109',
                'lokasi' => 'Jl. Raya Banjaran No.5'
            ],
            [
                'nama' => 'BEDAH-PARU',
                'kode' => 'POL-110',
                'lokasi' => 'Jl. Raya Banjaran No.5'
            ]
        );

        //seed many records using faker
        echo "seeding poliklinik ";

        foreach ($poliklinik as $value) {
            echo ".";
            $data = array(
                'nama' => $value['nama'],
                'kode' => $value['kode'],
                'lokasi' => $value['lokasi'],
                'created_at' => $this->faker->date($format = 'Y-m-d'),
                'updated_at' => $this->faker->date($format = 'Y-m-d'),
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
