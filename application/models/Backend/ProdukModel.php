<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdukModel extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->tabel = "tb_produk";
        $this->primaryKey = "produk_id";
        $this->kolomBawaanCrud = [
            "merk_id",
            "ukuran_id",
            "warna_id",
            "supplier_id",
            "produk_nama",
            "produk_harga_beli",
            "produk_harga_jual",
            "produk_stok",
            "produk_desk",
            "produk_gambar",
            "produk_tgl_input",
        ];
    }
    public function ambilDataProduk()
    {
        $produk = $this->db->query("SELECT tb_produk.produk_id,
                                            tb_merk.merk_nama,
                                            tb_ukuran.ukuran_nama,
                                            tb_warna.warna_nama,
                                            tb_supplier.supplier_nama,
                                            tb_produk.produk_nama,
                                            tb_produk.produk_harga_beli,
                                            tb_produk.produk_harga_jual,
                                            tb_produk.produk_stok,
                                            tb_produk.produk_desk,
                                            tb_produk.produk_gambar, 
                                            tb_produk.produk_tgl_input 
                                    FROM tb_produk
                                    JOIN tb_merk ON tb_produk.merk_id = tb_merk.merk_id
                                    JOIN tb_ukuran ON tb_produk.ukuran_id = tb_ukuran.ukuran_id
                                    JOIN tb_warna ON tb_produk.warna_id = tb_warna.warna_id
                                    JOIN tb_supplier ON tb_produk.supplier_id = tb_supplier.supplier_id
                                    ORDER BY tb_produk.produk_id DESC
                                    ")->fetchAll(PDO::FETCH_ASSOC);
        return $produk;
    }
}
