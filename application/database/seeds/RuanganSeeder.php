<?php

class RuanganSeeder extends Seeder
{

    private $table = 'ruangan';

    public function run()
    {
        echo "seeding ruangan list";

        for ($i = 0; $i < 50; $i++) {
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
