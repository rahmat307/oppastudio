<section class="content-header">
	<h1>Data Product</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="box box-primary box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Data Product</h3>
					<div class="box-tools pull-right">
						<!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"title="Collapse"><i class="fa fa-minus"></i></button> -->
					</div>
				</div>
				
				<div class="box-body">
					<form class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-4 control-label" for="kode_item">Kode Item</label>
							<div class="col-md-4">
								<input id="kode_item" name="kode_item" type="text" placeholder="Kode Item" class="form-control input-md" value="<?=strtoupper(random_string('alnum', 8))?>" required="" readonly>
								<span class="help-block text-red"><?=form_error('kode_item')?></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="nama_item">Nama Item</label>
							<div class="col-md-4">
								<input id="nama_item" name="nama_item" type="text" placeholder="Nama Item" class="form-control input-md" value="<?=set_value('nama_item')?>">
								<span class="help-block text-red"><?=form_error('nama_item')?></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="harga_item">Harga Item</label>
							<div class="col-md-4">
								<input id="harga_item" name="harga_item" type="text" placeholder="Harga Item" class="form-control input-md" value="<?=set_value('harga_item')?>">
								<span class="help-block text-red"><?=form_error('harga_item')?></span>
							</div>
						</div>


						<div class="form-group">
							<label class="col-md-4 control-label" for="kapasitas">Kapasitas</label>
							<div class="col-md-4">
								<select id="kapasitas" name="kapasitas" class="form-control">
									<option value="0">Bebas</option>
									<?php for ($i=1; $i <= 20; $i++) { 
										echo '<option value="'.$i.'">'.$i.' Orang</option>';
									} ?>
								</select>
								<span class="help-block text-red"><?=form_error('kapasitas')?></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="keterangan">Keterangan</label>
							<div class="col-md-4">
								<textarea class="form-control" id="keterangan" name="keterangan"><?=set_value('keterangan')?></textarea>
								<span class="help-block text-red"><?=form_error('keterangan')?></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="save_btn"></label>
							<div class="col-md-8">
								<button id="save_btn" name="save_btn" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
								<a href="<?=base_url()?>product/view" id="cancel_btn" name="cancel_btn" class="btn btn-danger"><i class="fa fa-ban"></i> Batal</a>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</section>