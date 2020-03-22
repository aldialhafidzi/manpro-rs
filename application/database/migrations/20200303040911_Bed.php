<?php

class Migration_Bed extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'kamar_id' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'kode' => array(
                'type' => 'VARCHAR',
                'constraint' => 10,
                'unique' => TRUE,
            ),
            'status' => array(
                'type' => 'int',
                'constraint' => 1,
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
        $this->dbforge->create_table('bed');
        $this->db->query(add_foreign_key('bed', 'kamar_id', 'kamar(id)', 'CASCADE', 'CASCADE'));
    }

    public function down()
    {
        $this->dbforge->drop_table('bed');
    }
}
