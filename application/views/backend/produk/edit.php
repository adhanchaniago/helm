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
                <a href="#">Edit Ukuran</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="<?php echo base_url() ?>admin/produk/update" method="POST" enctype="multipart/form-data">
                    <div class="card-header">
                        <div class="card-title">Edit Ukuran</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Nama Produk</label>
                                    <div class="col-md-9 p-0">
                                        <input type="hidden" name="produk_id" value="<?= $produk['produk_id'] ?>">
                                        <input type="text" class="form-control input-full" name="produk_nama" placeholder="" required value="<?php echo $produk['produk_nama']; ?>"> <?php echo form_error('produk_nama'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Merk</label>
                                    <div class="col-md-9 p-0">
                                        <select name="merk_id" class="form-control input-full" required value="<?php echo set_value('merk_id'); ?>">
                                            <option value="">Pilih Merk</option>
                                            <?php foreach ($merk as $row) : ?>
                                                <option value="<?= $row['merk_id'] ?>"><?= $row['merk_nama'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <script>
                                            document.getElementsByName('merk_id')[0].value = "<?php echo $produk['merk_id'] ?>";
                                        </script>
                                        <?php echo form_error('merk_id'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Ukuran</label>
                                    <div class="col-md-9 p-0">
                                        <select name="ukuran_id" class="form-control input-full" required value="<?php echo set_value('ukuran_id'); ?>">
                                            <option value="">Pilih Ukuran</option>
                                            <?php foreach ($ukuran as $row) : ?>
                                                <option value="<?= $row['ukuran_id'] ?>"><?= $row['ukuran_nama'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <script>
                                            document.getElementsByName('ukuran_id')[0].value = "<?php echo $produk['ukuran_id'] ?>";
                                        </script>
                                        <?php echo form_error('ukuran_id'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Warna</label>
                                    <div class="col-md-9 p-0">
                                        <select name="warna_id" class="form-control input-full" required value="<?php echo set_value('warna_id'); ?>">
                                            <option value="">Pilih Warna</option>
                                            <?php foreach ($warna as $row) : ?>
                                                <option value="<?= $row['warna_id'] ?>"><?= $row['warna_nama'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <script>
                                            document.getElementsByName('warna_id')[0].value = "<?php echo $produk['warna_id'] ?>";
                                        </script>
                                        <?php echo form_error('warna_id'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Supplier</label>
                                    <div class="col-md-9 p-0">
                                        <select name="supplier_id" class="form-control input-full" required value="<?php echo set_value('supplier_id'); ?>">
                                            <option value="">Pilih Supplier</option>
                                            <?php foreach ($supplier as $row) : ?>
                                                <option value="<?= $row['supplier_id'] ?>"><?= $row['supplier_nama'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <script>
                                            document.getElementsByName('supplier_id')[0].value = "<?php echo $produk['supplier_id'] ?>";
                                        </script>
                                        <?php echo form_error('supplier_id'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Harga Beli</label>
                                    <div class="col-md-9 p-0">
                                        <input type="text" class="form-control input-full" name="produk_harga_beli" id="produk_harga_beli" placeholder="" required value="<?php echo $produk['produk_harga_beli']; ?>"> <?php echo form_error('produk_harga_beli'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Harga Jual</label>
                                    <div class="col-md-9 p-0">
                                        <input type="text" class="form-control input-full" name="produk_harga_jual" id="produk_harga_jual" placeholder="" required value="<?php echo $produk['produk_harga_jual']; ?>"> <?php echo form_error('produk_harga_jual'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Stok</label>
                                    <div class="col-md-9 p-0">
                                        <input type="text" class="form-control input-full" name="produk_stok" placeholder="" required value="<?php echo $produk['produk_stok']; ?>"> <?php echo form_error('produk_stok'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Deskripsi</label>
                                    <div class="col-md-9 p-0">
                                        <textarea class="ckeditor form-control input-full" id="ckeditor" name="produk_desk" required><?php echo $produk['produk_desk']; ?></textarea>
                                        <?php echo form_error('produk_desk'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Gambar</label>
                                    <div class="col-md-9 p-0">
                                        <img src="<?php echo base_url('img/produk/' . $produk['produk_gambar']) ?>" alt="load gagal" width="150px" class="mx-auto d-block">
                                        <input type="file" class="form-control input-full" name="produk_gambar" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
                        <a class="btn btn-danger" href="<?php echo base_url() ?>admin/produk">Batal</a>
                    </div>
                </form>
                <script>
                    var pengaturan_rupiah = {
                        currencySymbol: "Rp",
                        decimalCharacter: ',',
                        digitGroupSeparator: '.'
                    };
                    var produk_harga_beli = new AutoNumeric('#produk_harga_beli', pengaturan_rupiah);
                    var produk_harga_jual = new AutoNumeric('#produk_harga_jual', pengaturan_rupiah);
                </script>
            </div>
        </div>
    </div>
</div>