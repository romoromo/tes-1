<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Kartu Piutang </h4>
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
             <select class="select2" id="TBLREKENING_KODE" name="param[TBLREKENING_KODE]">
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
            <p>Jenis Ketetapan </p>
          </section>
          <section class="col col-md-3">
                  <label class="select">
                    <select name="jenis_setoran" id="jenis_setoran" class="select2">
                      <option disabled="">== Silahkan Pilih ==</option>
                      <option selected value="SKPDKB">SKPDKB</option>
                    </select>
                  </label>
          </section>
     </div>
     <div class="row" style="display: none;">
       <section class="col col-md-2">
        <p>Tahun Penetapan</p>
      </section>
      <section class="col col-md-1" >
        <label class="checkbox">
         <input type="checkbox" name="param[tahun_kb]" id="tahun_kb" ><i></i>
       </label>
     </section>
     <section class="col col-md-2">
      <label class="select">
       <label class="input">
        <input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="tahunkb" name="param[tahunkb]">
      </label>
    </label>
  </section>
  <section class="col col-md-1">
  S/D
  </section>
  <section class="col col-md-2">
    <label class="select">
      <label class="input">
        <input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="tahunkb_akhir" name="param[tahunkb_akhir]">
      </label>
    </label>
  </section>
</div>
<div class="row">
 <section class="col col-md-2">
  <p>Tahun Pajak</p>
</section>
<section class="col col-md-1" >
  <label class="checkbox">
   <input type="checkbox" name="param[th_pajak]" id="th_pajak" ><i></i>
 </label>
</section>
<section class="col col-md-2">
  <label class="select">
   <label class="input">
    <input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="tahunpjk" name="param[tahunpjk]">
  </label>
</label>
</section>
<section class="col col-md-1">
S/D
</section>
<section class="col col-md-2">
  <label class="select">
    <label class="input">
      <input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="tahunpjk_akhir" name="param[tahunpjk_akhir]">
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
                   <input type="text" name="param[TBLDAFTAR_NOPOK]" id="TBLDAFTAR_NOPOK">
                 </label>
               </section>
             </div>

             <div class="row">
               <section class="col col-md-2">
                <p>Tanggal Cut Off Terbit SKPDKB</p>
              </section>
              <section class="col col-md-3">
                <label class="input"><i class="icon-append fa fa-calendar"></i>
                  <input type="text" value="<?php echo date('d-m-Y'); ?>" id="tgl_cutoff" name="param[tgl_cutoff]" class="datepicker" data-dateformat="dd-mm-yy" >
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

<div class="modal fade" id="form-ang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-lg" style="width: 1200px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;
        </button>
        <h4 class="modal-title">
          <i class="fa  fa-fw fa-edit"></i> Detail Angsuran
        </h4>
      </div>
      <div class="modal-body no-padding">
        <form class="smart-form" id="form-ubah-data">
          <fieldset>
       <div id="form-angsur"></div>
       </fieldset>
          <footer>
            <button type="button" class="btn btn-primary" onclick="CetakLampiranAng()">
              Cetak
            </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Tutup
            </button>
          </footer>
       </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
				<div class="table-responsive" style="max-width: 100%; height: 800px!important; overflow: auto;">
				<!-- 	<button class="btn btn-sm btn-default" onclick="cetak('html')">
						<i class="fa fa-print"></i> Cetak Html
					</button> -->
         <header>  
           <!-- <button type="button" class="btn btn-primary btn-sm" onclick="CetakWord()">
            <i class="fa fa-print"></i> Cetak Word
          </button> -->     
          <button type="button" class="btn btn-success btn-sm" onclick="CetakExcel()">
            <i class="fa fa-print"></i> Cetak Excel
          </button>  
        </header>
				<!-- 	<button class="btn btn-sm btn-success" onclick="cetak('excel')">
						<i class="fa fa-table"></i> Cetak Excel
					</button> -->
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

		// jQuery(document).ready(function($) {
		// 	$("#tahunpjk").val(Number(<?php echo date('Y') ?>)+4); 
		// });

		// $("#tahunpjk").change(function() {
		// 	$("#tahun").val(Number($("#tahunpjk").val())+4); 
		// });


LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

function cari () {
			var CARI_NOPOK = $('#TBLDAFTAR_NOPOK').val();
			if (CARI_NOPOK=='') {
				notifikasi('Informasi','Mohon isikan Nomor Pokok','failed',1,0);
				return false;
			}
			$("#tabel_laporan").html('<div align="center">'+LOADER+'').fadeIn(400);
			$.ajax({
				url: 'penagihan/daftar_piutang/Cari',
				type: 'POST',
				data: {
					TBLREKENING_KODE : $('#TBLREKENING_KODE').val(),
          jenis_setoran : $('#jenis_setoran').val(),
					TBLDAFTAR_NOPOK : $('#TBLDAFTAR_NOPOK').val(),
          tahunpjk : ($('#th_pajak').prop('checked') ? $('#tahunpjk').val() : ''),
          tahunpjk_akhir : ($('#th_pajak').prop('checked') ? $('#tahunpjk_akhir').val() : ''),
          tahunkb : ($('#tahun_kb').prop('checked') ? $('#tahunkb').val() : ''),
          tahunkb_akhir : ($('#tahun_kb').prop('checked') ? $('#tahunkb_akhir').val() : ''),
          tgl_cutoff : $('#tgl_cutoff').val(),
        },
        success: function (respon) {
         $("#tabel_laporan").html(respon);
         $("#tabel_laporan").prepend('<div align="center">'+LOADER+'');
         $(".loader_img").fadeOut(1000);
       }
      })
      .fail(function() {
        notifikasi('Informasi System','Data dalam database tidak lengkap','failed',1,0);
      });
      

		}

		function cetak(jenis){
			var TBLDAFTAR_NOPOK = $('#TBLDAFTAR_NOPOK').val();
      var jenis_setoran = $('#jenis_setoran').val();
			var TBLREKENING_KODE = $('#TBLREKENING_KODE').val();
      var tahunkb = $('#tahunkb').val();
      var tahunkb_akhir = $('#tahunkb_akhir').val();
      var tahunpjk = $('#tahunpjk').val();
      var tahunpjk_akhir = $('#tahunpjk_akhir').val();
      var tgl_cutoff = $('#tgl_cutoff').val();
      window.open('<?php echo Yii::app()->getBaseUrl(1) ?>/penagihan/daftar_piutang/Cetak?TBLDAFTAR_NOPOK='+TBLDAFTAR_NOPOK+'jenis_setoran='+jenis_setoran+'&TBLREKENING_KODE='+TBLREKENING_KODE+'&tahunkb='+tahunkb+'&jenis='+jenis+'&tahunpjk='+tahunpjk+'&tgl_cutoff='+tgl_cutoff+'&tahunpjk_akhir='+tahunpjk_akhir+'&tahunkb_akhir='+tahunkb_akhir);
    }

    function CetakExcel(){
      var param = jQuery.param({
        TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
        , jenis_setoran: $("#jenis_setoran").val()
        , TBLREKENING_KODE: $("#TBLREKENING_KODE").val()
        , tgl_cutoff: $("#tgl_cutoff").val()
        , tahunpjk : ($('#th_pajak').prop('checked') ? $('#tahunpjk').val() : '')
        , tahunpjk_akhir : ($('#th_pajak').prop('checked') ? $('#tahunpjk_akhir').val() : '')
        , tahunkb : ($('#tahun_kb').prop('checked') ? $('#tahunkb').val() : '')
        , tahunkb_akhir : ($('#tahun_kb').prop('checked') ? $('#tahunkb_akhir').val() : '')
        
      });
      window.open('<?= Yii::app()->getBaseUrl(1); ?>/penagihan/daftar_piutang/Cetak?'+ param);
    }

    function CetakLampiranAng(){
      var param = jQuery.param({
        id: window.nopok
        , tahun: window.tahuncetak
        , bulan: window.bulancetak
        
      });
      window.open('<?= Yii::app()->getBaseUrl(1); ?>/penagihan/daftar_piutang/Cetakangsuran?'+ param);
    }

    function CetakWord(){
      var param = jQuery.param(
      {
        TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
        , TBLREKENING_KODE: $("#TBLREKENING_KODE").val()
        , jenis_setoran: $("#jenis_setoran").val()
        , tgl_cutoff: $("#tgl_cutoff").val()
        , tahunpjk : ($('#th_pajak').prop('checked') ? $('#tahunpjk').val() : '')
        , tahunpjk_akhir : ($('#th_pajak').prop('checked') ? $('#tahunpjk_akhir').val() : '')
        , tahunkb : ($('#tahun_kb').prop('checked') ? $('#tahunkb').val() : '')
        , tahunkb_akhir : ($('#tahun_kb').prop('checked') ? $('#tahunkb_akhir').val() : '')
        
      });
      window.open('<?= Yii::app()->getBaseUrl(1); ?>/penagihan/daftar_piutang/CetakWord?'+ param);
    }

    function ang(tbl, id, thn, bln, bunga) {
      window.nopok=id;
      window.tahuncetak=thn;
      window.bulancetak=bln;
      window.namatabel=tbl;
      window.bunga=bunga;

      
      $.ajax({
        url: 'penagihan/daftar_piutang/getangsuran',
        type: 'POST',
        data: {
          id:id
          ,tahun :thn
          ,bulan :bln
          ,namatabel :tbl
          ,bunga :bunga
        },
        success: function(respon) {
           $("#form-ang").modal('show');
           setTimeout(function() {
            $("#form-angsur").html(respon);
           }, 100);
        }
      });
      // $("#form-ang").modal('show');
    }

  </script>