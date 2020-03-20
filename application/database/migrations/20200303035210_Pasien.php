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
            'tipe_id' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'no_mr' => array(
                'type' => 'VARCHAR',
                'constraint' => 15,
                'unique' => TRUE,
            ),
            'nik' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
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
            'kota' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE,
            ),
            'kecamatan' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE,
            ),
            'kelurahan' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE,
            ),
            'rt' => array(
                'type' => 'VARCHAR',
                'constraint' => 3,
                'null' => TRUE,
            ),
            'rw' => array(
                'type' => 'VARCHAR',
                'constraint' => 3,
                'null' => TRUE,
            ),
            'tanggal_lahir' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
            'nik_pj' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE,
            ),
            'no_telp_pj' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE,
            ),
            'nama_pj' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE,
            ),
            'hubungan_pj' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE,
            ),
            'kota_pj' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE,
            ),
            'kecamatan_pj' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE,
            ),
            'kelurahan_pj' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE,
            ),
            'rt_pj' => array(
                'type' => 'VARCHAR',
                'constraint' => 3,
                'null' => TRUE,
            ),
            'rw_pj' => array(
                'type' => 'VARCHAR',
                'constraint' => 3,
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
        $this->db->query(add_foreign_key('pasien', 'tipe_id', 'tipe_pasien(id)', 'CASCADE', 'CASCADE'));
    }

    public function down()
    {
        $this->dbforge->drop_table('pasien');
    }
}
