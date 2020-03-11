<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<h2><?php echo $page_title ?></h2>
			</div>
			<form action="" method="post">
				<div class="form-group">
					<div class="alert alert-info">
						<p>Konfirmasi untuk menyelesaikan lelang dari barang <strong><?php echo $product->nama_barang ?></strong></p>
					</div>
					<button type="submit" name="finish" value="true" class="btn btn-info">Ya</button>
					<a href="<?php echo base_url('auction') ?>" class="btn btn-danger">Tidak</a>
				</div>
			</form>
		</div>
	</div>

</div>
