<section class="content-header">
	<h1>Data Member</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="box box-primary box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Data Member</h3>
					<div class="box-tools pull-right">
						<!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"title="Collapse"><i class="fa fa-minus"></i></button> -->
					</div>
				</div>
				
				<div class="box-body">
					<form class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-4 control-label" for="nama_member">Nama Member</label>
							<div class="col-md-4">
								<input id="nama_member" name="nama_member" type="text" placeholder="Nama Member" class="form-control input-md" value="<?=set_value('nama_member')?>" required="">
								<span class="help-block text-red"><?=form_error('nama_member')?></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="notelp_member">No Telepon</label>
							<div class="col-md-4">
								<input id="notelp_member" name="notelp_member" type="text" placeholder="No Telepon" class="form-control input-md" value="<?=set_value('notelp_member')?>">
								<span class="help-block text-red"><?=form_error('notelp_member')?></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="alamat_member">Alamat</label>
							<div class="col-md-4">
								<textarea class="form-control" id="alamat_member" name="alamat_member"><?=set_value('alamat_member')?></textarea>
								<span class="help-block text-red"><?=form_error('alamat_member')?></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="save_btn"></label>
							<div class="col-md-8">
								<button id="save_btn" name="save_btn" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
								<a href="<?=base_url()?>member/view" id="cancel_btn" name="cancel_btn" class="btn btn-danger"><i class="fa fa-ban"></i> Cancel</a>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</section>