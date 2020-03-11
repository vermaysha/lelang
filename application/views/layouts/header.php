<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $page_title ?> | <?php echo $page_name; ?></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css">
	<script src="<?php echo base_url('assets/js/jquery-3.4.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo base_url() ?>"><?php echo $page_name; ?></a>
			</div>

			<ul class="navbar-nav nav">
				<li><a href="<?php echo base_url('auction') ?>">Lelang</a></li>
				<?php if (is_level('administrator')):?>
				<li><a href="<?php echo base_url('product') ?>">Barang</a></li>
				<?php endif;?>
				<!-- <li><a href="<?php echo base_url('members') ?>">Anggota</a></li> -->
				<!-- <li><a href="">Pemenang Lelang</a></li>
					<li><a href="">Lelang Dimenangkan</a></li> -->
			</ul>
			<ul class="navbar-nav nav navbar-right">
				<li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
			</ul>
		</div>
	</nav>
