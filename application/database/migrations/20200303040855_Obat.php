<?php

class Migration_Obat extends CI_Migration
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
                'constraint' => 10,
                'unique' => TRUE,
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
            ),
            'jenis' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
            ),
            'harga' => array(
                'type' => 'INT',
                'constraint' => 20,
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
        $this->dbforge->create_table('obat');
    }

    public function down()
    {
        $this->dbforge->drop_table('obat');
    }
}
