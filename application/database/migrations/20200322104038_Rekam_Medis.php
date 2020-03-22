<?php

class Migration_Rekam_Medis extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'pasien_id' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'penyakit_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ),
            'dokter_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ),
            'jenis_rawat' => array(
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
        $this->dbforge->create_table('rekam_medis');
        $this->db->query(add_foreign_key('rekam_medis', 'pasien_id', 'pasien(id)', 'CASCADE', 'CASCADE'));
        $this->db->query(add_foreign_key('rekam_medis', 'penyakit_id', 'penyakit(id)', 'CASCADE', 'CASCADE'));
        $this->db->query(add_foreign_key('rekam_medis', 'dokter_id', 'dokter(id)', 'CASCADE', 'CASCADE'));
    }

    public function down()
    {
        $this->dbforge->drop_table('rekam_medis');
    }
}
