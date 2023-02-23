<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

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
									<section class="col col-md-2">
										<p>Nomor Pokok</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="form-control" type="text" id="nomor_pajak" name="nomor_pajak" autocomplete="off" onkeyup="validAngka(this)">
										</label>
									</section>
									<section class="col col-md-1">
										<p>Nomor Surat</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="form-control" type="text" id="nomor_pajak" name="nomor_pajak" autocomplete="off">
										</label>
									</section>						
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Masa Pajak</p>
									</section>
									<section class="col col-md-1">
										<label class="select">
											<label class="input">
												<input type="number" value="2017" class="form-control" id="masapajak_tahun" name="masapajak_tahun">
											</label>
										</label>
									</section>
									<section class="col col-md-3" >
										
									</section>		
									<section class="col col-md-1">
										Tanggal Undangan
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input type="text" name="tanggal_undangan_awal" class="datepicker" data-dateformat="dd/mm/yy" id="tanggal_undangan_awal">
										</label>
									</section>
									<section class="col col-md-1">
										 S / D
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input type="text" id="tanggal_undangan_akhir" name="tanggal_undangan_akhir" class="datepicker" data-dateformat="dd-mm-yy">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Jenis Reklame</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="jenis_reklame" name="jenis_reklame">
												<option value="">---Silahkan Pilih Jenis Reklame---</option>
												<option value="T">T</option>
												<option value="I">I</option>
											</select>
										</label>
									</section>
									<section class="col col-md-1">
										<p>Tempat Undangan</p>
									</section>
									<section class="col col-md-4">
										<label class="textarea"> 										
											<textarea rows="5" name="tempat_undangan" id="tempat_undangan">
												Ruang Sub Bid Penagihan dan Keberatan Pendapatan Daerah.
												Gedung Dinas Penanaman Modal dan Perizinan Lt.2 Kota Yogyakarta.
											</textarea> 
										</label>
									</section>

								</div>
								<div class="row">
									<section class="col col-md-2">
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
									<section class="col col-md-4">
										<button type="button" class="btn btn-primary btn-sm" onclick="cari()" > <i class="fa fa-search"> Cari </i></button>
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
                    <h2> Setting Berita </h2>
                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        <div class="widget-body-toolbar no-padding">
                            <p class="alert alert-info"> 
                                <button type="button" class="btn btn-primary btn-sm" onclick="cetak()">
                                    <i class="fa fa-print"></i> Cetak Surat Teguran
                                </button>          
                                 <button type="button" class="btn btn-primary btn-sm" onclick="cetakdaftar()">
                                    <i class="fa fa-print"></i> Cetak Daftar Teguran
                                </button>                    
                            </p>
                            
                        </div>

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
            	masapajak_tahun: $("#masapajak_tahun").val(),
            	jenis_reklame: $("#jenis_reklame").val(),
            	jenis_penyetoran: $("#SKPD").val(),
            },
            success:function(respon) {
                $("#listdata").html(respon);
                $("#the_preload_element").hide();
            }
        });
    }
        window.APP_URL = "<?php echo $data['URL_APP']; ?>";
    function cetak () {
    window.open(window.APP_URL+'/penagihan/Teguranreklame/cetak');
     }  
     function validAngka(a)
{
    if(!/^[0-9.]+$/.test(a.value))
    {
    a.value = a.value.substring(0,a.value.length-1000000000);
    }
} 
</script>