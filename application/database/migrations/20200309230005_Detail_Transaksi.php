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
            'jadwal_dokter_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ),
            'penyakit_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ),
            'tindakan_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ),
            'obat_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ),
            'ruangan_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ),
            'kamar_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ),
            'bed_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ),
            'tarif_pendaftaran' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ),
            'tarif_dokter' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ),
            'tarif_obat' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ),
            'tarif_kamar' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ),
            'tarif_tindakan' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ),
            'tanggal_masuk' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
            'tanggal_keluar' => array(
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
        $this->db->query(add_foreign_key('detail_transaksi', 'jadwal_dokter_id', 'jadwal_dokter(id)', 'CASCADE', 'CASCADE'));
        $this->db->query(add_foreign_key('detail_transaksi', 'penyakit_id', 'penyakit(id)', 'CASCADE', 'CASCADE'));
        $this->db->query(add_foreign_key('detail_transaksi', 'tindakan_id', 'tindakan(id)', 'CASCADE', 'CASCADE'));
        $this->db->query(add_foreign_key('detail_transaksi', 'obat_id', 'obat(id)', 'CASCADE', 'CASCADE'));
        $this->db->query(add_foreign_key('detail_transaksi', 'ruangan_id', 'ruangan(id)', 'CASCADE', 'CASCADE'));
        $this->db->query(add_foreign_key('detail_transaksi', 'kamar_id', 'kamar(id)', 'CASCADE', 'CASCADE'));
        $this->db->query(add_foreign_key('detail_transaksi', 'bed_id', 'bed(id)', 'CASCADE', 'CASCADE'));
    }

    public function down()
    {
        $this->dbforge->drop_table('detail_transaksi');
    }
}
