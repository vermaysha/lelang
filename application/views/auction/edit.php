<?php
$tgl_lelang = substr($auction->tgl_lelang, 0, 10);
$jam_lelang = substr($auction->tgl_lelang, 11);
?>
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
					<label for="product">Barang</label>
					<select name="product" id="product" class="form-control">
						<option value="">--- Pilih Barang ---</option>
						<?php foreach ($products as $product) : ?>
							<option value="<?php echo $product->id_barang ?>" <?php echo ($auction->id_barang == $product->id_barang) ? 'selected=""' : null ?>><?php echo $product->nama_barang ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="tgl_lelang">Tanggal lelang</label>
					<input type="date" name="tgl_lelang" id="tgl_lelang" value="<?php echo $tgl_lelang ?>" class="form-control" placeholder="Enter .." />
				</div>
				<div class="form-group">
					<label for="jam_lelang">Jam lelang</label>
					<input type="time" name="jam_lelang" id="jam_lelang" value="<?php echo $jam_lelang ?>" class="form-control" placeholder="Enter .. " />
				</div>
				<div class="form-group">
					<label for="user">Pelelang</label>
					<select name="user" id="user" class="form-control">
						<option value="">--- Pilih Pelelang ---</option>
						<?php foreach ($users as $user) : ?>
							<option value="<?php echo $user->id_user ?>" <?php echo ($auction->id_user == $user->id_user) ? 'selected=""' : null ?>><?php echo $user->nama_lengkap ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="petugas">Petugas</label>
					<select name="petugas" id="petugas" class="form-control">
						<option value="">--- Pilih Petugas ---</option>
						<?php foreach ($staffs as $staff) : ?>
							<option value="<?php echo $staff->id_petugas ?>" <?php echo ($auction->id_petugas == $staff->id_petugas) ? 'selected=""' : null ?>><?php echo $staff->nama_petugas ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="status">Status</label>
					<label class="radio-inline">
						<input type="radio" name="status" value="dibuka" <?php echo ($auction->status == 'dibuka')  ? 'checked=""' : null?>> Dibuka
					</label>
					<label class="radio-inline">
						<input type="radio" name="status" value="ditutup" <?php echo ($auction->status == 'ditutup') ? 'checked=""' : null ?>> Ditutup
					</label>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary" name="save" value="true">Simpan</button>
				</div>
			</form>
		</div>
	</div>

</div>
