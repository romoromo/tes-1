<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
<thead>  
  <tr>
    <td align="left">BADAN PENGELOLAAN KEUANGAN DAN</td>
    <td align="left">DAFTAR JAMINAN BONGKAR</td>
  </tr>
</thead>
<tbody>
  <tr>
    <td align="left">ASET DAERAH</td>
    <td align="left">TAHUN: <?php echo $THP = $_REQUEST['THP']; ?> BULAN: <?php echo $BLP = $_REQUEST['BLP']; ?> </td>
  </tr>
  <tr>
    <td></td>
    <td>
        TGL.ENTRY SPT:&nbsp;//
    </td>
  </tr>
</tbody>
</table>

<br>
<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
  <thead>
      <tr>
          <td>
              -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
          </td>
      </tr>
  </thead>
</table>

<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
 <style type="text/css" >
</style>
<thead>  
  <tr>
    <th align="center">No</th>
    <th align="center">Nopok</th>
    <th align="center" width="10%">Nama Wajib Pajak</th>
    <th align="center" width="10%">Lokasi</th>
    <th align="center">Jrek</th>
    <th align="center" width="5%">No.Jabong</th>
    <th align="center">Panjang</th>
    <th align="center">Lebar</th>
    <th align="center">Index Listrik</th>
    <th align="center">Hg.Dasar</th>
    <th align="center">Jabong</th>
</tr>
</thead>
<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
  <thead>
      <tr>
          <td>
              -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
          </td>
      </tr>
  </thead>
</table>
<table width="100%" border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
<tbody>
    <?php $no=1; foreach ($data['list'] as $list) :?>                  
    <tr>
        <td><div align="center"><?php echo $no++; ?></div></td>
        <td><div align="center"><?php echo $list['TBLDAFTAR_JENISPENDAPATAN'] ?>.<?php echo $list['TBLDAFTAR_GOLONGAN'] ?>.<?php echo $list['TBLDAFTAR_NOPOK'] ?>.<?php echo $list['TBLKECAMATAN_IDBADANUSAHA'] ?>.<?php echo $list['TBLKELURAHAN_IDBADANUSAHA'] ?> <br> <?php echo $list['TBLDAFTAR_BADANUSAHAALAMAT'] ?></div></td> <!-- Nopok -->
        <td><div align="center"><?php echo $list['TBLDAFTAR_BADANUSAHANAMA'] ?> <br> <?php echo $list['TBLDAFTREKLAME_KETERANGAN1'] ?></div></td> <!-- Nama Wajib Pajak -->
        <td><div align="center"><?php echo $list['TBLPENDATAAN_PAJAKKE'] ?> <br> <?php echo $list['TBLDAFTREKLAME_KETERANGAN2'] ?></div> </td> <!-- Lokasi -->
        <td><div align="center"><?php echo $list['TBLDAFTREKLAME_JMLHREKLAME']?></div> </td> <!-- Jrek -->
        <td><div align="center"><?php echo $list['TBLDAFTREKLAME_NOJABONG'] ?></div> </td> <!-- No.Jabong -->
        <td><div align="center"><?php echo $list['TBLDAFTREKLAME_PANJANG'] ?></div> </td> <!-- Panjang -->
        <td><div align="center"><?php echo $list['TBLDAFTREKLAME_LEBAR'] ?></div> </td> <!-- Lebar -->
        <td><div align="center"><?php echo $list['REFJABONGREKLAME_IDXKESULITAN'] ?></div> </td> <!-- Index -->
        <td><div align="center"><?php echo $list['TBLDAFTREKLAME_LISTRIKJABONG'] ?></div> </td> <!-- Listrik -->
        <td><div align="center"><?php echo $list['TBLDAFTREKLAME_HRGDASARJABONG'] ?></div> </td> <!-- Hg.Dasar -->
        <td><div align="center"><?php echo $list['TBLDAFTREKLAME_JUMLAHJABONG'] ?></div> </td> <!-- Jabong -->
    </tr>
<?php endforeach ?>
</tbody>
</table>