<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $time = date('l');
        $query = "SELECT `user_log`.*, `user`.`name`, `user`.`email`
                  FROM `user_log` 
                  JOIN `user`
                  ON `user_log`.`user_id` = `user`.`id` 
                  WHERE user_log.time like '$time%'
                  ORDER BY `user_log`.`id` desc 
                ";
        $data['log'] = $this->db->query($query)->result_array();
        $datem = date('m______'); $datey = date('y');
        // echo $datem;
        // die;
        $data['kasm'] = $this->db->query("SELECT sum(total) as saldo FROM pemasukan_ where tanggal LIKE '$datem' ")->result_array();
        $data['kasy'] = $this->db->query("SELECT sum(total) as saldo FROM pemasukan_ where tanggal LIKE '______$datey' ")->result_array();
        $kaskeluar = $this->db->query("SELECT (harga*jumlah) as saldo FROM pengeluaran_ where tanggal LIKE '$datem' ")->result_array();
        $total = 0;
        foreach ($kaskeluar as $k):
            $total += $k['saldo']; 
        endforeach;
        $data['kask'] = $total;
        $data['masuk'] = $this->db->query("SELECT count(id) as masuk FROM pemasukan_ ")->row_array();
        $data['keluar'] = $this->db->query("SELECT count(id) as keluar FROM pengeluaran_ ")->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            
            $this->db->insert('user_role',  [ 'role' => $this->input->post('role') ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New role added!</div>');
            redirect('admin/role');
        }

    }

    public function editRole($id)
    {
        $this->db->update('user_role', ['role' => $this->input->post('role') ] ,[ 'id' => $id ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The menu has ben edited!</div>');
        redirect('admin/role');
    }

    public function deleteRole($id)
    {
        $this->db->delete('user_role',[ 'id' => $id ]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The menu has ben deleted!</div>');
        redirect('admin/role');
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function UserManagement()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['datauser'] = $this->Admin_model->getUserManagement() ;
        $data['detailuser'] = $this->Admin_model->getUser() ;
        // $data['role'] = $this->db->get('user_role')->result_array();
        $data['role'] = $this->db->query("SELECT * FROM user_role WHERE id !='1' ")->result_array();;

        // $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/usermanagement', $data);
            $this->load->view('templates/footer');
        } else {
            // $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            // redirect('menu');
        }
    }

    public function editUser($id)
    {
        $this->Admin_model->editUser($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User has ben changed!</div>');
        redirect('admin/usermanagement');
    }

    public function deleteUser($id)
    {
        $this->db->delete('user', ['id' => $id ]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User has ben deleted!</div>');
        redirect('admin/usermanagement');
    }
}
