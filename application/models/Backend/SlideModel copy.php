<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SlideModel extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->tabel = "tb_slide";
        $this->primaryKey = "slide_id";
        $this->kolomBawaanCrud = [
            "slide_judul",
            "slide_desk",
            "slide_foto"
        ];
    }
}
