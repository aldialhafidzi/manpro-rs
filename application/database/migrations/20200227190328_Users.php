<?php

class Migration_Users extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'role_id' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'username' => array(
                'type' => 'varchar',
                'constraint' => 20,
                'unique' => TRUE,
            ),
            'password' => array(
                'type' => 'varchar',
                'constraint' => 500,
            ),
            'name' => array(
                'type' => 'varchar',
                'constraint' => 20,
                'null' => TRUE,
            ),
            'nik' => array(
                'type' => 'varchar',
                'constraint' => 16,
                'null' => TRUE,
            ),
            'no_telp' => array(
                'type' => 'varchar',
                'constraint' => 15,
                'null' => TRUE,
            ),
            'dob' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
            'kota' => array(
                'type' => 'varchar',
                'constraint' => 20,
                'null' => TRUE,
            ),
            'kecamatan' => array(
                'type' => 'varchar',
                'constraint' => 20,
                'null' => TRUE,
            ),
            'kelurahan' => array(
                'type' => 'varchar',
                'constraint' => 20,
                'null' => TRUE,
            ),
            'rt' => array(
                'type' => 'varchar',
                'constraint' => 3,
                'null' => TRUE,
            ),
            'rw' => array(
                'type' => 'varchar',
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
        $this->dbforge->create_table('users');
        $this->db->query(add_foreign_key('users', 'role_id', 'roles(id)', 'CASCADE', 'CASCADE'));
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}
