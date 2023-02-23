
<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basicc">
	<thead>
		<!-- <header>
			<span class="widget-icon"> <i class="fa fa-table"></i> </span>
			<h2>&nbsp;Data</h2>
		</header> -->
		<tr>
			
		 <th data-hide="phone"><div class="center"> NO</div></th>
			<th data-clas="phone"><div class="center"> NAMA OBYEK PAJAK</div></th>
			<th data-class="expand"><div class="center"> NPWPD</div></th>
			<th data-hide="phone"><div class="center"> PEMILIK</div></th>
			<th data-hide="phone"><div class="center"> TAHUN PAJAK</div></th>
			<th data-hide="phone"><div class="center"> BULAN PAJAK</div></th>
			<th data-hide="phone"><div class="center"> NPA</div></th>
			<th data-hide="phone"><div class="center"> VOLUME</div></th>
			<th data-hide="phone"><div class="center"> PAJAK</div></th>
			<th data-hide="phone, tablet, desktop"><div class=""> TGL ENTRI SPT</div></th>
			<th data-hide="phone"><div class="center"> AKSI</div></th>
		</thead>
		<tbody>
			<?php $no = 1; ($data['table']); foreach ($data['table'] as $row): ?>
			<tr>

				<td><?= $no ++; ?></td>
				<td><?= $row['TBLDAFTAR_BADANUSAHANAMA']; ?></td>
				<td><?= $row['TBLDAFTAR_JENISPENDAPATAN']; ?>.<?= $row['TBLDAFTAR_GOLONGAN']; ?>.<?= sprintf('%07d',$row['TBLDAFTAR_NOPOK']); ?>.<?= sprintf('%02d',$row['TBLKECAMATAN_IDBADANUSAHA']); ?>.<?= sprintf('%02d',$row['TBLKELURAHAN_IDBADANUSAHA']); ?></td>
				
				<td><?= $row['TBLDAFTAR_PEMILIKNAMA']; ?></td>
				<td><?= $row['TBLPENDATAAN_THNPAJAK']; ?></td>
				<td><?= $row['TBLPENDATAAN_BLNPAJAK']; ?></td>
				<td><?= LokalIndonesia::ribuan($row['NPA']); ?></td>
				<td><?= $row['VOL']; ?></td>
				<td align="right"><?= LokalIndonesia::ribuan($row['PAJAK']); ?></td>
				<td><?= $row[$data['namatbl'].'_'.'TGLENTRI']; ?>-<?= $row[$data['namatbl'].'_'.'BLNENTRI']; ?>-<?= $row[$data['namatbl'].'_'.'THNENTRI']; ?></td>
				<td>
			
					<button type="button" onclick="grafik('npa', '<?= base64_encode(json_encode($row)) ?>')" class="btn btn-sm btn-default" style="margin-bottom: 4%;">
						<i class="fa fa-bar-chart-o"></i>&nbsp;Grafik NPA
					</button>
					<button type="button" class="btn btn-sm btn-default" style="margin-bottom: 4%;" onclick="grafik('volume', '<?= base64_encode(json_encode($row)) ?>')">
						<i class="fa fa-bar-chart-o"></i>&nbsp;Grafik Volume
					</button>
					<?php if ($row[$data['namatbl'] . '_STATUSDATA'] == '1'): ?>
					<button type="button" class="btn btn-sm btn-success" style="margin-bottom: 4%;" onclick="verifikasi('<?= base64_encode(json_encode($row)) ?>',this)">
						<i class="fa fa-share"></i>&nbsp;Verifikasi
					</button>
					<button type="button" class="btn btn-sm btn-danger" style="margin-bottom: 4%;" onclick="kembalikan('<?= base64_encode(json_encode($row)) ?>')">
						<i class="fa fa-mail-reply"></i>&nbsp;Kembalikan
					</button>
					<?php endif ?>
					<!-- <a class="btn btn-sm btn-success" "fa fa-save" onclick="hapus()">
						Verifikasi
					</a>
					<a class="btn btn-sm btn-danger"  onclick="hapus()">
						Kembalikan Ke Penadfatarn
					</a> -->
				</td> <!-- tambah tombol aksi disini-->
				
			</tr>
		<?php endforeach ?>
	</tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="modal_grafik" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-lg" style="max-width: 70%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Grafik
				</h4>
			</div>
			
			<div id="viewpopup" class="modal-body no-padding" >
				
				<div id="container"></div>
				
			</div>
			<div class="modal-footer">
				<a href="javascript:void(0);" class="btn btn-default " data-dismiss="modal"><i class="fa fa-ban"></i> Tutup</a>
				<!-- <a href="javascript:void(0);" onclick="simpan()" data-dismiss="modal" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a> -->
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="grfk2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-lg" style="max-width: 70%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Grafik
				</h4>
			</div>
			
			<div id="viewpopup" class="modal-body no-padding" >
				
				<div id="container1"></div>
				
			</div>
			<div class="modal-footer">
				<a href="javascript:void(0);" class="btn btn-default " data-dismiss="modal"><i class="fa fa-ban"></i> Tutup</a>
				<!-- <a href="javascript:void(0);" onclick="simpan()" data-dismiss="modal" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a> -->
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_basicc',false);
	});

	function grafik(grafik, param) {
		window.cmd = 'grafik1';
		var param = {
			grafik: grafik,
			data: param,
		}
		$.ajax({
			url: 'penetapan/cetak_kartudata_nonreklame/grafik',
			type: 'POST',
			data: $("#form_sumber_pajak").serialize()+'&'+$.param(param),
		})
		.done(function(respon) {
			console.log("success");
			$('#container').html(respon);
			$('#modal_grafik').modal('show');
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}
	
	function verifikasi(jsondata, elm) {
		$.SmartMessageBox({
			title : "Konfirmasi",
			content : "Apakah anda yakin akan memverifikasi Data ini?",
			buttons : '[Tidak][Ya]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				var param = {
					data: jsondata,
				}
				$.ajax({
					url: 'penetapan/cetak_kartudata_nonreklame/verifikasi',
					type: 'POST',
					dataType: 'json',
					data: $("#form_sumber_pajak").serialize()+'&'+$.param(param),
				})
				.done(function(respon) {
					console.log("success");
					if (respon.status == 'success') {
						notifikasi('Berhasil', 'Sudah diverifikasi', 'success', 1, 0);
						cari()
					}
					$(elm).hide();
				})
				.fail(function(jqXHR, exception) {
					handelErr(jqXHR, exception)
				})
				.always(function() {
					console.log("complete");
				});
			}
		});
	}
	
	function kembalikan(jsondata) {
		$.SmartMessageBox({
			title : "Konfirmasi",
			content : "Apakah anda yakin akan mengembalikan Data ini?",
			buttons : '[Tidak][Ya]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				var param = {
					data: jsondata,
				}
				$.ajax({
					url: 'penetapan/cetak_kartudata_nonreklame/kembalikan',
					type: 'POST',
					dataType: 'json',
					data: $("#form_sumber_pajak").serialize()+'&'+$.param(param),
				})
				.done(function(respon) {
					console.log("success");
					if (respon.status == 'success') {
						notifikasi('Berhasil', 'Sudah dikembalikan', 'success', 1, 0);
					}
				})
				.fail(function(jqXHR, exception) {
					handelErr(jqXHR, exception)
				})
				.always(function() {
					console.log("complete");
				});
			}
		});
	}

</script>
<!-- <fieldset>
<header></header>
	<div class="row">
		<section class="col col-md-1">
			<p>J_SKPD</p>
		</section>
		<section class="col col-md-3">
			<label class="input">
				<input type="nopok" name="" id="nopok">
			</label>
		</section>
	</div>
</fieldset> -->


