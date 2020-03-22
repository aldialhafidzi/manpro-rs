<?php

class KamarSeeder extends Seeder
{

    private $table = 'kamar';

    public function run()
    {
        //seed many records using faker
        $limit = 100;
        echo "seeding $limit kamar data";

        for ($i = 0; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'ruangan_id'    => $this->faker->numberBetween($min = 1, $max = 50),
                'kode'          => 'KM-0' . $i,
                'status'        => $this->faker->numberBetween($min = 0, $max = 1),
                'created_at' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'updated_at' => $this->faker->date($format = 'Y-m-d', $max = 'now')
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
