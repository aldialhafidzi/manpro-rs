<?php

class RolesSeeder extends Seeder
{

    private $table = 'roles';

    public function run()
    {
        // $this->db->truncate($this->table);

        //seed many records using faker
        $roles = array(
            [
                'name' => 'superadmin',
                'kode' => 'SUPER'
            ],
            [
                'name' => 'admin_pendaftaran',
                'kode' => 'APEND'
            ],
            [
                'name' => 'admin_input',
                'kode' => 'AINP'
            ],
            [
                'name' => 'user',
                'kode' => 'USER'
            ]
        );

        echo "seeding role types";

        foreach ($roles as $value) {
            echo ".";
            $data = array(
                'name' => $value['name'],
                'kode' => $value['kode'],
                'created_at' => $this->faker->date($format = 'Y-m-d'),
                'updated_at' => $this->faker->date($format = 'Y-m-d'),
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
