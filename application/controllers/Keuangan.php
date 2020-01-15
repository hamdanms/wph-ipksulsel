<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        
        $this->load->model('Keuangan_model');
    }

    public function index()
    {
        $data['title'] = 'Penjualan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['keuangan'] = $this->Keuangan_model->getPemasukanCart();
        $data['menu'] = $this->db->get('menu')->result_array();
        $data['maxid'] = $this->Keuangan_model->getMaxidPemasukan();

        

        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keuangan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Keuangan_model->tambahPemasukanCart();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New transaction added!</div>');
            redirect('keuangan');
        }
    }

    public function savepemasukancart()
    {
        if ($this->input->post('total')==0){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Add transaction first!</div>');
            redirect('keuangan');
        } else {
            $this->Keuangan_model->savePemasukanCart();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New transaction saved!</div>');
            redirect('keuangan');
        }
    }

    public function deletePemasukanCart($id)
    {
        $this->db->delete('pemasukan_cart',['id' => $id]); 
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The transaction deleted!</div>');
        redirect('keuangan');
    }

    public function deletePemasukanCartAll($id)
    {
        $this->db->delete('pemasukan_cart',['id_pemasukan' => $id]); 
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The transaction deleted!</div>');
        redirect('keuangan');
    }
    


    public function pemasukanLuarUsaha()
    {
        $data['title'] = 'Pemasukan Luar Usaha';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['keuangan'] = $this->db->get('pemasukan_ekscart')->result_array();
        $data['menu'] = $this->db->get('menu')->result_array();
        $data['maxid'] = $this->Keuangan_model->getMaxidPemasukan();

        
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keuangan/pemasukan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Keuangan_model->tambahPemasukanLuarUsahaCart();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New transaction added!</div>');
            redirect('keuangan/pemasukanLuarUsaha');
        }
    }

    public function savePemasukanEkscart()
    {
        if ($this->input->post('total')==0){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Add transaction first!</div>');
            redirect('keuangan/pemasukanLuarUsaha');
        } else {
            $this->Keuangan_model->savePemasukanEksCart();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New transaction saved!</div>');
            redirect('keuangan/pemasukanLuarUsaha');
        }
    }

    public function deletePemasukanEksCart($id)
    {
        $this->db->delete('pemasukan_ekscart',['id' => $id]); 
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The transaction deleted!</div>');
        redirect('keuangan/pemasukanLuarUsaha');
    }

    public function deletePemasukanEksCartAll($id)
    {
        $this->db->delete('pemasukan_ekscart',['id_pemasukan' => $id]); 
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The all transaction deleted!</div>');
        redirect('keuangan/pemasukanLuarUsaha');
    }

    // Begim Menu Pengeluaran
    public function pengeluaran()
    {
        $data['title'] = 'Pengeluaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['keuangan'] = $this->db->get('pengeluaran_')->result_array();
        $data['maxid'] = $this->Keuangan_model->getMaxidPemasukan();

        

        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keuangan/pengeluaran', $data);
            $this->load->view('templates/tabel_footer');
        } else {
            $this->Keuangan_model->tambahPengeluaran();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi telah ditamahkan!</div>');
            redirect('keuangan/pengeluaran');
        }
    }

    public function deletePengeluaran($id)
    {
        $this->db->delete('pengeluaran_',['id' => $id ]); 

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Transaksi telah dihapus!</div>');
            redirect('keuangan/pengeluaran');

    }

    public function editPengeluaran($id)
    {
        $this->Keuangan_model->editPengeluaran($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi telah berhasil diubah!</div>');
        redirect('keuangan/pengeluaran');

    }
    // End Menu Pengeluaran

    // KAS
    public function kas()
    {
        $data['title'] = 'Kas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['keuangan'][] = $this->Keuangan_model->GetKas();
        $data['keuangan'][] = $this->Keuangan_model->GetKasEks();
        $data['maxid'] = $this->Keuangan_model->getMaxidPemasukan();

        

        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keuangan/kas', $data);
            $this->load->view('templates/tabel_footer');
        } else {
            $this->Keuangan_model->tambahPengeluaran();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi telah ditamahkan!</div>');
            redirect('keuangan/pengeluaran');
        }
    }

    public function editKas($indikator, $id)
    {

        if ($indikator == 'KAS' ){
            $this->_kas($id);
        } else {
            $this->_kaseks($id);
        }

    }
    // END KAS

    private function _kas($id)
    {
        
        $data['title'] = 'Kas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['keuangan'][] = $this->Keuangan_model->GetKasEdit($id);
        // $data['keuangan'][] = $this->Keuangan_model->GetKasEks();
        $data['menu'] = $this->db->get('menu')->result_array();
        $data['maxid'] = $this->Keuangan_model->getMaxidPemasukan();

        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keuangan/editkas', $data);
            $this->load->view('templates/footer');
        } else {
            // $this->Keuangan_model->tambahPemasukanCart();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New transaction added!</div>');
            redirect('keuangan');
        }
    }

    private function _kaseks($id)
    {
        $data['title'] = 'Kas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        
        $data['keuangan'][] = $this->Keuangan_model->GetKasEdit($id);
        $data['keuangan'][] = $this->Keuangan_model->GetKasEksEdit($id);
        $data['menu'] = $this->db->get('menu')->result_array();
        $data['maxid'] = $this->Keuangan_model->getMaxidPemasukan();

        
        $this->form_validation->set_rules('harga', 'Jumlah', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keuangan/editkaseks', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Keuangan_model->tambahPemasukanLuarUsahaCart();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New transaction added!</div>');
            redirect('keuangan/pemasukanLuarUsaha');
        }
        
    }

   
}
