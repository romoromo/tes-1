<table width="100%" border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" >
    <thead>
        <tr>
            <th >NOPOK</th>
            <th >Nama </th>
            <th >Alamat</th>
            <th >Tahun Ke - 1</th>
            <th >Tahun Ke - 2</th>
            <th >Tahun Ke - 3</th>
            <th >Tahun Ke - 4</th>
            <th >Tahun Ke - 5</th>
            <th >Total Tunggakan</th>

        </tr>
    </thead>
    <tbody style="text-align: center;">
        <?php $no = 1; foreach ($data['cari'] as $row): ?>
        <tr> 
            <td><?=$row['TBLDAFTAR_NOPOK'];?></td> <!-- No Pok -->
            <td><?=$row['TBLDAFTAR_BADANUSAHANAMA'];?></td> <!-- Nama -->
            <td><?=$row['TBLDAFTAR_BADANUSAHAALAMAT'];?></td> <!-- Alamat -->
            <td><?= LokalIndonesia::ribuan($row['TUNGGAKAN1']);?></td> <!-- Th 1 -->
            <td><?= LokalIndonesia::ribuan($row['TUNGGAKAN2']);?></td> <!-- Th 2 -->
            <td><?= LokalIndonesia::ribuan($row['TUNGGAKAN3']);?></td> <!-- Th 3 -->
            <td><?= LokalIndonesia::ribuan($row['TUNGGAKAN4']);?></td> <!-- Th 4 -->
            <td><?= LokalIndonesia::ribuan($row['TUNGGAKAN5']);?></td> <!-- Th 5 -->
            <td>Rp.<?= LokalIndonesia::ribuan($row['TOTAL']);?></td> <!-- Total Tunggakan -->
        </tr>
    <?php endforeach ?>
</tbody>
</table>
<script type="text/javascript">
   jQuery(document).ready(function($) {
        // reloadDT('dt_pipeline');
        $('.cbx_tetapkan').prop("checked" , false);
    });
   
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