<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUserById($id)
    {
        return $this->db
                    ->get_where('user', ['id' => $id])
                    ->row_array();
    }
}