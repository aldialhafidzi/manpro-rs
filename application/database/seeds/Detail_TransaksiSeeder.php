<?php

class Detail_TransaksiSeeder extends Seeder
{

    private $table = 'detail_transaksi';

    public function run()
    {
        //seed many records using faker
        $limit = 33;
        echo "seeding $limit user accounts";

        for ($i = 0; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'user_name' => $this->faker->unique()->userName,
                'password' => '1234',
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
