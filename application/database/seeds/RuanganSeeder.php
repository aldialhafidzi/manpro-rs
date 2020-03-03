<?php

class RuanganSeeder extends Seeder
{

    private $table = 'ruangan';

    public function run()
    {
        $ruangan = array(
            [
                'kode' => 'RUA-1',
                'nama' => 'RUANGAN A',
                'kelas' => '1'
            ],
            [
                'kode' => 'RUA-2',
                'nama' => 'RUANGAN A',
                'kelas' => '2'
            ],
            [
                'kode' => 'RUA-3',
                'nama' => 'RUANGAN A',
                'kelas' => '3'
            ],
            [
                'kode' => 'RUA-4',
                'nama' => 'RUANGAN A',
                'kelas' => '4'
            ],
            [
                'kode' => 'RUA-5',
                'nama' => 'RUANGAN A',
                'kelas' => '5'
            ],
            [
                'kode' => 'RUA-1',
                'nama' => 'RUANGAN A',
                'kelas' => '1'
            ],
            [
                'kode' => 'RUA-2',
                'nama' => 'RUANGAN A',
                'kelas' => '2'
            ],
            [
                'kode' => 'RUA-3',
                'nama' => 'RUANGAN A',
                'kelas' => '3'
            ],
            [
                'kode' => 'RUA-4',
                'nama' => 'RUANGAN A',
                'kelas' => '4'
            ],
            [
                'kode' => 'RUA-5',
                'nama' => 'RUANGAN A',
                'kelas' => '5'
            ],
        );

        echo "seeding ruangan list";

        for ($i = 0; $i < 100; $i++) {
            echo ".";
            $data = array(
                'kode' => 'RUA-' . $i,
                'nama' => 'RUANGAN-' . $i,
                'kelas' => $this->faker->randomElement($array = array('EKONOMI', 'EXECUTIVE')),
                'harga' => $this->faker->numberBetween($min = 10000, $max = 1000000),
                'status' => 'KOSONG',
                'created_at' => $this->faker->date($format = 'Y-m-d'),
                'updated_at' => $this->faker->date($format = 'Y-m-d'),
            );
            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
