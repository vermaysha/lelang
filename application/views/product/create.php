<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<h2><?php echo $page_title ?></h2>
			</div>
			<?php foreach ($errors as $error) : ?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></span></button>
					<strong>Attention !</strong> <?php echo $error; ?>
				</div>
			<?php endforeach; ?>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Nama barang</label>
					<input type="text" name="name" id="name" value="<?php echo set_value('name') ?>" class="form-control" placeholder="Enter the product name" />
				</div>
				<div class="form-group">
					<label for="desc">Deskripsi barang</label>
					<textarea name="desc" id="desc" rows="10" class="form-control"><?php echo set_value('desc') ?></textarea>
				</div>
				<div class="form-group">
					<label for="price">Harga barang</label>
					<input type="text" name="price" id="price" value="<?php echo set_value('price') ?>" class="form-control" placeholder="Enter the product price" />
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary" name="save" value="true">Simpan</button>
				</div>
			</form>
		</div>
	</div>

</div>
