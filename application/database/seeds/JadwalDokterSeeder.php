<?php

class JadwalDokterSeeder extends Seeder
{

    private $table = 'jadwal_dokter';

    public function run()
    {
        //seed many records using faker
        $limit = 50;
        echo "seeding $limit jadwal_dokter accounts";

        for ($i = 0; $i < $limit; $i++) {
            echo ".";
            $data = array(
                'poli_id' => $this->faker->numberBetween($min = 1, $max = 10),
                'dokter_id' => $this->faker->numberBetween($min = 1, $max = 100),
                'jam_awal' => date("H:mm:ss"),
                'jam_akhir' => date("H:mm:ss", strtotime('+8 hours')),
                'tarif' => $this->faker->numberBetween($min = 30000, $max = 2000000),
                'created_at' => $this->faker->date($format = 'Y-m-d'),
                'updated_at' => $this->faker->date($format = 'Y-m-d'),
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
