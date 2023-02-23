<?php define('ASSETS_URL','themes/smartadmin'); ?>
<div class="row">
	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-calendar fa-fw "></i> 
			Cetak RTF Daftar Rencana</h1>
	</div>
</div>

<div class="row">
	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-12" data-widget-editbutton="false">
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
					<h2>Form Input Pencabutan </h2>

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
						<input type="text" name="iddaftar" id="iddaftar" />
						<select id="logocetak">
							<option value="logoYKwarna.png" selected="selected">Logo YK berwarna</option>
							<option value="logoYK.png">Logo YK Grayscale</option>
						</select>
						<input type="button" class="btn btn-primary" id="cetak" value="Cetak">
					</div>
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
	</article>
</div>


<script type="text/javascript">
	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();
	$("#cetak").click(function(event) {
		//$.post('cetaksk/cetakrtf', id: $('#iddaftar').val(), function(data) {});
		var id = $('#iddaftar').val();
		var logo = $('#logocetak').val();
		$.ajax({
			url: 'cetaksk/cetakrtf',
			type: 'POST',
			data: {id: id, logo: logo},
			success : function(data) {
				if (data=="notfound") {
					alert('tidak ditemukan');
				} else {
					//window.open('cetaksk/cetakrtf?id='+id+'&logo='+logo);
					window.location.assign('cetaksk/cetakrtf?id='+id+'&logo='+logo);
				}
			}
		});

		

		
	});
</script>
