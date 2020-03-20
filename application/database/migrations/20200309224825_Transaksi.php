<?php

class Migration_Transaksi extends CI_Migration
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
                'constraint' => 11
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'jadwal_id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'no_bill' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
            ),
            'no_reg' => array(
                'type' => 'INT',
                'constraint' => 20,
            ),
            'total_tarif' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ),
            'jenis_rawat' => array(
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => TRUE,
            ),
            'status' => array(
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
        $this->dbforge->create_table('transaksi');
        $this->db->query(add_foreign_key('transaksi', 'pasien_id', 'pasien(id)', 'CASCADE', 'CASCADE'));
        $this->db->query(add_foreign_key('transaksi', 'user_id', 'pasien(id)', 'CASCADE', 'CASCADE'));
        $this->db->query(add_foreign_key('transaksi', 'jadwal_id', 'jadwal_dokter(id)', 'CASCADE', 'CASCADE'));
    }

    public function down()
    {
        $this->dbforge->drop_table('transaksi');
    }
}
