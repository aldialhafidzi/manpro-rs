<?php

class DokterSeeder extends Seeder
{

    private $table = 'dokter';

    public function run()
    {

        //seed many records using faker
        $limit = 100;
        echo "seeding dokter list";

        for ($i = 0; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'poli_id' => $this->faker->numberBetween($min = 1, $max = 10),
                'spec_id' => $this->faker->numberBetween($min = 1, $max = 100),
                'kode' => 'DOC-' . $i,
                'nama' => $this->faker->unique()->name,
                'jenis_kelamin' => $this->faker->randomElement($array = array('P', 'L')),
                'no_telp' => $this->faker->tollFreePhoneNumber,
                'alamat' => $this->faker->streetAddress,
                'created_at' => $this->faker->date($format = 'Y-m-d'),
                'updated_at' => $this->faker->date($format = 'Y-m-d'),
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
