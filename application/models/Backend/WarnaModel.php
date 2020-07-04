<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WarnaModel extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->tabel = "tb_warna";
        $this->primaryKey = "warna_id";
        $this->kolomBawaanCrud = [
            "warna_nama",
            "warna_kode",
        ];
    }
}
