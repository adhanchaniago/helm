<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SupplierModel extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->tabel = "tb_supplier";
        $this->primaryKey = "supplier_id";
        $this->kolomBawaanCrud = [
            "supplier_nama",
            "supplier_alamat",
            "supplier_telp",
        ];
    }
}
