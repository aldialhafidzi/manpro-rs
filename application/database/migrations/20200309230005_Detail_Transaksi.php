<?php

class Migration_Detail_Transaksi extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'transaksi_id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'penyakit_id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'tindakan_id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'obat_id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'ruangan_id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'masuk_ruangan' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
            'keluar_ruangan' => array(
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
        $this->dbforge->create_table('detail_transaksi');
        $this->db->query(add_foreign_key('detail_transaksi', 'transaksi_id', 'transaksi(id)', 'CASCADE', 'CASCADE'));
        $this->db->query(add_foreign_key('detail_transaksi', 'penyakit_id', 'penyakit(id)', 'CASCADE', 'CASCADE'));
        $this->db->query(add_foreign_key('detail_transaksi', 'ruangan_id', 'ruangan(id)', 'CASCADE', 'CASCADE'));
        $this->db->query(add_foreign_key('detail_transaksi', 'obat_id', 'obat(id)', 'CASCADE', 'CASCADE'));
        $this->db->query(add_foreign_key('detail_transaksi', 'tindakan_id', 'tindakan(id)', 'CASCADE', 'CASCADE'));
    }

    public function down()
    {
        $this->dbforge->drop_table('detail_transaksi');
    }
}
