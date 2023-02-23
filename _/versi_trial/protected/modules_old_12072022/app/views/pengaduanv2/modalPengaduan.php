<?php $key_pengaduan = $data['pengaduan']; 
Yii::import('ext.LokalIndonesia');
?>

<div style="margin:20px">
	<div class="inbox-checkbox-triggered">
		<div class="btn-group">
			<a data-dismiss="modal" rel="tooltip" title="" data-placement="bottom" data-original-title="Kembali" class="btn btn-default"><strong><i class="fa fa-chevron-circle-left fa-lg"></i></strong></a>
			<!-- <a rel="tooltip" title="" data-placement="bottom" data-original-title="Verifikasi Laporan" class="btn btn-default" data-toggle="modal" data-target="#verifikasi"><strong><i class="fa fa-check-square-o fa-lg"></i> Verifikasi</strong></a> -->
			<a rel="tooltip" title="" data-placement="bottom" data-original-title="Tanggapi Langsung" class="btn btn-default" data-toggle="modal" onclick="tanggapiLangsung(<?php echo $key_pengaduan['tblpengaduan_id']; ?>)"><strong><i class="fa fa-inbox fa-lg"></i> Tanggapi</strong></a>
			<!-- <a rel="tooltip" title="" data-placement="bottom" data-original-title="Disposisi" class="deletebutton btn btn-default" data-toggle="modal" data-target="#deposisi"><strong><i class="fa fa-arrow-circle-o-right fa-lg"></i> Disposisi</strong></a> -->
			<a rel="tooltip" title="" data-placement="bottom" data-original-title="Komentar Langsung" class="btn btn-default" data-toggle="modal" onclick="komentarLangsung(<?php echo $key_pengaduan['tblpengaduan_id']; ?>)"><strong><i class="fa fa-pencil fa-lg"></i> Komentar</strong></a>
		</div>
	</div>
</div>

<div style="margin:20px" class="well well-sm">
	<div class="infopengaduan">
		Nama:<br> <?php echo $key_pengaduan['tblpengaduan_nama']; ?><br><br>
		Nomor HP:<br> <?php echo $key_pengaduan['tblpengaduan_notelp']; ?><br><br>
		Tanggal:<br> <?php echo LokalIndonesia::TanggalUmum($key_pengaduan['tblpengaduan_tanggal']); ?><br><br>
		Kategori/Topik:<br> <?php echo $key_pengaduan['tblpengaduan_jenis']; ?><br><br>
	</div>
	<h1><?php echo $key_pengaduan['tblpengaduan_jenis']; ?></h1>
	<h3><?php echo $key_pengaduan['tblpengaduan_komentar']; ?></h3>
	<hr>
	Ditampilkan : 
	<section class="smart-form col col-md4">
		<div class="inline-group">
			<label class="radio">
				<?php $check = $key_pengaduan['tblpengaduan_status'];
					if ($check=="F") {
					 	$cek1 = "checked";
					 	$cek2 = "";
					 } else {
					 	$cek1 = "";
					 	$cek2 = "checked";
					 }
				?>
				<input onclick="simpanStatus('F')" type="radio" name="is_ditampilkan" value="F" <?php echo $cek1; ?>>
				<i></i>Tidak</label>
				<label class="radio">
					<input onclick="simpanStatus('T')" type="radio" name="is_ditampilkan" value="T" <?php echo $cek2; ?>>
					<i></i>Ya</label>
				</div>
			</section>
		</div>

		<div class="row">
			<article class="col-sm-12 col-md-12 col-lg-12">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget well" id="wid-id-3" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
<!-- widget options:
usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

data-widget-colorbutton="false"
data-widget-editbutton="false"
data-widget-togglebutton="false"
data-widget-deletebutton="false"
data-widget-fullscreenbutton="false"
data-widget-custombutton="false"
data-widget-collapsed="true"
data-widget-sortable="false"

-->
<!-- widget div-->
<div>

	<!-- widget edit box -->
	<div class="jarviswidget-editbox">
		<!-- This area used as dropdown edit box -->

	</div>
	<!-- end widget edit box -->

	<!-- widget content -->
	<div class="widget-body">

		<ul id="myTab1" class="nav nav-tabs bordered">
			<li class="active">
				<a href="#s1" data-toggle="tab">Tindak Lanjut</a>
			</li>
			<li>
				<a href="#s2" data-toggle="tab"> Komentar</a>
			</li>
		</ul>

		<div id="myTabContent1" class="tab-content padding-10">


			<div class="tab-pane active fade in" id="s1">
			<!-- <div class="row" style="padding: 45px;margin-top: -30px;">
				<a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tindak_lanjut">Tambah Komentar</a>
			</div> -->
			<div class="chat-body no-padding profile-message">
				<ul>
					<?php foreach ($data['tindaklanjut'] as $key_tindaklanjut): ?>
						<li class="message" style="background-color: #F7F7F7;padding: 8px;">
							<img style="width: 60px;" src="/themes/smartadmin/img/administrator.png" class="online">
							<span class="message-text" style="margin-bottom: 13px;"> <a href="javascript:void(0);" class="username">Superadmin</a>
								<?php echo $key_tindaklanjut['tbltindaklanjut_isi'] ?>
								<p>
									pada <?php echo LokalIndonesia::TanggalUmum($key_tindaklanjut['tbltindaklanjut_tanggal']) ?>
								</p>
								<p>
									<a style="cursor: default" onclick="hapusTindaklanjut(<?php echo $key_tindaklanjut['tbltindaklanjut_id'] ?>)">Hapus Tanggapan
									</a>
								</p>
							</span>
						</li>
					<?php endforeach ?>

				</ul>
			</div>
		</div>

		<div class="tab-pane fade" id="s2">
			<!-- <div class="row" style="padding: 45px;margin-top: -30px;">
				<a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tindak_lanjut">Tambah Komentar</a>
			</div> -->
			<div class="chat-body no-padding profile-message">
				<ul>
					<?php foreach ($data['komentar'] as $key_komentar): ?>
						<?php if ($key_komentar['tblkomentar_nama']=="Superadmin"): ?>
							<?php $image = "administrator.png"; ?>
						<?php else: ?>
							<?php $image = "user.png"; ?>
						<?php endif ?>
						<li class="message" style="background-color: #F7F7F7;padding: 8px;">
							<img style="width:60px" src="/themes/smartadmin/img/<?php echo $image; ?>" class="online">
							<span class="message-text" style="margin-bottom: 13px;">
								<a href="javascript:void(0);" class="username"><?php echo $key_komentar['tblkomentar_nama'] ?>
								</a>
								<?php echo $key_komentar['tblkomentar_isi'] ?>
								<p>
									<?php echo LokalIndonesia::TanggalUmum($key_komentar['tblkomentar_tanggal']) ?>
								</p>
								<p>
									<a style="cursor: default" onclick="hapusKomentar(<?php echo $key_komentar['tblkomentar_id'] ?>)">Hapus Komentar
									</a>

								</p>
							</span>
							<div class="row" style="margin-left: 0px;">
								<section class="col col-md1">Ditampilkan</section>
								<section class="smart-form col col-md4">
									<div class="inline-group">
										<label class="radio">
											<?php $check = $key_komentar['tblkomentar_isaktif'];
												if ($check=="F") {
												 	$cek1 = "checked";
												 	$cek2 = "";
												 } else {
												 	$cek1 = "";
												 	$cek2 = "checked";
												 }
											?>
										<input onclick="simpanStatusKomentar('F', <?php echo $key_komentar['tblkomentar_id'] ?>)" type="radio" name="komentar_ditampilkan_<?php echo $key_komentar['tblkomentar_id'] ?>" value="F" <?php echo $cek1; ?>>
										<i></i>Tidak</label>
										<label class="radio">
											<input onclick="simpanStatusKomentar('T', <?php echo $key_komentar['tblkomentar_id'] ?>)" type="radio" name="komentar_ditampilkan_<?php echo $key_komentar['tblkomentar_id'] ?>" value="T" <?php echo $cek2; ?>>
										<i></i>Ya</label>
									</div>
								</section>
							</div>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>

</div>