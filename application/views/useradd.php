<section class="content-header">
	<h1>Data Admin</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="box box-primary box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Data Admin</h3>
					<div class="box-tools pull-right">
						<!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"title="Collapse"><i class="fa fa-minus"></i></button> -->
					</div>
				</div>
				
				<div class="box-body">
					<form class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-4 control-label" for="username">Username</label>
							<div class="col-md-4">
								<input id="username" name="username" type="text" placeholder="Username" class="form-control input-md" value="<?=set_value('username')?>" required="">
								<span class="help-block text-red"><?=form_error('username')?></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="nama_user">Nama Admin</label>
							<div class="col-md-4">
								<input id="nama_user" name="nama_user" type="text" placeholder="Nama Admin" class="form-control input-md" value="<?=set_value('nama_user')?>" required="">
								<span class="help-block text-red"><?=form_error('nama_user')?></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="password">Password</label>
							<div class="col-md-4">
								<input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" value="<?=set_value('password')?>" required="">
								<span class="help-block text-red"><?=form_error('password')?></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="repassword">Ulangi Password</label>
							<div class="col-md-4">
								<input id="repassword" name="repassword" type="password" placeholder="Ulangi Password" class="form-control input-md" value="<?=set_value('repassword')?>" required="">
								<span class="help-block text-red"><?=form_error('repassword')?></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="save_btn"></label>
							<div class="col-md-8">
								<button id="save_btn" name="save_btn" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
								<a href="<?=base_url()?>admin/view" id="cancel_btn" name="cancel_btn" class="btn btn-danger"><i class="fa fa-ban"></i> Batal</a>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</section>