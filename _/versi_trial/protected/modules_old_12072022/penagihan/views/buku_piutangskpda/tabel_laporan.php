		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-color-teal" id="wid-id-3w4325efefee" 
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
				<div class="widget-body no-padding">
					<p class="alert alert-info"> 
						<button type="button" class="btn btn-default" onclick="cetak()">
							<i class="fa fa-print"></i> Cetak Piutang SKPDKB SKPDA
						</button>					
					</p>
					<table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
						<thead>
							<tr>
								<th class="smart-form">
								<div>
									<label class="checkbox">
										  <input checked="" type="checkbox" name="cbx-all" onclick="cekAll(this)">
										<i></i>
									</label>
								</div>
								</th>
								<th data-class="expand"><p align="center">Nopok</p></th>
								<th data-hide="phone"><p align="center">Nama</p></th>
								<th data-hide="phone"><p align="center">Alamat</p></th>
								<th data-hide="phone"><p align="center">Tahun Ke-1</p></th>
								<th data-hide="phone"><p align="center">Tahun Ke-2</p></th>
								<th data-hide="phone"><p align="center">Tahun Ke-3</p></th>
								<th data-hide="phone"><p align="center">Tahun Ke-4</p></th>
								<th data-hide="phone"><p align="center">Tahun Ke-5</p></th>
								<th data-hide="phone"><p align="center">Total Tunggakan</p></th>
							</tr>
						</thead>
						<tbody style="text-align: center;">
							<?php $no = 1; foreach ($data['cari'] as $row): ?>
							<tr>
								<td class="smart-form">
								<div>	
									<label class="checkbox">
										<input checked="" type="checkbox" class="cbx_tetapkan" value="<?php echo $row['TBLDAFTAR_NOPOK'] ?>" name="nopokPajak">
										<i></i>
									</label>
								</div>
								</td>
								<td><?=$row['TBLDAFTAR_NOPOK'];?></td>
								<td><?=$row['TBLDAFTAR_BADANUSAHANAMA'];?></td>
								<td><?=$row['TBLDAFTAR_BADANUSAHAALAMAT'];?></td>
								<td><?= LokalIndonesia::ribuan($row['TUNGGAKAN1']);?></td>
								<td><?= LokalIndonesia::ribuan($row['TUNGGAKAN2']);?></td>
								<td><?= LokalIndonesia::ribuan($row['TUNGGAKAN3']);?></td>
								<td><?= LokalIndonesia::ribuan($row['TUNGGAKAN4']);?></td>
								<td><?= LokalIndonesia::ribuan($row['TUNGGAKAN5']);?></td>
								<td><?= LokalIndonesia::ribuan($row['TOTAL']);?></td>
							</tr>
						<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<!-- end widget content -->

			</div>
			<!-- end widget div -->

		</div>
		<!-- end widget -->


<script type="text/javascript">
    jQuery(document).ready(function($) {
         // $('.cbx_tetapkan').prop("checked" , false);
    });
   

    function cekAll(elemen) {
        $('.cbx_tetapkan').prop("checked" , elemen.checked);
    }
    
    $(".cbx_tetapkan").click(function(event) {
        if (!$(event.target).prop('checked')) {
            window.id_eksepsi += ','+$(event.target).val();
         
        }
    });
</script>