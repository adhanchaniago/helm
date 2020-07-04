<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UkuranModel extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->tabel = "tb_ukuran";
        $this->primaryKey = "ukuran_id";
        $this->kolomBawaanCrud = [
            "ukuran_nama"
        ];
    }
}
