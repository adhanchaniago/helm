<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registrasi</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="<?php echo base_url() ?>templateLogin/image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>templateLogin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>templateLogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>templateLogin/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>templateLogin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>templateLogin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>templateLogin/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>templateLogin/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>templateLogin/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>templateLogin/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>templateLogin/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url() ?>templateLogin/images/bg-01.jpg');">
			<div class="wrap-login100">
					<span class="login100-form-title p-b-34 p-t-27">
						Sign Up
					</span>
					<form name="form" method="POST" action="<?php echo base_url('admin/aksiregistrasi') ?>">
						
						<div class="wrap-input100 validate-input" data-validate = "Enter username">
							<input class="input100" type="text" name="admin_email" placeholder="Nama" required value="<?php echo set_value('admin_email'); ?>"><?php echo form_error('admin_email'); ?>
						</div>
						<div class="wrap-input100 validate-input" data-validate = "Enter username">
							<input class="input100" type="text" name="admin_email" placeholder="No Telpon" required value="<?php echo set_value('admin_email'); ?>"><?php echo form_error('admin_email'); ?>
						</div>
						<div class="wrap-input100 validate-input" data-validate = "Enter username">
							<input class="input100" type="text" name="admin_email" placeholder="Alamat" required value="<?php echo set_value('admin_email'); ?>"><?php echo form_error('admin_email'); ?>
						</div>
						<div class="wrap-input100 validate-input" data-validate = "Enter username">
							<input class="input100" type="text" name="admin_email" placeholder="Email" required value="<?php echo set_value('admin_email'); ?>"><?php echo form_error('admin_email'); ?>
						</div>
						<div class="wrap-input100 validate-input" data-validate = "Enter username">
							<input class="input100" type="password" name="admin_email" placeholder="Password" required value="<?php echo set_value('admin_email'); ?>"><?php echo form_error('admin_email'); ?>
						</div>
						<div class="container-login100-form-btn">
							<button type="submit" name="tombol" value="SIMPAN" class="login100-form-btn">
								Register
							</button>
						</div>
					</form>
					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Login	
						</a>
					</div>

			</div>
		</div>
	</div>
	<?php
    if ($this->session->flashdata('pesan') == TRUE) {
        $pesan = $this->session->flashdata('pesan');
    ?>
        <script type="text/javascript">
            Swal.fire(
                'Berhasil!',
                '<?= $pesan ?>',
                'success'
            )
        </script>
    <?php
    }
    if ($this->session->flashdata('error') == TRUE) {
        $error = $this->session->flashdata('error');
    ?>
        <script type="text/javascript">
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= $error ?>'
            })
        </script>
    <?php
    }
    if ($this->session->flashdata('local') == TRUE) {
        $local = $this->session->flashdata('local');
    ?>
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
        <script type="text/javascript">
            Swal.fire(
                'PERINGATAN!!',
                '<?= $local ?>',
                'question'
            )
        </script>
    <?php } ?>

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>templateLogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>templateLogin/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>templateLogin/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url() ?>templateLogin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>templateLogin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>templateLogin/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url() ?>templateLogin/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>templateLogin/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>templateLogin/js/main.js"></script>

</body>
</html>
