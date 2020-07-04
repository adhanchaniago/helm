<?php

require "Medoo.php";

use Medoo\Medoo;

class MY_Model extends CI_Model
{
  protected $db;
  public $tabel;      // nama tabelnya
  protected $primaryKey; // primary keynya
  protected $relasiTabel; // relasi tabel array
  public $kolomBawaanCrud; // kolom bawaan crud array
  public $data = [];
  public $view = null; // atur nama viewnya jika tabel anda menggunakan view untuk query relasi join
  function __construct()
  {
    // pengaturan database
    $this->db = new Medoo([
      'database_type' => 'mysql',
      'database_name' => 'db_helm',
      'server' => "localhost",
      'username' => "root",
      'password' => ""
    ]);
  }

  // mengambil instansi koneksi database
  public function getDb()
  {
    return $this->db;
  }

  /*
    ambilData(3, ["username", "password", "level"]);
    kode diatas berarti mengambil data dengan id = 3 dan ambil kolom username, password dan level
    Hasil: array satu baris atau object
    
    ambilData()
    kode diatas berarti mengambil seluruh data dan seluruh kolom
    Hasil: array dengan baris dan kolom
    
  */
  public function ambilData($id = null, $kolom = "*")
  {
    $tabel = $this->tabel;
    if (!empty($this->view)) {
      $tabel = $this->view;
    }
    if (!is_null($id)) {
      return $this->db->get($tabel, $kolom, [$this->primaryKey => $id]);
    } else {
      return $this->db->select($tabel, $kolom);
    }
  }

  /*
    ambilDataDenganKondisi(["username" => "madam", "password" => "123"], ["username"])
    kode diatas berarti ambil data dimana username = madam dan password = 123 serta tampilkan saja kolom username
    
    ambilDataDenganKondisi(["username" => "madam", "password" => "123"])
    kode diatas berarti ambil data dimana username = madam dan password = 123 serta tampilkan semua kolom
    
    Hasil: array dengan baris dan kolom
  */
  public function ambilDataDenganKondisi($where, $kolom = "*")
  {
    $tabel = $this->tabel;
    if (!empty($this->view)) {
      $tabel = $this->view;
    }
    return $this->db->select($tabel, $kolom, $where);
  }

  /*
    tambahData([
    	"username" => $_POST['username'],
	"password" => $_POST['password']
    ])
    tambah data tabel dengan data diatas
    
    Hasil: integer jika primary key tabelnya adalah auto increment
  */
  public function tambahData($data)
  {
    foreach ($this->kolomBawaanCrud as $d) {
      if (isset($data[$d])) {
        $this->data[$d] = $data[$d];
      }
    }
    $this->db->insert($this->tabel, $this->data);
    return $this->db->id();
  }

  /*
    editData(12,[
    	"username" => $_POST['username'],
	"password" => $_POST['password']
    ])
    edit data dengan kolom diatas dimana id = 12
    
    Hasil: boolean true
  */
  public function editData($id, $data)
  {
    foreach ($this->kolomBawaanCrud as $d) {
      if (isset($data[$d])) {
        $this->data[$d] = $data[$d];
      }
    }
    $this->db->update($this->tabel, $this->data, [$this->primaryKey => $id]);
    return true;
  }

  /*
    hapusData(12)
    hapus data dengan id = 12
    
    Hasil: boolean true
  */
  public function hapusData($id)
  {
    $this->db->delete($this->tabel, [$this->primaryKey => $id]);
    return true;
  }

  public function hapusDataDenganKondisi($kondisi)
  {
    $this->db->delete($this->tabel, $kondisi);
    return true;
  }
}
