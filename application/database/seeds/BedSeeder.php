<?php

class BedSeeder extends Seeder
{

    private $table = 'bed';

    public function run()
    {
        //seed many records using faker
        $limit = 100;
        echo "seeding $limit bed data";

        for ($i = 0; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'kamar_id'    => $this->faker->numberBetween($min = 1, $max = 100),
                'kode'          => 'BED-0' . $i,
                'status'        => $this->faker->numberBetween($min = 0, $max = 1),
                'created_at'    => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'updated_at'    => $this->faker->date($format = 'Y-m-d', $max = 'now')
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
