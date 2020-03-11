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
			<a href="<?php echo base_url('product/create') ?>" class="btn btn-primary">Tambahkan barang</a>
			<div class="table-responsive">
				<table class="table table-hover table-bordered">
					<tr>
						<th>Nomor</th>
						<th>Nama</th>
						<th>Harga Awal</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					<?php $i = 1;
					foreach ($products as $product) : ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $product->nama_barang; ?></td>
							<td>Rp. <?php echo number_format($product->harga_awal, 2, ',', '.'); ?></td>
							<th>
								<?php if ($product->status_barang):?>
									<div class="label label-danger">Terjual</div>
									<?php else:?>
										<div class="label label-success">Belum terjual</div>
								<?php endif;?>
							</th>
							<td>
								<a href="<?php echo base_url('product/edit/' . $product->id_barang) ?>" class="btn btn-sm btn-primary">Edit</a>
								<a href="<?php echo base_url('product/delete/' . $product->id_barang) ?>" class="btn btn-sm btn-danger">Delete</a>
							</td>
						</tr>
					<?php $i++;
					endforeach; ?>
				</table>
			</div>
		</div>
	</div>

</div>
