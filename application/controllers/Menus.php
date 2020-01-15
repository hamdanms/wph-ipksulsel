<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Makanan/Minuman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menus'] = $this->db->get('menu')->result_array();

        $this->form_validation->set_rules('menus', 'Menu', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menus/index', $data);
            $this->load->view('templates/tabel_footer');
        } else {

            $data = [
                'menu' => $this->input->post('menus'),
                'harga' => $this->input->post('harga')
            ];
            $this->db->insert('menu', $data);
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menus');
        }
    }

    public function deleteMenus($id)
    {
        $this->db->delete('menu',['id' => $id]); 
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The menu has ben deleted!</div>');
        redirect('menus');
    }

    public function editMenus($id)
    {
        $data = array(
            'menu' => $this->input->post('menus') ,
            'harga' => $this->input->post('harga')
        );
        $this->db->where('id', $id);
        $this->db->update('menu', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The menu has ben edited!</div>');
        redirect('menus');
    }





}
?>