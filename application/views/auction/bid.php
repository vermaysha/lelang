<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<h2><?php echo $page_title ?></h2>
			</div>
			<hr>
			<?php foreach ($errors as $error) : ?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></span></button>
					<strong>Attention !</strong> <?php echo $error; ?>
				</div>
			<?php endforeach; ?>
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Detail Barang
						</div>
						<div class="panel-body">
							<p><strong>Pemilik Barang: </strong> <?php echo $product->nama_lengkap; ?></p>
							<p><strong>Nama Barang: </strong> <?php echo $product->nama_barang; ?></p>
							<p><strong>Harga Awal: </strong> Rp. <?php echo number_format($product->harga_awal, 2, ',', '.'); ?></p>
							<p><strong>Deskripsi Barang: </strong> <br> <?php echo $product->deskripsi_barang; ?></p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							History Bid
						</div>
						<div class="panel-body">
							<form action="" method="post">
								<div class="input-group">
									<span class="input-group-addon">Harga: </span>
									<input type="number" name="price" id="price" min="<?php echo $product->harga_awal ?>" class="form-control">
									<span class="input-group-btn">
										<button class="btn btn-success" name="bid" value="true">BID !</button>
									</span>
								</div>
							</form>
							<hr>
							<?php if (empty($history)) : ?>
								<div class="alert alert-info">
									<p>Belum ada yang melakukan bid, kenapa tidak menjadi yang pertama ?</p>
								</div>
							<?php else : ?>
								<?php foreach ($history as $hist) : ?>
									<p><strong><?php echo $hist->nama_lengkap ?></strong>: Rp. <?php echo number_format($hist->penawaran_harga, 2, ',', '.') ?></p>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>

				</div>
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Bid Tertinggi
						</div>
						<div class="panel-body">
							<?php if (empty($max_bid)) : ?>
								<div class="alert alert-info">
									<p>Belum ada yang melakukan bid, kenapa tidak menjadi yang pertama ?</p>
								</div>
							<?php else : ?>
								<p><strong>Nama</strong>: <?php echo $max_bid->nama_lengkap; ?></p>
								<p><strong>Harga</strong>: <?php echo number_format($max_bid->penawaran_harga, 2, ',', '.'); ?></p>
							<?php endif; ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>
