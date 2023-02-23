<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
<div>
<button class="btn btn-sm btn-default" onclick="cetak('html')">
    <i class="fa fa-print"></i> Cetak Html
  </button>
  <button class="btn btn-sm btn-success" onclick="cetak('excel')">
    <i class="fa fa-table"></i> Cetak Excel
  </button>
  </div>
  <thead>
  <?php $no=1;?>
    <tr bgcolor="#CCCCCC" align="center">
      <th data-hide="phone">NO</th>
      <th data-hide="phone">PEN</th>
      <th data-hide="phone">PAD</th>
      <th data-class="expand">PJK</th>
      <th data-hide="phone">AYT</th>
      <th data-hide="phone">JEN</th>
      <th data-hide="phone">HARI_INI</th>
      <th data-hide="phone">SD_HARIINI</th>
      <th data-hide="phone">SD_HARILALU</th>
      <th data-hide="phone">NMREK</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $no++; ?></td>
      <td></td>        
      <td></td>        
      <td></td>        
      <td></td>        
      <td></td>        
      <td></td>        
      <td></td>        
      <td></td>        
      <td></td>        
    </tr>
</tbody>
</table>

<script type="text/javascript">
  jQuery(document).ready(function() {
    reloadDT('dt_basic');
  });
</script>