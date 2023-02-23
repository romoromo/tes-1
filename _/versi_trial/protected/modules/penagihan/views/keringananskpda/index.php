<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Telaah Keringanan SKPDA</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-teguran" 
			data-widget-editbutton="false"
			data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-colorbutton="false"	
			data-widget-togglebutton="false"
			data-widget-sortable="false"			
			>
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
			<header>
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>Pilih Data Sumber</h2>

			</header>

			<!-- widget div-->
			<div>

				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->

				</div>
				<!-- end widget edit box -->

				<!-- widget content -->
				<div class="widget-body no-padding">

					<form action="" id="form_sumber_pajak" class="smart-form" novalidate>
						<fieldset>
							<div class="row">
										<section class="col col-md-2">
											<p>Nomor Pokok</p>
										</section>
										<!-- <section class="col col-md-5">
											<label class="input">
												<input class="form-control" type="text" id="TBLDAFTAR_NOPOK" name="param[TBLDAFTAR_NOPOK]" autocomplete="off" onekeyup="validAngka(this)">
											</label>
										</section> -->
										 <section class="col col-8"><!-- 
						                      <label>Cari Nomor Pendafataran/ Pemohon Izin</label> -->
						                      <label class="input"> <i class="icon-append fa fa-building "></i>
						                        <input type="text" id="pemohon" name="pemohon">
						                      </label>
					                    </section><!-- 
										<section class="col col-md-1">
											<p>Nomor Surat</p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control" type="text" id="no_surat" name="param[no_surat]" autocomplete="off">
											</label>
										</section>		 -->			
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>Jenis Pajak</p>
										</section>
										<section class="col col-md-8">
											<label class="select">
												<select class="select2" id="TBLREKENING_KODE" name="param[TBLREKENING_KODE]">
													<option value="">-- Pilih Rekening --</option>
													<?php //foreach ($data['rek'] as $list): ?>
														<option value="">[4.1.1.1.0] PAJAK HOTEL</option>
														<option value="">[4.1.1.2.0] PAJAK RESTORAN</option>
														<option value="">[4.1.1.3.0] PAJAK HIBURAN</option>
														<option value="">[4.1.1.7.0] PAJAK PARKIR</option>
														<option value="">[4.1.1.8.0] PAJAK AIR TANAH</option>
													<?php //endforeach ?>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>Jenis Ketetapan</p>
										</section>
										<section class="col col-md-8">
											<label class="select">
												<select class="select2" id="jenis_penyetoran" name="jenis_penyetoran" disabled="disabled">
													<option value="" >SKPD-A</option>
												</select>
											</label>
										</section>								

									</div>
									<div class="row">
									<section class="col col-md-2">
											<p>Tahun Pajak</p>
										</section>
										<section class="col col-md-3">
											<label class="select">
												<label class="input">
													<input type="number" value="<?php echo date('Y') ?>" id="TBLPENDATAAN_THNPAJAK" name="param[TBLPENDATAAN_THNPAJAK]">
												</label>
											</label>
										</section>
										<section class="col col-md-1">
    										S/D
    									</section>
										<section class="col col-md-3">
											<label class="select">
												<label class="input">
													<input type="number" value="" name="">
												</label>
											</label>
										</section>
										
									</div>
									<div class="row">
										<section class="col col-md-2">
											Tanggal Terima Berkas
										</section>
										<section class="col col-md-3">
											<label class="input"><i class="icon-append fa fa-calendar"></i>
												<input type="text" id="tglawal" name="param[tglawal]" class="datepicker" data-dateformat="dd-mm-yy" >
											</label>
										</section>
										<section class="col col-md-1">
											S / D
										</section>
										<section class="col col-md-3">
											<label class="input"><i class="icon-append fa fa-calendar"></i>
												<input type="text" id="tglakhir" name="tglakhir" class="datepicker" data-dateformat="dd-mm-yy">
											</label>
										</section>
									</div>
								
							</fieldset>		
							<footer>
								<!-- <button type="button" onclick="cetakWord()" class="btn btn-sm btn-primary" style="float: left;">
									<i class="fa fa-print"></i>&nbsp;Cetak Word
								</button>
								<button type="button" onclick="cetak()" class="btn btn-sm btn-success" style="float: left;">
									<i class="fa fa-print"></i>&nbsp;Cetak Excel
								</button> -->
								<button type="button" class="btn btn-sm btn-primary" onclick="cari()" style="float: left;">
									<i class="fa  fa-search"></i>&nbsp;Cari
								</button>
							</footer>				
						</form>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>
		<!-- WIDGET END -->
	</div>
	<!-- end row -->
</div>
<!-- end row -->

<div class="row">
	<!-- NEW WIDGET START -->
	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-color-orange" id="wid-id-data_sauus" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
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
			<header>
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>&nbsp;Data</h2>

			</header>

			<!-- widget div-->
			<div>

				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->

				</div>
				<!-- end widget edit box -->

				<!-- widget content -->
				<div class="widget-body no-padding">

					<div id="tabel" class="" style="display: none;">

						<div class="widget-body-toolbar">
							<a href="uploads/downloads/Format_beritaacara.docx" type="button" onclick="cetakberita()" class="btn btn-sm btn-primary" style="float: left;     margin-right: 5px;">
							<i class="fa fa-print"></i>&nbsp;Cetak Berita Acara
							</a>
							<a href="uploads/downloads/Format_sk_walikota.docx" type="button" onclick="cetakwawali()" class="btn btn-sm btn-success" style="float: left;    margin-right: 5px;">
								<i class="fa fa-print"></i>&nbsp;Cetak Surat Wawali
							</a>
							<a href="uploads/downloads/Format_sk_Keringanan.docx" type="button" class="btn btn-sm btn-warning" style="float: left;  margin-right: 5px;">
								<i class="fa fa-print"></i>&nbsp;Cetak SK Keringanan
							</a>
							<a href="uploads/downloads/kartu_kendali.xlsx" type="button" onclick="cetakkendali()" class="btn btn-sm btn-default" style="float: left;     margin-right: 5px;">
							<i class="fa fa-print"></i>&nbsp;Cetak Buku Kendali
							</a>
						</div>
						
						<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
							<thead>
						<!-- <header>
							<span class="widget-icon"> <i class="fa fa-table"></i> </span>
							<h2>&nbsp;Data</h2>
						</header> -->
						<tr>
							
							<th data-hide="phone"><div class="center"> No</div></th>
							<th data-class="expand"><div class="center"> NPWPD</div></th>
							<th data-hide="phone,tablet"><div class="center"> Jenis Pajak</div></th>
							<th data-hide="phone,tablet"><div class="center"> Jenis Ketetapan</div></th>
							<th data-hide="desktop,phone,tablet"><div class="left"> Masa Pajak</div></th>
							<th data-hide="phone,tablet"><div class="center"> Besar Pengurangan</div></th>
							<th data-hide="phone,tablet"><div class="center"> Alasan Mengajukan Pengurangan</div></th>
							<th data-hide="desktop,phone,tablet"><div class="left"> Nama Penerima Berkas</div></th>
							<th data-hide="desktop,phone,tablet"><div class="left"> Tanggal Terima Berkas</div></th>
							<th data-hide="phone,tablet"><div class="center"> Action</div></th>
						</thead>
						<tbody>
							<tr>

								<td>1</td>
								<td>3.0000036.05.16 </td>
								<td>Pajak Hotel </td>
								<td>SKPD-A</td>
								<td>2020</td>
								<td>75%</td>
								<td>Karena Sepi</td>
								<td>Elsi Narulita Ikawati, SE</td>
								<td>11/08/2021</td>
								<td><a type="button" onclick="edit()" data-toggle="modal" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i>&nbsp;
							      Edit </a>
                                <button  onclick="hapus()" type='button' class='btn btn-success btn-sm' > <i class="fa fa-check"></i>&nbsp;
                                  Verifikasi </button>
                                  <button  onclick="upload()" type='button' class='btn btn-warning btn-sm' > <i class="fa fa-upload"></i>&nbsp;
                                  Upload Berkas </button>
                              </td>
								
								
							</tr>
						</tbody>
					</table>


					</div>

				</div>
				<!-- end widget content -->

			</div>
			<!-- end widget div -->

		</div>
		<!-- end widget -->

	</article>
	<!-- WIDGET END -->

</div>



</section>



<!--Modal Salin-->
<div class="modal fade" id="salin_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Proses Salin
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form class="smart-form" id="form-pemohon">
					<fieldset>
						<div class="row">
							<section class="col col-md-3">
								<p>Tahun Penetapan </p>
							</section>
							<section class="col col-md-6">
								<label class="input">
									<input value="" type="text" name="tahun" id="tahun">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-3">
								<p>Bulan Penetapan </p>
							</section>
							<section class="col col-md-6">
								<label class="select">
									<select name="jenis_penerimaan">
										<option selected="" disabled="">== Silahkan Pilih ==</option>
										<option>Januari</option>
										<option>Februari</option>
										<option>Maret</option>
										<option>April</option>
										<option>Mei</option>
										<option>Juni</option>
										<option>Juli</option>
										<option>Agustus</option>
										<option>September</option>
										<option>Oktober</option>
										<option>November</option>
										<option>Desember</option>
									</select> <i></i> 
								</label>
							</section>
						</div>
					</fieldset>	

					<footer>
						<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="simpan()">
							Salin
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
					</footer>
				</form>							


			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade" id="modalformberkas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">Form Upload Berkas <b id="ketsurat"></b></h4>
			</div>
			<form method="post" enctype="multipart/form-data" class="smart-form" action="berkas/verifikasi_izin2/SimpanFile" id="form-upload-temp">
				<fieldset>
					<div class="row">
						<section class="col col-3">
							<label > 
								No Berita Acara										
							</label>
						</section>
						<section class="col col-8">
							<label class="input"> <i class="icon-append fa fa-square"></i>
								<input value="" type="number" name="besar" id="acara">
							</label>
						</section>
					</div>

					<div class="row">
						<section class="col col-3">
							<label > 
								Upload File Berita Acara										
							</label>
						</section>
						<section class="col col-8">
							<label for="file" class="input input-file">
								<div class="button">
								<input type="file" id="upload_file" name="upload_file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input id="namafileimages" type="text" >
								<input type="hidden" name="namafileimage" id="namafileimage" value="">
							</label>
						</section>
					</div>

						<section>
						<div class="progress progress-md progress-striped active" id="progress">
							<div class="progress-bar bg-color-blue"  id="bar"  role="progressbar" style="width: auto;"></div>
						</div>
					</section>

					<section>
						<button type="submit" id="submit-file" style="display: none;" class="btn btn-block bg-color-blue btn-success">
							<i class="fa fa-upload"></i> Upload File</button>
						</section>

					<div class="row">
						<section class="col col-3">
							<label > 
								No Surat Wawali									
							</label>
						</section>
						<section class="col col-8">
							<label class="input"> <i class="icon-append fa fa-square"></i>
								<input value="" type="number" name="besar" id="wawali">
							</label>
						</section>
					</div>

					<div class="row">
						<section class="col col-3">
							<label > 
								Upload File Surat Wawali										
							</label>
						</section>
						<section class="col col-8">
							<label for="file" class="input input-file">
								<div class="button">
								<input type="file" id="upload_file" name="upload_file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input id="namafileimages" type="text" >
								<input type="hidden" name="namafileimage" id="namafileimage" value="">
							</label>
						</section>
					</div>

						<section>
						<div class="progress progress-md progress-striped active" id="progress">
							<div class="progress-bar bg-color-blue"  id="bar"  role="progressbar" style="width: auto;"></div>
						</div>
					</section>

					<section>
						<button type="submit" id="submit-file" style="display: none;" class="btn btn-block bg-color-blue btn-success">
							<i class="fa fa-upload"></i> Upload File</button>
						</section>

					<div class="row">
						<section class="col col-3">
							<label > 
								No SK Keringanan									
							</label>
						</section>
						<section class="col col-8">
							<label class="input"> <i class="icon-append fa fa-square"></i>
								<input value="" type="number" name="besar" id="wawali">
							</label>
						</section>
					</div>

					<div class="row">
						<section class="col col-3">
							<label > 
								Upload File SK Keringanan										
							</label>
						</section>
						<section class="col col-8">
							<label for="file" class="input input-file">
								<div class="button">
								<input type="file" id="upload_file" name="upload_file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input id="namafileimages" type="text" >
								<input type="hidden" name="namafileimage" id="namafileimage" value="">
							</label>
						</section>
					</div>

						<section>
						<div class="progress progress-md progress-striped active" id="progress">
							<div class="progress-bar bg-color-blue"  id="bar"  role="progressbar" style="width: auto;"></div>
						</div>
					</section>

					<section>
						<button type="submit" id="submit-file" style="display: none;" class="btn btn-block bg-color-blue btn-success">
							<i class="fa fa-upload"></i> Upload File</button>
						</section>

				</fieldset>	
			</form>	
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Batal
				</button>
				<button type="button" onclick="simpanfile()" class="btn btn-primary" id="eg7" >
					Simpan
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Keringanan SKPDA
				</h4>
			</div>

			<div class="modal-body no-padding">
				<form id="form-data" class="smart-form">

					<fieldset>

						<section>
							<div class="row">
								<label class="label col col-4">NPWPD</label>
								<!-- <div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-square"></i>
										<input value="" type="text" name="param[tblpejabat_nama]" id="tblpejabat_nama">
									</label>

								</div> -->
								<section class="col col-10"><!-- 
				                      <label>Cari Nomor Pendafataran/ Pemohon Izin</label> -->
				                      <label class="input"> <i class="icon-append fa fa-building "></i>
				                        <input type="text" id="pemohon" name="pemohon">
				                      </label>
			                    </section>
							</div>
						</section>

						

						<section>
							<div class="row">
								<label class="label col col-4"> Nama Wajib Pajak</label>
								<div class="col col-10">
									<label class="select">
											<label class="input">
												<input type="text" value="" class="form-control" id="" name="">
											</label>
										</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> Alamat Wajib Pajak</label>
								<div class="col col-10">
									<label class="textarea"> 					
													
											<textarea rows="3" name="info" id="lokasi"></textarea> 
										</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> Nama Usaha/Instansi</label>
								<div class="col col-10">
									<label class="input"> 					
											<input type="text" value="" class="form-control" id="" name="">
										</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> No Telp/Hp</label>
								<div class="col col-10">
									<label class="input"> 					
											<input type="number" value="" class="form-control" id="" name="">
										</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> Nama Jabatan Pemohon</label>
								<div class="col col-10">
									<label class="input"> 					
											<input type="number" value="" class="form-control" id="" name="">
										</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Jenis Pajak</label>
								<div class="col col-10">
									<label class="input">
										<select style="width:100%" class="select2" id="pajak" name="pajak" >
											<option value="">== Pilih Jenis Pajak ==</option>
											<option value="">[4.1.1.1.0] PAJAK HOTEL  </option>
											<option value="">[4.1.1.2.0] PAJAK RESTORAN  </option>
											<option value="">[4.1.1.3.0] PAJAK HIBURAN </option>
											<option value="">[4.1.1.7.0] PAJAK PARKIR</option>
											<option value="">[4.1.1.8.0] PAJAK AIR TANAH </option>
										</select>
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Jenis Ketetapan</label>
								<div class="col col-10">
									<label class="input">
										<select style="width:100%" class="select2" id="ketetapan" name="ketetapan" >
											<option value="">== Pilih Jenis Ketetapan ==</option>
										<option value="">SPTPD</option>
										<option value="">STPD</option>
										<option value="">SKPDKB</option>
										<option value="">SKPD-A</option>
										</select>
									</label>
								</div>
							</div>
						</section>


						<section>
							<div class="row">
								<label class="label col col-4">No Ketetapan</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-square"></i>
										<input value="" type="text" name="ketetapan" id="ketetapan">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> Masa Pajak</label>
								<div class="col col-10">
									<label class="select">
											<label class="input">
												<input type="number" value="2021" class="form-control" id="" name="">
											</label>
										</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> Bulan Pajak</label>
								<div class="col col-10">
									<label class="input">
										<select style="width:100%" class="select2" id="pajak" name="pajak" >
											<option value="">== Pilih Bulan ==</option>
											<option value="">Januari </option>
											<option value="">Februari  </option>
											<option value="">Maret </option>
											<option value="">April</option>
											<option value="">Mei </option>
											<option value="">Juni </option>
											<option value="">Juli </option>
											<option value="">Agustus </option>
											<option value="">September </option>
											<option value="">Oktober </option>
											<option value="">November </option>
											<option value="">Desember </option>
										</select>
									</label>
								</div>
							</div>
						</section>


						

						<section>
							<div class="row">
								<label class="label col col-4"> No Sumur</label>
								<div class="col col-10">
									<label class="select">
											<label class="input">
												<input type="number" value="" class="form-control" id="" name="">
											</label>
										</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> Isi Reklame</label>
								<div class="col col-10">
									<label class="select">
											<label class="input">
												<input type="text" value="" class="form-control" id="" name="">
											</label>
										</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> Jatuh Tempo</label>
							</div>
							<br>
							<div class="row">
								<section class="col col-md-1">
									Tahun
								</section>
								<section class="col col-md-2">
									<label class="input">
										<input class="input-sm" value="<?php echo date('Y'); ?>" type="number" id="tahun" name="tahun">
									</label>
								</section>
								<section class="col col-md-1">
									Bulan
								</section>
								<section class="col col-md-3">
									<label class="select">
										<select class="select2" id="bln" name="bln">
											<option value="">-- Bulan --</option>
											<option value="1">Januari</option>
											<option value="2">Februari</option>
											<option value="3">Maret</option>
											<option value="4">April</option>
											<option value="5">Mei</option>
											<option value="6">Juni</option>
											<option value="7">Juli</option>
											<option value="8">Agustus</option>
											<option value="9">September</option>
											<option value="10">Oktober</option>
											<option value="11">November</option>
											<option value="12">Desember</option>
										</select>
										<!-- <i></i> -->
									</label>
								</section>
								<section class="col col-md-1">
									Tgl
								</section>
								<!-- <section class="col col-md-1">
									<label class="checkbox pull-right">
										<input type="checkbox" name="is_tanggal" id="is_tanggal">
										<i></i>
									</label>
								</section> -->
								<section class="col col-md-2">
									<label class="input">
										<input class="input-sm" type="number" id="tgl" name="tgl">
									</label>
								</section>
							</div>
						</section>



						<section>
							<div class="row">
								<label class="label col col-4"> Lokasi</label>
								<div class="col col-10">
									<label class="textarea"> 					
											<input type="text" value="" class="form-control" id="" name="">					
											<!-- <textarea rows="3" name="info" id="lokasi"></textarea>  -->
										</label>
								</div>
							</div>
						</section>


						<section>
							<div class="row">
								<label class="label col col-4"> Besar Pengurangan yang diminta</label>
							</div>
							<div class="row">
								<div class="col col-10">
									<label class="input"> <i class="icon-append"><b>%</b></i>
										<input value="" type="number" name="pengurangan" id="pengurangan">
									</label>
								</div><!-- 
								<div class="col col-4">
									<label class="label col col-4"> %</label>
								</div> -->
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> Alasan mengajukan Pengurangan</label>
								<div class="col col-10">
									<label class="textarea"> 										
											<textarea rows="3" name="info" id="alasan"></textarea> 
										</label>
								</div>
							</div>
						</section>


						<section>
							<div class="row">
								<label class="label col col-4">Besaran Keringanan</label>
								<div class="col col-10">
									<label class="input">
										<select style="width:100%" class="select2" id="besaran" name="besaran" >
											<option value="">== Silahkan Pilih ==</option>
										<!-- <option value="">Besar Nominal</option> -->
										<option value="">Prosentase</option>
										<option value="">Tolak</option>
										</select>
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Besaran Nominal</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-square"></i>
										<input value="" type="number" name="besar" id="besar">
									</label>

								</div>
							</div>
						</section>



						<section>
							<div class="row">
								<label class="label col col-4">Hasil Penelitian Kantor</label>
								<div class="col col-10">
									<label class="textarea"> 										
											<textarea rows="3" name="info" id="hasil"></textarea> 
										</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Keputusan Hasil Penelitian Kantor</label>
								<div class="col col-10">
									<label class="input">
										<select style="width:100%" class="select2" id="ketetapan" name="ketetapan" >
											<option value="">== Silahkan Pilih ==</option>
										<option value="">Dikabul Seluruh</option>
										<option value="">Sebagian</option>
										<option value="">Ditolak</option>
										</select>
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Nama Penerima Berkas</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-square"></i>
										<input value="" type="text" name="nama" id="nama">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Tanggal Terima Berkas</label>
								<div class="col col-10">
									<label class="input"><i class="icon-append fa fa-calendar"></i>
												<input type="text" id="tglawal" name="param[tglawal]" class="datepicker" data-dateformat="dd-mm-yy" >
											</label>

								</div>
							</div>
						</section>

						
					</fieldset>

					<footer>

						<button id="btn-simpan" onclick="simpan()" type="button" class="btn btn-primary">
							Simpan
						</button>
						<button type="reset" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>

					</footer>
				</form>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
	pageSetUp();

	loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
   generateAutocomplete();
  });

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});


   function generateAutocomplete() {
  $('#pemohon').autocomplete({
    serviceUrl: '<?php echo Yii::app()->getBaseUrl(1); ?>/penagihan/keringananskpda/AutocompletePegawai',
    onSelect: function (suggestion) {
      /*$('#hasilcari').show();*/
    
    }
    ,showNoSuggestionNotice : true
    ,noCache: true
    ,noSuggestionNotice : "Tidak ditemukan data "
  });
}

	function cari() {
		$('#tabel').show('');
	}

	function edit () {

		$("#modal-form").modal("show");
	}

	function upload () {

		$("#modalformberkas").modal("show");
	}


	


</script>