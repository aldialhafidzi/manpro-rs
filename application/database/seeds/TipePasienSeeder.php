<?php

class TipePasienSeeder extends Seeder
{

    private $table = 'tipe_pasien';

    public function run()
    {
        $data = [
            array(
                'kode' => 'T-UMUM',
                'nama' => 'UMUM',
                'no_sep' => null,
                'created_at' => $this->faker->date($format = 'Y-m-d'),
                'updated_at' => $this->faker->date($format = 'Y-m-d'),
            ),
            array(
                'kode' => 'T-BPJS',
                'nama' => 'BPJS',
                'no_sep' => '15-1111-1',
                'created_at' => $this->faker->date($format = 'Y-m-d'),
                'updated_at' => $this->faker->date($format = 'Y-m-d'),
            ),
            array(
                'kode' => 'T-PRUD',
                'nama' => 'PRUDENTIAL',
                'no_sep' => '16-0000-1',
                'created_at' => $this->faker->date($format = 'Y-m-d'),
                'updated_at' => $this->faker->date($format = 'Y-m-d'),
            ),
            array(
                'kode' => 'T-AIA',
                'nama' => 'AIA',
                'no_sep' => '17-1111-2',
                'created_at' => $this->faker->date($format = 'Y-m-d'),
                'updated_at' => $this->faker->date($format = 'Y-m-d'),
            )
        ];

        foreach ($data as $key => $value) {
            echo ".";
            $this->db->insert($this->table, $value);
        }

        echo PHP_EOL;
    }
}
