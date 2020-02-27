<?php

class RolesSeeder extends Seeder
{

    private $table = 'roles';

    public function run()
    {
        // $this->db->truncate($this->table);

        //seed many records using faker
        $roles = ['superadmin', 'admin_pendaftaran', 'admin_input', 'user'];
        echo "seeding role types";

        foreach ($roles as $value) {
            echo ".";
            $data = array(
                'name' => $value,
                'date_created' => $this->faker->date($format = 'Y-m-d'),
                'date_updated' => $this->faker->date($format = 'Y-m-d'),
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
