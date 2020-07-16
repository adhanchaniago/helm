<?php
header('Content-Type: application/json');
include "koneksi.php";

$output_json = new stdClass();
$output_json->results = [];

$kode_qr = "";
$sql_tambahan = "";

if(isset($_POST['kode_qr']))
{
  $kode_qr = $_POST['kode_qr'];
  $sql_tambahan = " AND data.kode_qr = '".$kode_qr."'";
}

$hasil_json = $db->query("select data.* from (select concat(unix_timestamp(`tb_cagar_budaya`.`tgl_entry`),`tb_cagar_budaya`.`id_cagar`) AS `kode_qr`,`tb_cagar_budaya`.`id_cagar` AS `id_cagar`,`tb_cagar_budaya`.`cover` AS `cover`,`tb_cagar_budaya`.`nama_objek` AS `nama_objek`,`tb_cagar_budaya`.`no_inventaris` AS `no_inventaris`,`tb_cagar_budaya`.`jalan` AS `jalan`,`tb_cagar_budaya`.`dusun` AS `dusun`,`tb_cagar_budaya`.`id_kelurahan` AS `id_kelurahan`,`tb_cagar_budaya`.`orbitrasi_kab` AS `orbitrasi_kab`,`tb_cagar_budaya`.`orbitrasi_prov` AS `orbitrasi_prov`,`tb_cagar_budaya`.`letak_geo` AS `letak_geo`,`tb_cagar_budaya`.`aksesibilitas_situs` AS `aksesibilitas_situs`,`tb_cagar_budaya`.`letak_astronomis` AS `letak_astronomis`,`tb_cagar_budaya`.`deskripsi_historis` AS `deskripsi_historis`,`tb_cagar_budaya`.`deskripsi_arkeologis` AS `deskripsi_arkeologis`,`tb_cagar_budaya`.`lahan` AS `lahan`,`tb_cagar_budaya`.`batas_utara` AS `batas_utara`,`tb_cagar_budaya`.`batas_selatan` AS `batas_selatan`,`tb_cagar_budaya`.`batas_barat` AS `batas_barat`,`tb_cagar_budaya`.`batas_timur` AS `batas_timur`,`tb_cagar_budaya`.`fungsi_lama_dan_sekarang` AS `fungsi_lama_dan_sekarang`,`tb_cagar_budaya`.`pemilik` AS `pemilik`,`tb_cagar_budaya`.`pengelola` AS `pengelola`,`tb_cagar_budaya`.`denah` AS `denah`,`tb_cagar_budaya`.`tanggal` AS `tanggal`,`tb_cagar_budaya`.`tgl_entry` AS `tgl_entry`,`tb_kelurahan`.`nama_kelurahan` AS `nama_kelurahan`,`tb_kabkota`.`nama_kabkota` AS `nama_kabkota`,`tb_kabkota`.`id_kabkota` AS `id_kabkota`,`tb_prov`.`nama_provinsi` AS `nama_provinsi`,`tb_kabkota`.`id_prov` AS `id_prov`,`tb_kecamatan`.`nama_kec` AS `nama_kec`,`tb_kecamatan`.`id_kabkota` AS `id_kabkota1`,`tb_kelurahan`.`id_kec` AS `id_kec` from ((((`tb_cagar_budaya` join `tb_kelurahan` on(`tb_kelurahan`.`id_kelurahan` = `tb_cagar_budaya`.`id_kelurahan`)) join `tb_kecamatan` on(`tb_kecamatan`.`id_kec` = `tb_kelurahan`.`id_kec`)) join `tb_kabkota` on(`tb_kabkota`.`id_kabkota` = `tb_kecamatan`.`id_kabkota`)) join `tb_prov` on(`tb_prov`.`id_prov` = `tb_kabkota`.`id_prov`))) data where 1 $sql_tambahan")->fetchAll(PDO::FETCH_ASSOC);

$banyak_data = count($hasil_json);

for($no = 0;$no < $banyak_data; $no++)
{
  // masukkan data foto cagar
  
  // generate nama file pdf
  $nama_file = $hasil_json[$no]['nama_objek'];
  // jadikan nama file menjadi huruf kecil
  $nama_file = str_replace(" ", "-", $nama_file);
  // jadikan nama file huruf kecil
  $nama_file = strtolower($nama_file);
  
  // tambahkan id file dibelakang nama file agar unik
  $nama_file_baru = $hasil_json[$no]['id_cagar']."/".$nama_file.".pdf";
  
  $hasil_json[$no]['url_pdf'] = $nama_file_baru;
  $hasil_json[$no]['foto_cagar'] = [];
  $hasil_json[$no]['foto_cagar'] = $db->query("SELECT id_foto, foto, tanggal, keterangan, jenis_foto FROM tb_foto_cagar WHERE id_cagar = :id_cagar", ["id_cagar" => $hasil_json[$no]['id_cagar']])->fetchAll(PDO::FETCH_ASSOC);
  
  // masukkan data luas bangunan
  $hasil_json[$no]['luas_bangunan'] = [];
  $hasil_json[$no]['luas_bangunan'] = $db->query("SELECT id_luas, nama, luas FROM tb_luas_bangunan WHERE id_cagar = :id_cagar", ["id_cagar" => $hasil_json[$no]['id_cagar']])->fetchAll(PDO::FETCH_ASSOC);
  
  // masukkan data pengentri data
  $hasil_json[$no]['pengentri_data'] = [];
  $hasil_json[$no]['pengentri_data'] = $db->query("SELECT id_pengentri, nama FROM tb_pengentri_data WHERE id_cagar = :id_cagar", ["id_cagar" => $hasil_json[$no]['id_cagar']])->fetchAll(PDO::FETCH_ASSOC);  
}

$output_json->results = $hasil_json;

echo json_encode($output_json);


?>
