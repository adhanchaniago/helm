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
        <h4 class="page-title">Slide</h4>
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
                <a href="#">Slide</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tambah Slide</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="<?php echo base_url() ?>admin/slide/add" method="POST" enctype="multipart/form-data">
                    <div class="card-header">
                        <div class="card-title">Tambah Slide</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Judul</label>
                                    <div class="col-md-9 p-0">
                                        <input type="text" class="form-control input-full" name="slide_judul" placeholder="" required value="<?php echo set_value('slide_judul'); ?>"> <?php echo form_error('slide_judul'); ?>
                                    </div>
                                </div>
								<div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Deskripsi</label>
                                    <div class="col-md-9 p-0">
                                        <textarea name="slide_desk" cols="30" rows="10" class="form-control input-full" required><?php echo set_value('slide_desk'); ?></textarea>
                                        <?php echo form_error('slide_desk'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Foto Slide</label>
                                    <div class="col-md-9 p-0">
                                        <input type="file" class="form-control input-full" name="slide_foto" placeholder="" required value="<?php echo set_value('slide_foto'); ?>"> <?php echo form_error('slide_foto'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
                        <a href="<?php echo base_url() ?>admin/slide/" class="btn btn-danger" >Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
