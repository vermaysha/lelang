<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<h2><?php echo $page_title ?></h2>
			</div>
			<?php if ($success) : ?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></span></button>
					<strong>Success !</strong> <?php echo $success; ?>
				</div>
			<?php endif; ?>
			<?php if ($warning) : ?>
				<div class="alert alert-warning">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></span></button>
					<strong>warning !</strong> <?php echo $warning; ?>
				</div>
			<?php endif; ?>
			<?php if (is_level('administrator')) : ?>
				<a href="<?php echo base_url('auction/create') ?>" class="btn btn-primary">Tambahkan barang</a>
			<?php endif; ?>
			<div class="table-responsive">
				<table class="table table-hover table-bordered">
					<tr>
						<th>Nomor</th>
						<th>Nama</th>
						<th>Harga Awal</th>
						<th>Status</th>
						<th>Harga Akhir</th>
						<th>Pelelang</th>
						<th>Petugas</th>
						<th>Action</th>
					</tr>
					<?php $i = 1;
					foreach ($auctions as $auction) : ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $auction->nama_barang ?></td>
							<td>Rp. <?php echo number_format($auction->harga_awal, 3, ',', '.') ?></td>
							<td>
								<?php if ($auction->status == 'ditutup') : ?>
									<div class="label label-danger">Ditutup</div>
								<?php else : ?>
									<div class="label label-success">Dibuka</div>
								<?php endif; ?>
							</td>
							<td>
								<?php if ($auction->harga_akhir == null) : ?>
									-
								<?php else : ?>
									Rp. <?php echo number_format($auction->harga_akhir, 2, ',', '.') ?>
								<?php endif; ?>
							</td>
							<td><?php echo $auction->nama_lengkap ?></td>
							<td><?php echo $auction->nama_petugas ?></td>
							<td>
								<?php if (is_level('administrator')) : ?>
									<a href="<?php echo base_url('auction/edit/' . $auction->id_lelang) ?>" class="btn btn-sm btn-primary">Edit</a>
									<a href="<?php echo base_url('auction/delete/' . $auction->id_lelang) ?>" class="btn btn-sm btn-danger">Delete</a>
									<?php if ($auction->harga_akhir == null) : ?>
										<a href="<?php echo base_url('auction/finish/' . $auction->id_lelang) ?>" class="btn btn-sm btn-success">Finish</a>
									<?php else : ?>
										<a href="<?php echo base_url('auction/view/' . $auction->id_lelang) ?>" class="btn btn-sm btn-info">Lihat</a>
									<?php endif; ?>
								<?php elseif ($auction->harga_akhir == null) : ?>
									<a href="<?php echo base_url('auction/bid/' . $auction->id_lelang) ?>" class="btn btn-sm btn-warning">Bid</a>
								<?php endif; ?>
							</td>
						</tr>
					<?php $i++;
					endforeach; ?>
				</table>
			</div>
		</div>
	</div>

</div>
