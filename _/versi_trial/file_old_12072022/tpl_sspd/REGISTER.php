<style type="text/css">
<!--
.style22 {font-size: 10px}
-->
</style>
<div> <span class="style22">NPWPD &nbsp;&nbsp;   :
  <?= $data['register']['tblobyek_npwpd'] ?>
  <br>
  NO. REG &nbsp; :
  <?= $data['register']['tblsetoran_nomorsetor'] ?>
  <br>
  TGL. SET &nbsp;:
  <?= strtotime($data['register']['tblsetoran_tglsetor']) ? date( 'd-M-Y', strtotime($data['register']['tblsetoran_tglsetor']) ) : '' ?>
  <br>
JUML. BAY = RP.
<?= LokalIndonesia::ribuan( $data['register']['tblsetoran_totalsetor']-$data['register']['tblsetoran_bungasetor'], false, 0 ) ?>
 ,-</span><br/>
</div>