<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Perforasi Pajak</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-monitoring-pajak" 
			data-widget-editbutton="false"
			data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-colorbutton="false"	
			data-widget-togglebutton="false"			
			>
			<header>
				<span class="widget-icon"> <i class="fa fa-search"></i> </span>
				<h2>Form Pencarian</h2>
			</header>
			<div>
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body no-padding">

					<form action="" id="form_sumber_pajak" class="smart-form" novalidate>
						<fieldset>

							<div class="row">
								<section class="col col-md-1">
									<p>Jenis Pajak </p>
								</section>
								<section class="col col-md-3">
									<label class="select">
										<select class="select2" id="TREKENING_KODE" name="TREKENING_KODE">
											<option value="">-- Pilih Rekening --</option>
											<?php foreach ($data['rek'] as $list): ?>
												<option value="<?php echo $list['TBLREKENING_REKAYAT'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
								</section>
							</div>

							<div class="row">

								<section class="col col-md-1">
									Jenis Perforasi
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select class="select2" id="jenis_perforasi" name="jenis_perforasi">
											<option value="notabill">Nota Bill</option>
											<option value="tiket">Tiket/Karcis</option>
											
										</select>
										<!-- <i></i> -->
									</label>
								</section>

							</div>

							<div class="row">
								<section class="col col-md-1">
									Tahun Pajak
								</section>
								<section class="col col-md-2">
									<label class="input">
										<input class="input-sm" value="<?php echo date('Y'); ?>" type="number" id="tahun" name="tahun">
									</label>
								</section>
								<section class="col col-md-1">
									Bulan Pajak
								</section>
								<section class="col col-md-2">
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
									<p>Nomor Pokok</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input class="input-sm" type="text" id="nopok" name="nopok">
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-1">
									Tanggal Entri
								</section>
								<section class="col col-md-2">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
	                                    <input type="text" id="tglentri" name="tglentri" value="<?php echo date('d-m-Y'); ?>">
	                                </label>
								</section>
							</div>

							<div class="row">
								<!-- <section class="col col-md-1">
									Tanggal Awal
								</section>
								<section class="col col-md-2">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
	                                    <input type="text" id="tglawal" name="tglawal">
	                                </label>
								</section>

								<section class="col col-md-1">
									Tanggal Akhir
								</section>
								<section class="col col-md-2">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
                                    <input type="text" id="tglakhir" name="tglakhir">
                                </label>
								</section> -->

								<section class="col col-md-2">
									<a class="btn btn-sm btn-primary" onclick="cari()">
										Cari <i class="fa fa-search"></i>
									</a>
								</section>
							</div>

							<header></header>
							<br>

							<dir id="data-wajibpajak" style="display: none;">
								<div class="row">
									<section class="col col-md-1">
										Nama Usaha
									</section>
									<section class="col col-md-2">
										<span id="namausaha"></span>
	                                </label>
									</section>
									<section class="col col-md-1">
										Nama Pemilik
									</section>
									<section class="col col-md-2">
										<span id="namapemilik"></span>
	                                </label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-1">
										Alamat Usaha
									</section>
									<section class="col col-md-2">
										<span id="alamatusaha"></span>
	                                </label>
									</section>
									<section class="col col-md-1">
										Alamat Pemilik
									</section>
									<section class="col col-md-2">
										<span id="alamatpemilik"></span>
	                                </label>
									</section>
								</div>
							</dir>

						</fieldset>	
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





<div class="row" id="datagrid-notabill" style="display: none;">
	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="jarviswidget jarviswidget-color-orange" id="wid-id-datagrid-notabill" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
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
            	<h2>&nbsp;Data Perforasi Notabill</h2>                    
            </header>
            <div>
            	<div class="jarviswidget-editbox">
            	</div>
            	<div class="widget-body no-padding">
            		<p class="alert alert-info"> 
                    <button class="btn btn-primary" onclick="tambahdatanotabill()">
                    <i class="fa fa-plus"></i> Tambah Data
                    </button>
                    </p>
            		<div id="tabel_notabill" class="">
            		</div>
            	</div>
            </div>
        </div>
    </article>
</div>

<div class="row" id="datagrid-tiket" style="display: none;">
	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="jarviswidget jarviswidget-color-orange" id="wid-id-datagrid-tiket" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
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
            	<h2>&nbsp;Data Perforasi Tiket/Karcis</h2>                    
            </header>
            <div>
            	<div class="jarviswidget-editbox">
            	</div>
            	<div class="widget-body no-padding">
            		<p class="alert alert-info"> 
                    <button class="btn btn-primary" onclick="tambahdatatiket()">
                    <i class="fa fa-plus"></i> Tambah Data
                    </button>
                    </p>
            		<div id="tabel_tiket" class="">
            		</div>
            	</div>
            </div>
        </div>
    </article>
</div>



</section>

<div class="modal fade" id="modal-tambahdata-notabill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    <i class="fa  fa-fw fa-file"></i> Isian Data Nota Bill
                </h4>
            </div>
            <div class="modal-body no-padding">

                <form class="smart-form" id="form-modal-notabill">
                    <fieldset>

                        <div class="row">
                            <section class="col col-sm-3">
                                <p>Uraian</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control" type="text" name="uraian_notabill" id="uraian_notabill"></input>
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-sm-3">
                                <p>No Nota Awal</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control  format-rupiah" type="text" name="notabill_awal" id="notabill_awal" ></input>
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-sm-3">
                                <p>No Nota Akhir</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control" type="text" name="notabill_akhir" id="notabill_akhir" ></input>
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-sm-3">
                                <p>Jumlah Buku</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control" type="text" name="jumlah_buku" id="jumlah_buku" ></input>
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-sm-3">
                                <p>Isi Per Buku</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control" type="text" name="isi_perbuku" id="isi_perbuku" ></input>
                                </label>
                            </section>
                        </div>

                         <div class="row">
                            <section class="col col-sm-3">
                                <p>Keterangan</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control" type="text" name="notabill_keterangan" id="notabill_keterangan" ></input>
                                </label>
                            </section>
                        </div>

                    </fieldset>
                </form>
                <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Batal
					</button>
					<button type="button" onclick='simpannotabill()' class="btn btn-primary" id="simpan" >
						Simpan
					</button>
				</div>                       
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tambahdata-tiket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    <i class="fa  fa-fw fa-file"></i> Isian Data Tiket / Karcis
                </h4>
            </div>
            <div class="modal-body no-padding">

                <form class="smart-form" id="form-modal-tiket">
                    <fieldset>

                        <div class="row">
                            <section class="col col-sm-3">
                                <p>Jenis Tiket</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control" type="text" name="uraian_tiket" id="uraian_tiket"></input>
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-sm-3">
                                <p>No Nota Awal</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control  format-rupiah" type="text" name="tiket_awal" id="tiket_awal" ></input>
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-sm-3">
                                <p>No Nota Akhir</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control" type="text" name="tiket_akhir" id="tiket_akhir" ></input>
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-sm-3">
                                <p>Kode</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control" type="text" name="tiket_kode" id="tiket_kode" ></input>
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-sm-3">
                                <p>Nilai Lembar</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control  format-rupiah" type="text" name="tiket_nilai" id="tiket_nilai" ></input>
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-sm-3">
                                <p>Keterangan</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control" type="text" name="keterangan_tiket" id="keterangan_tiket" ></input>
                                </label>
                            </section>
                        </div>

                    </fieldset>
                </form>
                <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Batal
					</button>
					<button type="button" onclick='simpantiketkarcis()' class="btn btn-primary" id="simpan" >
						Simpan
					</button>
				</div>                       
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugin/jquery-priceformat/jquery.price_format.2.0.min.js"></script>
<script type="text/javascript">
	pageSetUp();

	jQuery(document).ready(function($) {
			// 
	});

	$('#tiket_nilai').change(function(event) {
		setPriceFormat();
	});

	$('#bln').change(function(event) {

		$.ajax({
            url: 'pendataan/perforasi_pajak/GetTanggal',
            type: 'POST',
            dataType: 'json',
            data: {
            	tahun : $('#tahun').val()
            	,bln : $('#bln').select2('val')
            },
            success: function (respon) {
				$('#tglawal').val(respon.tanggalawal);
				$('#tglakhir').val(respon.tanggalakhir);
            }
        });
	});

	$('#TREKENING_KODE').change(function(event) {
		$('#nopok').val('');
		$('#bln').select2('val','');
	});

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/bootstrap-timepicker.min.js", runTimePicker);
	function runTimePicker() {
		$('.timepicker').timepicker({
			showMeridian: false,
		});
	}

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWPhotel();
	});

	function generateAutocompleteWPhotel() {
		$('#nopok').autocomplete({
			serviceUrl: 'penyetoran/entrisetoranpajakhotel/autocomplete',

			onSelect: function (suggestion) {
		        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
		        window.id = suggestion.data;
		        window.nopokok = suggestion.TBLDAFTAR_NOPOK;
		        window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
		        window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
		        $(this).val(suggestion.value);
		        $('#nopok').val(suggestion.value.split(' | ')[0]);

		    }
		    ,showNoSuggestionNotice : true
		    ,noCache : true
		    ,noSuggestionNotice : "Tidak ditemukan hasil"
		});
	}

	 $("#tglawal").datepicker({
        defaultDate: "+1w",
        dateFormat : "dd-mm-yy",
        changeMonth: true,
        //changeYear: true,
        numberOfMonths: 2,
        prevText: '<i class="fa fa-chevron-left"></i>',
        nextText: '<i class="fa fa-chevron-right"></i>',
        onClose: function (selectedDate) {
            $("#tglakhir").datepicker("option", "minDate", selectedDate);
        }

    });
    $("#tglakhir").datepicker({
        defaultDate: "+1w",
        dateFormat : "dd-mm-yy",
        changeMonth: true,
        //changeYear: true,
        numberOfMonths: 2,
        prevText: '<i class="fa fa-chevron-left"></i>',
        nextText: '<i class="fa fa-chevron-right"></i>',
        onClose: function (selectedDate) {
            $("#tglawal").datepicker("option", "maxDate", selectedDate);
        }
    });

	function cari() {

		var rekkode = $('#TREKENING_KODE').select2('val');
		var jenis = $('#jenis_perforasi').select2('val');
		var tahun = $('#tahun').val();
		var bln = $('#bln').select2('val');
		var nopok = $('#nopok').val();
		var tglentri = $('#tglentri').val();

		if (rekkode!='' && tahun!='' && bln!='' && nopok!='' && tglentri!='') {

			$.ajax({
	            url: 'pendataan/perforasi_pajak/Getdata',
	            type: 'POST',
	            dataType: 'json',
	            data: {
	            	rekkode:rekkode,
	            	jenis:jenis,
					tahun:tahun,
					bln:bln,
					nopok:nopok,
					tglentri:tglentri,
	            },
	            success: function (respon) {

	            	var	datawp = respon.wp;
					$('#data-wajibpajak').show();
					$('#namausaha').html(datawp.TBLDAFTAR_BADANUSAHANAMA);
					$('#namapemilik').html(datawp.TBLDAFTAR_PEMILIKNAMA);
					$('#alamatusaha').html(datawp.TBLDAFTAR_BADANUSAHAALAMAT);
					$('#alamatpemilik').html(datawp.TBLDAFTAR_PEMILIKALAMAT);

					if (jenis=='notabill') {
						$('#datagrid-notabill').show();
						$('#datagrid-tiket').hide();
						LoadTableNotabill(rekkode,tahun,bln,nopok,tglentri);
						// reloadDT('dt_basic');
					} else if (jenis=='tiket') {
						$('#datagrid-notabill').hide();
						$('#datagrid-tiket').show();
						LoadTableTiket(rekkode,tahun,bln,nopok,tglentri);
						// reloadDT('dt_basic');
					}

	            }
	        }); 
	    } else {
	    	notifikasi('Informasi','Mohon isikan data dengan lengkap','failed',1,0);
	    }
	}

	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

	function LoadTableNotabill(rekkode,tahun,bln,nopok,tglentri) {
		$("#tabel_notabill").html('<div align="center">'+LOADER+'').fadeIn(400);
		$.ajax({
            url: 'pendataan/perforasi_pajak/GetTabelnotabill',
            type: 'POST',
            dataType: 'html',
            data: {
            	rekkode:rekkode,
				tahun:tahun,
				bln:bln,
				nopok:nopok,
				tglentri:tglentri,
            },
            success: function (respon) {
				$("#tabel_notabill").prepend('<div align="center">'+LOADER+'');
				$("#tabel_notabill").html(respon);
				$(".loader_img").fadeOut(1000);
            }
        });
	}

	function LoadTableTiket(rekkode,tahun,bln,nopok,tglentri) {
		$("#tabel_tiket").html('<div align="center">'+LOADER+'').fadeIn(400);
		$.ajax({
            url: 'pendataan/perforasi_pajak/GetTabeltiket',
            type: 'POST',
            dataType: 'html',
            data: {
            	rekkode:rekkode,
				tahun:tahun,
				bln:bln,
				nopok:nopok,
				tglentri:tglentri,
            },
            success: function (respon) {
				$("#tabel_tiket").html(respon);
				$("#tabel_tiket").prepend('<div align="center">'+LOADER+'');
				$(".loader_img").fadeOut(1000);
            }
        });
	}

	

	function tambahdatanotabill() {
		$('#modal-tambahdata-notabill').modal('show');
		$('#uraian_notabill').val('');
		$('#notabill_awal').val('');
		$('#notabill_akhir').val('');
		$('#jumlah_buku').val('');
		$('#isi_perbuku').val('');
		$('#notabill_keterangan').val('');
		window.cmd = 'tambah';
		window.id  = '';
	}

	function tambahdatatiket() {
		$('#modal-tambahdata-tiket').modal('show');
		$('#uraian_tiket').val('');
		$('#tiket_awal').val('');
		$('#tiket_akhir').val('');
		$('#tiket_kode').val('');
		$('#tiket_nilai').val('');
		$('#keterangan_tiket').val('');
		window.cmd = 'tambah';
		window.id  = '';
	}

	function editdatanotabill(id) {
		window.cmd = 'edit';
		$.ajax({
            url: 'pendataan/perforasi_pajak/GetdataHotel',
            type: 'POST',
            dataType: 'json',
            data: {
            	id:id
            },
            success: function (respon) {
            	$('#modal-tambahdata-notabill').modal('show');
				$('#uraian_notabill').val(respon.KLASIFIKASI_KMR);
				$('#notabill_awal').val(respon.TARIF_KMR);
				$('#notabill_akhir').val(respon.JUMLAH_KMR);
				$('#jumlah_buku').val(respon.JUMLAH_TERSEDIA);
				$('#isi_perbuku').val(respon.JUMLAH_TERJUAL);
				$('#notabill_keterangan').val(respon.JUMLAH_TERJUAL);
				window.id = respon.TBLMONITORING_HOTEL_ID;
				setPriceFormat();
            }
        });
	}

	

	function hapusdatanotabill(id) {
		var rekkode = $('#TREKENING_KODE').select2('val');
		var tahun = $('#tahun').val();
		var bln = $('#bln').select2('val');
		var nopok = $('#nopok').val();
		var tglentri = $('#tglentri').val();

		$.SmartMessageBox({
			title : "Informasi Penghapusan Data", // judul Smart Alert
			content : "Apakah data ini akan dihapus?", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'pendataan/perforasi_pajak/HapusKamarHotel',
					type: 'POST',
					dataType: 'json',
					data: {
						id : id
					},
					success: function (respon) {
		            	if (respon.pesan=='success') {
		            		notifikasi('Informasi','Data berhasil dihapus','success',1,0);
		            		LoadTableHotel(rekkode,tahun,bln,nopok,tglentri);
		            	} else {
		            		notifikasi('Informasi','Data gagal dihapus','failed',1,0);
		            	}
		            }
				})
			}
		});
	}

	

	

	function simpannotabill() {
		var rekkode = $('#TREKENING_KODE').select2('val');
		var tahun = $('#tahun').val();
		var bln = $('#bln').select2('val');
		var nopok = $('#nopok').val();
		var tglentri = $('#tglentri').val();
		

		$.ajax({
            url: 'pendataan/perforasi_pajak/Simpannota',
            type: 'POST',
            dataType: 'json',
            data: $("#form-modal-notabill").serialize()+'&rekkode='+rekkode+'&tahun='+tahun+'&bln='+bln+'&nopok='+nopok+'&tglentri='+tglentri+'&cmd='+window.cmd+'&id='+window.id,
            success: function (respon) {
            	if (respon.pesan=='success') {
            		notifikasi('Informasi','Data berhasil disimpan','success',1,0);
            		$('#modal-tambahdata-notabill').modal('hide');
            		LoadTableNotabill(rekkode,tahun,bln,nopok,tglentri)
            	} else {
            		notifikasi('Informasi','Data gagal disimpan','failed',1,0);
            	}
            }
        });
	}

	function simpantiketkarcis() {
		var rekkode = $('#TREKENING_KODE').select2('val');
		var tahun = $('#tahun').val();
		var bln = $('#bln').select2('val');
		var nopok = $('#nopok').val();
		var tglentri = $('#tglentri').val();

		$.ajax({
            url: 'pendataan/perforasi_pajak/Simpantiket',
            type: 'POST',
            dataType: 'json',
            data: $("#form-modal-tiket").serialize()+'&rekkode='+rekkode+'&tahun='+tahun+'&bln='+bln+'&nopok='+nopok+'&tglentri='+tglentri+'&cmd='+window.cmd+'&id='+window.id,
            success: function (respon) {
            	if (respon.pesan=='success') {
            		notifikasi('Informasi','Data berhasil disimpan','success',1,0);
            		$('#modal-tambahdata-tiket').modal('hide');
            		LoadTableHiburan(rekkode,tahun,bln,nopok,tglentri);
            	} else {
            		notifikasi('Informasi','Data gagal disimpan','failed',1,0);
            	}
            }
        });
	}


</script>
