<table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
    <thead>
        <tr>
           <th width="10%" data-hide="phone" >
                <div class="center" >
                    <label class="checkbox">
                        <input type="checkbox" name="cbx-all" onclick="cekAll(this)">
                        <i></i> All
                    </label>
                </div>
            </th>
            <th >Nopok</th>
            <th >Nama</th>
            <th >Alamat</th>
            <th >Tahun Ke 1</th>
            <th >Tahun Ke 2</th>
            <th >Tahun Ke 3</th>
            <th >Tahun Ke 4</th>
            <th >Tahun Ke 5</th>
            <th >Total Tunggakan</th>
        </tr>
    </thead>
    <tbody style="text-align: center;">
     <?php $no = 1; foreach ($data['cari'] as $row): ?>
       <tr>
        <td>
            <label class="checkbox">
                <input class="cbx_tetapkan" value="<?php echo $row['TBLDAFTAR_NOPOK'] ?>" name="nopokPajak" type="checkbox">
                <i></i>
            </label>
        </td>
        <td><?=$row['TBLDAFTAR_NOPOK'];?></td> <!-- Nopok -->
        <td><?=$row['TBLDAFTAR_BADANUSAHANAMA'];?></td> <!-- Nama -->
        <td><?=$row['TBLDAFTAR_BADANUSAHAALAMAT'];?></td> <!-- Alamat -->
        <td>Rp. <?= LokalIndonesia::ribuan($row['TUNGGAKAN1']);?></td> <!-- Th1 -->
        <td>Rp. <?= LokalIndonesia::ribuan($row['TUNGGAKAN2']);?></td> <!-- Th2 -->
        <td>Rp. <?= LokalIndonesia::ribuan($row['TUNGGAKAN3']);?></td> <!-- Th3 -->
        <td>Rp. <?= LokalIndonesia::ribuan($row['TUNGGAKAN4']);?></td> <!-- Th4 -->
        <td>Rp. <?= LokalIndonesia::ribuan($row['TUNGGAKAN5']);?></td> <!-- Th5 -->
        <td>Rp. <?= LokalIndonesia::ribuan($row['TOTAL']);?></td> <!-- Total -->
    </tr>
    <?php endforeach ?>
</tbody>
</table>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        // reloadDT('dt_basic');
    });

    /*jQuery(document).ready(function($) {
        var elm = $("input[name='nopokPajak']");
        cekAll(elm);
    });*/

    function cekAll(elemen) {
        $('.cbx_tetapkan').prop("checked" , elemen.checked);
    }
    
    $(".cbx_tetapkan").click(function(event) {
        $('#modal_detail').modal('show');
        if (!$(event.target).prop('checked')) {
            window.id_eksepsi += ','+$(event.target).val();
           
        }
    });
</script>