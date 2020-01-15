<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getUserManagement()
    {
        $query = "SELECT `user`.*, `user_token`.*
                  FROM `user` 
                  JOIN `user_token`
                  ON `user`.`email` = `user_token`.`email`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getUser()
    {
        $query = "SELECT `user`.*, `user_role`.*, `user`.`id` as user_id
                  FROM `user` 
                  JOIN `user_role`
                  ON `user`.`role_id` = `user_role`.`id`
                  WHERE `user`.`id` != 1
                ";
        return $this->db->query($query)->result_array();
    }

    public function editUser($id)
    {

        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'is_active' => $this->input->post('is_active'),
            'role_id' => $this->input->post('role_id')
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);

        // $data = [
        //     'name' => $this->input->post('name'),
        //     'email' => $this->input->post('email'),
        //     'role_id' => $this->input->post('role_id'),
        //     'is_active' => $this->input->post('is_active')

        // ];
        
        // $this->db->where('id', $id);
        // $this->db->update('user', $data);
        // $this->db->update('user', $data , ['id' => $id]);
    }
}
