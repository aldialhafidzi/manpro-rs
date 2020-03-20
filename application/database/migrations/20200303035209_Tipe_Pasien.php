<?php

class Migration_Tipe_Pasien extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'kode' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
            ),
            'no_sep' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
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
        $this->dbforge->create_table('tipe_pasien');
    }

    public function down()
    {
        $this->dbforge->drop_table('tipe_pasien');
    }
}
