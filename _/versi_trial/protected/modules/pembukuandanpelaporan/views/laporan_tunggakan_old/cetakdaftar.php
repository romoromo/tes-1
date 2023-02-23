<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
    <thead>
        <tr>
            <th >No.</th>
            <th >Nama WP</th>
            <th >Alamat </th>
            <th >Ket. Reklame</th>
            <th >NPWPD</th>
            <th >Tahun</th>
            <th >Lokasi</th>
            <th >No. SKPD</th>
            <th >BPT</th>
            <th >Lokasi Pemasangan</th>
            <th >Ketetapan Pajak</th>
            <th >No. SSPD</th>
            <th >Rp. Setor</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach  ($data['cari'] as $row): ?>
        <tr>
            <td><?=$no++;?></td>
            <td><?=$row['TBLDAFTAR_BADANUSAHANAMA'];?></td><!--BNAMA-->
            <td><?=$row['TBLDAFTAR_BADANUSAHAALAMAT'];?></td><!--BALAMAT-->
            <td><?=$row['TBLDAFTREKLAME_KETERANGAN1'];?></td><!--KTRE1-->
            <td><?=$row['TBLDAFTAR_NOPOK'];?></td> <!-- NOPOK -->
            <td><?=$row['TBLPENDATAAN_THNPAJAK'] +2000;?></td> <!--THN PAJAK-->
            <td><?=$row['TBLPENDATAAN_PAJAKKE'];?></td> <!--KE-->
            <td><?=$row['TBLDAFTREKLAME_NOMORSKPD'];?></td> <!-- No SKPD -->
            <td><?=$row['TBLDAFTREKLAME_TGLBATASSKPD'];?>/<?=$row['TBLDAFTREKLAME_BLNBATASSKPD'];?>/<?=$row['TBLDAFTREKLAME_THNBATASSKPD'] +2000 ;?></td> <!-- BPT -->
            <td><?=$row['TBLDAFTREKLAME_KETERANGAN2'];?><!-- LOKASI -->
            <td>Rp. <?=LokalIndonesia::ribuan($row['TBLDAFTREKLAME_PAJAKSKPD']);?></td> <!-- KETETAPAN -->
            <td><?=$row['TBLDAFTREKLAME_REGSETOR'];?></td> <!-- NOSSP -->
            <td>Rp. <?= LokalIndonesia::ribuan($row['TBLDAFTREKLAME_RUPIAHSETOR']);?></td> <!-- RPSSP -->
        </tr>
    <?php endforeach ?>
</tbody>
</table>

<script type="text/javascript">
    jQuery(document).ready(function($) {
         reloadDT('dt_basic');
         $('.cbx_tetapkan').prop("checked" , false);
    });

    /*jQuery(document).ready(function($) {
        var elm = $("input[name='nopokPajak']");
        cekAll(elm);
    });*/

function cekAll(elemen) {
    $('.cbx_tetapkan').prop("checked" , elemen.checked);
}

$(".cbx_tetapkan").click(function(event) {
    if (!$(event.target).prop('checked')) {
        window.id_eksepsi += ','+$(event.target).val();
        // cari();
    }

});
</script>