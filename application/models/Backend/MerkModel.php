<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MerkModel extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->tabel = "tb_merk";
        $this->primaryKey = "merk_id";
        $this->kolomBawaanCrud = [
            "merk_nama",
            "merk_foto"
        ];
    }
}
