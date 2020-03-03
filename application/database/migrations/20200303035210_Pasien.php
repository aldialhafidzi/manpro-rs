<?php

class Migration_Pasien extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'no_mr' => array(
                'type' => 'VARCHAR',
                'constraint' => 15,
                'unique' => TRUE,
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
            ),
            'jenis_kelamin' => array(
                'type' => 'VARCHAR',
                'constraint' => 1,
                'null' => TRUE,
            ),
            'no_telp' => array(
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => TRUE,
            ),
            'alamat' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE,
            ),
            'tanggal_lahir' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('pasien');
    }

    public function down()
    {
        $this->dbforge->drop_table('pasien');
    }
}
