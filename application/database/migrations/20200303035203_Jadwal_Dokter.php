<?php

class Migration_Jadwal_Dokter extends CI_Migration
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
            'dokter_id' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'jam_awal' => array(
                'type' => 'TIME',
                'null' => TRUE,
            ),
            'jam_akhir' => array(
                'type' => 'TIME',
                'null' => TRUE,
            ),
            'tarif' => array(
                'type' => 'INT',
                'constraint' => 11,
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
        $this->dbforge->create_table('jadwal_dokter');
        $this->db->query(add_foreign_key('jadwal_dokter', 'poli_id', 'poliklinik(id)', 'CASCADE', 'CASCADE'));
        $this->db->query(add_foreign_key('jadwal_dokter', 'dokter_id', 'dokter(id)', 'CASCADE', 'CASCADE'));
    }

    public function down()
    {
        $this->dbforge->drop_table('jadwal_dokter');
    }
}
