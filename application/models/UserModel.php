<?php
class UserModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'users';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_one['roles'] = array('RoleModel', 'id', 'role_id');
        parent::__construct();
    }

    function getByUsername($username)
    {
        $table = 'users';
        return $this->db->get_where($table, ['username' => $username])->row_array();
    }

    function getAllUser()
    {
        $table = 'users';
        $this->db->join('roles', 'roles.id = users.role_id');
        return $this->db->get($table)->result_array();
    }
}
