<?php

class UserModel extends CI_Model
{
    function getByUsername($username)
    {
        $table = 'users';
        return $this->db->get_where($table, ['username' => $username])->row_array();
    }
}
