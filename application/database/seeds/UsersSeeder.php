<?php

class UsersSeeder extends Seeder
{

    private $table = 'users';

    public function run()
    {
        $this->db->truncate($this->table);

        //seed many records using faker
        $limit = 100;
        echo "seeding $limit user accounts";

        for ($i = 0; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'role_id' => $this->faker->numberBetween($min = 1, $max = 4),
                'username' => $this->faker->unique()->userName,
                'password' => password_hash('123123A', PASSWORD_DEFAULT),
                'name' => $this->faker->name($gender = null | 'male' | 'female'),
                'dob' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'date_created' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'date_updated' => $this->faker->date($format = 'Y-m-d', $max = 'now')
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
