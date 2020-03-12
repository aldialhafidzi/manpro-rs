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
                'no_mr' => '00 ' . $this->faker->month($max = 'now') . ' ' . $i,
                'nama' => $this->faker->name,
                'jenis_kelamin' => $this->faker->randomElement($array = array('P', 'L')),
                'no_telp' => $this->faker->tollFreePhoneNumber,
                'alamat' => $this->faker->streetAddress,
                'tanggal_lahir' => $this->faker->date($format = 'Y-m-d'),
                'created_at' => $this->faker->date($format = 'Y-m-d'),
                'updated_at' => $this->faker->date($format = 'Y-m-d'),
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
