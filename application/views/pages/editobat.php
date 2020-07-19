<div class="content-wrapper">
	<section class="content">
		<?php foreach ($obat as $mhs) { ?>

		<form action="<?php echo base_url().'igd/updateinventory'; ?>" method="post">
			
			<div class="form-group">
				<label>Nama Obat</label>
				<input type="hidden" name="id_inventory" class="form-control" value="<?php echo $mhs->id_inventory ?>">
				<input type="text" name="nama_inv" class="form-control" value="<?php echo $mhs->nama_inv ?>">
			</div>

			<div class="form-group">
				<label>Harga</label>
				<input type="number" name="harga_inv" class="form-control" value="<?php echo $mhs->harga_inv ?>">
			</div>
			


			<button type="reset" class="btn btn-danger">Reset</button>
			<button type="submit" class="btn btn-primary">Simpan</button>

		</form>
	<?php } ?>
	</section>
</div>