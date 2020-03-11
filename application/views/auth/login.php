<body class="container no-gutters">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="text-center">
				<h2><?php echo $page_title ?></h2>
				<small>Please login to access this website</small>
			</div>
			<?php if ($success) : ?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></span></button>
					<strong>Success !</strong> <?php echo $success; ?>
				</div>
			<?php endif; ?>
			<?php foreach ($errors as $error) : ?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></span></button>
					<strong>Attention !</strong> <?php echo $error; ?>
				</div>
			<?php endforeach; ?>
			<form action="" method="post">
				<div class="form-group">
					<label for="username">Nama Pengguna</label>
					<input type="text" name="username" value="<?php echo set_value('username'); ?>" id="username" class="form-control" placeholder="Type your username">
				</div>
				<div class="form-group">
					<label for="password">Kata Sandi</label>
					<input type="password" name="password" id="password" class="form-control" placeholder="Type your password">
				</div>
				<div class="form-group">
					<button type="submit" name="login" class="btn btn-primary" value="true">Login</button>
				</div>
			</form>
		</div>
	</div>
</body>
