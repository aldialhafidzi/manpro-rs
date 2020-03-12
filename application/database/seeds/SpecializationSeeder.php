<?php

class SpecializationSeeder extends Seeder
{

    private $table = 'specialization';

    public function run()
    {
        $limit = 100;
        echo "seeding $limit user accounts";

        for ($i = 0; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'nama' => $this->faker->randomElement($array = array('OTAK-' . $i, 'PARU-PARU-' . $i, 'JANTUNG-' . $i)),
                'kode' => 'SPEC-' . $i,
                'created_at' => $this->faker->date($format = 'Y-m-d'),
                'updated_at' => $this->faker->date($format = 'Y-m-d'),
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
