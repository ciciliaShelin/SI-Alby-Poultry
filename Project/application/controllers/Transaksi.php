<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
	{	
		parent::__construct();
		$this->load->library('cart');
        $this->load->model('keranjang_model');
        $this->load->model('Produk_model', 'product');
    }

    public function tampil_cart()
	{
        $data['title'] = 'Keranjang Belanja';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->db->get('barang')->result_array();

        $this->load->view('templates/shop_header', $data);
        $this->load->view('templates/shop_sidebar');
		$this->load->view('shop/tampil_cart',$data);
		$this->load->view('templates/shop_footer');
	}
	
	public function check_out()
	{
        $data['title'] = 'Konfirmasi Check Out';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->db->get('barang')->result_array();
        $this->load->view('templates/shop_header', $data);
        $this->load->view('templates/shop_sidebar');
		$this->load->view('shop/check_out',$data);
		$this->load->view('templates/shop_footer');
    }
    
    function tambah()
	{
		if ($this->session->userdata('email') == null) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Anda belum login! Seilahkan login terlebih dahulu untuk order barang</div>');
			redirect('auth/login');
		} else {

			// $tbl_order= $this->input->post('tbl_oder');
			// $detail_order = $this->input->post('tbl_detail_order');
			// $this->keranjang_model->order($tbl_order, $detail_order);
			$data_produk= array('id' => $this->input->post('id'),
								'name' => $this->input->post('nama'),
								'price' => $this->input->post('harga'),
								'gambar' => $this->input->post('gambar'),
								'qty' =>$this->input->post('qty')
								);
			$this->cart->insert($data_produk);
			redirect('produk/keranjang_belanja');
					}
    }
    
    // function beli()
	// {
	// 	$data_produk= array('id' => $this->input->post('id'),
	// 						 'name' => $this->input->post('nama'),
	// 						 'price' => $this->input->post('harga'),
	// 						 'gambar' => $this->input->post('gambar'),
	// 						 'qty' =>$this->input->post('qty')
	// 						);
	// 	$this->cart->insert($data_produk);
	// 	redirect('produk/keranjang_belanja');
	// }

	function hapus($rowid) 
	{
		if ($rowid=="all")
			{
				$this->cart->destroy();
			}
		else
			{
				$data = array('rowid' => $rowid,
			  				  'qty' =>0);
				$this->cart->update($data);
			}
		redirect('transaksi/tampil_cart');
	}

	function ubah_cart()
	{
		$cart_info = $_POST['cart'] ;
		foreach( $cart_info as $id => $cart)
		{
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$gambar = $cart['gambar'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];
			$data = array('rowid' => $rowid,
							'price' => $price,
							'gambar' => $gambar,
							'amount' => $amount,
							'qty' => $qty);
			$this->cart->update($data);
		}
		redirect('transaksi/tampil_cart');
	}

	public function proses_order()
	{
		//-------------------------Input data pelanggan--------------------------
		$data_pelanggan = array('nama' => $this->input->post('nama'),
							'email' => $this->input->post('email'),
							'alamat' => $this->input->post('alamat'),
							'telp' => $this->input->post('telp'));
		$id_pelanggan = $this->keranjang_model->tambah_pelanggan($data_pelanggan);
		//-------------------------Input data order------------------------------
		$data_order = array('tanggal' => date('Y-m-d'),
					   		'pelanggan' => $id_pelanggan);
		$id_order = $this->keranjang_model->tambah_order($data_order);
		//-------------------------Input data detail order-----------------------		
		if ($cart = $this->cart->contents())
			{
				foreach ($cart as $item)
					{
						$data_detail = array('order_id' =>$id_order,
										'produk' => $item['id'],
										'qty' => $item['qty'],
										'harga' => $item['price']);			
						$proses = $this->keranjang_model->tambah_detail_order($data_detail);
					}
			}
		//-------------------------Hapus shopping cart--------------------------		
		$this->cart->destroy();
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
        $this->load->view('templates/shop_header', $data);
        $this->load->view('templates/shop_sidebar');
		$this->load->view('shopping/sukses',$data);
		$this->load->view('templates/shop_footer');
	}

}