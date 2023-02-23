<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light">
		<h1 align="center" class="page-title txt-color-blueDark"><i class="fa fa-user"></i>
		Input Data SK WALIKOTA Keringanan</h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="well">
			<div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Referensi SK WALIKOTA</h2>
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
						<div class="widget-body-toolbar">
							<button class="btn btn-primary" onclick="tambah()">
								<i class="fa fa-plus-square"></i>	Tambah
							</button>
						</div>
						<div id="listdata" style="display: none;">
						<table id="dt_basic_pipeline" class="table table-striped table-bordered table-hover" width="100%">
							<thead>
								<tr>
									<th data-hide="phone">No</th>
									<th data-class="expand">NPWPD </th>
									<th data-hide="phone,tablet">Jenis Pajak</th>
									<th data-hide="phone,tablet">Jenis Ketetapan</th>
									<th data-hide="phone,tablet">Masa Pajak</th>
									<th data-hide="phone,tablet">Besar Pengurangan</th>
									<th data-hide="phone,tablet">Alasan Mengajukan Pengurangan</th>
									<th data-hide="phone,tablet">Action</th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td>1</td>
									<td>3.0000036.05.16</td>
									<td>Hotel</td>
									<td>SKPDKB</td>
									<td>2020</td>
									<td>50 %</td>
									<td>Karena sepi</td>
									<td><a type="button" onclick="edit()" data-toggle="modal" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>&nbsp;
							      Edit </a>
					                                    <button  onclick="hapus()" type='button' class='btn btn-danger btn-sm' > <i class="fa fa-trash-o"></i>&nbsp;
					                                      Hapus </button></td>
								</tr>

							</tbody>
						</table>
						</div>
					</div>
					<!-- end widget content -->
				</div>
				<!-- end widget div -->
			</div>
		</div>
	</div>
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
					Form Input SK Walikota Keringanan
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
<!-- /.modal -->
<script type="text/javascript">
// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();

	loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
   generateAutocomplete();
  });

	// PAGE RELATED SCRIPTS

	/*$(document).ready(function () {
		loadDataTable();
	});*/

	/*form validation*/
	loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		var $FormData = $("#form-data").validate({
				// Rules for form validation
				rules : {
					"param[tblpejabat_nama]" : {
						required : true
					}
					,"param[tblpejabat_nip]" : {
						required : true
					}
					,"param[tblpejabat_jabatan]" : {
						required : true
					}
					,"param[tblpejabat_golongan]" : {
						required : true
					}
				},

				// Messages for form validation
				messages : {
					"param[tblpejabat_nama]" : {
						required : 'Mohon isikan nama pejabat'
					}
					,"param[tblpejabat_nip]" : {
						required : 'Mohon isikan nip pejabat'
					}
					,"param[tblpejabat_jabatan]" : {
						required : 'Mohon isikan jabatan '
					}
					,"param[tblpejabat_golongan]" : {
						required : 'Mohon isikan golongan'
					}
				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				},
				submitHandler : function(form) {
					// saat validasi benar semua, jalankan simpan()
					return simpan();
				}
			});

	};
	/*//form validation*/


/*//form validation*/

  function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }

    function generateAutocomplete() {
  $('#pemohon').autocomplete({
    serviceUrl: '<?php echo Yii::app()->getBaseUrl(1); ?>/app/inputkeringanan/AutocompletePegawai',
    onSelect: function (suggestion) {
      /*$('#hasilcari').show();*/
    
    }
    ,showNoSuggestionNotice : true
    ,noCache: true
    ,noSuggestionNotice : "Tidak ditemukan data "
  });
}

	function tambah () {
		window.cmd = "tambah";
		window.id = '';
		$("#cmd").val("tambah");
		$("#form-data")[0].reset();
		$("#form-data .select2").select2('val','');
		$("#modal-form").modal("show");

	}
	function edit () {

		$("#modal-form").modal("show");
	}

	function simpan () {
		$("#modal-form").modal("hide");
					notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
			
					$("#listdata").show("");
		
	}

	function hapus (id) {
		$.SmartMessageBox({
			title : "Konfirmasi Hapus", // judul Smart Alert
			content : "Apakah anda yakin akan menghapus data Pengguna ini", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'app/pejabat/hapus',
					type: 'post',
					data: {
						id: id,
					},
					success: function (data) {
						if(data=='success') {
							notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
							loadDataTable();
						} else {
							notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
						}
					}
				});

			}

		});
	}

	/*function loadDataTable() {
		var totalRecords = <?php //echo $data['total_data'] ?>; // total no of records
		var ajaxUrl = "app/pejabat/DTJSON" // url that fetches the data for the table
		// drawTable($('#dt_basic_pipeline'), 1, totalRecords, ajaxUrl);  //Initializes the datatable
		COLUMN  = [
			{ "data": "num" }
			,{ "data": "tblpejabat_nama" }
			,{ "data": "tblpejabat_nip" }
			,{ "data": "refjabatan_nama" }
			,{ "data": "tblpejabat_golongan" }
			,{ "data": "tblpejabat_id", "render": function ( data, type, full, meta ) {
				return '<div align="center"><a rel="tooltip" data-placement="left" data-original-title="Klik untuk mengedit data" onclick="edit('+data+')" class="btn btn-circle btn-primary"><i class="fa fa-pencil"></i></a>'
				+'&nbsp;<a rel="tooltip" data-placement="left" data-original-title="Klik untuk menghapus data" onclick="hapus('+data+')" class="btn btn-circle btn-danger"><i class="fa fa-trash-o"></i></a></div>';
			 }}
		];
		drawTablePipeLine($('#dt_basic_pipeline'), 10, totalRecords, ajaxUrl,COLUMN, pageSetUp);  //Initializes the datatable
	}*/

</script>