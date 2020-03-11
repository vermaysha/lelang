<body>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="text-center">
				<h2><?php echo $page_title ?></h2>
				<small>Please register to access this website</small>
			</div>
			<?php foreach ($errors as $error) : ?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></span></button>
					<strong>Attention !</strong> <?php echo $error; ?>
				</div>
			<?php endforeach; ?>
			<form action="" method="post">
				<div class="form-group">
					<label for="fullname">Nama Lengkap</label>
					<input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo set_value('fullname');?>" placeholder="Type your fullname">
				</div>
				<div class="form-group">
					<label for="username">Nama Pengguna</label>
					<input type="text" name="username" id="username" class="form-control" value="<?php echo set_value('username');?>" placeholder="Type your username">
				</div>
				<div class="form-group">
					<label for="password">Kata Sandi</label>
					<input type="password" name="password" id="password" class="form-control" placeholder="Type your password">
				</div>
				<div class="form-group">
					<label for="repassword">Konfirmasi Kata Sandi</label>
					<input type="password" name="repassword" id="repassword" class="form-control" placeholder="Retype your password">
				</div>
				<div class="form-group">
					<button type="submit" name="register" value="true" class="btn btn-primary">Register Sekarang</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</div>
			</form>
		</div>
	</div>
</body>
