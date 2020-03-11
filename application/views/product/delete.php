<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<h2><?php echo $page_title ?></h2>
			</div>
			<form action="" method="post">
				<div class="form-group">
					<div class="alert alert-danger">
						<p>Konfirmasi untuk menghapus <strong><?php echo $product->nama_barang?></strong></p>
					</div>
					<button type="submit" name="delete" value="true" class="btn btn-danger">Ya</button>
					<a href="<?php echo base_url('product')?>" class="btn btn-primary">Tidak</a>
				</div>
			</form>
		</div>
	</div>

</div>
