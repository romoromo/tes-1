<?php define('ASSETS_URL', Yii::app()->theme->baseUrl);?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Teguran SKPD Reklame</h4>
		</div>
	</div>
</div>

<section id="widget-grid" class="">
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
		<div class="jarviswidget jarviswidget-color-teal jarviswidget-sortable" id="widget_pencariandatapajak" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" role="widget" style="">
				<header role="heading">
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					 <h2>Pencarian Data</h2>
				    <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
				</header>
				<div role="content">
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body">
						<form id="form_sumber_pajak" class="smart-form" novalidate="">
							<fieldset>
								<div class="row">
									<section class="col col-md-1">
										<p>Nomor Pokok</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input type="text" id="TBLDAFTAR_NOPOK" name="param[TBLDAFTAR_NOPOK]" placeholder="Ketik Nomor Pokok WP">
										</label>
									</section>
									<section class="col col-md-1">
											<p>Tahun SKPD</p>
										</section>
										<section class="col col-md-1" >
											<label class="checkbox">
												<input type="checkbox" name="th_skpd" id="th_skpd" ><i></i>
											</label>
										</section>
										<section class="col col-md-2">
											<label class="select">
												<label class="input">
													<input type="number" value="<?php echo date('Y') ?>" id="TBLDAFTREKLAME_THNSKPD" name="param[TBLDAFTREKLAME_THNSKPD]">
												</label>
											</label>
										</section>					
								</div>
								<div class="row">
									<section class="col col-md-1">
										<p>Masa Pajak</p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<label class="input">
												<input type="number" value="2017" class="form-control" id="TBLPENDATAAN_THNPAJAK" name="param[TBLPENDATAAN_THNPAJAK]">
											</label>
										</label>
									</section>
									<section class="col col-md-2" >
										
									</section>		
									<section class="col col-md-1">
										Bulan SKPD
									</section>
									<section class="col col-md-1" >
											<label class="checkbox">
												<input type="checkbox" name="bl_skpd" id="bl_skpd" ><i></i>
											</label>
										</section>
									<section class="col col-md-2">
										<label class="select">
												<select class="select2" name="param[TBLDAFTREKLAME_BLNSKPDA]" id="TBLDAFTREKLAME_BLNSKPDA">
													<option selected="">== Silahkan Pilih ==</option>
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
											</label>
									</section>
									<section class="col col-md-1">
										 S / D
									</section>
									<section class="col col-md-2">
										<label class="select">
												<select class="select2" name="param[TBLDAFTREKLAME_BLNSKPDK]" id="TBLDAFTREKLAME_BLNSKPDK">
													<option selected="">== Silahkan Pilih ==</option>
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
											</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-1">
										<p>Jenis Reklame</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TBLDAFTREKLAME_JNSREKLAME" name="param[TBLDAFTREKLAME_JNSREKLAME]">
												<option value="">---Silahkan Pilih Jenis Reklame---</option>
												<option value="T">T</option>
												<option value="I">I</option>
											</select>
										</label>
									</section>

								</div>
								<div class="row">
									<section class="col col-md-1">
										<p>Jenis Penyetoran</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="SKPD" name="SKPD" disabled="disabled">
												<option value="SKPD" >SKPD</option>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-1">
										Tanggal Cut off
									</section>
									<section class="col col-md-4">
										<label class="input"><i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tglcutoff" class="datepicker" data-dateformat="dd-mm-yy" id="tglcutoff">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-4">
										<button type="button" class="btn btn-primary btn-sm" onclick="window.id_eksepsi='';cari()" > <i class="fa fa-search"> Cari </i></button>
									</section>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</article>
		
		</section>
		<section id="widget-grid-tetapan" style="" class="">
    <div class="well well-sm well-light">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-fsdfgs12441278"
                    data-widget-editbutton="false"
                    data-widget-deletebutton="false"
                    data-widget-fullscreenbutton="false"
                    data-widget-custombutton="false"
                    data-widget-sortable="false"
                    >
                <header role="heading">
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2> Tabel Pencarian </h2>
                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="table-responsive" style="max-width: 100%; height: 400px!important; overflow: auto;">
                                <button type="button" class="btn btn-primary btn-sm" onclick="cetakWordReklame()">
                                    <i class="fa fa-print"></i> Cetak Surat Teguran
                                </button>          
                                 <button type="button" class="btn btn-primary btn-sm" onclick="cetakDaftar()">
                                    <i class="fa fa-print"></i> Cetak Daftar Teguran
                                </button>                    
                          
                        
                        <div class="" id="listdata">
                        
                        </div>

                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->

        </article>
    </div>
    <!-- end row -->
</section>

<script type="text/javascript">
	pageSetUp();
	window.id_eksepsi = '';

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
			generateAutocompleteWP();
		});


	function generateAutocompleteWP() {
			$('#TBLDAFTAR_NOPOK').autocomplete({
				serviceUrl: 'penagihan/Teguranreklame/autocompletewp',

				onSelect: function (suggestion) {
					window.id = suggestion.data;
					window.nopokok = suggestion.TBLDAFTAR_NOPOK;
					window.nama = suggestion.TNPWPD_MILIKNAMA;
					window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
					window.alamat = suggestion.TNPWPD_MILIKALAMAT;
					window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
					$(this).val(suggestion.value);
					$('#TBLDAFTAR_NOPOK').val(suggestion.value.split(' | ')[0]);
					$('#TBLDAFTAR_BADANUSAHANAMA').val(nama);
					$('#TBLDAFTAR_BADANUSAHAALAMAT').val(alamat);

				}
				,showNoSuggestionNotice : true
				,noCache : true
				,noSuggestionNotice : "Tidak ditemukan hasil"
			});
		}

	function cari() {

		 // var CARI_NOMOR_SURAT = $('#nomor_pajak').val();
			// if (CARI_NOMOR_SURAT==''){
		 // 	notifikasi('Nomor Surat Masih Kosong','failed',1,0);
		 // 	return false;
		// }

        $("#the_preload_element").show();
        $.ajax({
            url: 'penagihan/Teguranreklame/cari',
            type: 'POST',
            data: {
            	
            	// tglawal: $("#tglawal").val(),
            	// tglakhir: $("#tglakhir").val(),
            	TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val(),
            	TBLDAFTREKLAME_THNSKPD : ($('#th_skpd').prop('checked') ? $('#TBLDAFTREKLAME_THNSKPD').val() : ''),
            	TBLDAFTREKLAME_BLNSKPDA : ($('#bl_skpd').prop('checked') ? $('#TBLDAFTREKLAME_BLNSKPDA').val() : ''),	
            	TBLDAFTREKLAME_BLNSKPDK : ($('#bl_skpd').prop('checked') ? $('#TBLDAFTREKLAME_BLNSKPDK').val() : ''),	
            	TBLDAFTREKLAME_JNSREKLAME: $("#TBLDAFTREKLAME_JNSREKLAME").val(),
            	TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val(),
            	tglcutoff: $("#tglcutoff").val(),

            	//jenis_penyetoran: $("#SKPD").val(),
            },
            success:function(respon) {
                $("#listdata").html(respon);
                $("#the_preload_element").hide();
            }
        });
    }

    // function cetaksurat () {
    // 	var nomor_surat = $('#nomor_surat');
    // 	var pajak_tahun = $('#pajak_tahun');
    // 	var jenis_reklame = $('#jenis_reklame');
    // 	var jenis_penyetoran = $('#jenis_penyetoran')
    // 	window.APP_URL = "<?php echo $data['URL_APP']; ?>";

    // 	window.open('<?php echo Yii::app()->getBaseUrl(1) ?>/penagihan/Teguranreklame/Cetak?&pajak_tahun='+pajak_tahun+'&jenis_reklame='+jenis_reklame+'&jenis_penyetoran'+jenis_penyetoran+"&nomor_surat="+nomor_surat);
    //  }  

 //    function cetakWordReklame() {
	// 	var param = jQuery.param(
	// 	{
	// 		 TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
	// 		, TBLDAFTAR_GOLONGAN: $("#TBLDAFTAR_GOLONGAN").val()
	// 		, TBLDAFTAR_BADANUSAHAALAMAT: $("#TBLDAFTAR_BADANUSAHAALAMAT").val()
	// 		, TBLDAFTAR_BADANUSAHANAMA: $("#TBLDAFTAR_BADANUSAHANAMA").val()
	// 		, TBLPENDATAAN_THNPAJAK: $("#TBLPENDATAAN_THNPAJAK").val()
	// 		, no_surat: $("#no_surat").val()
	// 		, tglawal: $("#tglawal").val()
	// 		, tglakhir: $("#tglakhir").val()
	// 		, jenis_penyetoran: $("#SKPD").val()
	// 		, TBLDAFTREKLAME_JNSREKLAME: $("#TBLDAFTREKLAME_JNSREKLAME").val()
	// 	});
	// 	window.open('<?= Yii::app()->getBaseUrl(1); ?>/penagihan/Teguranreklame/cetakwordreklame?'+ param);
	// }

	function cetakWordReklame () {

    	if ($('#no_surat').val()=='') {
    		notifikasi('Informasi','Mohon Isikan Nomor Surat','failed',1,0);
    	} else {
    		arridPajak = [];

			$("input[name='nopokPajak']:checked").each(function() {
				arridPajak.push(this.value);
			});

			count = 0;
			for(x in arridPajak) {
				count++;
			}

			daftaridPajak = arridPajak.toString();

			var q = daftaridPajak;
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/penagihan/Teguranreklame/cetakwordreklame/?data=' + q +"&TBLPENDATAAN_THNPAJAK="+$('#TBLPENDATAAN_THNPAJAK').val()+"&TBLDAFTREKLAME_JNSREKLAME="+$('#TBLDAFTREKLAME_JNSREKLAME').select2('val')+"&TBLDAFTAR_NOPOK="+$('#TBLDAFTAR_NOPOK').val()+"&no_surat="+$('#no_surat').val()+"&tglawal="+$('#tglawal').val()+"&tglakhir="+$('#tglakhir').val() );
    	}    	
    	// window.open(window.APP_URL+'/pendataan/cetak_suratteguran/cetaksuratteguran');
	}

	function cetakDaftar () {

    	if ($('#no_surat').val()=='') {
    		notifikasi('Informasi','Mohon Isikan Nomor Surat','failed',1,0);
    	} else {
    		arridPajak = [];

			$("input[name='nopokPajak']:checked").each(function() {
				arridPajak.push(this.value);
			});

			count = 0;
			for(x in arridPajak) {
				count++;
			}

			daftaridPajak = arridPajak.toString();

			var q = daftaridPajak;
			window.open('<?= Yii::app()->getBaseUrl(1); ?>/penagihan/Teguranreklame/cetakdaftar/?data=' + q +"&TBLPENDATAAN_THNPAJAK="+$('#TBLPENDATAAN_THNPAJAK').val()+"&TBLDAFTREKLAME_JNSREKLAME="+$('#TBLDAFTREKLAME_JNSREKLAME').select2('val')+"&TBLDAFTAR_NOPOK="+$('#TBLDAFTAR_NOPOK').val()+"&no_surat="+$('#no_surat').val()+"&tglawal="+$('#tglawal').val()+"&tglakhir="+$('#tglakhir').val() );
    	}    	
    	// window.open(window.APP_URL+'/pendataan/cetak_suratteguran/cetaksuratteguran');
	}

    function validAngka(a)
{
    if(!/^[0-9.]+$/.test(a.value))
    {
    a.value = a.value.substring(0,a.value.length-1000000000);
    }
} 
</script>