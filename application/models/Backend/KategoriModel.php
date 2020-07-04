<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriModel extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->tabel = "tb_kategori";
        $this->primaryKey = "kategori_id";
        $this->kolomBawaanCrud = [
            "kategori_nama",
            "kategori_foto"
        ];
    }
}
