<?php

class PasienSeeder extends Seeder
{

    private $table = 'pasien';

    public function run()
    {
        //seed many records using faker
        $limit = 500;
        echo "seeding $limit pasien";

        for ($i = 0; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'tipe_id' => $this->faker->randomElement($array = array(1, 2, 3, 4)),
                'no_asuransi' => $this->faker->numberBetween($min = 10000000, $max = 99999999),
                'no_mr' => '00 ' . $this->faker->month($max = 'now') . ' ' . $i,
                'nama' => $this->faker->name,
                'jenis_kelamin' => $this->faker->randomElement($array = array('P', 'L')),
                'no_telp' => $this->faker->tollFreePhoneNumber,
                'kota' => $this->faker->city,
                'kecamatan' => $this->faker->cityPrefix,
                'kelurahan' => $this->faker->streetName,
                'rt' => $this->faker->randomElement($array = array(1, 2, 3, 4)),
                'rw' => $this->faker->randomElement($array = array(1, 2, 3, 4)),
                'tanggal_lahir' => $this->faker->date($format = 'Y-m-d'),
                'created_at' => $this->faker->date($format = 'Y-m-d'),
                'updated_at' => $this->faker->date($format = 'Y-m-d'),
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
