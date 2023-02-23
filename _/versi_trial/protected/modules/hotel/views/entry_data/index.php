<?php define('ASSETS_URL',$data['theme_baseurl']); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-sm well-light bg-color-red txt-color-white">
            <h4><i class="fa fa-file fa-fw"></i> Enrty Data SPTPD Pajak Hotel</h4>
        </div>
    </div>
</div>

<section class="widget-grid">
    <div class="jarviswidget jarviswidget-color-teal" id="wid-id-7" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
                <!-- widget options:
                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                data-widget-colorbutton="false"
                data-widget-editbutton="false"
                data-widget-togglebutton="false"
                data-widget-deletebutton="false"
                data-widget-fullscreenbutton="false"
                data-widget-custombutton="false"
                data-widget-collapsed="true"
                data-widget-sortable="false"

            -->
            <header>
                <ul class="nav nav-tabs pull-left in">

                    <li class="active">

                        <a data-toggle="tab" href="#hr1">  Entry Pajak Hotel  </a>

                    </li>

                    <li>
                        <a data-toggle="tab" href="#hr2"> Entry Obyek Pajak</a>
                    </li>

                </ul>
            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body">

                    <div class="tab-content">
                        <div class="tab-pane active" id="hr1">
                            <form class="smart-form" id="form_sptpd">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center" rowspan="2">
                                                                <h4>PEMERINTAH KOTA YOGYAKARTA <br>
                                                                <b>BADAN PENGELOLAAN KEUANGAN <br>DAN ASET DAERAH</h4></b>
                                                                <p>Jl. Kenari No. 56 Yogyakarta Kode Pos : 55165 <br>Telp. (0274) 548519, 562835, 515865, 56282<br> Fax. (0274) 548519<br>
                                                                Email : bpkad@jogjakota.go.id HOTLINE SMS : 08122780001 <br> HOTLINE EMAIL : upik@jogjakota.go.id<br>WEBSITE : www.jogjakota.go.id</p>
                                                            </td>
                                                            <td class="text-center" rowspan="2">
                                                                <h3>SURAT PEMBERITAHUAN <br>PAJAK DAERAH <br>(SPTPD)<br><br><br>PAJAK HOTEL</h3>
                                                            </td>
                                                            <td>
                                                                <div class="row">
                                                                    <section class="col col-md-4"> Nomor </section>
                                                                    <section class="col col-md-8"> 
                                                                        <label class="input">
                                                                            <input type="text" name="tpajakhotel_nomor" id="tpajakhotel_nomor">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-4"> Masa Pajak </section>
                                                                    <section class="col col-md-8"> 
                                                                        <label class="input">
                                                                            <input type="text" name="tpajakhotel_mspajak" id="tpajakhotel_mspajak">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-4"> Tahun </section>
                                                                    <section class="col col-md-8"> 
                                                                        <label class="select">
                                                                            <select name="gender" id="tpajakhotel_tahunpajak" name="tpajakhotel_tahunpajak">
                                                                                <option value="" selected="" disabled="">== Silahkan Pilih ==</option>
                                                                                <option value="2014">2014</option>
                                                                                <option value="2015">2015</option>
                                                                                <option value="2016">2016</option>
                                                                                <option value="2017">2017</option>
                                                                                <option value="2018">2018</option>
                                                                                <option value="2019">2019</option>
                                                                                <option value="2020">2020</option>
                                                                                <option value="2021">2021</option>
                                                                            </select> <i></i> 
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                               <div class="row">
                                                                    <section class="col col-md-4">Tgl diterima BPKAD</section>
                                                                    <section class="col col-md-8"> 
                                                                        <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                                            <input type="text" name="tpajakhotel_tglditerima" id="tpajakhotel_tglditerima" class="datepicker " data-dateformat="dd-mm-yy">
                                                                        </label>
                                                                    </section>
                                                                </div> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <section class="col col-md-12">
                                                                    Perhatian :
                                                                    <ol>
                                                                        <li>Baca petunjuk pengisian</li>
                                                                        <li>Harap diisi dalam rangkap 2 (dua) ditulis dengan huruf cetak</li>
                                                                        <li>Setelah diisi dan ditanda tangani, harap diserahkan kembali kepada badan pengelolaan keuangan dan aset daerah kota yogyakarta paling lambat 10 hari setelah masa pajak berakhir disertai dengan pembanyaran</li>
                                                                        <li>Keterambatan penyerahan SPTPD sebagaimana dimaksudkan angka 3 (tiga) akan dilakukan penetapan secara jabatan dan atau sanksi sesuai peraturan daerah yang berlaku</li>
                                                                    </ol>
                                                                </section>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>A. NPWPD</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="input">
                                                                            <input type="text" name="tnpwpddaftar_npwpd" id="tnpwpddaftar_npwpd" data-mask="99-9999999-99-99" class="invalid" onchange="getdata(this.value)">
                                                                            <input type="hidden" type="text" name="tnpwpddaftar_id" id="tnpwpddaftar_id">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>B. Nama Wajib Pajak</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="input">
                                                                            <input type="text" name="nama_wajib_pajak" id="nama_wajib_pajak">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>C. Nama Usaha</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label for="address" class="input">
                                                                            <input type="text" name="nama_usaha" id="nama_usaha">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>D. Alamat tempat usaha</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="textarea">                                        
                                                                            <textarea rows="3" name="alamat_usaha" id="alamat_usaha"></textarea> 
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>E. Kecamatan</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="select"> 
                                                                            <select class="select2" id="wp_kecamatan" name="wp_kecamatan">
                                                                                <option selected="" disabled="">== Silahkan Pilih ==</option>
                                                                                <?php //foreach ($data['kecamatan'] as $r_kecamatan): ?>
                                                                                <option value="<?php //echo $r_kecamatan['refkecamatan_id']; ?>"><?php //echo $r_kecamatan['refkecamatan_nama']; ?></option>
                                                                                <?php //endforeach ?>
                                                                            </select>
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>Kelurahan</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="select"> 
                                                                            <select class="select2" id="wp_kelurahan" name="wp_kelurahan">
                                                                                <option selected="" disabled="">== Silahkan Pilih ==</option>
                                                                                <?php // foreach ($data['kalurahan'] as $r_kelurahan): ?>
                                                                                <option value="<?php //echo $r_kelurahan['refkelurahan_id']; ?>"><?php //echo $r_kelurahan['refkelurahan_nama']; ?></option>
                                                                                <?php //endforeach ?>
                                                                            </select>
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>F. Telephone</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                                                            <input type="text" name="wp_telepon" class="valid" id="wp_telepon">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>G. Perubahan Identitas</b></section>
                                                                    <section class="col col-md-8">
                                                                        <span class="onoffswitch">
                                                                            <input type="checkbox" class="onoffswitch-checkbox" id="wp_isperubahanidentitas" name="wp_isperubahanidentitas">
                                                                            <label class="onoffswitch-label" for="wp_isperubahanidentitas"> 
                                                                                <span class="onoffswitch-inner" data-swchon-text="Ada" data-swchoff-text="Tidak"></span> 
                                                                                <span class="onoffswitch-switch"></span>
                                                                            </label> 
                                                                        </span>
                                                                    </section>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                         <tr>
                                                            <td style="width: 200px;"><b>H. Dasar Pengenaan Pajak</b></td>
                                                            <td style="width: 500px;">
                                                                <p align="center">OMZET PENJUALAN</p>
                                                            </td>
                                                            <td style="width: 100px;">
                                                                <p align="center">Jumlah (Rp)</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="6"></td>
                                                            <td>1. Kamar Hotel</td>
                                                            <td>
                                                                <label for="address" class="input">
                                                                    <input type="text" name="omset_kamarhotel" id="omset_kamarhotel">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2. Fasilitas Penunjang</td>
                                                            <td>
                                                                <label for="address" class="input">
                                                                    <input type="text" name="omset_fasilitaspenunjang" id="omset_fasilitaspenunjang">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3. Kamar Kos</td>
                                                            <td>
                                                                <label for="address" class="input">
                                                                    <input type="text" name="omset_kamarkos" id="omset_kamarkos">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="row">
                                                                    <section class="col col-md-6"></section>
                                                                    <section class="col col-md-6">Jumlah</section>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <label for="address" class="input">
                                                                    <input type="text" name="omset_jumlah" id="omset_jumlah">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="row">
                                                                    <section class="col col-md-6"></section>
                                                                    <section class="col col-md-6">Service</section>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <label for="address" class="input">
                                                                    <input type="text" name="omset_servis" id="omset_servis">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="row">
                                                                    <section class="col col-md-6"></section>
                                                                    <section class="col col-md-6">Jumlah Total</section>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <label for="address" class="input">
                                                                    <input type="text" name="omset_jumlahtotal" id="omset_jumlahtotal">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>I. Pajak Terutang</b></td>
                                                            <td>Tarif Pajak  10 % (sepuluh persen)</td>
                                                            <td>
                                                                <label for="address" class="input">
                                                                    <input type="text" name="pajak_terutang" id="pajak_terutang">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>J. Pajak Yang telah Dibayarkan</b></td>
                                                            <td></td>
                                                            <td>
                                                                <label for="address" class="input">
                                                                    <input type="text" name="pajak_sudahdibayar" id="pajak_sudahdibayar">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>K. Yang Harus Dibayar</b></td>
                                                            <td>Lajur huruf i - huruf j</td>
                                                            <td>
                                                                <label for="address" class="input">
                                                                    <input type="text" name="pajak_yangharusdibayar" id="pajak_yangharusdibayar">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>L. Pernyataan Wajib Pajak Kuasanya</b></td>
                                                            <td> Dengan menyadarkan sepenuhnya akan akibatnya termasuk sanksi sesuai peraturan daerah yang berlaku, maka saya menyatakan data yang diisikan beserta lampiranya adalah yang sebenar - benarnya</td>
                                                             <th height="19" scope="row"><p>Yogyakarta,</p>
                                                                <p>&nbsp;</p>
                                                                <p align="center">(.................)</p>
                                                            </th>
                                                            <tr>
                                                            <th colspan="3"><p align="left">M. PEMBETULAN IDENTITAS</p></th>
                                                            </tr>
                                                        </tr>
                                                        <td colspan="3">
                                                               <div style="display: none;" id="ifadapembetulan">
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>1. NPWPD</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="input">
                                                                            <input type="text" name="wp2_npwpd" id="wp2_npwpd" data-mask="99-9999999-99-99" class="invalid">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>2. Nama Wajib Pajak</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="input">
                                                                            <input type="text" name="wp2_namawp" id="wp2_namawp">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>3. Nama Usaha</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label for="address" class="input">
                                                                            <input type="text" name="wp2_namausaha" id="wp2_namausaha">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>4. Alamat tempat usaha</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="textarea">                                        
                                                                            <textarea rows="3" name="wp2_alamatusaha" id="wp2_alamatusaha"></textarea> 
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>5. Kecamatan</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="select"> 
                                                                            <select class="select2" id="wp2_kecamatan" name="wp2_kecamatan">
                                                                                <option selected="" disabled="">== Silahkan Pilih ==</option>
                                                                                <?php //foreach ($data['kecamatan'] as $r_kecamatan2): ?>
                                                                                <option value="<?php //echo $r_kecamatan2['refkecamatan_id']; ?>"><?php //echo $r_kecamatan2['refkecamatan_nama']; ?></option>
                                                                                <?php //endforeach ?>
                                                                            </select>
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>Kelurahan</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="select"> 
                                                                            <select class="select2" id="wp2_kelurahan" name="wp2_kelurahan">
                                                                                <option selected="" disabled="">== Silahkan Pilih ==</option>
                                                                                <?php //foreach ($data['kalurahan'] as $r_kelurahan2): ?>
                                                                                <option value="<?php// echo $r_kelurahan2['refkelurahan_id']; ?>"><?php// echo $r_kelurahan2['refkelurahan_nama']; ?></option>
                                                                                <?php// endforeach ?>
                                                                            </select>
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>6. Telephone</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                                                            <input type="text" name="wp2_telepon" id="wp2_telepon" class="valid">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                </div>
                                                                <div class="table-responsive">
                                                                  <table class="table table-bordered">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><b>Petunjuk Pengisian SPTPD</b></td>
                                                                                <td><li align="left" class="style2">Kolom A : Diisikan sesuai yang tercantum dalam kartu NPWPD</li>
                                                                                <li align="left" class="style2">Kolom B : Diisikan sesuai yang tercantum dalam kartu NPWPD</li>
                                                                                <li align="left" class="style2">Kolom C : Diisikan sesuai yang tercantum dalam kartu NPWPD</li>
                                                                                <li align="left" class="style2">Kolom D : Diisikan sesuai yang tercantum dalam kartu NPWPD</li>
                                                                                <li align="left" class="style2">Kolom E : Diisikan sesuai yang tercantum dalam kartu NPWPD</li>
                                                                                <li align="left" class="style2">Kolom F : Diisikan sesuai yang tercantum dalam kartu NPWPD</li>
                                                                                <li align="left" class="style2">Kolom G : Diisikan apabila ada perubahan data Wajib Pajak dan dilampiri SPTPD untuk masa pajak yang bersangkutan</li>
                                                                                <li align="left" class="style2">Kolom H : Disikan sesuai dengan data yang ada dalam lampiran SPTPD untuk masa pajak yang bersangkutan</li>
                                                                                <li align="left" class="style2">Kolom I : Jumlah dasar pengenaan pajak dikalikan tarif pajak 10% (sepuluh persen)</li>
                                                                                <li align="left" class="style2">Kolom J : Jumlah pembayaran pajak yang telah dilakukan selama masa pajak belum berakhir</li>
                                                                                <li align="left" class="style2">Kolom K : Merupakan Jumlah Pajak yang terutang dikurangi kredit pajak</li>
                                                                                <li align="left" class="style2">Kolom L : Ditandatangani oleh wajib pajak atau kuasanya</li>  
                                                                                <li align="left" class="style2">Kolom M : Diisikan apabila ada perubahan</li>  
                                                                            </td></tr>
                                                                            <tr>
                                                                               <th colspan="3"><p align="center">KOLOM PENELITIAN OLEH PETUGAS BPKAD</p></th>
                                                                        </tr>
                                                                        <td>
                                                                            <div class="row">
                                                                            <section class="col col-md-4"> Diterima tgl </section>
                                                                                <section class="col col-md-8"> 
                                                                                    <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                                                        <input type="text" name="penelitian_diterimatgl" id="penelitian_diterimatgl" class="datepicker" data-dateformat="dd-mm-yy">
                                                                                    </label>
                                                                                </section>
                                                                            </div>
                                                                            <div class="row">
                                                                                <section class="col col-md-4"> Nama Petugas </section>
                                                                                <section class="col col-md-8"> 
                                                                                    <label class="input">
                                                                                        <input type="text" name="penelitian_namapetugas" id="penelitian_namapetugas">
                                                                                    </label>
                                                                                </section>
                                                                            </div>
                                                                            <div class="row">
                                                                                <section class="col col-md-4"> NIP </section>
                                                                                <section class="col col-md-8"> 
                                                                                    <label class="input">
                                                                                        <input type="text" name="penelitian_nip" id="penelitian_nip" data-mask="99-9999999-99-99" class="invalid">
                                                                                    </label>
                                                                                </section>
                                                                            </div>
                                                                        </td>
                                                                        <tr>
                                                                               <th colspan="3"><p align="center">----------GUNTING DISINI----------</p></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <header></header><br>
                                                                                <div class="row" style="float: right;">
                                                                                    <section class="col col-md-4"> No SPTPD</section>
                                                                                    <section class="col col-md-8">
                                                                                        <label for="address" class="input">
                                                                                            <input type="text" name="tt_no_sptpd" id="tt_no_sptpd">
                                                                                        </label>
                                                                                    </section>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <section class="col col-md-12"><p align="center"> TANDA TERIMA</p></section>
                                                                                </div><br><br>
                                                                                <div class="row">
                                                                                    <div class="col col-md-1"></div>
                                                                                    <div class="col col-md-5">
                                                                                        <div class="row">
                                                                                            <section class="col col-md-3">
                                                                                                NPWPD
                                                                                            </section>
                                                                                            <section class="col col-md-6">
                                                                                                <label for="address" class="input">
                                                                                                    <input type="text" name="tt_npwpd" id="tt_npwpd">
                                                                                                </label>
                                                                                            </section>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <section class="col col-md-3">
                                                                                                Nama
                                                                                            </section>
                                                                                            <section class="col col-md-6">
                                                                                                <label for="address" class="input">
                                                                                                    <input type="text" name="tt_nama" id="tt_nama">
                                                                                                </label>
                                                                                            </section>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <section class="col col-md-3">
                                                                                                Alamat
                                                                                            </section>
                                                                                            <section class="col col-md-6">
                                                                                                <label class="textarea">                                        
                                                                                                    <textarea rows="3" name="tt_alamat" id="tt_alamat"></textarea> 
                                                                                                </label>
                                                                                            </section>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col col-md-6">
                                                                                        <div class="row">
                                                                                            <section class="col col-md-3">
                                                                                                Tempat
                                                                                            </section>
                                                                                            <section class="col col-md-6">
                                                                                                <label for="address" class="input">
                                                                                                    <input type="text" name="tt_tempat" id="tt_tempat">
                                                                                                </label>
                                                                                            </section>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <section class="col col-md-3">
                                                                                                Tanggal
                                                                                            </section>
                                                                                            <section class="col col-md-6">
                                                                                                <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                                                                    <input type="text" name="tt_tanggal" class="datepicker" data-dateformat="dd-mm-yy" id="tt_tanggal">
                                                                                                </label>
                                                                                            </section>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <section class="col col-md-3">
                                                                                                Yang Menerima
                                                                                            </section>
                                                                                            <section class="col col-md-6">
                                                                                                <label class="select">
                                                                                                    <select name="tt_yang_menerima" id="tt_yang_menerima">
                                                                                                        <option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
                                                                                                    </select> <i></i> 
                                                                                                </label>
                                                                                            </section>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            </td>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <section class="col col-md-12">
                                            <a style="float: right;" onclick="simpanhotel()" href="javascript:void" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</a>
                                        </section>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div class="tab-pane" id="hr2">
                        <form class="smart-form">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center" rowspan="2">
                                                                <h4>PEMERINTAH KOTA YOGYAKARTA <br>
                                                                <b>BADAN PENGELOLAAN KEUANGAN <br>DAN ASET DAERAH</h4></b>
                                                                <p>Jl. Kenari No. 56 Yogyakarta Kode Pos : 55165 <br>Telp. (0274) 548519, 562835, 515865, 56282<br> Fax. (0274) 548519<br>
                                                                Email : bpkad@jogjakota.go.id HOTLINE SMS : 08122780001 <br> HOTLINE EMAIL : upik@jogjakota.go.id<br>WEBSITE : www.jogjakota.go.id</p>
                                                            </td>
                                                            <td class="text-center" rowspan="2">
                                                                <h3>SURAT PEMBERITAHUAN <br>PAJAK DAERAH <br>(SPTPD)<br><br><br>PAJAK HOTEL</h3>
                                                            </td>
                                                            <td>
                                                                <div class="row">
                                                                    <section class="col col-md-4"> Nomor </section>
                                                                    <section class="col col-md-8"> 
                                                                        <label class="input">
                                                                            <input type="text" name="card">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-4"> Masa Pajak </section>
                                                                    <section class="col col-md-8"> 
                                                                        <label class="input">
                                                                            <input type="text" name="card">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-4"> Tahun </section>
                                                                    <section class="col col-md-8"> 
                                                                        <label class="select">
                                                                            <select name="gender">
                                                                                <option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
                                                                            </select> <i></i> 
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                               <div class="row">
                                                                    <section class="col col-md-4">Tgl diterima BPKAD</section>
                                                                    <section class="col col-md-8"> 
                                                                        <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                                            <input type="text" name="request" class="datepicker " data-dateformat="dd/mm/yy" id="dp1492787144658">
                                                                        </label>
                                                                    </section>
                                                                </div> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="3"><p align="left">I. DATA OBJEK PAJAK</p></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                    </div>
<!-- INI -->
                                    <div class="row">
                                        <section class="col col-md-12">
                                            <div class="table-responsive">
                                             <table class="table table-bordered">
                                                <tbody>
                                                   <tr>
                                                    <td style="width: 200px;"><b>A. GOLONGAN HOTEL</b></td>
                                                    <td colspan="2"><section class="col col-md-5"> 
                                                        <label class="input">
                                                            <input type="number" name="card" placeholder="Isikan Sesuai Nomor">
                                                        </label>
                                                    </section>
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="5"></td>
                                                    <td>01. Bintang Lima</td>
                                                    <td>06. Melati Tiga</td>
                                                </tr>
                                                <tr>
                                                    <td>02. Bintang Empat</td>
                                                    <td>07. Melati Dua</td>
                                                </tr>
                                                <tr>
                                                    <td>03. Bintang Tiga</td>
                                                    <td>08. Melati Satu</td>
                                                </tr>
                                                <tr>
                                                    <td>04. Bintang Dua</td>
                                                    <td>09.Melati</td>
                                                </tr>
                                                <tr>
                                                    <td>05. Bintang Satu</td>
                                                    <td>10.Dst</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                            </div>
                                        </section>
                                    </div>

                                    <div class="row">
                                        <section class="col col-md-12">
                                            <div class="table-responsive">
                                               <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                    <th colspan="3"><p align="left">B. KLASIFIKASI KAMAR/ TARIF/ JUMLAH</p></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </section>
                                </div> 
                                </fieldset>
                            </form>
                        
                        <div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false">
                <!-- widget options:
                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                data-widget-colorbutton="false"
                data-widget-editbutton="false"
                data-widget-togglebutton="false"
                data-widget-deletebutton="false"
                data-widget-fullscreenbutton="false"
                data-widget-custombutton="false"
                data-widget-collapsed="true"
                data-widget-sortable="false"

            -->
            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>&nbsp;Data Klasifikasi Kamar/Tarif/Jumlah</h2>

            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">
                    <div class="widget-body-toolbar">
                        <button class="btn btn-primary" onclick="tambahobjekkamar()">
                            <i class="fa fa-plus-square"></i>   Tambah
                        </button>                           
                    </div>

                    <div class="">
                        
                        <table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th align="center" >No</th>
                                    <th align="center" >Klas Kamar</th>
                                    <th align="center" >Jumlah</th>
                                    <th align="center">Tarif</th>
                                    <th align="center">Discount</th>
                                    <th align="center">Jumlah Kamar Terjual</th>
                                    <th align="center">Omzet (Rp)</th>
                                    <th align="center" width="10">Hapus</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_objek_kamar">
                                
                            </tbody>
                        </table>

                    </div>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget -->

    </article>
    <!-- WIDGET END -->

</div>
<div class="row">
    <section class="col col-md-12">
        <div class="table-responsive">
         <table class="table table-bordered">
            <tbody>
                <tr>
                <th colspan="3"><p align="left">C. KOS-KOS</p></th>
                </tr>
            </tbody>
        </table>
    </div>

</section>
</div> 

<div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="aefdewra4aw54w" data-widget-editbutton="false">
                <!-- widget options:
                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                data-widget-colorbutton="false"
                data-widget-editbutton="false"
                data-widget-togglebutton="false"
                data-widget-deletebutton="false"
                data-widget-fullscreenbutton="false"
                data-widget-custombutton="false"
                data-widget-collapsed="true"
                data-widget-sortable="false"

            -->
            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>&nbsp;Data Kos-kos</h2>

            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">
                    <div class="widget-body-toolbar">
                        <button class="btn btn-primary" onclick="tambahobjekkos()">
                            <i class="fa fa-plus-square"></i>   Tambah
                        </button>                           
                    </div>

                    <div class="">
                        
                        <table id="dt_basic2" class="table table-bordered table-striped table-condensed table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th align="center" >No</th>
                                    <th align="center" >Jumlah Kamar</th>
                                    <th align="center" >Tarif Sewa  (Rp)</th>
                                    <th align="center">Jumlah Kamar Laku</th>
                                    <th align="center">Omset (Rp)</th>
                                    <th align="center">Keterangan</th>
                                    <th align="center" width="10">Edit</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_objek_kos">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td align="center"><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-red txt-color-white pull-right"  ><i class="glyphicon glyphicon-trash "></i></a> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>

<div class="row">
    <section class="col col-md-12">
        <div class="table-responsive">
         <table class="table table-bordered">
            <tbody>
                <tr>
                <th colspan="3"><p align="left">D. FASILITAS PENUNJANG</p></th>
                </tr>
            </tbody>
        </table>
    </div>

</section>
</div> 

<div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="fasilitassd" data-widget-editbutton="false">
                <!-- widget options:
                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                data-widget-colorbutton="false"
                data-widget-editbutton="false"
                data-widget-togglebutton="false"
                data-widget-deletebutton="false"
                data-widget-fullscreenbutton="false"
                data-widget-custombutton="false"
                data-widget-collapsed="true"
                data-widget-sortable="false"

            -->
            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>&nbsp;Data Fasilitas</h2>

            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">
                    <div class="widget-body-toolbar">
                        <button class="btn btn-primary" onclick="tambah()">
                            <i class="fa fa-plus-square"></i>   Tambah
                        </button>                           
                    </div>

                    <div class="">
                        
                        <table id="dt_basic3" class="table table-bordered table-striped table-condensed table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th align="center" >No</th>
                                    <th align="center" >Jenis Fasilitas yang Disediakan</th>
                                    <th align="center" >Keteangan</th>
                                    <th align="center" width="30">Omset Penjualan(Rp)</th>
                                    <th align="center" >Edit</th>
                                    <th align="center" >Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td align="center"><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-green txt-color-white pull-right"  ><i class="fa fa-edit"></i></a> </td>
                                    <td align="center"><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-red txt-color-white pull-right"  ><i class="glyphicon glyphicon-trash "></i></a> </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget -->

    </article>
    <!-- WIDGET END -->

</div>
<div class="row">
    <section class="col col-md-12">
        <div class="table-responsive">
         <table class="table table-bordered">
            <tbody>
                <tr>
                <th colspan="3"><p align="left">2. LAMPIRAN LAPORAN PENJUALAN DAN SEJENIS</p></th>
                </tr>
            </tbody>
        </table>
    </div>

</section>
</div> 
                    </div>
                 

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
</section><br>

<!-- MODAL OBJEK KAMAR -->
<div class="modal fade" id="modal_objek_kamar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    Form Data Klasifikasi Kamar/Tarif/Jumlah
                </h4>
            </div>
            <div class="modal-body no-padding">
                <form id="form-data-objek-pajak-kamar" class="smart-form">
                    <fieldset>
                        <section>
                            <div class="row">
                                <section class="col col-md-12">
                                    <label class="label col col-3">Klas Kamar</label>
                                    <div class="col col-9">
                                        <label class="input"> <i class="icon-append fa fa-square"></i>
                                            <input value="" type="text" name="op_kamar_klaskamar" id="op_kamar_klaskamar">
                                        </label>
                                    </div>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-12">
                                    <label class="label col col-3">Jumlah</label>
                                    <div class="col col-9">
                                        <label class="input"> <i class="icon-append fa fa-square"></i>
                                            <input value="" type="text" name="op_kamar_jumlah" id="op_kamar_jumlah">
                                        </label>
                                    </div>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-12">
                                    <label class="label col col-3">Tarif</label>
                                    <div class="col col-9">
                                        <label class="input"> <i class="icon-append fa fa-square"></i>
                                            <input value="" type="text" name="op_kamar_tarif" id="op_kamar_tarif">
                                        </label>
                                    </div>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-12">
                                    <label class="label col col-3">Discount</label>
                                    <div class="col col-9">
                                        <label class="input"> <i class="icon-append fa fa-square"></i>
                                            <input value="" type="text" name="op_kamar_diskon" id="op_kamar_diskon">
                                        </label>
                                    </div>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-12">
                                    <label class="label col col-3">Jumlah Kamar Terjual</label>
                                    <div class="col col-9">
                                        <label class="input"> <i class="icon-append fa fa-square"></i>
                                            <input value="" type="text" name="op_kamar_jmlkamar_terjual" id="op_kamar_jmlkamar_terjual">
                                        </label>
                                    </div>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-12">
                                    <label class="label col col-3">Omzet (Rp)</label>
                                    <div class="col col-9">
                                        <label class="input"> <i class="icon-append fa fa-square"></i>
                                            <input value="" type="text" name="op_kamar_omzet" id="op_kamar_omzet">
                                        </label>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </fieldset>
                    <footer>
                        <button id="btn-simpan" type="submit"z class="btn btn-primary">
                            Simpan
                        </button>
                        <button type="reset" class="btn btn-default" data-dismiss="modal">
                            Batal
                        </button>

                    </footer>
                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- MODAL OBJEK KOS -->
<div class="modal fade" id="modal_objek_kos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    Form Data Kos
                </h4>
            </div>
            <div class="modal-body no-padding">
                <form id="form-data-objek-pajak-kamar" class="smart-form">
                    <fieldset>
                        <section>
                            <div class="row">
                                <section class="col col-md-12">
                                    <label class="label col col-3">Jumlah Kamar</label>
                                    <div class="col col-9">
                                        <label class="input"> <i class="icon-append fa fa-square"></i>
                                            <input value="" type="text" name="op_kos_jmlkamar" id="op_kos_jmlkamar">
                                        </label>
                                    </div>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-12">
                                    <label class="label col col-3">Tarif Sewa (Rp)</label>
                                    <div class="col col-9">
                                        <label class="input"> <i class="icon-append fa fa-square"></i>
                                            <input value="" type="text" name="op_kos_tarifsewa" id="op_kos_tarifsewa">
                                        </label>
                                    </div>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-12">
                                    <label class="label col col-3">Jumlah Kamar Laku</label>
                                    <div class="col col-9">
                                        <label class="input"> <i class="icon-append fa fa-square"></i>
                                            <input value="" type="text" name="op_kos_jumlahkamarlaku" id="op_kos_jumlahkamarlaku">
                                        </label>
                                    </div>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-12">
                                    <label class="label col col-3">Omzet</label>
                                    <div class="col col-9">
                                        <label class="input"> <i class="icon-append fa fa-square"></i>
                                            <input value="" type="text" name="op_kos_omzet" id="op_kos_omzet">
                                        </label>
                                    </div>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-12">
                                    <label class="label col col-3">Keterangan</label>
                                    <div class="col col-9">
                                        <label class="textarea"> <i class="icon-append fa fa-square"></i>
                                            <textarea rows="2" id="op_kos_keterangan" name="op_kos_keterangan"></textarea>
                                        </label>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </fieldset>
                    <footer>
                        <button id="btn-simpan" type="submit"z class="btn btn-primary">
                            Simpan
                        </button>
                        <button type="reset" class="btn btn-default" data-dismiss="modal">
                            Batal
                        </button>

                    </footer>
                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
    pageSetUp();
    jQuery(document).ready(function($) {
        window.cmd="tambah";
        window.id="";
    });
    loadScript("<?php echo Yii::app()->theme->baseUrl; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
    function runFormValidation() {
        var $FormData = $("#form-data-objek-pajak-kamar").validate({
            // Rules for form validation
            rules : {
            },
            // Messages for form validation
            messages : {
            },
            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            },
            submitHandler : function(form) {
                // saat validasi benar semua, jalankan simpan()
                return simpanobjekkamar();
            }
        });
    };
    /*//form validation*/

    function getdata(value) {
       $.ajax({
           url: 'hotel/entry_data/getdata',
           type: 'POST',
           dataType: 'json',
           data: {npwpd: value},
           success:function (respon) {
               if (respon.statusdata=='ada') {
                    window.cmd = "edit";
                    window.id = respon.idpajakhotel;
                    $('#idpajakhotel').val(respon.idpajakhotel);
                    $('#tpajakhotel_nomor').val(respon.tpajakhotel_nomor);
                    $('#tpajakhotel_mspajak').val(respon.tpajakhotel_mspajak);
                    $('#tpajakhotel_tahunpajak').val(respon.tpajakhotel_tahunpajak);
                    $('#tpajakhotel_tglditerima').val(respon.tpajakhotel_tglditerima);
                    $('#tnpwpddaftar_npwpd').val(respon.tnpwpddaftar_npwpd);
                    $('#omset_kamarhotel').val(respon.omset_kamarhotel);
                    $('#omset_fasilitaspenunjang').val(respon.omset_fasilitaspenunjang);
                    $('#omset_kamarkos').val(respon.omset_kamarkos);
                    $('#omset_jumlah').val(respon.omset_jumlah);
                    $('#omset_servis').val(respon.omset_servis);
                    $('#omset_jumlahtotal').val(respon.omset_jumlahtotal);
                    $('#pajak_terutang').val(respon.pajak_terutang);
                    $('#pajak_sudahdibayar').val(respon.pajak_sudahdibayar);
                    $('#penelitian_diterimatgl').val(respon.penelitian_diterimatgl);
                    $('#penelitian_namapetugas').val(respon.penelitian_namapetugas);
                    $('#penelitian_nip').val(respon.penelitian_nip);
                    $('#tt_no_sptpd').val(respon.tt_no_sptpd);
                    $('#tt_tanggal').val(respon.tt_tanggal);
                    $('#tt_yang_menerima').val(respon.tt_yang_menerima);
               }else{
                    window.cmd = "tambah";
               }
           }
       })
    }
    function simpanhotel() {
        $.ajax({
            url: 'hotel/entry_data/simpandata',
            type: 'POST',
            dataType: 'json',
            data: {
                cmd : window.cmd,
                id : window.id,
                tpajakhotel_nomor : $('#tpajakhotel_nomor').val(),
                tpajakhotel_mspajak : $('#tpajakhotel_mspajak').val(),
                tpajakhotel_tahunpajak : $('#tpajakhotel_tahunpajak').val(),
                tpajakhotel_tglditerima : $('#tpajakhotel_tglditerima').val(),

                tnpwpddaftar_npwpd : $('#tnpwpddaftar_npwpd').val(),
                nama_wajib_pajak : $('#nama_wajib_pajak').val(),
                nama_usaha : $('#nama_usaha').val(),
                alamat_usaha : $('#alamat_usaha').val(),
                wp_kecamatan : $('#wp_kecamatan').val(),
                wp_kelurahan : $('#wp_kelurahan').val(),
                wp_telepon : $('#wp_telepon').val(),
                isperubahanidentitas : $('#isperubahanidentitas').val(),
                omset_kamarhotel : $('#omset_kamarhotel').val(),
                omset_fasilitaspenunjang : $('#omset_fasilitaspenunjang').val(),
                omset_kamarkos : $('#omset_kamarkos').val(),
                omset_jumlah : $('#omset_jumlah').val(),
                omset_servis : $('#omset_servis').val(),
                omset_jumlahtotal : $('#omset_jumlahtotal').val(),
                pajak_terutang : $('#pajak_terutang').val(),
                pajak_sudahdibayar : $('#pajak_sudahdibayar').val(),

                penelitian_diterimatgl : $('#penelitian_diterimatgl').val(),
                penelitian_namapetugas : $('#penelitian_namapetugas').val(),
                penelitian_nip : $('#penelitian_nip').val(),

                tt_no_sptpd : $('#tt_no_sptpd').val(),
                tt_npwpd : $('#tt_npwpd').val(),
                tt_tempat : $('#tt_tempat').val(),
                tt_nama : $('#tt_nama').val(),
                tt_tanggal : $('#tt_tanggal').val(),
                tt_alamat : $('#tt_alamat').val(),
                tt_yang_menerima : $('#tt_yang_menerima').val(),
            },
            success:function (respon) {
                if (respon.pesan=='success') {
                    notifikasi('sukses', 'Data Berhasil Disimapan', 'success', 0, 0, 1);
                }else{
                    notifikasi('Gagal', 'Data Gagal Disimapan', 'failed', 0, 0, 1);
                }
            }
        });
    }
    function tambahobjekkamar() {
        $('#op_kamar_klaskamar').val('');
        $('#op_kamar_jumlah').val('');
        $('#op_kamar_tarif').val('');
        $('#op_kamar_diskon').val('');
        $('#op_kamar_jmlkamar_terjual').val('');
        $('#op_kamar_omzet').val('');
        $('#modal_objek_kamar').modal('show');
    }
    function simpanobjekkamar() {
        $.ajax({
            url: 'hotel/entry_data/simpanobjekkamartemp',
            type: 'POST',
            dataType: 'json',
            data: {
                op_kamar_klaskamar : $('#op_kamar_klaskamar').val(),
                op_kamar_jumlah : $('#op_kamar_jumlah').val(),
                op_kamar_tarif : $('#op_kamar_tarif').val(),
                op_kamar_diskon : $('#op_kamar_diskon').val(),
                op_kamar_jmlkamar_terjual : $('#op_kamar_jmlkamar_terjual').val(),
                op_kamar_omzet : $('#op_kamar_omzet').val()
            },
            success:function (respon) {
                reloadobjekkamartemp();
                $('#modal_objek_kamar').modal('hide');
            }
        })
    }
    function reloadobjekkamartemp() {
        $.ajax({
            url: 'hotel/entry_data/reloadobjekkamartemp',
            type: 'POST',
            dataType: 'html'
,            data: {},
            success:function (respon) {
               $('#tbody_objek_kamar').html(respon);
            }
        });
    }
    function hapuspajakhoteltemp(id) {
         $.ajax({
            url: 'hotel/entry_data/hapusobjekkamartemp',
            type: 'POST',
            dataType: 'html',
            data: {id:id},
            success:function (respon) {
               reloadobjekkamartemp();
            }
        });
    }
    function tambahobjekkos() {
        $('#op_kos_jmlkamar').val('');
        $('#op_kos_tarifsewa').val('');
        $('#op_kos_jumlahkamarlaku').val('');
        $('#op_kos_omzet').val('');
        $('#op_kos_keterangan').val('');
        $('#modal_objek_kos').modal('show');
    }
    function simpanobjekkos() {
        $.ajax({
            url: 'hotel/entry_data/simpanobjekkos',
            type: 'POST',
            dataType: 'json',
            data: {
                op_kos_jmlkamar : $('#op_kos_jmlkamar').val(),
                op_kos_tarifsewa : $('#op_kos_tarifsewa').val(),
                op_kos_jumlahkamarlaku : $('#op_kos_jumlahkamarlaku').val(),
                op_kos_omzet : $('#op_kos_omzet').val(),
                op_kos_keterangan : $('#op_kos_keterangan').val()
            },
            success:function (respon) {
                reloadobjekkos();
                $('#modal_objek_kos').modal('hide');
            }
        })
    }
</script>