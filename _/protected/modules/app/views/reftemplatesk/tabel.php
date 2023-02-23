 <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
  <thead>
    <tr>
      <th width="3%"><div align="center">No</div></th>
      <th  width="45%" data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i> Nama Izin </div></th>
      <th  width="45%" data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Nama Permohonan</div></th>
      <th  width="45%" data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Template</div></th>
      <th  width="45%" data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Tabel</div></th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
  <?php $no=1; foreach ($datatemplatesk as $templatesk): ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $templatesk['tblizin_nama']; ?></td>
      <td><?php echo $templatesk['tblizinpermohonan_nama']; ?></td>
      <td><a href="file/temp_draft_sk/<?php echo $templatesk['tblskizin_sktemplate']; ?>"><?php echo $templatesk['tblskizin_sktemplate']; ?></a></td>
      <td><?php echo $templatesk['tblskizin_tabelsk']; ?></td>
      <td>
       <button onclick="edit(<?php echo $templatesk['tblskizin_id']; ?>)" type="button" class="btn btn-labeled btn-success btn-sm" style="width:65px; height:30px;"> 		
    		<i class="fa fa-edit"></i>
    		Edit
    	</button>

    	<button  onclick="hapus(<?php echo $templatesk['tblskizin_id']; ?>)" type='button' class='btn btn-labeled btn-danger btn-sm' style="width:65px; height:30px;">
    		<i class="fa fa-trash-o"></i>
    		Hapus
    	</button>
    </td>
    </tr>
   <?php endforeach ?>

  </tbody>
</table>

<script type="text/javascript">$(document).ready(function() {
	reloadDT('dt_basic');
});</script>