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
        <h4 class="page-title">Ukuran</h4>
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
                <a href="#">Ukuran</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Data Ukuran</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Ukuran</h4>
                        <a href="<?php echo base_url('admin/ukuran/tambah') ?>" class="btn btn-primary btn-round ml-auto">
                            <i class=" fa fa-plus"></i>
                            Tambah Data
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ukuran</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($ukuran as $no => $row) :
                                ?>
                                    <tr>
                                        <td><?php echo $no + 1; ?></td>
                                        <td><?php echo $row['ukuran_nama']; ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="<?php echo base_url('admin/ukuran/edit/' . $row['ukuran_id']) ?>">
                                                    <button type=" button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-sm" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="<?php echo base_url('admin/ukuran/hapus/'.$row['ukuran_id']) ?>" onclick="return confirm('Yakin Hapus?')">
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-sm" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>