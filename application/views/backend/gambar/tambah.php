<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php
if ($this->session->flashdata('pesan') == TRUE) {
    $pesan = $this->session->flashdata('pesan');
?>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
    <script type="text/javascript">
        Swal.fire(
            'Berhasil!',
            '<?= $pesan ?>',
            'success'
        )
    </script>
<?php } ?>

<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Gambar</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Gambar</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tambah Gambar</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="<?php echo base_url() ?>admin/produk/gambar/add" method="POST" enctype="multipart/form-data">
                    <div class="card-header">
                        <div class="card-title">Tambah Gambar</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Gambar</label>
                                    <div class="col-md-9 p-0">
                                        <input type="file" class="form-control input-full" name="gambar_produk" placeholder="" required value="<?php echo set_value('gambar_produk'); ?>"> <?php echo form_error('gambar_produk'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Keterangan Gambar</label>
                                    <div class="col-md-9 p-0">
                                        <textarea name="gambar_ket" cols="30" rows="10" class="form-control input-full" required><?php echo set_value('gambar_ket'); ?></textarea>
                                        <?php echo form_error('gambar_ket'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
                        <a href="<?php echo base_url() ?>admin/merk/" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>