<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_Admin extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model(['Model_CRUD','M_Login']);
		
		if($this->session->username == null){
			redirect('admin');
		}
	}

	//halaman awal admin
	public function index()
	{	
		$this->load->view('admin/template/V_Header');
		$this->load->view('admin/template/V_Sidebar');
		$this->load->view('admin/index');
		$this->load->view('admin/template/V_Footer');	 
	}

	//halaman fasilitas
	public function Fasilitas()
	{	
		$getAll = $this->Model_CRUD->getAll('fasilitas');
		$kd_fasilitas = $this->Model_CRUD->getKodeFasilitas();
		$data = [
			'getAll' => $getAll,
			'kd_fasilitas' => $kd_fasilitas
		];
		$this->load->view('admin/template/V_Header',$data);
		$this->load->view('admin/template/V_Sidebar');
		$this->load->view('admin/V_Fasilitas');
		$this->load->view('admin/template/V_Footer');
	}

	//simpan data fasilitas
	public function simpanFasilitas()
	{
		$kd_fasilitas = $this->Model_CRUD->getKodeFasilitas();
		$nm_fasilitas = $this->input->post('nm_fasilitas');
		
		$data = [
			'kd_fasilitas' => $kd_fasilitas,
			'nm_fasilitas' => ucwords($nm_fasilitas)
		];

		$result = $this->Model_CRUD->simpan('fasilitas',$data);
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('admin/fasilitas');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('admin/fasilitas');
		}
	}

	//ubah data fasilitas
	public function ubahFasilitas()
	{
		$kd_fasilitas = $this->input->post('kd_fasilitas');
		$nm_fasilitas = $this->input->post('nm_fasilitas');
		
		$data = [
			'nm_fasilitas' => ucwords($nm_fasilitas)
		];

		$result = $this->Model_CRUD->update('kd_fasilitas',$kd_fasilitas,$data,'fasilitas');
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('admin/fasilitas');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('admin/fasilitas');
		}
	}

	//hapus data fasilitas
	public function hapusFasilitas($id)
	{
		$result = $this->Model_CRUD->hapus('kd_fasilitas',$id,'fasilitas');
		if ($result){
	   		redirect('admin/fasilitas');
		}else{
			redirect('admin/fasilitas');
		}
	}


	//halalaman kategori
	public function Kategori()
	{	
		$getAll = $this->Model_CRUD->getAll('kategori');
		$data = [
			'getAll' => $getAll,
		];
		$this->load->view('admin/template/V_Header',$data);
		$this->load->view('admin/template/V_Sidebar');
		$this->load->view('admin/V_Kategori');
		$this->load->view('admin/template/V_Footer');
	}

	//simpan data kategori
	public function simpanKategori()
	{
		$kd_kategori = $this->Model_CRUD->getKodeKategori();
		$nm_kategori = $this->input->post('nm_kategori');
		
		$data = [
			'kd_kategori' => $kd_kategori,
			'nm_kategori' => ucwords($nm_kategori)
		];

		$result = $this->Model_CRUD->simpan('kategori',$data);
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('admin/kategori');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('admin/kategori');
		}
	}

	//ubah data kategori
	public function ubahKategori()
	{
		$kd_kategori = $this->input->post('kd_kategori');
		$nm_kategori = $this->input->post('nm_kategori');
		
		$data = [
			'nm_kategori' => ucwords($nm_kategori)
		];

		$result = $this->Model_CRUD->update('kd_kategori',$kd_kategori,$data,'kategori');
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('admin/kategori');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('admin/kategori');
		}
	}

	//hapus data kategori
	public function hapusKategori($id)
	{
		$result = $this->Model_CRUD->hapus('kd_kategori',$id,'kategori');
		if ($result){
			redirect('admin/kategori');
		}else{
			redirect('admin/kategori');
		}
	}

	//halalaman property
	public function Property()
	{	
		$getAll = $this->Model_CRUD->getAll('property');
		$data = [
			'getAll' => $getAll,
		];
		$this->load->view('admin/template/V_Header',$data);
		$this->load->view('admin/template/V_Sidebar');
		$this->load->view('admin/V_Property');
		$this->load->view('admin/template/V_Footer');
	}

	//halaman tambah property
	public function tambah_data_property()
	{	
		$getAllKategori = $this->Model_CRUD->getAll('kategori');
		$getAllFasilitas = $this->Model_CRUD->getAll('fasilitas');
		$data = [
			'getAllKategori' => $getAllKategori,
			'getAllFasilitas' => $getAllFasilitas,
		];
		$this->load->view('admin/template/V_Header',$data);
		$this->load->view('admin/template/V_Sidebar');
		$this->load->view('admin/V_tambah_property');
		$this->load->view('admin/template/V_Footer');
	}

	//halaman ubah property
	public function ubah_data_property($id)
	{	
		$getAll_fetch = $this->Model_CRUD->getAll_fetch('property','kd_property',$id);
		$getAllKategori = $this->Model_CRUD->getAll('kategori');
		$getAllFasilitas = $this->Model_CRUD->getAll('fasilitas');
		$data = [
			'kd_property' => $id,
			'getAll_fetch' => $getAll_fetch,
			'getAllKategori' => $getAllKategori,
			'getAllFasilitas' => $getAllFasilitas,
		];
		$this->load->view('admin/template/V_Header',$data);
		$this->load->view('admin/template/V_Sidebar');
		$this->load->view('admin/V_update_property');
		$this->load->view('admin/template/V_Footer');
	}

	//simpan data Property
	public function simpanProperty()
	{
		$kd_property = $this->Model_CRUD->getKodeProperty();
		$nm_property = $this->input->post('nm_property');
		$alamat = $this->input->post('alamat');
		$kecamatan = $this->input->post('kecamatan');
		$kabupaten = $this->input->post('kabupaten');
		$provinsi = $this->input->post('provinsi');
		$harga = $this->input->post('harga');
		$jenis = $this->input->post('jenis');
		$luas_tanah = $this->input->post('luas_tanah');
		$kamar_tidur = $this->input->post('kamar_tidur');
		$kamar_mandi = $this->input->post('kamar_mandi');
		$angsuran = $this->input->post('angsuran');
		$deskripsi = $this->input->post('deskripsi');
		$kd_kategori = $this->input->post('kd_kategori');
		$status = '0';

		$data = [
			'kd_property' => $kd_property,
			'nm_property' => ucwords($nm_property),
			'alamat' => $alamat,
			'kecamatan' => $kecamatan,
			'kabupaten' => $kabupaten,
			'provinsi' => $provinsi,
			'harga' => $harga,
			'jenis' => $jenis,
			'luas_tanah' => $luas_tanah,
			'kamar_tidur' => $kamar_tidur,
			'kamar_mandi' => $kamar_mandi,
			'angsuran' => $angsuran,
			'deskripsi' => $deskripsi,
			'kd_kategori' => $kd_kategori,
			'status' => $status,
			'tgl_input' => date("Y-m-d H:i:s")
		];

		$result = $this->Model_CRUD->simpan('property',$data);
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('admin/property');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('admin/property');
		}
	}

	//ubah data kategori
	public function ubahProperty()
	{
		$kd_property = $this->input->post('kd_property');
		$nm_property = $this->input->post('nm_property');
		$alamat = $this->input->post('alamat');
		$kecamatan = $this->input->post('kecamatan');
		$kabupaten = $this->input->post('kabupaten');
		$provinsi = $this->input->post('provinsi');
		$harga = $this->input->post('harga');
		$jenis = $this->input->post('jenis');
		$luas_tanah = $this->input->post('luas_tanah');
		$kamar_tidur = $this->input->post('kamar_tidur');
		$kamar_mandi = $this->input->post('kamar_mandi');
		$angsuran = $this->input->post('angsuran');
		$deskripsi = $this->input->post('deskripsi');
		$kd_kategori = $this->input->post('kd_kategori');
		$status = '0';

		$data = [
			'kd_property' => $kd_property,
			'nm_property' => ucwords($nm_property),
			'alamat' => $alamat,
			'kecamatan' => $kecamatan,
			'kabupaten' => $kabupaten,
			'provinsi' => $provinsi,
			'harga' => $harga,
			'jenis' => $jenis,
			'luas_tanah' => $luas_tanah,
			'kamar_tidur' => $kamar_tidur,
			'kamar_mandi' => $kamar_mandi,
			'angsuran' => $angsuran,
			'deskripsi' => $deskripsi,
			'kd_kategori' => $kd_kategori,
			'status' => $status,
			// 'tgl_input' => date("Y-m-d H:i:s")
		];

		$result = $this->Model_CRUD->update('kd_property',$kd_property,$data,'property');
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('admin/property');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('admin/property');
		}
	}

	//hapus data kategori
	public function hapusProperty($id)
	{ 
		$result = $this->Model_CRUD->hapus('kd_property',$id,'property');
		if ($result){
			redirect('admin/property');
		}else{
			redirect('admin/property');
		}
	}

}
