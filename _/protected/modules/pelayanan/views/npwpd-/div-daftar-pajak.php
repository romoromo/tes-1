<div class="row">
	<article class="col-sm-12 col-md-12 col-lg-12" id="grid-dataizinpemohon" style="/*display:none*/">
		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget" id="jarvis-grid-dataizinpemohon" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-deletebutton="false">
			<header>
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>Data</h2>
			</header>

			<!-- widget div-->
			<div>

				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->

				</div>
				<!-- end widget edit box -->

				<!-- widget content -->
				<div class="widget-body no-padding" id="detail-dataizinpemohon">

				</div>
				<!-- end widget content -->

			</div>

			<!-- end widget div -->

		</div>
		<!-- end widget -->
	</article>
</div>

<!--Modal form pendataan-->
<div class="modal fade" id="modalDetailPajak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
	<div class="modal-dialog" style="width: 80%;">
		<div class="modal-content">
			<div class="modal-header">
				<button class="btn btn-danger pull-right" type="button" class="close" data-dismiss="modal" aria-hidden="true">
					X
				</button>
				<h4 class="modal-title">
					<i class="fa  fa-fw fa-tasks"></i> Form Detail Pajak
				</h4>
			</div>
			<div class="modal-body no-padding">

				<div class="widget-body fade in" id="divDetailPajak" style="overflow-y: auto;max-height: 500px;">

				</div>

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--End form pendataan-->

<script type="text/javascript">
	pageSetUp();

	function detailIzinPemohon(idpemohon) {
		window.idpemohon = idpemohon;
		$.ajax({
			url: '<?php echo Yii::app()->getBaseUrl(1) ?>/<?= $this->MODULE_URL ?>/DataPajakPemohon',
			type: 'POST',
			data: {idpemohon: idpemohon},
			success: function(respon) {
				$("#detail-dataizinpemohon").html(respon);
				$("#grid-dataizinpemohon").slideDown(500);
				$("#jarvis-grid-dataizinpemohon").show();
				$("html, body").animate({ scrollTop: 875 }, "slow");
			}
		});
	}

	function detailIzinLokasi(idlokasi) {
		window.idlokasi = idlokasi;
		$.ajax({
			url: '<?php echo Yii::app()->getBaseUrl(1) ?>/<?= $this->MODULE_URL ?>/detailIzinLokasi',
			type: 'POST',
			data: {idlokasi: idlokasi},
			success: function(respon) {
				$("#detail-dataizinpemohon").html(respon);
				$("#grid-dataizinpemohon").slideDown('fast', function() {
				$("#jarvis-grid-dataizinpemohon").show();
					setTimeout(function() {
					$("html, body").animate({ scrollTop: 875 }, "slow");
					}, 1000);
				});

			}
		});
	}

	function getIdentity(typeidentity, identityelm) {
		if(typeidentity=='LOKASI')
			var identity = $("#"+identityelm).val();
		else {
			var identity = $("#"+identityelm).val().split(".").join("");
			if(typeidentity=='BADANUSAHA') {
				identity = identity.split("-").join("");
			}
		}

		return identity;
	}

	$(".btn-isIdentity").click(function(event) {
		var typeidentity = $(event.target).data('typeidentity');
		var identityelm = $(event.target).data('identityelm');
		window.TYPEIDENTITY = typeidentity;
		window.IDENTITYELM = identityelm;

		var identity = getIdentity(typeidentity, identityelm);

		console.log(typeidentity+' '+identityelm+" "+identity);
		setTimeout(function() {
			if (identity!='')
				isIdentity(typeidentity, identity)
		}, 500);
	});


	function isIdentity(typeidentity, identity) {
		$("#tombol_akses_lokasi").hide();
		$("#tombol_akses").hide();
		$.ajax({
			url: '<?php echo Yii::app()->getBaseUrl(1) ?>/<?= $this->MODULE_URL ?>/isIdentity',
			type: 'POST',
			data: {typeidentity: typeidentity, identity: identity},
			dataType: 'json',
			success: function(respon) {
				$("#detail-dataizinpemohon").html('');
				if(respon.isIdentity=='TRUE') {
					$("#tombol_akses").hide();
					if (respon.typeidentity=='LOKASI') {
						detailIzinLokasi(respon.id);
					} else {
						detailIzinPemohon(respon.id);
					}
				} else {
					$("#grid-dataizinpemohon").slideUp(500);
					$("#jarvis-grid-dataizinpemohon").show();

					if (typeidentity=='PRIBADI') {
						$("#formbadanusaha_daftar").hide();
						$("#formpemohon_daftar").show();
						$("#tombol_akses").hide();
						$("#tombol_akses_lokasi").hide();
	
					} 

					if (typeidentity=='BADANUSAHA') {
						$("#formpemohon_daftar").hide();
						$("#formbadanusaha_daftar").show();
						$("#tombol_akses").hide();
						$("#tombol_akses_lokasi").hide();
						notifikasi('Identitas belum ditemukan','Tambah identitas pemohon baru terlebih dahulu.', 'failed',1,0);
					} 
					else {
						notifikasi('Identitas belum ditemukan','Tambah identitas lokasi baru terlebih dahulu.', 'failed',1,0);
						$("#tombol_akses_lokasi").hide();
						$("#tombol_akses").hide();
					}
				}
			}
		});
	}

	function getFormDetail(mod) {
		$('#modalDetailPajak').modal('hide');
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1); ?>/pelayanan/detailpajak/mode/for/' + mod,
			type: 'POST',
			data: {token: btoa(Math.random()) },
		})
		.done(function(respon) {
			$('#divDetailPajak').html(respon);
			$('#modalDetailPajak').modal('show');
		})
		.fail(function( jqXHR, exception ) {
			handelErr(jqXHR, exception)
		})
		.always(function() {
			console.log("complete");
		});
		
	}
</script>