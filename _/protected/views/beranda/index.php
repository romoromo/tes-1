<!-- widget grid -->
<?php
define('ASSETS_URL', 'themes/smartadmin');
 Yii::import('ext.LokalIndonesia'); ?>
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">
		
		<?php foreach ($data_pengaduan as $key_pengaduan): ?>
			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-6 col-md-6 col-lg-4">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-red" id="wid-id-<?php echo $key_pengaduan['tblpengaduan_id']; ?>" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-deletebutton="false">

					<header>
						<h2><strong><?php echo $key_pengaduan['tblpengaduan_nama']; ?></strong></h2>				
						<div class="widget-toolbar"> 

							<ul class="pagination pagination-xs">
								<li><?php echo LokalIndonesia::TanggalUmum($key_pengaduan['tblpengaduan_tanggal']); ?></li>
							</ul>
						</div>
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

							<p class="alert alert-default" style="margin-bottom: 0px;"> <?php echo $key_pengaduan['tblpengaduan_komentar']; ?></p>

							<div class="widget-footer">

								<button class="btn btn-sm btn-primary" type="button" onclick="tindak_lanjut(<?php echo $key_pengaduan['tblpengaduan_id']; ?>)">
									Tindak Lanjut
								</button>		

								<button class="btn btn-sm btn-success" type="button" onclick="komentar(<?php echo $key_pengaduan['tblpengaduan_id']; ?>)">
									Komentar
								</button>	

							</div>
							<div style="width: 100%;margin-left: -13px;">
								<div class="row" id="tindaklanjutform_<?php echo $key_pengaduan['tblpengaduan_id']; ?>" style="height:290px; overflow-y: scroll;display:none">
									<div class="tabbable tabs-below">
										<div class="tab-content padding-10">
											<div class="tab-pane active">

												<div class="chat-body no-padding profile-message" style="margin-top: -7px;">
													<ul>
														<span class="label label-primary" style="margin-left: 20px;font-size: 12px;">Tindak Lanjut</span>
														<?php $data_tindaklanjut = TindakLanjut::model()->findAll('tblpengaduan_id=:ide AND tbltindaklanjut_ispublikasi=:stat', array(':ide'=>$key_pengaduan['tblpengaduan_id'], ':stat'=>'T')); ?>
														<?php foreach ($data_tindaklanjut as $key_tindaklanjut): ?>
														<li class="message" style="background-color: #F7F7F7;padding: 8px;">
															<img src="/themes/smartadmin/img/administrator.png" style="width: 20%;" class="online">
															<span class="message-text" style="margin-bottom: 13px;"> <a href="javascript:void(0);" class="username"> Superadmin </a>
																<?php echo $key_tindaklanjut['tbltindaklanjut_isi']; ?>
																<p>pada <?php echo LokalIndonesia::TanggalUmum($key_tindaklanjut['tbltindaklanjut_tanggal']); ?></p>
															</span>
														</li>
														<?php endforeach ?>
													</ul>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div style="width: 100%;margin-left: -13px;">
								<div class="row" id="komentarform_<?php echo $key_pengaduan['tblpengaduan_id']; ?>" style="height:290px; overflow-y: scroll;display:none">
									<div class="tabbable tabs-below">
										<div class="tab-content padding-10">
											<div class="tab-pane active">

												<div class="chat-body no-padding profile-message" style="margin-top: -7px;">
													<ul>
														<span class="label label-success" style="margin-left: 20px;font-size: 12px;">Komentar</span>
														<?php $data_komentar = Komentar::model()->findAll('tblpengaduan_id=:kom AND tblkomentar_isaktif=:stat', array(':kom'=>$key_pengaduan['tblpengaduan_id'], ':stat'=>'T')); ?>
														<?php foreach ($data_komentar as $key_komentar): ?>
														<li class="message" style="background-color: #F7F7F7;padding: 8px;">
															<img src="/themes/smartadmin/img/administrator.png" style="width: 20%;" class="online">
															<span class="message-text" style="margin-bottom: 13px;"> <a href="javascript:void(0);" class="username"><?php echo $key_komentar['tblkomentar_nama']; ?></a>
																<?php echo $key_komentar['tblkomentar_isi']; ?>
																<p>pada <?php echo LokalIndonesia::TanggalUmum($key_komentar['tblkomentar_tanggal']); ?></p>
															</span>
														</li>
														<?php endforeach ?>
													</ul>
												</div>
											</div>
										</div>
										<div class="chat-footer" style="margin: 6px 0px 0px 26px;">

											<!-- CHAT TEXTAREA -->
											<div class="textarea-div">

												<div class="typearea">
													<textarea placeholder="Tulis komentar..." id="tulisKomentar-<?php echo $key_pengaduan['tblpengaduan_id']; ?>" name="tulisKomentar" class="custom-scroll"></textarea>
												</div>

											</div>

											<!-- CHAT REPLY/SEND -->
											<span class="textarea-controls">
												<button onclick="kirimKomentar(<?php echo $key_pengaduan['tblpengaduan_id']; ?>)" class="btn btn-sm btn-primary pull-right">
													Kirim
												</button>
											</span>

										</div>
									</div>
								<!-- <fieldset>
									<section>
										<label class="label">Textarea</label>
										<label class="textarea state-error">
											<textarea rows="2"></textarea>
										</label>
									</section>
								</fieldset> -->

								</div>
								
							</div>

									<!-- <div style="width: 100%;margin-left: -13px;">
										<div class="row" id="s2" style="height:290px; overflow-y: scroll;display:none">
											<div class="tabbable tabs-below">
												<div class="tab-content padding-10">
													<div class="tab-pane active">

														<div class="chat-body no-padding profile-message" style="margin-top: -7px;">
															<ul>
																<span class="label label-warning" style="margin-left: 20px;font-size: 12px;">Komentar</span>
																<li class="message" style="background-color: #F7F7F7;padding: 8px;">
																	<img src="/themes/smartadmin/img/sunny.png" class="online">
																	<span class="message-text" style="margin-bottom: 13px;"> <a href="javascript:void(0);" class="username">Badan Perencanaan Pembangunan Daerah</a>
																		Test Komentar
																		<p>pada 2015-10-29 13:11:52</p>
																	</li>
																	<li class="message" style="background-color: #F7F7F7;padding: 8px;margin-top: 4px;">
																		<img src="/themes/smartadmin/img/sunny.png" class="online">
																		<span class="message-text" style="margin-bottom: 13px;"> <a href="javascript:void(0);" class="username">Superadmin</a>
																			Komentar ini mengomentari komentar yg diatasnya komentar ini #yodawg
																			<p>pada 2015-10-29 09:15:08 </p>
																		</li>
																	</ul>
																</div>

															</div>
														</div>
													</div>

												</div>
											</div> -->


											<div class="widget-footer">
												<span style="float: left;"><i class="fa fa-folder-open"></i> Sosial Masyarakat	</span>
												<div style="display:none" onclick="kembali(<?php echo $key_pengaduan['tblpengaduan_id']; ?>)" id="back_<?php echo $key_pengaduan['tblpengaduan_id']; ?>">
													<a href="javascript:void(0);" rel="tooltip" title="" data-placement="bottom" data-original-title="Kembali">
														<span class="label label-info"><i class="fa fa-angle-double-up fa-lg" style="font-size: 16px;"></i> Kembali</span>
													</a>
												</div>
												<small>
													<span class="label label-success"><i class="fa fa-circle"></i></span>
													<span class="label label-warning"><i class="fa fa-circle"></i></span>
													<span class="label label-primary"><i class="fa fa-circle"></i></span>
													<span class="label label-danger"><i class="fa fa-circle"></i></span>
													<span class="label label-default"><i class="fa fa-circle"></i></span>
												</small>
											</div>

										</div>
										<!-- end widget content -->

									</div>
									<!-- end widget div -->

								</div>
								<!-- end widget -->
							</article>

						<?php endforeach ?>
					</div>
				</section>




				<script type="text/javascript">

					pageSetUp();


	// pagefunction	
	var pagefunction = function() {
		//console.log("cleared");

		/* BASIC ;*/
		var responsiveHelper_dt_basic = undefined;
		var responsiveHelper_datatable_fixed_column = undefined;
		var responsiveHelper_datatable_col_reorder = undefined;
		var responsiveHelper_datatable_tabletools = undefined;

		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};

		$('#dt_basic').dataTable({
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
			"t"+
			"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
			"autoWidth" : true,
			"bSort": false,
			"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_dt_basic) {
						responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_dt_basic.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_dt_basic.respond();
				}
			});

		/* END BASIC */

	};

	function tindak_lanjut (id) {
		$('#tindaklanjutform_'+id).show();
		$('#komentarform_'+id).hide();
		$('#back_'+id).show();
	}

	function komentar (id) {
		$('#komentarform_'+id).show();
		$('#tindaklanjutform_'+id).hide();
		$('#back_'+id).show();
	}

	function kembali (id) {
		$('#tindaklanjutform_'+id).hide();
		$('#komentarform_'+id).hide();
		$('#back_'+id).hide();
	}

	function kirimKomentar (id) {
		$.ajax({
			url: '../beranda/kirimKomentar',
			type: 'post',
			data: {
				id: id,
				komentar: $("#tulisKomentar-"+id).val()
			},
			success: function (respon) {
				if (respon=="success") {
					notifikasi('Berhasil', 'Komentar Berhasil Diajukan, menunggu verifikasi dari admin', 'success',1,0);
					$("#tulisKomentar-"+id).val("");
				} else {
					notifikasi('Gagal', 'Data gagal dihapus', 'failed',0,0);
				};
			}
		});
		
	}


	// load related plugins
	
	loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/jquery.dataTables.min.js", function(){
		loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.colVis.min.js", function(){
			loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.tableTools.min.js", function(){
				loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.bootstrap.min.js", function(){
					loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/datatables.responsive.min.js", pagefunction)
				});
			});
		});
	});


</script>
