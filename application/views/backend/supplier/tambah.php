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
        <h4 class="page-title">Supplier</h4>
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
                <a href="#">Supplier</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tambah Supplier</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="<?php echo base_url() ?>admin/supplier/add" method="POST" enctype="multipart/form-data">
                    <div class="card-header">
                        <div class="card-title">Tambah Supplier</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Nama</label>
                                    <div class="col-md-9 p-0">
                                        <input type="text" class="form-control input-full" name="supplier_nama" placeholder="" required value="<?php echo set_value('supplier_nama'); ?>"> <?php echo form_error('supplier_nama'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Alamat</label>
                                    <div class="col-md-9 p-0">
                                        <textarea name="supplier_alamat" cols="30" rows="10" class="form-control input-full" required><?php echo set_value('supplier_alamat'); ?></textarea>
                                        <?php echo form_error('supplier_alamat'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">No Telpon</label>
                                    <div class="col-md-9 p-0">
                                        <input type="text" class="form-control input-full" name="supplier_telp" placeholder="" required value="<?php echo set_value('supplier_telp'); ?>"> <?php echo form_error('supplier_telp'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
                        <a class="btn btn-danger" href="<?php echo base_url() ?>admin/supplier">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>