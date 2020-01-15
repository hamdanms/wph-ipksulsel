<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan_model extends CI_Model
{
    public function tambahPemasukanCart()
    {
        $saldo = $this->db->get_where('menu', ['id' => $this->input->post('menu_id') ])->row_array();

        // echo $this->input->post('idkas');
        // die;

        $data = [
            'id_pemasukan' => $this->input->post('idkas'),
            'harga' => $saldo['harga'],
            'jumlah' => $this->input->post('jumlah'),
            'id_menu' => $this->input->post('menu_id'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->insert('pemasukan_cart', $data);

    }

    public function savePemasukanCart()
    {
        $cart = $this->db->get_where('pemasukan_cart', ['id_pemasukan' => $this->input->post('idkas') ])->result_array();
        
        
            $data = [
                'id' => $this->input->post('idkas'),
                'total' => $this->input->post('total'),
                'tanggal' => date('m/d/y'),
                'id_admin' => $this->input->post('idadmin')
            ];
            $this->db->insert('pemasukan_', $data);
    
            foreach ($cart as $c) :
                $data2 = [
                    'id_pemasukan' => $c['id_pemasukan'],
                    'harga' => $c['harga'],
                    'jumlah' => $c['jumlah'],
                    'id_menu' => $c['id_menu'],
                    'keterangan' => $c['keterangan'],
                    'link' => 'KAS'
                ];
                $this->db->insert('pemasukan_detail', $data2);
            endforeach;
            $this->db->delete('pemasukan_cart',['id_pemasukan' => $this->input->post('idkas')]); 
    }


    public function getPemasukanCart()
    {
        $query = "SELECT `pemasukan_cart`.*, `menu`.`menu`
                  FROM `pemasukan_cart` 
                  JOIN `menu`
                  ON `pemasukan_cart`.`id_menu` = `menu`.`id` 
                ";
        return $this->db->query($query)->result_array();
    }

    public function getMaxidPemasukan()
    {
        $query = "SELECT max(id) as maxid
                    FROM `pemasukan_` 
                ";
        return $this->db->query($query)->row_array();

    }

    
    public function tambahPemasukanLuarUsahaCart()
    {
        $saldo = $this->db->get_where('menu', ['id' => $this->input->post('menu_id') ])->row_array();

        // echo $this->input->post('idkas');
        // die;

        $data = [
            'id_pemasukan' => $this->input->post('idkas'),
            'harga' => $this->input->post('harga'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->insert('pemasukan_ekscart', $data);

    }

    public function savePemasukanEksCart()
    {
        $cart = $this->db->get_where('pemasukan_ekscart', ['id_pemasukan' => $this->input->post('idkas') ])->result_array();
        
        
            $data = [
                'id' => $this->input->post('idkas'),
                'total' => $this->input->post('total'),
                'tanggal' => date('m/d/y'),
                'id_admin' => $this->input->post('idadmin')
            ];
            $this->db->insert('pemasukan_', $data);
    
            foreach ($cart as $c) :
                $data2 = [
                    'id_pemasukan' => $c['id_pemasukan'],
                    'harga' => $c['harga'],
                    'keterangan' => $c['keterangan'],
                    'jumlah' => $c['jumlah'],
                    'link' => 'KASEKS'
                ];
                $this->db->insert('pemasukan_eksdetail', $data2);
            endforeach;
            $this->db->delete('pemasukan_ekscart',['id_pemasukan' => $this->input->post('idkas')]); 
    }

    // Pengeluaran
    
    public function tambahPengeluaran()
    {

        $data = [
            'id_admin' => $this->input->post('idadmin'),
            'tanggal' => date('m/d/y'),
            'keterangan' => $this->input->post('keterangan'),
            'jumlah' => $this->input->post('jumlah'),
            'harga' => $this->input->post('harga')
        ];
        $this->db->insert('pengeluaran_', $data);

    }
    
    public function editPengeluaran($id)
    {

        $data = [
            'keterangan' => $this->input->post('keterangan'),
            'jumlah' => $this->input->post('jumlah'),
            'harga' => $this->input->post('harga')
        ];
        $this->db->where('id', $id);
        $this->db->update('pengeluaran_', $data);

    }
    // END Pengeluaran

    // GET KAS
    public function GetKas()
    {
        $query = " SELECT
                        pemasukan_.id,
                        pemasukan_.tanggal,
                        GROUP_CONCAT( pemasukan_detail.keterangan SEPARATOR '<br>' ) AS keterangan,
                        GROUP_CONCAT( REPLACE ( format( pemasukan_detail.harga, 0 ), ',', '.' ) SEPARATOR '<br> Rp. ' ) AS subharga,
                        GROUP_CONCAT( pemasukan_detail.jumlah SEPARATOR '<br>' ) AS jumlah,
                        pemasukan_.total,
                        link 
                    FROM
                        pemasukan_
                        INNER JOIN pemasukan_detail ON pemasukan_.id = pemasukan_detail.id_pemasukan 
                    GROUP BY
                        pemasukan_.id
                ";
        return $this->db->query($query)->result_array();

    }
    // GET KAS eks
    public function GetKasEks()
    {
        $query = " SELECT DISTINCT
                        pemasukan_.id,
                        pemasukan_.tanggal,
                        GROUP_CONCAT( keterangan SEPARATOR '<br>' ) AS keterangan,
                        GROUP_CONCAT( REPLACE ( format( harga, 0 ), ',', '.' ) SEPARATOR '<br>Rp. ' ) AS subharga,
                        GROUP_CONCAT( jumlah SEPARATOR '<br>' ) AS jumlah,
                        link,
                        total 
                    FROM
                        pemasukan_
                        INNER JOIN pemasukan_eksdetail ON pemasukan_eksdetail.id_pemasukan = pemasukan_.id 
                    GROUP BY
                        pemasukan_.id
                    ORDER BY
                        pemasukan_.id ASC
                ";
        return $this->db->query($query)->result_array();

    }
    // GET KAS edit
    public function GetKasEdit($id)
    {
        $query = " SELECT
                        pemasukan_detail.id,
                        pemasukan_detail.id_pemasukan,
                        pemasukan_detail.harga AS subharga,
                        pemasukan_detail.jumlah,
                        pemasukan_detail.id_menu,
                        pemasukan_detail.keterangan,
                        pemasukan_.total,
                        menu.menu 
                    FROM
                        pemasukan_detail
                        INNER JOIN pemasukan_ ON pemasukan_detail.id_pemasukan = pemasukan_.id
                        INNER JOIN menu ON menu.id = pemasukan_detail.id_menu 
                    WHERE
                        pemasukan_detail.id_pemasukan = '$id'
                ";
        return $this->db->query($query)->result_array();

    }
    // GET KAS edit
    public function GetKasEksEdit($id)
    {
        $query = " SELECT
                        pemasukan_eksdetail.id,
                        pemasukan_eksdetail.id_pemasukan,
                        pemasukan_eksdetail.jumlah,
                        pemasukan_eksdetail.harga as subharga,
                        pemasukan_eksdetail.keterangan,
                        pemasukan_eksdetail.link 
                    FROM
                        pemasukan_
                        INNER JOIN pemasukan_eksdetail ON pemasukan_eksdetail.id_pemasukan = pemasukan_.id 
                    WHERE
                        pemasukan_eksdetail.id_pemasukan = '$id'
                ";
        return $this->db->query($query)->result_array();

    }

    public function deleteSubKas($id, $kasid)
    {
        $this->db->delete('pemasukan_detail',[ 'id' => $id ]); 
        $this->_updateKAS($kasid);
    }

    public function _updateKAS($kasid)
    {
        // Mencari total harga
        $query = "SELECT
                        pemasukan_detail.harga,
                        pemasukan_detail.jumlah 
                    FROM
                        pemasukan_detail 
                    WHERE
                        pemasukan_detail.id_pemasukan LIKE '$kasid'        
        ";
        $kasquery = $this->db->query($query)->result_array();
        $total = 0 ; $subtotal = 0 ;
        foreach ($kasquery as $q) {
            $subtotal = $q['harga'] * $q['jumlah'];
            $total +=  $subtotal ;
        }
        
        // simpan kas total
        $data = [
            'total' => $total
        ];
        $this->db->where('id', $kasid);
        $this->db->update('pemasukan_', $data);
    }



}
