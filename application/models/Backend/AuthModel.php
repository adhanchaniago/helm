<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->tabel = "tb_admin";
        $this->primaryKey = "admin_id";
        $this->kolomBawaanCrud = [
            "admin_nama",
            "admin_email",
            "admin_notelp",
            "admin_alamat",
            "admin_password",
            "admin_level",
        ];
    }
}
