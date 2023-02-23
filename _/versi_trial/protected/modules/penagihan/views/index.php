<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Daftar Tunggakan SKPDKB dan SKPD-A </h4>
		</div>
	</div>
</div>

<!-- widget grid -->
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
    						<p>Jenis Pajak </p>
    					</section>
    					<section class="col col-md-4">
    						<label class="select">
    							<select class="select2" id="TBLREKENING_KODE" name="TBLREKENING_KODE">
    								<option value="">-- Pilih Rekening --</option>
    								<?php foreach ($data['rek'] as $list): ?>
    									<option value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
    								<?php endforeach ?>
    							</select>
    						</label>
    					</section>
    				</div>
    				<div class="row">
    					<section class="col col-md-2">
    						<p>Tahun </p>
    					</section>
    					<section class="col col-md-2">
    						<label class="select">
    							<label class="input">
    								<input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="tahun" name="tahun">
    							</label>
    						</label>
    					</section>
    				</div>
                <!-- <div class="row">
                  <section class="col col-md-2">
                    <p>Tahun Penetapan </p>
                  </section>
                  <section class="col col-md-3">
                    <label class="input"> <i class="icon-append fa fa-calendar"></i>
                      <input type="text" name="tanggal_daftar" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_jobang">
                    </label>
                  </section>
              </div> -->
              <div class="row">
              	<section class="col col-md-2">
              		<p>No. Pokok</p>
              	</section>
              	<section class="col col-md-3">
              		<label class="input">
              			<input type="text" name="nopok" id="nopok">
              		</label>
              	</section>
              </div>

          </fieldset>   
          <footer>
          	<button type="button" class="btn btn-sm btn-primary" onclick="cari()">
          		<i class="fa  fa-search"></i>&nbsp;Cari
          	</button>
                <!-- <button type="button" onclick="cetak()" class="btn btn-sm btn-success">
                  <i class="fa fa-print"></i>&nbsp;Cetak
              </button> -->
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
</section>

<!-- end widget grid -->

<div class="row">

	<!-- NEW WIDGET START -->

	<article class="col-sm-12 col-md-12 col-lg-12">


		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-color-darken" id="wid-id-7" data-widget-editbutton="false"
		data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
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
				<h2>Hasil Pencarian </h2>

			</header>

			<!-- widget div-->
			<div>

				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->

				</div>
				<!-- end widget edit box -->

				<!-- widget content -->
				<div class="table-responsive" style="max-width: 100%; height: 400px!important; overflow: auto;">
					<button class="btn btn-sm btn-default" onclick="cetak('html')">
						<i class="fa fa-print"></i> Cetak Html
					</button>
					<button class="btn btn-sm btn-success" onclick="cetak('excel')">
						<i class="fa fa-table"></i> Cetak Excel
					</button>
					<div id="tabel_laporan">
						<center><i><b>Silahkan Lakukan Pencarian Terlebih Dahulu</b></i></center>
					</div>
				</div>
				<!-- end widget content -->

			</div>
			<!-- end widget div -->

		</div>

	</div>

	<script type="text/javascript">
		pageSetUp();
		jQuery(document).ready(function($) {
			reloadDT('dt_basic');
		});

		LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

		function cari () {
			var CARI_NOPOK = $('#nopok').val();
			if (CARI_NOPOK=='') {
				notifikasi('Informasi','Mohon isikan Nomor Pokok','failed',1,0);
				return false;
			}
			$("#tabel_laporan").html('<div align="center">'+LOADER+'').fadeIn(400);
			$.ajax({
				url: 'penagihan/laporan_tunggakan/Cari',
				type: 'POST',
				data: {
					TBLREKENING_KODE : $('#TBLREKENING_KODE').val(),
					nopok : $('#nopok').val(),
					tahun : $('#tahun').val(),
				},
				success: function (respon) {
					$("#tabel_laporan").html(respon);
					$("#tabel_laporan").prepend('<div align="center">'+LOADER+'');
					$(".loader_img").fadeOut(1000);
				}
			});

		}

		function cetak(jenis){
			var nopok = $('#nopok').val();
			var TBLREKENING_KODE = $('#TBLREKENING_KODE').val();
			var tahun = $('#tahun').val();
			window.open('<?php echo Yii::app()->getBaseUrl(1) ?>/pembukuan/laporan_tunggakan/Cetak?nopok='+nopok+'&TBLREKENING_KODE='+TBLREKENING_KODE+'&tahun='+tahun+'&jenis='+jenis);
		}

	</script>