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
        <h4 class="page-title">Produk</h4>
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
                <a href="#">Produk</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Data Produk</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Produk</h4>
                        <a href="<?php echo base_url('admin/produk/tambah') ?>" class="btn btn-primary btn-round ml-auto">
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
                                    <th>Nama Produk</th>
                                    <th>Merk</th>
                                    <th>Ukuran</th>
                                    <th>Warna</th>
                                    <th>Supplier</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Tanggal Input</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($produk as $no => $row) :
                                ?>
                                    <tr>
                                        <td><?php echo $no + 1; ?></td>
                                        <td><?php echo $row['produk_nama']; ?></td>
                                        <td><?php echo $row['merk_nama']; ?></td>
                                        <td><?php echo $row['ukuran_nama']; ?></td>
                                        <td><?php echo $row['warna_nama']; ?></td>
                                        <td><?php echo $row['supplier_nama']; ?></td>
                                        <td>Rp<?php echo number_format($row['produk_harga_beli']); ?></td>
                                        <td>Rp<?php echo number_format($row['produk_harga_jual']); ?></td>
                                        <td><?php echo $row['produk_stok']; ?></td>
                                        <td>
                                            <?php
                                            $kalimat = $row['produk_desk'];;
                                            $cetak = substr($kalimat, 0, 50);
                                            echo $cetak . "....";
                                            ?>
                                        </td>
                                        <td align="center">
                                            <img src="<?php echo base_url('img/produk/' . $row['produk_gambar']) ?>" alt="load gagal" width="100px">
                                        </td>
                                        <td><?php echo tgl_indo($row['produk_tgl_input']); ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="<?php echo base_url('admin/produk/gambar/' . $row['produk_id']) ?>">
                                                    <button type=" button" data-toggle="tooltip" title="" class="btn btn-link btn-success btn-sm" data-original-title="Add Image">
                                                        <i class="fa fa-camera"></i>
                                                    </button>
                                                </a>
                                                <a href="<?php echo base_url('admin/produk/edit/' . $row['produk_id']) ?>">
                                                    <button type=" button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-sm" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="<?php echo base_url('admin/produk/hapus/' . $row['produk_id']) ?>" onclick="return confirm('Yakin Hapus?')">
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