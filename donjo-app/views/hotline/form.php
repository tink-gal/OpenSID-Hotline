<div class="content-wrapper">
	<section class="content-header">
		<h1>Hotline Nomer Penting</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Pengaturan Hotline</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action?>" method="POST">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
            <div class="box-header with-border">
							<a href="<?= site_url().$this->controller?>" class="btn btn-social btn-flat btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Tambah Artikel">
								<i class="fa fa-arrow-circle-left "></i>Kembali Ke Daftar Hotline
            	</a>
						</div>
						<div class="box-body">
							<div class="col-md-5">
								<div>
									<label class="control-label" for="isi_teks_berjalan">Nama</label>
									<input class="form-control input-sm required" placeholder="Isi nama" name="nama" value="<?= $teks['nama']?>"></input>
								</div>
								<div>
									<label class="control-label">Nomer</label>
									<input class="form-control input-sm required" placeholder="Isikan Nomer HP atau nomer PSTN" name="nomer" value="<?= $teks['nomer']?>"></input>
								</div>
								
							</div>
							</div>
						</div>
						<div class='box-footer'>
							<div class='col-xs-5'>
								<button type='reset' class='btn btn-social btn-flat btn-danger btn-sm' ><i class='fa fa-times'></i> Batal</button>
								<button type='submit' class='btn btn-social btn-flat btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>

