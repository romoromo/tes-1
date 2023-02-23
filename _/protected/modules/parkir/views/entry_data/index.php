<?php define('ASSETS_URL',$data['theme_baseurl']); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-sm well-light bg-color-red txt-color-white">
            <h4><i class="fa fa-file fa-fw"></i> Enrty Data SPTPD Pajak Parkir</h4>
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

                        <a data-toggle="tab" href="#hr1">  Entry Pajak Parkir  </a>

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
                                                                <h3>SURAT PEMBERITAHUAN <br>PAJAK DAERAH <br>(SPTPD)<br><br><br>PAJAK PARKIR</h3>
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
                                                                            <input type="text" name="card" data-mask="99-9999999-99-99" class="invalid">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>B. Nama Wajib Pajak</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="input">
                                                                            <input type="text" name="card">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>C. Nama Usaha</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label for="address" class="input">
                                                                            <input type="text" name="nama_usaha">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>D. Alamat tempat usaha</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="textarea">                                        
                                                                            <textarea rows="3" name="alamat"></textarea> 
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>E. Kecamatan</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="select"> 
                                                                            <select class="select2" id="kecamatan">
                                                                                <option selected="" disabled="">== Silahkan Pilih ==</option>
                                                                                <option>Kecamatan Danurejan</option>
                                                                                <option>Kecamatan Gedong Tengen</option>
                                                                                <option>Kecamatan Gondokusuman</option>
                                                                            </select>
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3">Kelurahan</section>
                                                                    <section class="col col-md-8">
                                                                        <label class="select"> 
                                                                            <select class="select2" id="kelurahan">
                                                                                <option selected="" disabled="">== Silahkan Pilih ==</option>
                                                                                <option>Bausasran</option>
                                                                                <option>Tegal Panggung</option>
                                                                                <option>Suryatmajan</option>
                                                                            </select>
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>F. Telephone</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                                                            <input type="text" name="phone" class="valid">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>G. Perubahan Identitas</b></section>
                                                                    <section class="col col-md-8">
                                                                        <span class="onoffswitch">
                                                                            <input type="checkbox" class="onoffswitch-checkbox" id="autoopen">
                                                                            <label class="onoffswitch-label" for="autoopen"> 
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
                                                                <p align="center">Omset Jasa</p>
                                                            </td>
                                                            <td style="width: 100px;">
                                                                <p align="center">Jumlah (Rp)</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3"></td>
                                                            <td>1. Tempat Parkir</td>
                                                            <td>
                                                                <label for="address" class="input">
                                                                    <input type="text" name="disantap">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2. Garasi Kendaraan Bermotor</td>
                                                            <td>
                                                                <label for="address" class="input">
                                                                    <input type="text" name="pulang">
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
                                                                    <input type="text" name="pulang">
                                                                </label>
                                                            </td>
                                                           
                                                        </tr>
                                                        <tr>
                                                            <td><b>I. Pajak Terutang</b></td>
                                                            <td>Tarif Pajak  10 % (sepuluh persen)</td>
                                                            <td>
                                                                <label for="address" class="input">
                                                                    <input type="text" name="jumlah_total">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>J. Kredit Pajak</b></td>
                                                            <td></td>
                                                            <td>
                                                                <label for="address" class="input">
                                                                    <input type="text" name="jumlah_total">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>K. Yang Harus Dibayar</b></td>
                                                            <td>Lajur huruf i - huruf j</td>
                                                            <td>
                                                                <label for="address" class="input">
                                                                    <input type="text" name="jumlah_total">
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
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>1. NPWPD</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="input">
                                                                            <input type="text" name="card" data-mask="99-9999999-99-99" class="invalid">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>2. Nama Wajib Pajak</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="input">
                                                                            <input type="text" name="card">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>3. Nama Usaha</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label for="address" class="input">
                                                                            <input type="text" name="nama_usaha">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>4. Alamat tempat usaha</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="textarea">                                        
                                                                            <textarea rows="3" name="alamat"></textarea> 
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>5. Kecamatan</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="select"> 
                                                                            <div class="select2-container select2" id="s2id_kecamatanSS" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">== Silahkan Pilih ==</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen1"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select class="select2 select2-offscreen" id="kecamatan" tabindex="-1">
                                                                                <option selected="value">== Silahkan Pilih ==</option>
                                                                                <option>Kecamatan Danurejan</option>
                                                                                <option>Kecamatan Gedong Tengen</option>
                                                                                <option>Kecamatan Gondokusuman</option>
                                                                            </select>
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3">Kelurahan</section>
                                                                    <section class="col col-md-8">
                                                                        <label class="select"> 
                                                                            <div class="select2-container select2" id="s2id_kelurahanSS" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">== Silahkan Pilih ==</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen2"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select class="select2 select2-offscreen" id="kelurahan" tabindex="-1">
                                                                                <option selected="value" >== Silahkan Pilih ==</option>
                                                                                <option>Bausasran</option>
                                                                                <option>Tegal Panggung</option>
                                                                                <option>Suryatmajan</option>
                                                                            </select>
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-3"><b>6. Telephone</b></section>
                                                                    <section class="col col-md-8">
                                                                        <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                                                            <input type="text" name="phone" class="valid">
                                                                        </label>
                                                                    </section>
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
                                                                                        <input type="text" name="request" class="datepicker  hasDatepicker" data-dateformat="dd/mm/yy" id="dp1492787144658">
                                                                                    </label>
                                                                                </section>
                                                                            </div>
                                                                            <div class="row">
                                                                                <section class="col col-md-4"> Nama Petugas </section>
                                                                                <section class="col col-md-8"> 
                                                                                    <label class="input">
                                                                                        <input type="text" name="card">
                                                                                    </label>
                                                                                </section>
                                                                            </div>
                                                                            <div class="row">
                                                                                <section class="col col-md-4"> NIP </section>
                                                                                <section class="col col-md-8"> 
                                                                                    <label class="input">
                                                                                        <input type="text" name="card" data-mask="99-9999999-99-99" class="invalid">
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
                                                                                            <input type="text" name="nama_usaha">
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
                                                                                                    <input type="text" name="nama_usaha">
                                                                                                </label>
                                                                                            </section>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <section class="col col-md-3">
                                                                                                Nama
                                                                                            </section>
                                                                                            <section class="col col-md-6">
                                                                                                <label for="address" class="input">
                                                                                                    <input type="text" name="nama_usaha">
                                                                                                </label>
                                                                                            </section>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <section class="col col-md-3">
                                                                                                Alamat
                                                                                            </section>
                                                                                            <section class="col col-md-6">
                                                                                                <label class="textarea">                                        
                                                                                                    <textarea rows="3" name="alamat"></textarea> 
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
                                                                                                    <input type="text" name="nama_usaha">
                                                                                                </label>
                                                                                            </section>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <section class="col col-md-3">
                                                                                                Tanggal
                                                                                            </section>
                                                                                            <section class="col col-md-6">
                                                                                                <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                                                                    <input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_terima">
                                                                                                </label>
                                                                                            </section>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <section class="col col-md-3">
                                                                                                Yang Menerima
                                                                                            </section>
                                                                                            <section class="col col-md-6">
                                                                                                <label class="select">
                                                                                                    <select name="gender">
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
                                    <header></header><br>
                                    
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
                                                                <b>BADAN PENGELOLAAN KEUANGAN <br>DAN ASET DAERAH</b></h4>
                                                                <p>Jl. Kenari No. 56 Yogyakarta Kode Pos : 55165 <br>Telp. (0274) 548519, 562835, 515865, 56282<br> Fax. (0274) 548519<br>
                                                                    Email : bpkad@jogjakota.go.id HOTLINE SMS : 08122780001 <br> HOTLINE EMAIL : upik@jogjakota.go.id<br>WEBSITE : www.jogjakota.go.id</p>
                                                                </td>
                                                                <td class="text-center" rowspan="2">
                                                                    <h3>SURAT PEMBERITAHUAN <br>PAJAK DAERAH <br>(SPTPD)<br><br><br>PAJAK PARKIR</h3>
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
                                                                            <input type="text" name="request" class="datepicker  hasDatepicker" data-dateformat="dd/mm/yy" id="dp1492787144658">
                                                                        </label>
                                                                    </section>
                                                                </div> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="3"><p align="left">1. DATA OBJEK PAJAK</p></th>
                                                        </tr>    
                                                        <tr>      
                                                            <td>a. Jenis Objek</td>
                                                            <td colspan="2"><section class="col col-md-8"> 
                                                                <label class="select">
                                                                    <select name="gender">         
                                                                      <option value="0" selected="">== Silahkan Pilih ==</option>
                                                                      <option value="0" >== Tempat Parkir ==</option>
                                                                      <option value="0" >== Garasi Kendaraan Bermotor ==</option>
                                                                  </select> <i></i> 
                                                              </label>
                                                          </section></td>
                                                      </tr>
                                                      <tr>
                                                        <td>b. Luas Lahan</td>
                                                        <td colspan="2"><section class="col col-md-4"> 
                                                            <label class="input">
                                                                <input type="text" name="card">
                                                            </label>
                                                        </section>m2</td>
                                                    </tr>
                                                    <tr>
                                                        <td>c. Jam Buka / Jam Tutup</td>
                                                        <td colspan="2">
                                                            <section class="input-group">
                                                                <input class="form-control" id="timepicker" type="text" placeholder="Masukkan Jam">
                                                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                            </section></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                    </div>
                                     <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
                            <div class="panel-group smart-accordion-default" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed"> 
                                    <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i> Tabel Objek Pajak</a></h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body no-padding">
                                       <table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th align="center">No</th>
                                                            <th align="center">Jenis Kendaraan</th>
                                                            <th align="center">Kapasitas Kendaraan Yang Dapat Diparkir</th>
                                                            <th align="center" width="30">Tarif(Rp)</th>
                                                            <th align="center">Keterangan</th>
                                                            <th align="center">Edit</th>
                                                            <th align="center">Hapus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">1.</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td align="center"><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-green txt-color-white pull-right"><i class="fa fa-edit"></i></a> </td>
                                                            <td align="center"><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-red txt-color-white pull-right"><i class="glyphicon glyphicon-trash "></i></a> </td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                        <td class="sorting_1">2.</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td align="center"><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-green txt-color-white pull-right"><i class="fa fa-edit"></i></a> </td>
                                                        <td align="center"><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-red txt-color-white pull-right"><i class="glyphicon glyphicon-trash "></i></a> </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                    <td colspan="3" class="sorting_1">Extra Jam</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2" align="center"> </td>                                    
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td colspan="3" class="sorting_1" align="right">Jumlah</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2" align="center"> </td>       
                                                </tr></tbody>
                                            </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </article>
                            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
                                <div class="panel-group smart-accordion-default" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne2" aria-expanded="false" class="collapsed"> 
                                                <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i>2. Rekapitulasi Pemakaian Tempat Parkir</a></h4>
                                            </div>
                                            <div id="collapseOne2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body no-padding">
                                                    <table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th align="center">No</th>
                                                                <th align="center">Tanggal</th>
                                                                <th align="center">Tarif (Rp)</th>
                                                                <th align="center" width="30">Tarif(Rp)</th>
                                                                <th align="center">Nomor Tanda Parkir</th>
                                                                <th align="center">Jumlah</th>
                                                                <th align="center">Omzet Jasa </th>
                                                                <th align="center">Edit</th>
                                                                <th align="center">Hapus</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1">1.</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td><td></td>
                                                                <td align="center"><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-green txt-color-white pull-right"><i class="fa fa-edit"></i></a> </td>
                                                                <td align="center"><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-red txt-color-white pull-right"><i class="glyphicon glyphicon-trash "></i></a> </td>
                                                            </tr>
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1">2.</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td><td></td>
                                                                <td align="center"><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-green txt-color-white pull-right"><i class="fa fa-edit"></i></a> </td>
                                                                <td align="center"><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-red txt-color-white pull-right"><i class="glyphicon glyphicon-trash "></i></a> </td>
                                                            </tr>
                                                            <tr role="row" class="odd">
                                                                <td colspan="6" class="sorting_1" align="center">Jumlah Total</td>
                                                                <td></td>
                                                                <td colspan="2" align="center"> </td>       
                                                            </tr></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <!-- INI -->
                                    
                                </fieldset>
                            </form>
                           
<script type="text/javascript">

    pageSetUp();
    
    
    // pagefunction 
    var pagefunction = function() {
        //console.log("cleared");

        /* BASIC ;*/
            var responsiveHelper_dt_basic = undefined;
            var responsiveHelper_datatable_fixed_column = undefined;
            var responsiveHelper_datatable_col_reorder = undefined;
            var responsiveHelper_datatable_tabletools = undefined;
            
            var breakpointDefinition = {
                tablet : 1024,
                phone : 480
            };

            $('#dt_basic').dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                    "t"+
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_dt_basic) {
                        responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_dt_basic.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_dt_basic.respond();
                }
            });

        /* END BASIC */

    };

     // pagefunction 
    var pagefunction = function() {
        //console.log("cleared");

        /* BASIC ;*/
            var responsiveHelper_dt_basic2 = undefined;
            var responsiveHelper_datatable_fixed_column = undefined;
            var responsiveHelper_datatable_col_reorder = undefined;
            var responsiveHelper_datatable_tabletools = undefined;
            
            var breakpointDefinition = {
                tablet : 1024,
                phone : 480
            };

            $('#dt_basic2').dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                    "t"+
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_dt_basic2) {
                        responsiveHelper_dt_basic2 = new ResponsiveDatatablesHelper($('#dt_basic2'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_dt_basic2.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_dt_basic2.respond();
                }
            });

        /* END BASIC */

    };

    // pagefunction 
    var pagefunction = function() {
        //console.log("cleared");

        /* BASIC ;*/
            var responsiveHelper_dt_basic3 = undefined;
            var responsiveHelper_datatable_fixed_column = undefined;
            var responsiveHelper_datatable_col_reorder = undefined;
            var responsiveHelper_datatable_tabletools = undefined;
            
            var breakpointDefinition = {
                tablet : 1024,
                phone : 480
            };

            $('#dt_basic3').dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                    "t"+
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_dt_basic3) {
                        responsiveHelper_dt_basic3 = new ResponsiveDatatablesHelper($('#dt_basic3'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_dt_basic3.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_dt_basic3.respond();
                }
            });

        /* END BASIC */

    };
    
    // load related plugins
    
    loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/jquery.dataTables.min.js", function(){
        loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.colVis.min.js", function(){
            loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.tableTools.min.js", function(){
                loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.bootstrap.min.js", function(){
                    loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/datatables.responsive.min.js", pagefunction)
                });
            });
        });
    });
</script>