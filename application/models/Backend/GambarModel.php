<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GambarModel extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->tabel = "tb_gambar";
        $this->primaryKey = "gambar_id";
        $this->kolomBawaanCrud = [
            "produk_id",
            "gambar_ket",
            "gambar_produk",
        ];
    }
    public function ambilDataGambar($id)
    {
        $gambar = $this->db->query(
            "SELECT tb_gambar.gambar_id,
                    tb_produk.produk_nama,
                    tb_gambar.gambar_ket,
                    tb_gambar.gambar_produk 
            FROM tb_gambar
            JOIN tb_produk ON tb_gambar.produk_id = tb_produk.produk_id
            WHERE tb_gambar.produk_id = :produk_id
            ORDER BY tb_gambar.gambar_id DESC
            ",
            array("produk_id" => $id)
        )->fetchAll(PDO::FETCH_ASSOC);

        return $gambar;
    }
}
