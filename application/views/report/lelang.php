<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Laporan <?php echo date('j-F-Y'); ?></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css">
</head>

<body>
	<h1 class="text-center">Laporan</h1>
	<h2 class="small text-center"><?php echo date('l, d F Y') ?></h2>

	<table class="table table-bordered table-collapsed">
		<tr>
			<th>Nomor</th>
			<th>Nama Barang</th>
			<th>Pemenang</th>
			<th>Harga Akhir</th>
		</tr>
		<?php $i=1; foreach($auction as $auct):?>
		<tr>
			<td><?php echo $i?></td>
			<td><?php echo $auct->nama_barang?></td>
			<td><?php echo $lelang_model->max_bid($auct->id_lelang)->nama_lengkap?></td>
			<td>Rp. <?php echo number_format($auct->harga_akhir, 2, ',', '.');?></td>
		</tr>
		<?php $i++; endforeach;?>
	</table>
</body>

</html>
