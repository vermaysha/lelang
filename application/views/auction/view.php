<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<h2><?php echo $page_title ?></h2>
			</div>
			<hr>
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
							<?php foreach ($history as $hist) : ?>
								<p><strong><?php echo $hist->nama_lengkap ?></strong>: Rp. <?php echo number_format($hist->penawaran_harga, 2, ',', '.') ?></p>
							<?php endforeach; ?>
						</div>
					</div>

				</div>
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Bid Tertinggi
						</div>
						<div class="panel-body">
							<p><strong>Nama</strong>: <?php echo $max_bid->nama_lengkap; ?></p>
							<p><strong>Harga</strong>: <?php echo number_format($max_bid->penawaran_harga, 2, ',', '.'); ?></p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>
