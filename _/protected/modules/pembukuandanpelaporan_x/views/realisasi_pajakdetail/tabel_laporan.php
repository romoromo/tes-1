<div class="widget-body-toolbar">
              <p></p><h5><center>LAPORAN REALISASI PENERIMAAN PAJAK DAERAH YANG DI KELOLA OLEH
              <br>DINAS PAJAK DAERAH DAN PENGELOLAAN KEUANGAN KOTA YOGYAKARTA <br> BULAN JUNI 2017</center></h5><p></p>         
            </div>
<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
<div>
<button class="btn btn-sm btn-default" onclick="cetak('html')">
    <i class="fa fa-print"></i> Cetak Html
  </button>
  <button class="btn btn-sm btn-success" onclick="cetak('excel')">
    <i class="fa fa-table"></i> Cetak Excel
  </button>
  </div><br><hr>
  <thead>
  <?php $no=1;?>
    <tr bgcolor="#CCCCCC" align="center">
      <th rowspan="2" data-hide="phone">NO</th>
      <th rowspan="2" data-hide="phone">KODE REKENING</th>
      <th rowspan="2" data-hide="phone">URAIAN</th>
      <th rowspan="2" data-class="expand">ANGGARAN</th>
      <th colspan="3" data-hide="phone">REALISASI PENERIMAAN</th>
      <th rowspan="2" data-hide="phone">PROSEN</th>
    </tr>
    <tr>
      <td><b>Bulan ini</b></td>
      <td><b>S.d Bulan Lalu</b></td>
      <td><b>S.d Bulan Ini</b></td>
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
    </tr>
    <tr>
      <td colspan="3"><b>JUMLAH :</b></td>
      <td></td>                                                     
      <td>0</td>                                                     
      <td>0</td>                                                     
      <td>0</td>                                                     
      <td></td>                                                     
    </tr>
</tbody>
</table>

<script type="text/javascript">
  jQuery(document).ready(function() {
    reloadDT('dt_basic');
  });
</script>