<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_CRUD extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}

	//simpan
	public function simpan($table,$data)
	{
		$checkinsert = false;
		try{
			$this->db->insert($table,$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}

	//update
	public function update($pk,$id,$data,$table)
	{
		$checkupdate = false;
		try{
			$this->db->where($pk,$id);
			$this->db->update($table,$data);
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	//hapus
	public function hapus($pk,$id,$table)
	{
		$checkupdate = false;
		try{
			$this->db->where($pk,$id);
			$this->db->delete($table);
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	//proses status property
	public function proses($kd_property)
	{	$data = [
			'status' => '1'
		];
		$checkupdate = false;
		try{
			$this->db->where('kd_property',$kd_property);
			$this->db->update('property',$data);
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	//ambil semua data
	public function getAll($table)
	{
		$result = $this->db->get($table);
		return $result->result();
	}

	//ambil data untuk fetch
	public function getAll_fetch($table,$pk,$id)
	{	
		$result = $this->db->query("SELECT * FROM $table WHERE $pk = '$id'");
		return $result->row();
	}

	//join table untuk detail property
	public function getJoin($id)
	{	
		$result = $this->db->query("SELECT * FROM kategori JOIN property ON kategori.kd_kategori = property.kd_kategori AND kd_property = '$id'");
		return $result->row();
	}

	//autonumber fasilitas
	public function getKodeFasilitas()
    {
       	$q  = $this->db->query("SELECT MAX(RIGHT(kd_fasilitas,7)) as kd_max from fasilitas");
       	$kd = "";
    	if($q->num_rows() > 0) {
        	foreach ($q->result() as $k) {
          		$tmp = ((int)$k->kd_max)+1;
           		$kd = sprintf("%07s",$tmp);
        	}
    	} else {
         $kd = "0000001";
    	}
       	return "FST".$kd;
    }

    //autonumber kategori
	public function getKodeKategori()
    {
       	$q  = $this->db->query("SELECT MAX(RIGHT(kd_kategori,7)) as kd_max from kategori");
       	$kd = "";
    	if($q->num_rows() > 0) {
        	foreach ($q->result() as $k) {
          		$tmp = ((int)$k->kd_max)+1;
           		$kd = sprintf("%07s",$tmp);
        	}
    	} else {
         $kd = "0000001";
    	}
       	return "KTG".$kd;
    }

    //autonumber property
	public function getKodeProperty()
    {
       	$q  = $this->db->query("SELECT MAX(RIGHT(kd_property,7)) as kd_max from property");
       	$kd = "";
    	if($q->num_rows() > 0) {
        	foreach ($q->result() as $k) {
          		$tmp = ((int)$k->kd_max)+1;
           		$kd = sprintf("%07s",$tmp);
        	}
    	} else {
         $kd = "0000001";
    	}
       	return "PTY".$kd;
    }

}
