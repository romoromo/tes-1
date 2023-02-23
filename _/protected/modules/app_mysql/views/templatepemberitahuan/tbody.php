<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr>
			<th width="6%"><div align="center">No</div></th>
			<th width="45%" data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Jenis Izin </div></th>
			<th width="5%" data-hide="phone,tablet"><i class=" txt-color-blue hidden-md hidden-sm hidden-xs"></i>Ditampilkan ?</th>
			<th width="9%" data-hide="phone"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Nama File Draft</div></th>
			<th width="9%" data-hide="phone"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Nama File </div></th>
			<th width="13%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>

	<?php $no=1; foreach ($datatemplatepemberitahuan as $templatepemberitahuan): ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $templatepemberitahuan['tblizin_nama']; ?></td>
			<td><?php echo $templatepemberitahuan['tbltemplatepemberitahuan_isaktif']=='T' ? 'Ya' : 'Tidak'; ?></td>
			<td><a href="file/temp_surat_pemberitahuan/<?php echo $templatepemberitahuan['tbltemplatepemberitahuan_namafile']; ?>"><?php echo $templatepemberitahuan['tbltemplatepemberitahuan_namafile']; ?></a></td>
			<td><a href="file/temp_surat_pemberitahuan/<?php echo $templatepemberitahuan['tbltemplatepemberitahuan_namafilejadi']; ?>"><?php echo $templatepemberitahuan['tbltemplatepemberitahuan_namafilejadi']; ?></a></td>
			<td>
					<button onclick="edit(<?php echo $templatepemberitahuan['tbltemplatepemberitahuan_id']; ?>)" type="button" class="btn btn-labeled btn-success btn-sm" style="width:65px; height:30px;">

			    			<i class="fa fa-edit"></i>
			    		Edit
			    	</button>

			    	<button  onclick="hapus(<?php echo $templatepemberitahuan['tbltemplatepemberitahuan_id']; ?>)" type='button' class='btn btn-labeled btn-danger btn-sm' style="width:65px; height:30px;">

			    			<i class="fa fa-trash-o"></i>
			    		Hapus
			    	</button></td>
		</tr>
	<?php endforeach ?>

	</tbody>
</table>
<script type="text/javascript">$(document).ready(function() {
	reloadDT('dt_basic');
});</script>