  <table width="100%">
    <tr>
      <td width="34%">
        DINAS PAJAK DAERAH DAN 
        PENGELOLAAN KEUANGAN DAERAH
      </td>
      <td width="33%">
       DAFTAR INDUK WAJIB PAJAK 
     </td>
     <td width="10%">
      HALAMAN 1
    </td>
  </tr>
  <tr>
    <td></td>   
  </tr>
</table>
<table width="100%"  class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
  <thead>  
    <tr>
      <th class="col-md-1">No</th>
      <th class="col-md-3">NPWPD</th>
      <th class="col-md-4">NAMA</th>
      <th class="col-md-5">ALAMAT</th>
      <th class="col-md-3">BBU</th>
    </tr>
    <th class="col-md-1">=====</th>
        <th class="col-md-3">========</th>
        <th class="col-md-4">======================</th>
        <th class="col-md-5">======================</th>
        <th class="col-md-2">======</th>
    <tr>
  </thead>
  <tbody>
  <?php $no = 1; foreach ($data['cetak'] as $rowtap): ?>
      <tr>
        <td align="center"><?= $no++ ?></td>
       <td align="center"><?= $rowtap['TBLDAFTAR_JENISPENDAPATAN'] ?>.<?= $rowtap['TBLDAFTAR_GOLONGAN'] ?>.<?= $rowtap['TBLDAFTAR_NOPOK'] ?>.<?= $rowtap['TBLKECAMATAN_IDBADANUSAHA'] ?>.<?= $rowtap['TBLKELURAHAN_IDBADANUSAHA'] ?></td> <!-- N.P.W.P.D --> <!-- TBLKECAMATAN_IDBADANUSAHA Dan TBLKELURAHAN_IDBADANUSAHA -->
      <td align="center"><?= $rowtap['TBLDAFTAR_BADANUSAHANAMA'] ?></td> <!-- NAMA -->
      <td align="center"><?= $rowtap['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td> <!-- ALAMAT -->
      <td align="center"><?= $rowtap['REFBADANUSAHA_IDBADANUSAHA'] ?></td> <!-- BBU -->
      </tr>
  <?php endforeach ?>
  </tbody>
</table>

<br>

<table width="50%" id="dt_basic">
  <thead>  
    <tr>
      <td class="col-md-4">
        MENGETAHUI <br>
        KEPALA BIDANG PAJAK DAERAH
      </td>
      
      <br>

      <td>
        <td width="33%">
          TANGGAL : <br>
          PETUGAS : <br>
        </td>
      </td>


    </tr>
  </thead>
  <tbody>
      <tr>

        <td>
          <br>
          <br>
          <br>
          DRS. WISNU BUDI I, MSI
          <br>
          -----------------------------------
          <br>
          NIP. 197007271996031003
        </td>

        <td></td>

        <td>
          <br>
          <br>
          <br>
          
          <br>
          -----------------------------------
          <br>
          
        </td>

      </tr>
  </tbody>
</table>