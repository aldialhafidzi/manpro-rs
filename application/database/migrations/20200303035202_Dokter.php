<?php

class Migration_Dokter extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'poli_id' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'spec_id' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'kode' => array(
                'type' => 'VARCHAR',
                'constraint' => 10,
                'unique' => TRUE,
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
            ),
            'jenis_kelamin' => array(
                'type' => 'VARCHAR',
                'constraint' => 1
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
        $this->dbforge->create_table('dokter');
        $this->db->query(add_foreign_key('dokter', 'spec_id', 'specialization(id)', 'CASCADE', 'CASCADE'));
        $this->db->query(add_foreign_key('dokter', 'poli_id', 'poliklinik(id)', 'CASCADE', 'CASCADE'));
    }

    public function down()
    {
        $this->dbforge->drop_table('dokter');
    }
}
